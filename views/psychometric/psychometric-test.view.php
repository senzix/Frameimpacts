<?php

    require "views/partials/header.php";

?>

<div id="psychTestContent">
    <div class="psych-test">
        <div class="psych-test__container">
            <h1 class="psych-test__title">Psychometric Test</h1>
            <form id="psychTestForm" method="POST" action="">
                <input type="hidden" name="current_question" value="<?= $currentQuestion ?>">
                <input type="hidden" name="content_only" value="true">
                <h2 class="psych-test__subtitle">Question <?= $currentQuestion + 1 ?> of <?= count($questions) ?></h2>
                <p class="psych-test__question"><?= htmlspecialchars($questions[$currentQuestion]['question_text']) ?></p>
                
                <div class="psych-test__options">
                    <?php 
                    $options = [
                        'Strongly Disagree',
                        'Disagree',
                        'Neutral',
                        'Agree',
                        'Strongly Agree'
                    ];
                    foreach ($options as $index => $option): 
                    ?>
                        <div class="psych-test__option">
                            <input class="psych-test__input" type="radio" id="psych-test-option<?= $index ?>" name="answers[<?= $questions[$currentQuestion]['question_id'] ?>]" value="<?= $index + 1 ?>" required>
                            <label class="psych-test__label" for="psych-test-option<?= $index ?>">
                                <?= $option ?>
                            </label>
                        </div>
                    <?php endforeach; ?>
                </div>
                
                <button class="psych-test__button" type="submit">Next</button>
            </form>
            
            <a href="/psychometric-test?action=view_previous" class="psych-test__results-link">View Previous Results</a>

        </div>
    </div>
</div>


<?php
    require "views/partials/banner2.php";
    require "views/partials/footer.php";
?>