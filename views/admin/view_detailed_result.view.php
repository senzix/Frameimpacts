<h2 class="mb-4">Detailed Test Result for <?= htmlspecialchars($result['username']) ?></h2>
<p>Test taken on: <?= date('F j, Y, g:i a', strtotime($result['created_at'])) ?></p>
<p>Test type: <?= htmlspecialchars(ucfirst($result['test_type'])) ?></p>
<p>Correct answers: <?= $result['correct_count'] ?> out of <?= $result['total_questions'] ?></p>
<p>Score: <?= number_format($result['percentage'], 2) ?>%</p>

<div class="results-container">
    <?php foreach ($detailed_results as $index => $question): ?>
        <div class="result-item">
            <h3>Question <?= $index + 1 ?></h3>
            <p><?= htmlspecialchars($question['question']) ?></p>
            <div class="options-container">
                <?php foreach (['A', 'B', 'C', 'D'] as $option): ?>
                    <div class="option 
                        <?= $question['userAnswer'] === $option ? 'user-selected' : '' ?> 
                        <?= $question['correctAnswer'] === $option ? 'correct-answer' : '' ?>">
                        <span class="option-letter"><?= $option ?></span>
                        <span class="option-text"><?= htmlspecialchars($question['options'][$option]) ?></span>
                        <?php if ($question['userAnswer'] === $option): ?>
                            <span class="user-mark">✓</span>
                        <?php endif; ?>
                        <?php if ($question['correctAnswer'] === $option): ?>
                            <span class="correct-mark">✅</span>
                        <?php endif; ?>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    <?php endforeach; ?>
</div>

<a href="?action=user_results&user_id=<?= $result['user_id'] ?>" class="btn btn-primary mt-3">Back to User Results</a>

<style>
    .results-container {
        margin-top: 20px;
    }
    .result-item {
        margin-bottom: 20px;
        border: 1px solid #ddd;
        padding: 15px;
        border-radius: 5px;
    }
    .options-container {
        display: flex;
        flex-direction: column;
    }
    .option {
        display: flex;
        align-items: center;
        margin-bottom: 10px;
        padding: 10px;
        border: 1px solid #ddd;
        border-radius: 5px;
    }
    .option-letter {
        margin-right: 10px;
        font-weight: bold;
    }
    .option-text {
        flex: 1;
    }
    .user-selected {
        background-color: #f8d7da;
    }
    .correct-answer {
        background-color: #d4edda;
    }
    .user-mark, .correct-mark {
        margin-left: 10px;
    }
</style>