<div class="flex flex-row">

    <div class="mr-3">
        <button class="mastodon-share"></button>
    </div>

    <div class="x-share p-2 mr-3">
        <a href="https://twitter.com/intent/tweet?url=<?php echo $post['url']; ?>&text=<?php echo $post['title']; ?>">
            <img src="/xlogo.svg" alt="X logo">
        </a>
    </div>

    <div class="fb-share p-2 mr-3">
        <a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo $post['url']; ?>">
            <img src="/fblogo.svg" alt="Facebook logo">
        </a>
    </div>

</div>