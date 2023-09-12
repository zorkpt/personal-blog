<?php

use Core\Database;
use Core\Post;

$tag = $matches[0];
$posts = Post::findPostByTag($tag);

view("tag_posts.view.php", [
    'heading' => 'Posts with tag: ' . $tag,
    'posts' => $posts
]);