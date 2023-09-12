<?php

use Core\Database;
use Core\Post;

session_start();
if (!is_logged()) {
    $_SESSION['error'] = 'You need to be logged in to access this page.';
    header('Location: /login');
    exit();
}

$title = htmlspecialchars($_POST['title']);
$content = $_POST['content'];
$post_id = $_POST['post_id'];
$tags = $_POST['tags'];
Post::updatePost($title, $content, $post_id, $tags);

$_SESSION['success'] = 'Post edited successfully';
header('Location: /admin');
exit();