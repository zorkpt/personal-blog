<?php require('partials/head.php'); ?>
<h1 class="text-white mb-5 text-3xl text-bold"><?= $heading ?></h1>
<form method="post" action="/login" class="text-white max-w-xl">
    <?php if(isset($loginError)) { echo '<div class="text-blue text-sm mb-2">' . $loginError . '</div>' ; } ?>
    <div class="mb-4">
        <label for="user_name" class="block text-sm font-medium">User</label>
        <input name="user_name" id="user_name" placeholder="username" class="text-black mt-1 p-2 w-full border rounded-md">
    </div>
    <div class="mb-4">
        <label for="password" class="block text-sm font-medium">Password</label>
        <input name="password" id="password" placeholder="*******" type="password" class="text-black mt-1 p-2 w-full border rounded-md">
    </div>
    <button type="submit" class="px-4 py-2 bg-white text-black rounded-md hover:bg-blue-600">Login</button>
</form>
