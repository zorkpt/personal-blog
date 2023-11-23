<?php
use Core\Post;
use League\CommonMark\CommonMarkConverter;
$converter = new CommonMarkConverter();

$posts = Post::getAllPosts();

view("index.view.php", [
    'heading' => 'Blog Posts',
    'posts' => $posts,
    'converter' => $converter
]);

