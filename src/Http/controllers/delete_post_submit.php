<?php

use \Core\Database;

session_start();
if (!is_logged()) {
    $_SESSION['error'] = 'You need to be logged in to access this page.';
    header('Location: /login');
    exit();
}

$post_id = $_POST['post_id'];
$db = new Database();
$db->query("DELETE FROM posts WHERE `id` = '$post_id'");
$db->query("DELETE FROM tags WHERE post_id = '$post_id'");

$_SESSION['success'] = 'Post deleted successfully';
header('Location: /admin');
exit();


