<?php 
require '../database.php';
$config = require '../config.php';
$db = new Database($config['database']);

session_start();

if (!isset($_SESSION['admin_id'])) {
    header("Location: login.php"); // Redirect to login if not authenticated
    exit;
}

$admin_id = $_SESSION['admin_id'];
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Create Blog Post - Frameimpacts</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="../style.css">
</head>
<body>
<div class="container">
    <div class="row">
        <div class="col-sm-3"></div>
        <div class="col-sm-6 form-container">
            <h1>Create a Blog Post</h1>
            <?php 
            if (isset($_POST['submit_form'])) {
                $title = $_POST['title'];  
                $content = $_POST['content'];
                $folder = "../img/upload/";
                $image_file = $_FILES['image']['name'];
                $file = $_FILES['image']['tmp_name'];
                $target_file = $folder . basename($image_file);

                move_uploaded_file($file, $target_file);

                $query = 'INSERT INTO blog_posts (title, content, image_path, created_by) VALUES (:title, :content, :image_path, :created_by)';
                $db->query($query, [
                    ':title' => $title,
                    ':content' => $content,
                    ':image_path' => $image_file,
                    ':created_by' => $admin_id // Set the admin ID
                ]);

                header("Location: blog_posts.php");
                exit;
            }
            ?> 
            <form action="" method="POST" enctype="multipart/form-data">
                <div class="mb-3">
                    <label class="label">Blog Title</label>
                    <input type="text" class="form-control" name="title" required>
                </div>
                <div class="mb-3">
                    <label class="label">Blog Content</label>
                    <textarea class="form-control" name="content" rows="5" required></textarea>
                </div>
                <div class="mb-3">
                    <label class="label">Blog Image</label>
                    <input type="file" class="form-control" name="image" accept="image/*" required>
                </div>
                <button type="submit" class="btn btn-primary" name="submit_form">Create</button>
            </form>
        </div>
        <div class="col-sm-3"></div>
    </div>
</div>
</body>
</html>
