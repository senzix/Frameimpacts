<?php require "views/partials/header.php";
      require "views/partials/banner.php";
?>
<div class="psych-results-container">
    <a href="/psychometric-test?new_test=1" class="btn-custom ml-3">
        Take New Test
    </a>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="psych-results-card">
                    <h1 class="psych-results-title text-center">Psychometric Assessment Results</h1>
                    
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

                    <?php foreach ($scores as $trait => $score): ?>
                        <div class="psych-trait-container">
                            <div class="psych-trait-header">
                                <span class="psych-trait-name"><?= ucfirst($trait) ?></span>
                                <span class="psych-trait-score" style="color: <?= $traitColors[$trait] ?>"><?= round($score, 0) ?>%</span>
                            </div>
                            <div class="psych-trait-bar">
                                <div class="psych-trait-progress" style="width: <?= $score ?>%; background-color: <?= $traitColors[$trait] ?>"></div>
                            </div>
                            <div class="psych-trait-level">
                                <?php
                                if ($score < 30) echo "Low";
                                elseif ($score < 70) echo "Moderate";
                                else echo "High";
                                ?>
                            </div>
                        </div>
                    <?php endforeach; ?>

                    <h3 class="psych-results-subtitle mt-5">Interpretation of Results</h3>
                    <div class="psych-interpretation">
                        <p><?= nl2br(htmlspecialchars($interpretation)) ?></p>
                    </div>

                    <div class="text-center mt-5">
                        <a href="/download-results" class="btn-custom">
                            Download Full Report (PDF)
                        </a>
                    </div>
                    <h3 class="psych-results-subtitle mt-5">Previous Test Results</h3>
<?php if (!empty($formattedPreviousResults)): ?>
    <div class="previous-results-list">
        <?php foreach ($formattedPreviousResults as $result): ?>
            <div class="previous-result-item">
                <h4>Test taken on: <?= date('F j, Y', strtotime($result['date'])) ?></h4>
                <?php foreach ($result['scores'] as $trait => $score): ?>
                    <div class="psych-trait-container"> <!-- Use the same design -->
                        <div class="psych-trait-header">
                            <span class="psych-trait-name"><?= ucfirst($trait) ?></span>
                            <span class="psych-trait-score" style="color: <?= $traitColors[$trait] ?>"><?= round($score, 0) ?>%</span>
                        </div>
                        <div class="psych-trait-bar">
                            <div class="psych-trait-progress" style="width: <?= $score ?>%; background-color: <?= $traitColors[$trait] ?>"></div>
                        </div>
                        <div class="psych-trait-level">
                            <?php
                            if ($score < 30) echo "Low";
                            elseif ($score < 70) echo "Moderate";
                            else echo "High";
                            ?>
                        </div>
                    </div>
                <?php endforeach; ?>
                <p class="mt-2">Interpretation: <?= htmlspecialchars($result['interpretation']) ?></p>
            </div>
        <?php endforeach; ?>
    </div>
<?php else: ?>
    <p>No previous test results available.</p>
<?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    if ( window.history.replaceState ) {
        window.history.replaceState( null, null, window.location.href );
    }
</script>

<?php require "views/partials/footer.php" ?>