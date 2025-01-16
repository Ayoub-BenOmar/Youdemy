<?php
require_once 'database.php';

class Course {
    private $idCourse;
    private $title;
    private $description;
    private $content;
    private $image;
    private $idCategory;
    private $idUser;
    private $createdAt;

    public function __construct($idCourse = null, $title, $description, $content, $image, $idCategory = null, $idUser = null, $createdAt = null) {
        $this->idCourse = $idCourse;
        $this->title = $title;
        $this->description = $description;
        $this->content = $content;
        $this->image = $image;
        $this->idCategory = $idCategory;
        $this->idUser = $idUser;
        $this->createdAt = $createdAt;
    }

    // Getters
    public function getIdCourse() { return $this->idCourse; }
    public function getTitle() { return $this->title; }
    public function getDescription() { return $this->description; }
    public function getContent() { return $this->content; }
    public function getImage() { return $this->image; }
    public function getIdCategory() { return $this->idCategory; }
    public function getIdUser() { return $this->idUser; }
    public function getCreatedAt() { return $this->createdAt; }

    // Setters
    public function setTitle($title) { $this->title = $title; }
    public function setDescription($description) { $this->description = $description; }
    public function setContent($content) { $this->content = $content; }
    public function setImage($image) { $this->image = $image; }
    public function setIdCategory($idCategory) { $this->idCategory = $idCategory; }
    public function setIdUser($idUser) { $this->idUser = $idUser; }

    // Save Course
    public function save() {
        $db = Database::getInstance()->getConnection();
        try {
            if ($this->idCourse) {
                // Update existing course
                $stmt = $db->prepare("UPDATE courses SET title = :title, description = :description, content = :content, image = :image, idCategory = :idCategory, idUser = :idUser WHERE idCourse = :idCourse");
                $stmt->bindParam(':idCourse', $this->idCourse, PDO::PARAM_INT);
            } else {
                // Insert new course
                $stmt = $db->prepare("INSERT INTO courses (title, description, content, image, idCategory, idUser) VALUES (:title, :description, :content, :image, :idCategory, :idUser)");
            }
            // Bind parameters
            $stmt->bindParam(':title', $this->title, PDO::PARAM_STR);
            $stmt->bindParam(':description', $this->description, PDO::PARAM_STR);
            $stmt->bindParam(':content', $this->content, PDO::PARAM_STR);
            $stmt->bindParam(':image', $this->image, PDO::PARAM_STR);
            $stmt->bindParam(':idCategory', $this->idCategory, PDO::PARAM_INT);
            $stmt->bindParam(':idUser', $this->idUser, PDO::PARAM_INT);
            error_log("Saving course with idCategory: " . $this->idCategory);
    
            // Execute statement
            $stmt->execute();
    
            // If inserting, get the last insert ID
            if (!$this->idCourse) {
                $this->idCourse = $db->lastInsertId();
            }
            return $this->idCourse;
        } catch (PDOException $e) {
            // Log error and rethrow exception
            error_log("Database error: " . $e->getMessage());
            throw new Exception("An error occurred while saving the course: " . $e->getMessage());
        }
    }

    // Get Course by ID
    public static function getById($idCourse) {
        $db = Database::getInstance()->getConnection();
        $stmt = $db->prepare("SELECT * FROM courses WHERE idCourse = :idCourse");
        $stmt->bindParam(':idCourse', $idCourse, PDO::PARAM_INT);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($result) {
            return new Course($result['idCourse'], $result['title'], $result['description'], $result['content'], $result['image'], $result['idCategory'], $result['idUser'], $result['created_at']);
        }

        return null;
    }

    // Get All Courses
    public static function getAll() {
        $db = Database::getInstance()->getConnection();
        $stmt = $db->query("SELECT * FROM courses");
        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

        $courses = [];
        foreach ($results as $result) {
            $courses[] = new Course($result['idCourse'], $result['title'], $result['description'], $result['content'], $result['image'], $result['idCategory'], $result['idUser'], $result['created_at']);
        }

        return $courses;
    }

    // Delete Course by ID
    public static function deleteById($idCourse) {
        $db = Database::getInstance()->getConnection();
        $stmt = $db->prepare("DELETE FROM courses WHERE idCourse = :idCourse");
        $stmt->bindParam(':idCourse', $idCourse, PDO::PARAM_INT);
        $stmt->execute();
    }
}
?>