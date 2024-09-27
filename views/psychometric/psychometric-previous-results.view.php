<?php require "views/partials/header.php"; ?>
<?php require "views/partials/banner.php"; ?>

<div class="psych-results-container">
    <a href="/psychometric-test?new_test=1" class="btn-custom ml-3">
        Take New Test
    </a>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8">

                    <h1 class="psych-results-title text-center">Previous Psychometric Test Results for <?php echo htmlspecialchars($user['name']); ?></h1>
                    
                    <h2 class="psych-results-subtitle">Dear <?= htmlspecialchars($user['name']) ?>,</h2>
                    
                    <p class="mb-4"><?= htmlspecialchars($resultMessage ?? '') ?></p>

                    <?php 
                    $traitColors = [
                        'openness' => '#007bff',
                        'conscientiousness' => '#28a745',
                        'extraversion' => '#ffc107',
                        'agreeableness' => '#fd7e14',
                        'neuroticism' => '#dc3545'
                    ];
                    ?>
        <?php foreach ($previousResults as $result): ?>
            <tr>
                <td>
                    <div class="psych-results-card"> <!-- Use the same design -->
                        <h4>Test taken on: <?= date('F j, Y', strtotime($result['taken_at'])) ?></h4>
                        <?php 
                        $traitColors = [
                            'extraversion' => '#ffc107',
                            'agreeableness' => '#fd7e14',
                            'conscientiousness' => '#28a745',
                            'neuroticism' => '#dc3545',
                            'openness' => '#007bff'
                        ];
                        ?>
                        <?php foreach (['extraversion', 'agreeableness', 'conscientiousness', 'neuroticism', 'openness'] as $trait): ?>
                            <div class="psych-trait-container">
                                <div class="psych-trait-header">
                                    <span class="psych-trait-name"><?= ucfirst($trait) ?></span>
                                    <span class="psych-trait-score" style="color: <?= $traitColors[$trait] ?>"><?= round($result[$trait], 0) ?>%</span>
                                </div>
                                <div class="psych-trait-bar">
                                    <div class="psych-trait-progress" style="width: <?= $result[$trait] ?>%; background-color: <?= $traitColors[$trait] ?>"></div>
                                </div>
                                <div class="psych-trait-level">
                                    <?php
                                    if ($result[$trait] < 30) echo "Low";
                                    elseif ($result[$trait] < 70) echo "Moderate";
                                    else echo "High";
                                    ?>
                                </div>
                            </div>
                        <?php endforeach; ?>
                        <p class="mt-2">Interpretation: <?= htmlspecialchars($result['interpretation']) ?></p>
                    </div>
                </td>
            </tr>
        <?php endforeach; ?>
        </div>
        </div>
    </div>
</div>


<a href="/psychometric-test" class="psych-test__back-link">Back to Test</a>

<?php require "views/partials/footer.php"; ?>