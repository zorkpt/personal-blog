<?php
use Core\Post;
use Core\Database;

$slug = $matches[0];

$post = Post::findPostBySlug($slug);

$tags = Post::getPostTags($post['id']);

$user_name = Post::getAuthorName($post['author_id']);
$post = Post::fillPost($post, $user_name);

$post['url'] = 'http' . ( isset( $_SERVER['HTTPS'] ) ? 's' : '' ) . '://' . "{$_SERVER['HTTP_HOST']}{$_SERVER['REQUEST_URI']}";

view("post.view.php", [
    'heading' => $post['title'],
    'post' => $post,
    'tags' => $tags
]);

