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
            $stmt = $db->prepare("SELECT * FROM courses");
            $stmt->execute();
            $courses = $stmt->fetchAll(PDO::FETCH_ASSOC);

            return $courses;
        } catch (PDOException $e) {
            error_log("Database error: " . $e->getMessage());
            throw new Exception("An error occurred while retrieving the courses.");
        }
    }
}
?>