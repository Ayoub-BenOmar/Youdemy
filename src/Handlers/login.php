<?php
require_once "../Classes/database.php";
require_once "../Classes/user.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST'){
    $email = $_POST['email'];
    $password = $_POST['password'];

    try {
        User::signin($email, $password);
        echo "nakoki";
        exit();
    } catch (Exception $e) {
        $error = $e->getMessage();
    }
}