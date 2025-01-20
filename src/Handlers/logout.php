<?php
require_once('../Classes/user.php');

session_start();
$userId = $_SESSION["user_id"];

if ($userId) {
    $user = new user("", "", "");
    $user->logout();
} else {
    header("Location: ../Front/loginPage.php");
    exit();
}
?>