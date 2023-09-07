<?php

session_start();
if(!is_logged()) {
    $_SESSION['error'] = 'You need to be logged in to access this page.';
    header('Location: /login');
    exit();
}

view("post_form.view.php", [
'heading' => 'New Post',
]);