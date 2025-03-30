<?php
require_once "../config/connect.php";
class UpdateProfilModel{
    
    private $pdo;
    public function __construct(){
        $this->pdo=getDataBaseConnection();
    }
    public function updateEmail($email){
        $sql="UPDATE Users SET email = ? WHERE id = ?";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$email,$_SESSION['user']['id']]);
    }
    public function updateDisplay($displayname){
        $sql="UPDATE Users SET display_name = ? WHERE id = ?";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$displayname,$_SESSION['user']['id']]);
    }
    public function updatePassword($password){
        $sql="UPDATE Users SET password_hash = ? WHERE id = ?";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$password,$_SESSION['user']['id']]); 
    }
}