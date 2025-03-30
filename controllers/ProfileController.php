<?php

require_once "../config/connect.php";
require_once "../models/TweetModel.php";
session_start();

if (!isset($_SESSION['user'])) 
{
    header("Location: ../public/index.php");
    exit;
}

$tweetModel = new Tweet();
$userId = $_SESSION['user']['user_id'];
$tweets = $tweetModel->getTweetsByUserId($userId);
require_once "../views/profile.view.php";
