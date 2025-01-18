<?php
class VideoCourse extends Course {
    private $video;

    public function __construct($idCourse, $title, $description, $image, $idCategory, $idUser, $created_at, $video) {
        parent::__construct($idCourse, $title, $description, $image, $idCategory, $idUser, $created_at);
        $this->video = $video;
    }

    public function newCourse() {
        $db = Database::getInstance()->getConnection();
        try {
            $stmt = $db->prepare("INSERT INTO courses (title, description, video, image, idCategory, idUser) VALUES (:title, :description, :video, :image, :idCategory, :idUser)");
            $stmt->bindParam(':title', $this->title, PDO::PARAM_STR);
            $stmt->bindParam(':description', $this->description, PDO::PARAM_STR);
            $stmt->bindParam(':video', $this->video, PDO::PARAM_STR);
            $stmt->bindParam(':image', $this->image, PDO::PARAM_STR);
            $stmt->bindParam(':idCategory', $this->idCategory, PDO::PARAM_INT);
            $stmt->bindParam(':idUser', $this->idUser, PDO::PARAM_INT);
            $stmt->execute();
            $this->idCourse = $db->lastInsertId();
        } catch (PDOException $e) {
            error_log("Database error: " . $e->getMessage());
            throw new Exception("An error occurred while saving the video course.");
        }
    }
}
?>