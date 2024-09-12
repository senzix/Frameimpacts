<?php
$config = require 'config.php';
$db = new Database($config['database']);

if (isset($_GET['p_id'])) {
    $post_id = $_GET['p_id'];

    // Fetch the single post details by post_id
    $post = $db->query('SELECT * FROM blog_posts WHERE post_id = :post_id', [
        ':post_id' => $post_id
    ])->fetch();

    if (!$post) {
        // If no post is found, redirect to the blog home or show a 404
        header("Location: blog.php");
        exit;
    }

    $header = $post['title'];  // Set the page title to the post title

    // Pass the post data to the view
    require "views/post.view.php";
} else {
    // If no post ID is provided, redirect to the blog home
    header("Location: blog.php");
    exit;
}
