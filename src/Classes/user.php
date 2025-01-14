<?php
class User {
    private $idUser;
    private $name;
    private $email;
    private $passwordHash;
    private $status;
    private $role_id;
    private $created_at;

    public function __construct($idUser, $name, $email, $passwordHash = null, $status = 'inactive', $role_id = null, $created_at = null) {
        $this->idUser = $idUser;
        $this->name = $name;
        $this->email = $email;
        $this->passwordHash = $passwordHash;
        $this->status = $status;
        $this->role_id = $role_id;
        $this->created_at = $created_at;
    }

    public function __toString() {
        return $this->name;
    }

    // Getters
    public function getId() { return $this->idUser; }
    public function getName() { return $this->name; }
    public function getEmail() { return $this->email; }
    public function getStatus() { return $this->status; }
    public function getRoleId() { return $this->role_id; }
    public function getCreatedAt() { return $this->created_at; }

    // Password hashing method
    private function setPasswordHash($password) {
        $this->passwordHash = password_hash($password, PASSWORD_BCRYPT);
    }

    // Save user to the database
    public function save() {
        $db = Database::getInstance()->getConnection();
        try {
            if ($this->idUser) {
                // Update user
                $stmt = $db->prepare("UPDATE users SET name = :name, email = :email, password = :password, status = :status, role_id = :role_id WHERE idUser = :idUser");
                $stmt->bindParam(':idUser', $this->idUser, PDO::PARAM_INT);
                $stmt->bindParam(':name', $this->name, PDO::PARAM_STR);
                $stmt->bindParam(':email', $this->email, PDO::PARAM_STR);
                $stmt->bindParam(':password', $this->passwordHash, PDO::PARAM_STR);
                $stmt->bindParam(':status', $this->status, PDO::PARAM_STR);
                $stmt->bindParam(':role_id', $this->role_id, PDO::PARAM_INT);
                $stmt->execute();
            } else {
                // Insert new user
                $stmt = $db->prepare("INSERT INTO users (name, email, password, status, role_id) VALUES (:name, :email, :password, :status, :role_id)");
                $stmt->bindParam(':name', $this->name, PDO::PARAM_STR);
                $stmt->bindParam(':email', $this->email, PDO::PARAM_STR);
                $stmt->bindParam(':password', $this->passwordHash, PDO::PARAM_STR);
                $stmt->bindParam(':status', $this->status, PDO::PARAM_STR);
                $stmt->bindParam(':role_id', $this->role_id, PDO::PARAM_INT);
                $stmt->execute();
                $this->idUser = $db->lastInsertId(); // Set the new user ID
            }
            return $this->idUser;
        } catch (PDOException $e) {
            error_log("Database error: " . $e->getMessage());
            throw new Exception("An error occurred while saving the user.");
        }
    }

    // Search user by name
    public function searchUserByName($name) {
        $db = Database::getInstance()->getConnection();

        // Prepare the SQL query
        $stmt = $db->prepare("SELECT * FROM users WHERE name LIKE :name");

        // Bind the parameter for name search (using wildcards for partial match)
        $stmt->bindValue(':name', '%' . $name . '%', PDO::PARAM_STR);

        // Execute the query
        $stmt->execute();

        // Fetch all matching users
        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

        // Return an array of User objects
        $users = [];
        foreach ($results as $result) {
            $users[] = new User(
                $result['idUser'],
                $result['name'],
                $result['email'],
                $result['password'],
                $result['status'],
                $result['role_id'],
                $result['created_at']
            );
        }

        return $users;
    }

    // Get user by ID
    public function getUserById($id) {
        $db = Database::getInstance()->getConnection();

        // Prepare the SQL query
        $stmt = $db->prepare("SELECT * FROM users WHERE idUser = :idUser");
        $stmt->bindParam(':idUser', $id, PDO::PARAM_INT);
        $stmt->execute();

        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($result) {
            return new User(
                $result['idUser'],
                $result['name'],
                $result['email'],
                $result['password'],
                $result['status'],
                $result['role_id'],
                $result['created_at']
            );
        }

        return null; // User not found
    }

    // Static method to search user by email
    public static function findByEmail($email) {
        $db = Database::getInstance()->getConnection();
        $stmt = $db->prepare("SELECT * FROM users WHERE email = :email");
        $stmt->bindParam(':email', $email, PDO::PARAM_STR);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($result) {
            return new User(
                $result['idUser'],
                $result['name'],
                $result['email'],
                $result['password'],
                $result['status'],
                $result['role_id'],
                $result['created_at']
            );
        }

        return null;
    }

    // Method to register a new user (signup)
    public static function signup($name, $email, $password, $role_id = null) {

        // Validate email format
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            throw new Exception("Invalid email format");
        }

        // Validate password length
        if (strlen($password) < 6) {
            throw new Exception("Password must be at least 6 characters long");
        }

        // Sanitize name field
        $name = htmlspecialchars($name);

        // Check if email already exists
        if (self::findByEmail($email)) {
            throw new Exception("Email is already registered");
        }

        // Create a new user object
        $user = new User(null, $name, $email);
        $user->setPasswordHash($password); // Hash the password
        $user->role_id = $role_id;
        return $user->save();
    }

    // Method to login (signin)
    public static function signin($email, $password) {
        $user = self::findByEmail($email);

        // Check if user exists and password is correct
        if (!$user || !password_verify($password, $user->passwordHash)) {
            throw new Exception("Invalid email or password");
        }

        return $user; // Successful login
    }

    // Method to change the user's password
    public function changePassword($newPassword) {
        $this->setPasswordHash($newPassword); // Hash the new password
        $db = Database::getInstance()->getConnection();
        $stmt = $db->prepare("UPDATE users SET password = :password WHERE idUser = :idUser");
        $stmt->bindParam(':password', $this->passwordHash, PDO::PARAM_STR);
        $stmt->bindParam(':idUser', $this->idUser, PDO::PARAM_INT);
        $stmt->execute();
    }
}
?>