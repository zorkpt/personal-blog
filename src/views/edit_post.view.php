<?php

require('partials/head.php');
require('partials/admin_nav.php');

?>

<h1 class="text-white"><?= $heading ?></h1>

<form method="post" action="/post/edit" class="text-white mt-3 max-w-xl">
    <div class="mb-4">
        <label for="title" class="block text-sm font-medium">Title</label>
        <input type="text" name="title" id="title" value="<?= $post['title'] ?>" class="text-black mt-1 p-2 w-full border rounded-md">
    </div>

    <div class="mb-4">
        <label for="tags" class="block text-sm font-medium">Tags</label>
        <input type="text" name="tags" id="tags" value="<?= $tags ?>" class="text-black mt-1 p-2 w-full border rounded-md">
    </div>

    <div class="mb-4">
        <label for="content" class="block text-sm font-medium">Text</label>
        <textarea name="content" rows="16" id="content" class="text-black mt-1 p-2 w-full border rounded-md"><?= $post['content'] ?>
        </textarea>
    </div>
    <input type="hidden" name="author_id" value="<?= $_SESSION['user_id'] ?>">
    <input type="hidden" name="post_id" value="<?= $post['id'] ?>">
    <button type="submit" class="px-4 py-2 bg-white text-black rounded-md hover:bg-blue-600">Edit</button>
</form>
