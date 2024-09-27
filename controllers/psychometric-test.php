<?php
$config = require 'config.php';
$db = new Database($config['database']);

$header = 'Psychometric Test';

session_start();
// Ensure the user is logged in
if (!isset($_SESSION['user_id'])) {
    header('Location: /login');
    exit();
}

$user_id = $_SESSION['user_id'];

// Fetch questions from the database
$questions = $db->query("SELECT * FROM psychometric_questions ORDER BY question_id")->fetchAll();

function calculateScore($answers) {
    $scores = [
        'extraversion' => 0,
        'agreeableness' => 0,
        'conscientiousness' => 0,
        'neuroticism' => 0,
        'openness' => 0
    ];

    $questionTraitMap = [
        1 => ['extraversion', 1],
        2 => ['extraversion', 1],
        3 => ['extraversion', 1],
        4 => ['extraversion', -1],
        5 => ['extraversion', -1],
        6 => ['agreeableness', 1],
        7 => ['agreeableness', 1],
        8 => ['agreeableness', 1],
        9 => ['agreeableness', -1],
        10 => ['agreeableness', -1],
        11 => ['conscientiousness', 1],
        12 => ['conscientiousness', 1],
        13 => ['conscientiousness', 1],
        14 => ['conscientiousness', -1],
        15 => ['conscientiousness', -1],
        16 => ['neuroticism', 1],
        17 => ['neuroticism', 1],
        18 => ['neuroticism', 1],
        19 => ['neuroticism', -1],
        20 => ['neuroticism', -1],
        21 => ['openness', 1],
        22 => ['openness', 1],
        23 => ['openness', 1],
        24 => ['openness', -1],
        25 => ['openness', -1]
    ];

    foreach ($answers as $questionId => $answer) {
        if (isset($questionTraitMap[$questionId])) {
            list($trait, $direction) = $questionTraitMap[$questionId];
            $scores[$trait] += $answer * $direction;
        }
    }

    // Normalize scores to a 0-100 scale
    $questionCount = 5; // 5 questions per trait
    foreach ($scores as &$score) {
        $score = ($score + $questionCount * 5) / ($questionCount * 10) * 100;
        $score = max(0, min(100, $score)); // Ensure score is between 0 and 100
    }

    return $scores;
}

function interpretScore($scores) {
    $traits = ['extraversion', 'agreeableness', 'conscientiousness', 'neuroticism', 'openness'];
    $interpretation = '';
    foreach ($traits as $trait) {
        $interpretation .= ucfirst($trait) . ": ";
        if ($scores[$trait] < 33) {
            $interpretation .= "Low";
        } elseif ($scores[$trait] < 66) {
            $interpretation .= "Medium";
        } else {
            $interpretation .= "High";
        }
        $interpretation .= ". ";
    }
    return $interpretation;
}

function fetchAllUserResults($db, $user_id) {
    // Fetch all previous test results for the user
    $query = "SELECT * FROM psychometric_results 
              WHERE user_id = :user_id 
              ORDER BY taken_at DESC";
    return $db->query($query, [':user_id' => $user_id])->fetchAll();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $currentQuestion = isset($_POST['current_question']) ? intval($_POST['current_question']) : 0;
    
    // Store all submitted answers in the session
    if (!isset($_SESSION['test_answers'])) {
        $_SESSION['test_answers'] = [];
    }
    foreach ($_POST['answers'] as $questionId => $answer) {
        $_SESSION['test_answers'][$questionId] = intval($answer);
    }
    
    $nextQuestion = $currentQuestion + 1;
    
    if ($nextQuestion < count($questions)) {
        // Load the next question
        $currentQuestion = $nextQuestion;
        require 'views/psychometric/psychometric-test.view.php';
    } else {
        // Test is complete, calculate scores
        $scores = calculateScore($_SESSION['test_answers']);
        $interpretation = interpretScore($scores);
        
        // Check if the user has a recent identical result
        $query = "SELECT * FROM psychometric_results 
                  WHERE user_id = :user_id 
                  ORDER BY taken_at DESC 
                  LIMIT 1";
        $lastResult = $db->query($query, [':user_id' => $user_id])->fetch();

        $isDuplicate = false;
        if ($lastResult) {
            $isDuplicate = 
                $lastResult['extraversion'] == $scores['extraversion'] &&
                $lastResult['agreeableness'] == $scores['agreeableness'] &&
                $lastResult['conscientiousness'] == $scores['conscientiousness'] &&
                $lastResult['neuroticism'] == $scores['neuroticism'] &&
                $lastResult['openness'] == $scores['openness'];
        }

        if ($isDuplicate) {
            // Use the existing result
            $resultMessage = "You have already submitted this exact test result. Here are your previous results:";
        } else {
            // Insert new result
            $query = "INSERT INTO psychometric_results (user_id, extraversion, agreeableness, conscientiousness, neuroticism, openness, interpretation, taken_at) 
                      VALUES (:user_id, :extraversion, :agreeableness, :conscientiousness, :neuroticism, :openness, :interpretation, NOW())";
            $db->query($query, [
                ':user_id' => $user_id,
                ':extraversion' => $scores['extraversion'],
                ':agreeableness' => $scores['agreeableness'],
                ':conscientiousness' => $scores['conscientiousness'],
                ':neuroticism' => $scores['neuroticism'],
                ':openness' => $scores['openness'],
                ':interpretation' => $interpretation
            ]);
            $resultMessage = "Thank you for completing the test. Here are your results:";
        }

        // Fetch all previous test results for the user
        $previousResultsQuery = "SELECT * FROM psychometric_results 
                                 WHERE user_id = :user_id 
                                 ORDER BY taken_at DESC";
        $previousResults = $db->query($previousResultsQuery, [':user_id' => $user_id])->fetchAll();

        // Format the previous results for the view
        $formattedPreviousResults = [];
        foreach ($previousResults as $result) {
            $formattedPreviousResults[] = [
                'id' => $result['result_id'],
                'date' => $result['taken_at'],
                'scores' => [
                    'extraversion' => $result['extraversion'],
                    'agreeableness' => $result['agreeableness'],
                    'conscientiousness' => $result['conscientiousness'],
                    'neuroticism' => $result['neuroticism'],
                    'openness' => $result['openness']
                ],
                'interpretation' => $result['interpretation']
            ];
        }

        // Fetch user's name for the results page
        $user = $db->query("SELECT name FROM users WHERE user_id = :user_id", [':user_id' => $user_id])->fetch();
        
        // Define trait colors for the view
        $traitColors = [
            'extraversion' => '#FF6B6B',
            'agreeableness' => '#4ECDC4',
            'conscientiousness' => '#45B7D1',
            'neuroticism' => '#FFA07A',
            'openness' => '#98D8C8'
        ];

        // Pass the result message, current scores, and previous results to the view
        require 'views/psychometric/psychometric-test-results.view.php';
        
        // Clear the test answers from the session
       
    }
}

else if (isset($_GET['action']) && $_GET['action'] === 'view_previous') {
    // Fetch all previous results using the new function
    $previousResults = fetchAllUserResults($db, $user_id);

    // Fetch user's name for the results page
    $user = $db->query("SELECT name FROM users WHERE user_id = :user_id", [':user_id' => $user_id])->fetch();

    // Define trait colors for the view
    $traitColors = [
        'extraversion' => '#FF6B6B',
        'agreeableness' => '#4ECDC4',
        'conscientiousness' => '#45B7D1',
        'neuroticism' => '#FFA07A',
        'openness' => '#98D8C8'
    ];

    require 'views/psychometric/psychometric-previous-results.view.php';
}

else{
    // Start a new test
    unset($_SESSION['test_answers']);
    $currentQuestion = 0;
    $_SESSION['test_answers'] = [];
    require 'views/psychometric/psychometric-test.view.php';
}