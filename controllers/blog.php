<?php 
$config = require 'config.php';
$db = new Database($config['database']);

$header="Blog";

$notes=$db->query('select * from blog_posts ORDER BY post_id DESC LIMIT 5')->fetchall();

require "views/blog.view.php";