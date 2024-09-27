<?php


$industries = getIndustryData();

require "partials/header.php"
?>
<div class="industries-page">
<?php require "partials/banner.php"?>
    <div class="industry-container">
        <p class="page-subtitle">Learn how we draw on industry expertise to make companies more competitive.</p>

        
        <div class="industries-grid">
    <div class="industries-list">
        <?php foreach ($industries as $key => $industry): ?>
            <div class="industry-item" data-industry="<?= $key ?>">
                <?= $industry['name'] ?>
                <span class="arrow">›</span>
            </div>
        <?php endforeach; ?>
    </div>
</div>
</div>
    
    <?php foreach ($industries as $key => $industry): ?>
<div class="industry-detail" id="<?= $key ?>">
    <div class="industry-container">
        <h2><?= $industry['name'] ?></h2>
        <p><?= $industry['description'] ?></p>
        <a href="/industry?p_id=<?= $key ?>" class="visit-page">VISIT PAGE</a>
    </div>
</div>
<?php endforeach; ?>
</div>
<?php require "partials/banner2.php";?>
<?php require "partials/footer.php";?>
