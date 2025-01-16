<?php
require_once 'database.php';

class Category {
    private $idCategory;
    private $name;

    public function __construct($idCategory = null, $name = null) {
        $this->idCategory = $idCategory;
        $this->name = $name;
    }

    public function getIdCategory() { return $this->idCategory; }
    public function getName() { return $this->name; }

    public function setName($name) { $this->name = $name; }

    public function save() {
        $db = Database::getInstance()->getConnection();
        try {
            if ($this->idCategory) {
                $stmt = $db->prepare("UPDATE categories SET name = :name WHERE idCategory = :idCategory");
                $stmt->bindParam(':idCategory', $this->idCategory, PDO::PARAM_INT);
                $stmt->bindParam(':name', $this->name, PDO::PARAM_STR);
                $stmt->execute();
            } else {
                $stmt = $db->prepare("INSERT INTO categories (name) VALUES (:name)");
                $stmt->bindParam(':name', $this->name, PDO::PARAM_STR);
                $stmt->execute();
                $this->idCategory = $db->lastInsertId();
            }
            return $this->idCategory;
        } catch (PDOException $e) {
            error_log("Database error: " . $e->getMessage());
            throw new Exception("An error occurred while saving the category.");
        }
    }

    public static function getById($idCategory) {
        $db = Database::getInstance()->getConnection();
        $stmt = $db->prepare("SELECT * FROM categories WHERE idCategory = :idCategory");
        $stmt->bindParam(':idCategory', $idCategory, PDO::PARAM_INT);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($result) {
            return new Category($result['idCategory'], $result['name']);
        }

        return null;
    }

    public static function getAll() {
        $db = Database::getInstance()->getConnection();
        $stmt = $db->query("SELECT * FROM categories");
        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

        $categories = [];
        foreach ($results as $result) {
            $categories[] = new Category($result['idCategory'], $result['name']);
        }

        return $categories;
    }

    public static function deleteById($idCategory) {
        $db = Database::getInstance()->getConnection();
        $stmt = $db->prepare("DELETE FROM categories WHERE idCategory = :idCategory");
        $stmt->bindParam(':idCategory', $idCategory, PDO::PARAM_INT);
        $stmt->execute();
    }
}
?>