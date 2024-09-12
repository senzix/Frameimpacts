<?php require "partials/header.php"; ?>
<?php require "partials/banner.php"; ?>

<div class="container">
    <div class="row">
        <!-- Single Post Column -->
        <div class="col-md-9">
            <h1><?php echo htmlspecialchars($post['title']); ?></h1>
            <p><span class="glyphicon glyphicon-time"></span> Posted on <?php echo htmlspecialchars($post['created_at']); ?></p>
            <hr>
            <?php if (!empty($post['image_path']) && file_exists('img/upload/' . $post['image_path'])): ?>
                <img class="card-img-top custom-img" src="<?= 'img/upload/' . $post['image_path'] ?>" alt="Blog Post" />
            <?php else: ?>
                <p>No image available.</p>
            <?php endif; ?>
            <hr>
            <p><?php echo nl2br(htmlspecialchars($post['content'])); ?></p>
            <hr>

            <!-- Comments Section -->
            <div class="well">
                <h4>Leave a Comment:</h4>
                <form action="post.php?p_id=<?php echo $post['post_id']; ?>" method="post">
                    <div class="form-group">
                        <label for="author">Name:</label>
                        <input type="text" name="author" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <textarea name="comment" class="form-control" rows="3" required></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
            <hr>
        </div>

        <!-- Blog Sidebar Widgets Column -->
        <div class="col-md-3">
            <!-- Recent Posts Widget -->
            <div class="well">
			<h4>Recent Posts</h4>
			<div class="row">
				<div class="col-lg-6">
					<ul class="list-unstyled">
                    <?php
                            $recent_posts = $db->query('SELECT * FROM blog_posts ORDER BY created_at DESC LIMIT 5')->fetchAll();
                            foreach ($recent_posts as $recent_post) {
                                echo "<li><p><i class='fa fa-fw fa-clipboard'></i> <a href='post?p_id={$recent_post['post_id']}'>{$recent_post['title']}</a></p></li>";
                            }
                            ?>
					</ul>
				</div>
				<!-- /.col-lg-6 -->
			</div>
			<!-- /.row -->
		</div>
            <!-- Categories Widget -->

            <!-- Side Widget -->
            <div class="well">
                <h4>Side Widget</h4>
                <p>This is a simple side widget to add extra content to your blog page.</p>
            </div>
        </div>
    </div>
</div>

<?php require "partials/footer.php"; ?>
