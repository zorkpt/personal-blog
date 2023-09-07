<?php

use Core\Database;
use Core\Post;

$posts = Post::getAllPosts();

view("index.view.php", [
    'heading' => 'Blog Posts',
    'posts' => $posts
]);

