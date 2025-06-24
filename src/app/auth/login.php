<?php

session_start();
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


$errors = $_SESSION['error'] ?? [];
$success = $_SESSION['sukses'] ?? [];
unset($_SESSION['error']);
unset($_SESSION['sukses']);

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LOGIN - MANAJEMEN KARYAWAN</title>
    <link rel="stylesheet" href="../../resources/style/output.css">
</head>
<body>
    <div class="min-h-screen flex items-center justify-center">
        <div class="max-w-3/4 md:max-w-1/2 lg:max-w-1/4 w-full bg-white rounded-lg shadow-lg p-8 flex flex-col gap-5">
            <h1 class="text-center font-bold text-xl md:text-2xl">LOGIN</h1>

            <?php if (!empty($success)) : ?>
                <div
                x-data="{ show: false, visible: false }" 
                x-init="
                    setTimeout(() => {
                    show = true;
                    visible = true;
                    setTimeout(() => visible = false, 3000);
                    }, 500);
                    "
                x-show="visible"
                x-transition:enter="transition ease-out duration-500 transform"
                x-transition:enter-start="opacity-0"
                x-transition:enter-end="opacity-100"
                x-transition:leave="transition ease-in duration-500 transform"
                x-transition:leave-start="opacity-100"
                x-transition:leave-end="opacity-0"
                class="my-2 px-3 py-2 flex items-center gap-1 bg-green-400/50 border border-green-400 text-white shadow-md rounded-lg">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75 11.25 15 15 9.75M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                    </svg>
                    <span class="text-sm text-shadow-lg "><?= $success; ?></span>
                </div>
            <?php endif; ?>

            <?php if (!empty($errors)) : ?>
                <div
                x-data="{ show: false, visible: false }" 
                x-init="
                    setTimeout(() => {
                    show = true;
                    visible = true;
                    setTimeout(() => visible = false, 3000);
                    }, 500);
                    "
                x-show="visible"
                x-transition:enter="transition ease-out duration-500 transform"
                x-transition:enter-start="opacity-0"
                x-transition:enter-end="opacity-100"
                x-transition:leave="transition ease-in duration-500 transform"
                x-transition:leave-start="opacity-100"
                x-transition:leave-end="opacity-0"
                class="my-2 px-3 py-2 flex items-center gap-1 bg-red-400/50 border border-red-400 text-white shadow-md rounded-lg">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75 11.25 15 15 9.75M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                    </svg>
                    <span class="text-sm text-shadow-lg "><?= $errors; ?></span>
                </div>
            <?php endif; ?>

            <form action="./process/login_process.php" method="post" class="flex flex-col gap-3">
                <label for="username" class="flex flex-col gap-2">
                    <span>Username</span>
                    <input type="text" name="username" id="username" placeholder="Masukkan username" class="border border-gray-300 rounded-md p-2">
                </label>

                <label for="password" class="flex flex-col gap-2">
                    <span>Password</span>
                    <input type="password" name="password" id="password" placeholder="Masukkan password" class="border border-gray-300 rounded-md p-2">
                </label>
                <a href="./register.php" class="self-end text-sm underline text-blue-400">Buat akun</a>
                <button type="submit" name="login" class="mt-2 w-full bg-blue-400 hover:bg-blue-500 text-white py-2 rounded-md transition-all duration-300 cursor-pointer">Masuk</button>
            </form>
        </div>
    </div>


<script type="module" src="../../resources/js/alpine.bundle.js"></script>
</body>
</html>