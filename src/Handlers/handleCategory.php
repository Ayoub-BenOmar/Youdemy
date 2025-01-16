<?php
require_once '../Classes/category.php';
require_once '../Classes/database.php';
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['category'];

    try {
        $category = new Category();
        $category->setName($name);
        $category->save();
        // echo "naaaakokiii";
        header("Location: ../Front/admin/adminTag_Cat.php?=catgegoryAdded");
        // Set a success message in session
        // $_SESSION['success'] = "Category added successfully!";
    } catch (Exception $e) {
        // Set an error message in session
        // $_SESSION['error'] = $e->getMessage();
        $error = $e->getMessage();
    }

    // Redirect back to the form
    // header('Location: ../Forms/add_category_form.php');
    // exit();
}
?>