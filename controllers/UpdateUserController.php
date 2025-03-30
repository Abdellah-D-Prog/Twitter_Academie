<?php
session_start();
require_once "../config/connect.php";
require_once "../models/UpdateUserModel.php";
require_once "../models/UserModel.php";

if($_SERVER["REQUEST_METHOD"] === "POST"){

    $userId=$_SESSION['user']['user_id'];
    $UpdateUserInfo=new UpdateUserModel();
    
    if(isset($_POST['display_update']) && !empty($_POST['display_update'])){
        $display_name=trim($_POST['display_update']);
        $UpdateUserInfo->UpdateDisplayName($userId,$display_name);
    }
    
    if(isset($_POST['email_update']) && !empty($_POST['email_update'])){
        $email=trim($_POST['email_update']);
        $UpdateUserInfo->UpdateEmail($userId,$email);
    }
    
    if(isset($_POST['password_update']) && !empty($_POST['password_update']) && isset($_POST['password_confirm']) && !empty($_POST['password_confirm'])){
        $password=trim($_POST['password_update']);
        $password_confirm=trim($_POST['password_confirm']);
        if($password===$password_confirm){
            $UpdateUserInfo->UpdatePassword($userId,$password);
        }
    }
    
    if(isset($_POST['delete_account'])) {
        $UpdateUserInfo->DeleteUser($userId);
        session_destroy();
        header("Location: ../public/index.php");
        exit();
    }
    
    
}
require_once "../views/updateuser.view.php";