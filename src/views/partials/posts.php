<div class="text-white space-y-6 md:space-y-16 mt-8 md:mt-28 max-w-full lg:max-w-xl">
    <h1 class="text-xl md:text-2xl mb-1"><?= $heading ?> </h1>

    <?php foreach ($posts as $post): ?>
        <div class="border-2 border-white p-2 md:p-3 bg-gray-800 ">
            <a href="/blog/<?= $post['slug'] ?>"
               class="text-xl md:text-2xl font-bold mb-2 hover:underline "><?= $post['title'] ?></a>
            <div class="mb-4 mt-2 md:pl-1 md:pr-1 sm:pl-6 sm:pr-6">
                <?php foreach ($post['tags'] as $tag): ?>
                    <a href="/tag/<?= $tag['title'] ?>"
                       class="bg-black px-1 md:px-2 py-0.5 md:py-1 rounded text-xs md:text-sm sm:text-2xl font-semibold"><?= $tag['title'] ?></a>
                <?php endforeach; ?>
            </div>
            <?php $excerpt = substr($post['content'], 0, 200) . '...'; ?>

            <p class="mt-2 text-md md:text-lg mb-4"><?= Parsedown::instance()->text($excerpt); ?></p>
            <div class="flex items-center mt-3 space-x-2">
                <img src="/calendar.svg" alt="calendar" class="w-5 md:w-6 h-5 md:h-6">
                <div class="text-xs md:text-sm pr-7"><?= $post['created_at'] ?></div>
                <img src="/eye.svg" alt="calendar" class="w-5 md:w-6 h-5 md:h-6">
                <div class="text-xs md:text-sm"><?= $post['reading_time'] ?> min</div>
            </div>
        </div>
    <?php endforeach; ?>
</div>
