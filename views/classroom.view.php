<?php require "views/partials/header.php" ?>
<?php require "partials/banner.php" ?>

<div class="classroom-container">
    <div class="sidebar">
        <h2>Lessons</h2>
        <ul class="lesson-list">
            <?php foreach ($courses as $course): ?>
                <li class="lesson-item">
                    <a href="#course-<?= $course['course_id'] ?>" class="lesson-link"><?= $course['title'] ?></a>
                </li>
            <?php endforeach; ?>
        </ul>
        <a href="/logout" class="btn btn-danger btn-block mt-4">Logout</a>
    </div>
    <div class="classroom-content">
        <?php if (empty($courses)): ?>
            <p>You have no courses enrolled.</p>
        <?php else: ?>
            <?php foreach ($courses as $course): ?>
                <div id="course-<?= $course['course_id'] ?>" class="course-content">
                    <div class="video-container">
                        <div class="video-player">
                            <video controls>
                                <source src="<?= $course['video_url'] ?>" type="video/mp4">
                                Your browser does not support the video tag.
                            </video>
                        </div>
                        <div class="video-info">
                            <h3 class="video-title"><?= $course['title'] ?></h3>
                            <p class="video-description"><?= $course['description'] ?></p>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        <?php endif; ?>
    </div>
</div>
<?php require "partials/banner2.php" ?>
<?php require "views/partials/footer.php" ?>