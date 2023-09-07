<div class="text-white space-y-16 mt-28  max-w-xl">
    <!--TODO: From the blog tem de ser dinamico -->
    <h1 class="text-2xl mb-1"><?= $heading ?> </h1>

    <?php foreach ($posts as $post): ?>
        <div class="border-2 border-white p-3 bg-gray-800 ">
            <a href="/blog/<?= $post['slug'] ?>"
               class="text-2xl font-bold mb-2 hover:underline "><?= $post['title'] ?></a>
            <div class="mb-4 mt-2">
                <?php foreach ($post['tags'] as $tag): ?>
                    <a href="/tag/<?= $tag['title'] ?>"
                       class="bg-black px-2 py-1 rounded text-sm font-semibold"><?= $tag['title'] ?></a>
                <?php endforeach; ?>
            </div>
            <?php $excerpt = substr($post['content'], 0, 200) . '...'; ?>

            <p class="mt-2 text-lg mb-4"><?= $excerpt ?></p>
            <div class="flex items-center space-x-4">
                <img src="<?php echo '/avatar.jpeg'  ?>" alt="Avatar" class="w-7 h-7 rounded-full">
                <div class="text-sm font-semibold pr-7"><?= $post['user_name'] ?></div>
                <img src="/calendar.svg" alt="calendar" class="w-6 h-6 ">
                <div class="text-sm pr-7"><?= $post['created_at'] ?></div>
                <img src="/eye.svg" alt="calendar" class="w-6 h-6 ">
                <div class="text-sm"><?= $post['reading_time'] ?> min</div>
            </div>
        </div>
    <?php endforeach; ?>
</div>

