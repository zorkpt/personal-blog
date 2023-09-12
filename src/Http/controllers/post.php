<?php
use Core\Post;
use Core\Database;

$slug = $matches[0];

$post = Post::findPostBySlug($slug);

$tags = Post::getPostTags($post['id']);

$user_name = Post::getAuthorName($post['author_id']);
$word_count = str_word_count($post['content']);
$reading_time = ceil($word_count / 200);
$data = date_format(date_create($post['created_at']), 'd F Y');
$post['created_at'] = $data;
$post['user_name'] = $user_name['user_name'];
$post['reading_time'] = $reading_time;
$post['url'] = 'http' . ( isset( $_SERVER['HTTPS'] ) ? 's' : '' ) . '://' . "{$_SERVER['HTTP_HOST']}{$_SERVER['REQUEST_URI']}";

view("post.view.php", [
    'heading' => $post['title'],
    'post' => $post,
    'tags' => $tags
]);

