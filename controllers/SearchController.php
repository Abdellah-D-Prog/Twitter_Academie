<?php
session_start();
if (!isset($_SESSION['user'])) {
    header("Location: ./public/index.php");
    exit;
}

require_once "../config/connect.php";
require_once "../models/TweetModel.php";
require_once "../models/UserModel.php";

$search = trim($_GET['query']);
$tweetModel = new Tweet();
$userModel = new UserModel();

if ($search[0] === "#") {
    $hashtag = substr($search, 1);
    $tweets = $tweetModel->searchTweetsByHashtag($hashtag);
    $users = [];
} 
else {
    if ($search[0] === "@") {
        $search = substr($search, 1);
    }
    $users = $userModel->searchUsers($search);
    $tweets = [];
}
include "../views/search.view.php";
?>
