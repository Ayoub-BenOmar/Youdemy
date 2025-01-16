<?php
require_once 'database.php';

class Course {
    private $idCourse;
    private $title;
    private $description;
    private $content;
    private $categoryId;
    private $instructorId;
    private $createdAt;

    public function __construct($idCourse = null, $title = '', $description = '', $content = '', $categoryId = null, $instructorId = null, $createdAt = null) {
        $this->idCourse = $idCourse;
        $this->title = $title;
        $this->description = $description;
        $this->content = $content;
        $this->categoryId = $categoryId;
        $this->instructorId = $instructorId;
        $this->createdAt = $createdAt;
    }

    // Getters
    public function getIdCourse() { return $this->idCourse; }
    public function getTitle() { return $this->title; }
    public function getDescription() { return $this->description; }
    public function getContent() { return $this->content; }
    public function getCategoryId() { return $this->categoryId; }
    public function getInstructorId() { return $this->instructorId; }
    public function getCreatedAt() { return $this->createdAt; }

    // Setters
    public function setTitle($title) { $this->title = $title; }
    public function setDescription($description) { $this->description = $description; }
    public function setContent($content) { $this->content = $content; }
    public function setCategoryId($categoryId) { $this->categoryId = $categoryId; }
    public function setInstructorId($instructorId) { $this->instructorId = $instructorId; }

    // Save Course
    public function save() {
        $db = Database::getInstance()->getConnection();
        try {
            if ($this->idCourse) {
                $stmt = $db->prepare("UPDATE courses SET title = :title, description = :description, content = :content, category_id = :categoryId, instructor_id = :instructorId WHERE idCourse = :idCourse");
                $stmt->bindParam(':idCourse', $this->idCourse, PDO::PARAM_INT);
            } else {
                $stmt = $db->prepare("INSERT INTO courses (title, description, content, category_id, instructor_id) VALUES (:title, :description, :content, :categoryId, :instructorId)");
            }
            $stmt->bindParam(':title', $this->title, PDO::PARAM_STR);
            $stmt->bindParam(':description', $this->description, PDO::PARAM_STR);
            $stmt->bindParam(':content', $this->content, PDO::PARAM_STR);
            $stmt->bindParam(':categoryId', $this->categoryId, PDO::PARAM_INT);
            $stmt->bindParam(':instructorId', $this->instructorId, PDO::PARAM_INT);
            $stmt->execute();
            if (!$this->idCourse) {
                $this->idCourse = $db->lastInsertId();
            }
            return $this->idCourse;
        } catch (PDOException $e) {
            error_log("Database error: " . $e->getMessage());
            throw new Exception("An error occurred while saving the course.");
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
            return new Course($result['idCourse'], $result['title'], $result['description'], $result['content'], $result['category_id'], $result['instructor_id'], $result['created_at']);
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
            $courses[] = new Course($result['idCourse'], $result['title'], $result['description'], $result['content'], $result['category_id'], $result['instructor_id'], $result['created_at']);
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