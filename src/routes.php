<?php
$router->get('/', 'index.php');
$router->get('/about', 'about.php');
$router->get('/contact', 'contact.php');
$router->get('/admin', 'admin.php');
$router->post('/login', 'login.php');
$router->get('/post/new', 'new_post_form.php');
$router->post('/post/new', 'new_post_submit.php');
$router->get('/blog/{slug}', 'post.php');
$router->get('/post/edit/{slug}', 'edit_post_form.php');
$router->post('/post/edit', 'edit_post_submit.php');
$router->post('/post/delete', 'delete_post_submit.php');
$router->get('/logout', 'logout.php');
$router->get('/tag/{slug}', 'show_posts_by_tag.php');
