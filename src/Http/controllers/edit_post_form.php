<?php

use Core\Database;
use Core\Post;

session_start();
if(!is_logged()) {
    $_SESSION['error'] = 'You need to be logged in to access this page.';
    header('Location: /login');
    exit();
}

$slug = $matches[0];

$post = Post::findPostBySlug($slug);

$tags = implode(",", array_map('end', Post::getPostTags($post['id'])));

view('edit_post.view.php', [
    'heading' => 'Editing Post',
    'post' => $post,
    'tags' => $tags
]);