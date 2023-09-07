<?php

use Core\Database;
use Core\Post;

session_start();
if(!is_logged()) {
    $_SESSION['error'] = 'You need to be logged in to access this page.';
    header('Location: /login');
    exit();
}


$tag = $matches[0];
$posts = Post::findPostByTag($tag);

view("tag_posts.view.php", [
    'heading' => 'Posts with tag: ' . $tag,
    'posts' => $posts
]);