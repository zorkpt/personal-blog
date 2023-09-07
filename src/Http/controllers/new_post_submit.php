<?php
require_once base_path('Core/Post.php');
use Core\Post;

session_start();
if(!is_logged()) {
    $_SESSION['error'] = 'You need to be logged in to access this page.';
    header('Location: /login');
    exit();
}
$tags = (array) explode(',', $_POST['tags']);

$db = new \Core\Database();

$post = Post::insertPost($_POST['author_id'], $_POST['title'], $_POST['content'], 'published');

Post::insertTags($tags, $post['id']);

header('Location: /blog/' . $post['slug']);
exit();