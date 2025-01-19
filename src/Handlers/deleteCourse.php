<?php
session_start();
require_once "../Classes/database.php";
require_once "../Classes/course.php";

if (isset($_GET['id'])) {
    $idCourse = $_GET['id'];
    Course::deleteCourse($idCourse);
    
    header("Location: ../Front/teacher/allCourses.php");
    exit();
}
?>