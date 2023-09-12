<?php

require('partials/head.php');
require('partials/admin_nav.php');

?>
<h1 class="text-white"><?= $heading ?></h1>

<form method="post" action="/post/new" class="text-white max-w-xl">
    <div class="mb-4">
        <label for="title" class="block text-sm font-medium">Title</label>
        <input type="text" name="title" id="title" class="text-black mt-1 p-2 w-full border rounded-md">
    </div>
    <div class="mb-4">
        <label for="tags" class="block text-sm font-medium">Tags</label>
        <input type="text" name="tags" id="tags" class="text-black mt-1 p-2 w-full border rounded-md"
               placeholder="tags,separated,by,commas">
    </div>

    <div class="mb-4">
        <label for="content" class="block text-sm font-medium">Text</label>
        <textarea name="content" rows="10" id="content" class="whitespace-pre-line text-black mt-1 p-2 w-full border rounded-md"></textarea>
    </div>
    <input type="hidden" name="author_id" value="<?= $_SESSION['user_id'] ?>">
    <button type="submit" class="px-4 py-2 bg-white text-black rounded-md hover:bg-blue-600">Submit</button>
</form>
