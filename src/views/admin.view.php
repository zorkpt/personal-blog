<?php

require('partials/head.php');
require('partials/admin_nav.php');
?>
<div class="text-white max-w-xl">
    <?php if (isset($_SESSION['success'])) echo '<div class="text-green-300 text-sm">' . $_SESSION['success'] . '</div>' ?>
    <?php unset($_SESSION['success']) ?>
    <?php foreach ($posts as $post): ?>
        <div class="mt-4 border-2 p-3 border-white flex">
            <div class="w-72">
                <?php
                if (strlen($post['title']) > 25)
                    echo '<a class="hover:underline" href="blog/' . $post['slug'] . '">' . substr($post['title'], 0, 25) . '...' . '</a>';
                else echo '<a class="hover:underline" href="blog/' . $post['slug'] . '">' . $post['title'] . '</a>';
                ?>
            </div>
            <div class="flex-1">
                <a href="/post/edit/<?= $post['slug'] ?>" type="submit"
                   class="px-4 py-2 bg-white text-black rounded-md hover:bg-blue-600">Edit</a>
            </div>
            <div class="flex-1">
                <form action="/post/delete" method="post">
                    <input type="hidden" name="post_id" value="<?= $post['id'] ?>">
                    <button type="submit" class="px-4 py-2 bg-white text-black rounded-md hover:bg-red-600">Delete
                    </button>
                </form>
            </div>
        </div>
    <?php endforeach; ?>
</div>

