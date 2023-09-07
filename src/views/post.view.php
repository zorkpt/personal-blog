<?php

require('partials/head.php');
require ('partials/nav.php');


?>


<div class="text-white font-roboto p-6 bg-gray-800 rounded-lg shadow-md">

    <div class="text-3xl font-bold mb-4">
        <?= $post['title'] ?>
    </div>
    <div class="mb-4 mt-2">
        <?php foreach ($tags as $tag): ?>
            <a href="/tag/<?= $tag['title'] ?>"
               class="bg-black px-2 py-1 rounded text-sm font-semibold"><?= $tag['title'] ?></a>
        <?php endforeach; ?>
    </div>

    <div class="flex items-center space-x-4">
        <img src="../avatar.jpeg" alt="Avatar" class="w-10 h-10 rounded-full">

        <div class="text-sm font-semibold"><?= $post['user_name'] ?></div>

        <div class="flex items-center space-x-2">
            <img src="../calendar.svg" alt="calendar" class="w-6 h-6">
            <div class="text-sm"><?= $post['created_at'] ?></div>
        </div>

        <div class="flex items-center space-x-2">
            <img src="../eye.svg" alt="eye" class="w-6 h-6">
            <div class="text-sm"><?= $post['reading_time'] ?> min</div>
        </div>
    </div>

    <div class="text-lg mb-8 mt-5">
        <?= $post['content'] ?>
    </div>



</div>
