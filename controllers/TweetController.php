<?php

session_start();
require_once "../config/connect.php";
require_once "../models/TweetModel.php";

if (!isset($_SESSION['user'])) 
{
    die("Erreur : utilisateur non connecté !");
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    
    $userId = $_SESSION['user']['user_id'];
    $content = trim($_POST['content']);
    preg_match_all("/#(\w+)/", $content, $matches);
    preg_match_all("/@(\w+)/", $content, $arobases);
    $hashtags = array_unique($matches[1]);

    if (empty($content)) 
    {
        die("Erreur : le tweet ne peut pas être vide !");
    }
    try 
    {
        $tweetModel = new Tweet();
        $postId = $tweetModel->createTweet($userId, $content); 
        if ($postId) 
        {
            if (!empty($hashtags)) 
            {
                $tweetModel->addHashtags($hashtags);
                $tweetModel->linkTweetWithHashtags($postId, $hashtags);
            }
            header("Location: ../views/home.view.php");
            exit;
        } 
        else 
        {
            die("Erreur : échec de l'ajout du tweet !");
        }
    } catch (Exception $e) 
    {
        die("Erreur : " . $e->getMessage());
    }
}
?>