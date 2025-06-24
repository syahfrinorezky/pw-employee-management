<?php

session_start();

$errors = $_SESSION['error'] ?? [];
unset($_SESSION['error']);

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DAFTAR AKUN - MANAJEMEN KARYAWAN</title>
    <link rel="stylesheet" href="../../resources/style/output.css">
</head>
<body>
    <div class="min-h-screen flex items-center justify-center bg-slate-100">
        <div class="max-w-3/4 md:max-w-1/2 lg:max-w-1/4 w-full bg-white rounded-lg shadow-lg p-8 flex flex-col gap-5">
            <h1 class="text-center font-bold text-xl md:text-2xl">DAFTAR AKUN</h1>
            <form action="./process/register_process.php" method="post" class="flex flex-col gap-3">
                <label for="username" class="flex flex-col gap-2">
                    <span>Username</span>

                    <!-- ini untuk menampilkan error pada username -->
                    <?php if (isset($errors['username'])) : ?>
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
                        class="flex items-center gap-1 px-3 py-2 bg-red-600/70 shadow-md text-white text-sm rounded-lg">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3.75m9-.75a9 9 0 1 1-18 0 9 9 0 0 1 18 0Zm-9 3.75h.008v.008H12v-.008Z" />
                            </svg>
                            <span><?= $errors['username']; ?></span>
                        </div>
                    <?php endif; ?>

                    <input type="text" name="username" id="username" placeholder="Masukkan username" class="border border-gray-300 rounded-md p-2" required>
                </label>
                <label for="password" class="flex flex-col gap-2">
                    <span>Password</span>

                    <!-- ini untuk menampilkan error pada password -->
                    <?php if (isset($errors['password'])) : ?>
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
                        class="flex items-center gap-1 px-3 py-2 bg-red-600/70 shadow-md text-white text-sm rounded-lg">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3.75m9-.75a9 9 0 1 1-18 0 9 9 0 0 1 18 0Zm-9 3.75h.008v.008H12v-.008Z" />
                            </svg>
                            <span><?= $errors['password']; ?></span>
                        </div>
                    <?php endif; ?>

                    <input type="password" name="password" id="password" placeholder="Masukkan password" class="border border-gray-300 rounded-md p-2" required>
                </label>
                <a href="./login.php" class="self-end text-sm underline text-blue-400">Punya akun</a>
                <button type="submit" name="register" class="mt-2 w-full bg-blue-400 hover:bg-blue-500 text-white py-2 rounded-md transition-all duration-300 cursor-pointer">Daftar</button>
            </form>
        </div>
    </div>


<script type="module" src="../../resources/js/alpine.bundle.js"></script>
</body>
</html>