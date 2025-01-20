<?php
abstract class Course {
    protected $idCourse;
    protected $title;
    protected $description;
    protected $image;
    protected $idCategory;
    protected $idUser;
    protected $created_at;

    public function __construct($idCourse, $title, $description, $image, $idCategory, $idUser, $created_at) {
        $this->idCourse = $idCourse;
        $this->title = $title;
        $this->description = $description;
        $this->image = $image;
        $this->idCategory = $idCategory;
        $this->idUser = $idUser;
        $this->created_at = $created_at;
    }

    // Abstract method to save the course
    abstract public function newCourse();

    public static function getAllCourses() {
        $db = Database::getInstance()->getConnection();
        try {
        // Assuming there is a foreign key `idUser` in `courses` that references `idUser` in `users`
            $stmt = $db->prepare("SELECT courses.*, users.name FROM courses JOIN users ON courses.idUser = users.idUser");
            $stmt->execute();
            $courses = $stmt->fetchAll(PDO::FETCH_ASSOC);

            if (!$courses) {
                error_log("No courses found in the database.");
                throw new Exception("No courses found.");
            }

            return $courses;
        } catch (PDOException $e) {
            error_log("Database error: " . $e->getMessage());
            throw new Exception("An error occurred while retrieving the courses.");
        }
    }

    public static function getCoursesByUserId($userId) {
        $db = Database::getInstance()->getConnection();
        try {
            $stmt = $db->prepare("SELECT * FROM courses WHERE idUser = :idUser");
            $stmt->bindParam(':idUser', $userId, PDO::PARAM_INT);
            $stmt->execute();
            $courses = $stmt->fetchAll(PDO::FETCH_ASSOC);

            return $courses;
        } catch (PDOException $e) {
            error_log("Database error: " . $e->getMessage());
            throw new Exception("An error occurred while retrieving the courses.");
        }
    }

    public function updateCourse() {
        $db = Database::getInstance()->getConnection();
        try {
            $stmt = $db->prepare("UPDATE courses SET title = :title, description = :description, image = :image, idCategory = :idCategory WHERE idCourse = :idCourse");
            $stmt->bindParam(':title', $this->title, PDO::PARAM_STR);
            $stmt->bindParam(':description', $this->description, PDO::PARAM_STR);
            $stmt->bindParam(':image', $this->image, PDO::PARAM_STR);
            $stmt->bindParam(':idCategory', $this->idCategory, PDO::PARAM_INT);
            $stmt->bindParam(':idCourse', $this->idCourse, PDO::PARAM_INT);
            $stmt->execute();
        } catch (PDOException $e) {
            error_log("Database error: " . $e->getMessage());
            throw new Exception("An error occurred while updating the course.");
        }
    }

    public static function deleteCourse($idCourse) {
        $db = Database::getInstance()->getConnection();
        try {
            $stmt = $db->prepare("DELETE FROM courses WHERE idCourse = :idCourse");
            $stmt->bindParam(':idCourse', $idCourse, PDO::PARAM_INT);
            $stmt->execute();
        } catch (PDOException $e) {
            error_log("Database error: " . $e->getMessage());
            throw new Exception("An error occurred while deleting the course.");
        }
    }
}
?>