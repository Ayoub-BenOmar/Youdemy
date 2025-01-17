<?php
session_start();
require_once "../Classes/database.php";
require_once "../Classes/user.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST'){
    $email = $_POST['email'];
    $password = $_POST['password'];
    
    try {
        $user = User::signin($email, $password);
        // Store user information in the session
        $_SESSION['user_id'] = $user->getId();
        $_SESSION['user_name'] = $user->getName();
        $_SESSION['user_email'] = $user->getEmail();
        $_SESSION['user_role'] = $user->getRoleId();

        switch ($user->getRoleId()) {
            case 1:
                header('Location: ../Front/admin/adminDash.php');
                break;
            case 2:
                header('Location: ../Front/teacher/teacher.php');
                break;
            case 3:
                header('Location: /student/dashboard.php');
                break;
            default:
                throw new Exception("Unknown role: {$user->getRoleId()}");
        }
        exit();
    } catch (Exception $e) {
        echo $e->getMessage();
    }
}