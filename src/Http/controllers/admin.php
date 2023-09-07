<?php

use Core\Database;

session_start();

if(!isset($_SESSION['user_name'])){
    view('login.view.php', [
        'heading' => 'Admin Login'
    ]);
    exit();
}

$db = new Database();

$db->query("SELECT * FROM posts ORDER BY `created_at` DESC");
$posts = $db->get();

view('admin.view.php', [
    'heading' => 'Login',
    'posts' => $posts
]);

