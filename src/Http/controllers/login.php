<?php

use Core\Database;

$errors = [];
$user_name = $_POST['user_name'];
$password = $_POST['password'];

$db = new Database();

$db->query("SELECT `id`, `user_name`, `password` FROM `users` WHERE `user_name` = '$user_name'");
$user = $db->find();

if(!$user){
    view('login.view.php', [
        'heading' => 'Admin Login',
        'loginError' => 'Wrong username/password'
    ]);
    exit();
}

if($user['user_name'] == $user_name && $user['password'] == $password) {
    session_start();
    $_SESSION['user_name'] = $user['user_name'];
    $_SESSION['user_id'] = $user['id'];
    header('Location: /admin');
}else {
    view('login.view.php', [
        'heading' => 'Admin Login',
        'loginError' => 'Wrong username/password'
    ]);
    exit();
}


