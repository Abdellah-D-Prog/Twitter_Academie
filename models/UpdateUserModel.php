<?php
require_once "../config/connect.php";
require_once 'UserModel.php';
Class UpdateUserModel{
    private $pdo;
    public function __construct(){
        $this->pdo=getDataBaseConnection();
    }
    public function UpdateEmail($userId,$email){
        $sql="UPDATE Users SET email=? WHERE user_id=?";
        $stmt=$this->pdo->prepare($sql);
        return $stmt->execute([$email,$userId]);
    }

    public function UpdateDisplayName($userId,$display_name){
        $sql="UPDATE Users SET display_name=? WHERE user_id=?";
        $stmt=$this->pdo->prepare($sql);
        return $stmt->execute([$display_name,$userId]);
    }

    public function UpdatePassword($userId,$password){
        $hashedpassword=(new UserModel())->hash_password($password);
        $sql="UPDATE Users SET password_hash=? WHERE user_id=?";
        $stmt=$this->pdo->prepare($sql);
        return $stmt->execute([$hashedpassword,$userId]);
    }
    public function DeleteUser($userID){
        $sql="DELETE FROM Users WHERE user_id=?";
        $stmt=$this->pdo->prepare($sql);
        return $stmt->execute([$userID]);
    }
}