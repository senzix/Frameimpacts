<?php require "partials/header.php"; ?>
<?php require "partials/banner.php"; ?>

<div class="container">
    <div class="row">
        <!-- Blog Entries Column -->
        <div class="col-md-9">
            <?php if (!empty($notes)): ?>
                <?php foreach ($notes as $note): ?>
                    <!-- Display Blog Post -->
                    <h2>
                        <a href="post?p_id=<?php echo $note['post_id']; ?>">
                            <?php echo htmlspecialchars($note['title']); ?>
                        </a>
                    </h2>
                    <p><span class="glyphicon glyphicon-time"></span> Posted on <?= (new DateTime($note['created_at']))->format('F j, Y g:i A') ?></p>
                    <hr>
                    <?php if (!empty($note['image_path'])): ?>
                        <img class="card-img-top custom-img" src="<?= 'img/upload/' . $note['image_path'] ?>" alt="Blog Post" />
                    <?php endif; ?>
                    <hr>
                    <p><?php echo substr(htmlspecialchars($note['content']), 0, 200); ?>...</p>
                    <a class="btn btn-link" href="post?p_id=<?php echo $note['post_id']; ?>">Read More <span class="glyphicon glyphicon-chevron-right"></span></a>
                    <hr>
                <?php endforeach; ?>
            <?php else: ?>
                <div class="alert alert-info">
                    <strong>No blog posts available!</strong>
                </div>
            <?php endif; ?>
        </div>

        <!-- Blog Sidebar Widgets Column -->
        <div class="col-md-3">
        <div class='well'>
            <h4>Login</h4>
            <form action='includes/login.php' method='post' class='login-form'>
                <div class='form-group'>
                    <label for='username'><i class='fa fa-fw fa-user'></i> Username:</label>
                    <input name='username' type='text' class='form-control' placeholder='Enter Username' required>
                </div>
                <div class='form-group'>
                    <label for='password'><i class='fa fa-fw fa-key'></i> Password:</label>
                    <input name='password' type='password' class='form-control' placeholder='Enter Password' required>
                </div>
                <button name='login' class='btn btn-info btn-block' style="border-radius:10px;" type='submit'>Login</button>
            </form>

        </div>
                                
		<!-- Blog recent post Well -->
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
		<!-- Blog Categories Well -->
		<!-- Blog Categories Well -->

		<!-- Side Widget Well -->
		<div class="well">
    <div class='panel text-center'>
        <p>Social Networks</p>
        <a href='http://facebook.com'><span><i class='fa fa-fw fa-facebook-square'></i></span></a> | <a href='http://twitter.com'><span><i class='fa fa-fw fa-twitter-square'></i></span></a> | <a href='http://medium.com'><span><i class='fa fa-fw fa-medium'></i></span></a> | <a href='http://instagram.com><span><i class='fa fa-fw fa-instagram'></i></span></a>
    </div>
</div>

</div>

    </div>
    <!-- /.row -->
    <hr>
</div>

<?php require "partials/footer.php"; ?>
