<?php
require_once '../Classes/database.php';
require_once '../Classes/course.php';

session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $title = $_POST['title'];
    $description = $_POST['description'];
    $idCategory = $_POST['idCategory'];
    $tags = $_POST['tags'];
    $idUser = $_SESSION['user_id'];

    $content = null;
    $image = null;

    // Handle file upload for content (video or document)
    // if (isset($_FILES['content']) && $_FILES['content']['error'] === UPLOAD_ERR_OK) {
    //     $fileTmpPath = $_FILES['content']['tmp_name'];
    //     $fileName = $_FILES['content']['name'];
    //     $fileNameCmps = explode(".", $fileName);
    //     $fileExtension = strtolower(end($fileNameCmps));
    //     $newFileName = md5(time() . $fileName) . '.' . $fileExtension;
    //     $uploadFileDir = '../uploads/contents/';
    //     $dest_path = $uploadFileDir . $newFileName;

    //     if (move_uploaded_file($fileTmpPath, $dest_path)) {
    //         $content = $dest_path;
    //     } else {
    //         $error = "There was an error uploading the content file.";
    //     }
    // } else {
    //     $error = "No content file uploaded or there was an upload error.";
    // }

    // // Handle file upload for image
    // if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
    //     $fileTmpPath = $_FILES['image']['tmp_name'];
    //     $fileName = $_FILES['image']['name'];
    //     $fileNameCmps = explode(".", $fileName);
    //     $fileExtension = strtolower(end($fileNameCmps));
    //     $newFileName = md5(time() . $fileName) . '.' . $fileExtension;
    //     $uploadFileDir = '../uploads/images/';
    //     $dest_path = $uploadFileDir . $newFileName;

    //     if (move_uploaded_file($fileTmpPath, $dest_path)) {
    //         $image = $dest_path;
    //     } else {
    //         $error = "There was an error uploading the image file.";
    //     }
    // } else {
    //     $error = "No image file uploaded or there was an upload error.";
    // }

    if (!isset($error)) {
        try {
            $course = new Course(null, $title, $description, $content, $image, $idCategory, $idUser);
            $courseId = $course->save();
            header("Location: ../Front/teacher/addCourse.php?courseAdded=true");
            exit();
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    } else {
        echo $error;
    }
}
?>