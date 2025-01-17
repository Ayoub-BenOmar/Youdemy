<!-- <?php
require_once "../Classes/category.php";
require_once "../Classes/database.php";

$db = Database::getInstance()->getConnection();
$categories = Category::getAll();
    echo '<pre>';
    print_r($categories);
    echo '</pre>';

?> -->

<?php
require_once '../Classes/database.php';

try {
    $db = Database::getInstance()->getConnection();
    echo "Database connection is successful.";
} catch (Exception $e) {
    echo "Database connection failed: " . $e->getMessage();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Register</h1>
        <!-- <form action="../Handlers/register.php" method="post">
            <label for="nom">Nom:</label>
            <input type="text" id="nom" name="nom" required>
            <br>
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>
            <br>
            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required>
            <br>
            <button type="submit">Register</button>
        </form> -->

        <!-- <h1>Login</h1>
        <form action="../Handlers/login.php" method="post">
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>
            <br>
            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required>
            <br>
            <button type="submit">Login</button>
        </form> -->

        <h1>Category</h1>
        <form action="../Handlers/handleCategory.php" method="post">
            <label for="category">Category:</label>
            <input type="text" id="category" name="category" required>
            <button type="submit">Add</button>
        </form>

                <!-- <h1>Login</h1>
        <form action="../Handlers/addCourse.php" method="post">
            <label for="title">title:</label>
            <input type="text" id="title" name="title" required>
            <br>
            <label for="description">description:</label>
            <input type="text" id="description" name="description" required>
            <br>
            <label for="description">description:</label>
            <input type="text" id="description" name="description" required>
            <br>
            <label for="tags">tags:</label>
            <input type="text" id="tags" name="tags" required>
            <br>
            <label for="catgeory">category:</label>
            <select id="category" name="idCategory"  >
                        <option value="" disabled selected>Select a category</option>
                        <?php foreach ($categories as $category):?>
                        <option value="<?= htmlspecialchars($category->getIdCategory()) ?>"><?= htmlspecialchars($category->getName()) ?></option>
                        <?php endforeach;?>
            </select>
            <button type="submit">Login</button>
        </form> -->

</body>
</html>