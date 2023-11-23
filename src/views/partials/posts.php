
<div class="text-white space-y-6 md:space-y-16 mt-8 md:mt-28 max-w-full mx-auto">
        <h1 class="text-2xl md:text-2xl mb-1 text-center lg:w-3/4 xl:w-1/2" ><?= $heading ?> </h1>

        <!-- Posts Loop -->
        <?php foreach ($posts as $post): ?>
            <div class="border-2 border-white p-2 md:p-3 bg-gray-800 md:w-full lg:w-3/4 xl:w-1/2">
                <a href="/blog/<?= $post['slug'] ?>"
                   class="sm:text-3xl md:text-3xl font-bold mb-2 hover:underline block text-center"><?= $post['title'] ?></a>
                <div class="mb-4 mt-2 md:pl-1 md:pr-1 sm:pl-6 sm:pr-6 flex flex-wrap justify-center">
                    <?php foreach ($post['tags'] as $tag): ?>
                        <a href="/tag/<?= $tag['title'] ?>"
                           class="bg-black px-2 py-1 rounded text-sm md:text-sm sm:text-lg font-semibold m-1"><?= $tag['title'] ?></a>
                    <?php endforeach; ?>
                </div>

                <?php $excerpt = substr($post['content'], 0, 200) . '...'; ?>

                <div class="mt-2 md:text-2xl sm:text-2xl lg:text-sm text-lg mb-4 text-center font-semibold leading-normal tracking-normal">
                    <?= $converter->convert($excerpt); ?>
                </div>

                <div class="flex items-center justify-center mt-3 space-x-2">
                    <img src="/calendar.svg" alt="calendar" class="w-5 md:w-6 h-5 md:h-6">
                    <div class="text-sm md:text-sm pr-7"><?= $post['created_at'] ?></div>
                    <img src="/eye.svg" alt="calendar" class="w-5 md:w-6 h-5 md:h-6">
                    <div class="text-sm md:text-sm"><?= $post['reading_time'] ?> min</div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>