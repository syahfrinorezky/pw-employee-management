<?php

session_start();

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once __DIR__ . '/../../../config/connection.php';


if (isset($_POST['register'])) {
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);

    $errors = [];

    if (empty($username)) {
        $errors['username'] = 'Username tidak boleh kosong';
    } elseif (strlen($username) < 6) {
        $errors['username'] = 'Username minimal 6 karakter';
    }

    if (empty($password)) {
        $errors['password'] = 'Password tidak boleh kosong';
    } elseif (strlen($password) < 8) {
        $errors['password'] = 'Password minimal 8 karakter';
    }

    if (!empty($errors)) {
        $_SESSION['error'] = $errors;
        header("location: ../register.php");
        exit();
    }

    $hashedPassword =  password_hash($password, PASSWORD_BCRYPT);

    $checkUser = "SELECT * FROM users WHERE username = ?";
    $stmt = $connection -> prepare($checkUser);
    $stmt -> bind_param("s", $username);
    $stmt -> execute();
    $result = $stmt -> get_result();

    if ($result -> num_rows > 0) {
        $errors['username'] = "Username sudah sudah ada";
        $_SESSION['error'] = $errors;
        header("location: ../register.php");
        exit();
    } else {
        $insertUser = "INSERT  INTO users (username, password) VALUES (?, ?)";
        $stmt = $connection ->prepare($insertUser);
        $stmt -> bind_param("ss", $username, $hashedPassword);
        $stmt -> execute();

        $_SESSION['sukses'] = "Berhasil membuat akun";
        header("location: ../login.php");
        exit();
    }
} else {
    header("location: ../register.php");
    exit();
}
