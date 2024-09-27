<?php
$config = require 'config.php';
$db = new Database($config['database']);

$header = "Classroom";

session_start();

$header = "Classroom";
// Check if the user is logged in
if (!isset($_SESSION['user_id'])) {
    // If not logged in, redirect to login page
    header('Location: /login');
    exit();
}

// If logged in, fetch user's courses from the database
$userId = $_SESSION['user_id'];
$query = "SELECT * FROM courses WHERE user_id = :user_id";
$courses = $db->query($query, [':user_id' => $userId])->fetchAll();

// Pass the courses data to the view
require "views/classroom.view.php";