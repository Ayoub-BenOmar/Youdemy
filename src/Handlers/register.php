<?php
require_once '../Classes/user.php';
require_once '../Classes/database.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nom = $_POST['nom'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $role = $_POST['role'];
    
    try {
        echo"edfghjkl";
        User::signup($nom, $email, $password, $role);
        echo "nono";
        exit();
    } catch (Exception $e) {
        $error = $e->getMessage();
    }
}