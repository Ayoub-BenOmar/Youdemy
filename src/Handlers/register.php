<?php
require_once '../Classes/user.php';
require_once '../Classes/database.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nom = $_POST['nom'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    try {
        User::signup($nom, $email, $password);
        echo "nik";
        exit();
    } catch (Exception $e) {
        $error = $e->getMessage();
    }
}