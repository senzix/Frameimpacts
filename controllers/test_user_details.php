<?php
$config = require 'config.php';
$db = new Database($config['database']);
$header = "details";

session_start();

$name = $gmail = $phone = $location = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'];
    $gmail = $_POST['gmail'];
    $phone = $_POST['phone'];
    $location = $_POST['location'];

    // Validate input
    if (empty($name) || empty($gmail) || empty($phone) || empty($location)) {
        $error = "All fields are required";
    } else {
        // Check if the email or username already exists
        $query = "SELECT * FROM test_users WHERE name = :name OR gmail = :gmail";
        $existingUser = $db->query($query, [':name' => $name, ':gmail' => $gmail])->fetch();

        if ($existingUser) {
            if ($existingUser['name'] === $name) {
                $error = "Name is already taken";
            } elseif ($existingUser['gmail'] === $gmail) {
                $error = "Gmail is already registered";
            }
        } else {
            // Insert the new user into the database
            $query = "INSERT INTO test_users (name, gmail, phone, location, created_at, updated_at) VALUES (:name, :gmail, :phone, :location, NOW(), NOW())";
            $result = $db->query($query, [
                ':name' => $name,
                ':gmail' => $gmail,
                ':phone' => $phone,
                ':location' => $location
            ]);

            if ($result) {
                // Get the last inserted ID
                $test_user_id = $db->lastInsertId();
                
                // Set the test_user_id in the session
                $_SESSION['test_user_id'] = $test_user_id;

                // Redirect to avoid form resubmission
                header("Location: /psychometric-test");
                exit();
            } else {
                $error = "An error occurred while registering. Please try again.";
            }
        }
    }
}

// Load the register view
require "views/psychometric/user_login.view.php";
