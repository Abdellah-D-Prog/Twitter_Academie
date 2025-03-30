<?php

require_once "../config/connect.php";
require_once "../models/UserModel.php";
session_start();

$errors = [];

if ($_SERVER["REQUEST_METHOD"] === "POST") {
   
    $login = $_POST["login"];
    $password = $_POST["password"];
    $userModel = new UserModel();
    $userLogin = $userModel->getUserbyEmailOrUsername($login);
   
    if ($userLogin) 
    {
        if ($userLogin && $userModel->verify_password($password, $userLogin["password_hash"])) 
        {
            $_SESSION["user"] = $userLogin;
            header("Location: ../controllers/HomeController.php");
            exit();
        } 
        else 
        {
            $errors["password"] = "Mot de passe incorrect";
        }
    } 
    else 
    {
        $errors["login"] = "Cet utilisateur n'existe pas";
    }
    
}
require_once "../views/login.view.php";
