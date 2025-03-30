<?php
require_once "../config/connect.php";
class UserModel{
    private $pdo;
    public function __construct(){
        $this->pdo=getDataBaseConnection();
    }
    public function getUserbyEmailOrUsername($login){
        $sql="SELECT * FROM Users WHERE username = ? OR email = ?";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$login,$login]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
    public function hash_password($password){
        $salt = "vive le projet tweet_academy";
        return hash("ripemd160", $salt . $password);
    }
    public function verify_password($password, $hash) {
        return $this->hash_password($password) === $hash;
    }
    public function createUser($userName, $displayName, $passwordHash, $email, $dob){
        try {
            $sql = "INSERT INTO Users (username, display_name, password_hash, email, date_of_birth) VALUES (?,?,?,?,?)";
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute([$userName, $displayName, $passwordHash, $email, $dob]);
            return $this->pdo->lastInsertId();
        } catch (PDOException $e) {
            die("Erreur lors de l'insertion : " . $e->getMessage());
        }
    }
    function userExists($username,$email){
        $sql = "SELECT username,email FROM Users WHERE username = ? OR email = ?";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$username,$email]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function searchUsers($query) {
        $sql = "SELECT user_id, username, display_name 
                FROM Users 
                WHERE username LIKE ? OR display_name LIKE ?
                ORDER BY display_name ASC";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute(["%$query%", "%$query%"]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    
}
?>