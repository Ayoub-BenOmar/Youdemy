<?php
require_once '../Classes/database.php';
require_once '../Classes/course.php';
require_once '../Classes/contentCourse.php';
require_once '../Classes/videoCourse.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $title = $_POST['title'];
    $description = $_POST['description'];
    $idCategory = $_POST['idCategory'];
    $idUser = $_POST['idUser'];
    $type = $_POST['type'];

    $image = null;
    if (isset($_FILES['photo']) && $_FILES['photo']['error'] === UPLOAD_ERR_OK) {
        $image = basename($_FILES['photo']['name']);
        $targetDir = '../Uploads/';
        $targetFilePath = $targetDir . $image;
        move_uploaded_file($_FILES['photo']['tmp_name'], $targetFilePath);
    }

    try {
        if ($type === 'video') {
            $video = $_POST['video'];
            $course = new VideoCourse(null, $title, $description, $targetFilePath, $idCategory, $idUser, null, $video);
        } elseif ($type === 'pdf') {
            if (isset($_FILES['pdf']) && $_FILES['pdf']['error'] === UPLOAD_ERR_OK) {
                $pdf = basename($_FILES['pdf']['name']);
                $pdfTargetFilePath = $targetDir . $pdf;
                move_uploaded_file($_FILES['pdf']['tmp_name'], $pdfTargetFilePath);
                $course = new ContentCourse(null, $title, $description, $targetFilePath, $idCategory, $idUser, null, $pdfTargetFilePath);
            } else {
                throw new Exception("PDF upload failed.");
            }
        } else {
            throw new Exception("Invalid course type.");
        }

        $course->newCourse();
        // echo 'Course added successfully.';
        header("Location: ../Front/teacher/addingCourse.php?=CourseAddedSuccessfully");
    } catch (Exception $e) {
        echo $e->getMessage();
    }
} else {
    echo 'Invalid request method.';
}
?><a href="../Front/teacher/addingCourse.php"></a>