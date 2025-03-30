<?php

require_once "../models/UserModel.php";

$errors = [];
$success="";
$userModel = new UserModel();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    
    $username = trim($_POST['username']);
    $displayname = trim($_POST['displayname']);
    $dateofbirth = $_POST['dateofbirth'];
    $email = trim($_POST['email']);
    $password = $_POST['password'];
    $password2 = $_POST['password2'];
    $hashedPassword = $userModel->hash_password($password);
    $user = $userModel->userExists($username, $email);

    if ($user) 
    {
        if ($user['username'] === $username) 
        {
            $errors['username'] = "Ce pseudo est déjà utilisé";
        }
        if ($user['email'] === $email) 
        {
            $errors['email'] = "Cet email est déjà utilisé";
        }
    }
    if (empty($errors)) 
    {
        $userId = $userModel->createUser($username, $displayname, $hashedPassword, $email, $dateofbirth);
        $success = "Votre compte a bien été crée!";
    }
    
}
include_once "../views/register.view.php";
