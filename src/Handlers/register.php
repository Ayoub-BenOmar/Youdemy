<?php
require_once '../Classes/database.php';
require_once '../Classes/user.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve form data
    $name = $_POST['name'] ?? null;
    $email = $_POST['email'] ?? null;
    $password = $_POST['password'] ?? null;
    $idRole = $_POST['idRole'] ?? null;

    // Validate required fields
    // if (empty($name) || empty($email) || empty($password) || empty($idRole)) {
    //     echo "All feilds are required";
    //     exit;
    // }

    try {
        // Register the new user
        $userId = User::signup($name, $email, $password, $idRole);
        header('Location: ../Front/home.php');
    } catch (Exception $e) {
        header('Location: ../Front/registerPage.php?=Error');
    }
} else {
    echo "law3lem";
}
?>