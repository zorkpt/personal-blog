<?php

require('partials/head.php');
require('partials/nav.php');


?>
    <div class="text-white font-roboto p-6 bg-gray-800 rounded-lg shadow-md ">

        <div class="md:text-6xl sm:text-4xl lg:text-4xl font-bold mb-4 md:pl-1 md:pr-1 md:pt-1 sm:pl-6 sm:pr-6 sm:pt-6">
            <?= $post['title'] ?>
        </div>
        <div class="mb-4 mt-2 md:pl-1 md:pr-1 sm:pl-6 sm:pr-6 ">
            <?php foreach ($tags as $tag): ?>
                <a href="/tag/<?= $tag['title'] ?>"
                   class="bg-black px-2 py-1 rounded md:text-2xl sm:text-2xl  font-semibold"><?= $tag['title'] ?></a>
            <?php endforeach; ?>
        </div>
        <div class="flex items-center space-x-4 md:p-1 sm:p-6">
            <img src="/src/public/avatar.jpeg" alt="Avatar" class="w-10 lg:w-16 lg:h-16 sm:w-16 md:w-28 md:h-28 h-10 sm:h-16 rounded-full">

            <div class="md:text-2xl sm:text-2xl lg:text-xl font-semibold"><?= $post['user_name'] ?></div>

            <div class="flex items-center space-x-2">
                <img src="/src/public/calendar.svg" alt="calendar" class="w-6 h-6">
                <div class="md:text-2xl sm:text-2xl lg:text-xl"><?= $post['created_at'] ?></div>
            </div>

            <div class="flex items-center space-x-2">
                <img src="/src/public/eye.svg" alt="eye" class="w-6 h-6">
                <div class="md:text-2xl sm:text-2xl lg:text-xl"><?= $post['reading_time'] ?> min</div>
            </div>
        </div>

        <div class="parsedown sm:text-3xl sm:p-6 whitespace-pre-line md:text-3xl lg:text-lg mb-8 mt-5 sm:mt-1">
            <?= $converter->convert($post['content']); ?>
        </div>

        <div class="sm:pl-6 sm:pr-6 md:pl-1 md:pr-1 ">
            <p class="md:text-sm sm:text-2xl mb-3">Share on:</p>
            <?php require 'partials/logos.php' ?>
        </div>


    </div>

<?php require('partials/footer.php'); ?>