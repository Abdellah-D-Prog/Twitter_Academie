<?php
require_once "../config/connect.php";
class Tweet {
    private $pdo;
    public function __construct(){
        $this->pdo=getDataBaseConnection();
    }
    public function getTweetsByUserId($userId){
        $sql = "SELECT p.*, u.username, u.display_name 
        FROM Posts p 
        JOIN Users u ON p.user_id = u.user_id 
        WHERE p.user_id = ? 
        ORDER BY p.created_at DESC";
        $stmt=$this->pdo->prepare($sql);
        $stmt->execute([$userId]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function createTweet($userId,$content, $replyTo = null){
        if(strlen($content)>140){
            return false;
        }
        $sql = "INSERT INTO Posts (user_id, content, created_at, reply_to) VALUES(?,?,NOW(),?)";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$userId, $content, $replyTo]);

        return $this->pdo->lastInsertId();
    }

    public function getRepliesToTweet($tweetId){
        $sql = "SELECT p.*, u.username, u.display_name 
        FROM Posts p 
        JOIN Users u ON p.user_id = u.user_id 
        WHERE p.user_id = ? 
        ORDER BY p.created_at DESC";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$tweetId]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function addHashtags($hashtags) {
        $sql = "INSERT IGNORE INTO Hashtags (tag) VALUES (?)"; 
        $stmt = $this->pdo->prepare($sql);
    
        foreach ($hashtags as $tag) {
            $stmt->execute([$tag]);
        }
    }

    public function linkTweetWithHashtags($postId, $hashtags) {
        $sql = "INSERT INTO PostHashtag (post_id, hashtag_id) 
                SELECT ?, hashtag_id FROM Hashtags WHERE tag = ?";
        $stmt = $this->pdo->prepare($sql);
    
        foreach ($hashtags as $tag) {
            $stmt->execute([$postId, $tag]);
        }
    }

    public function searchTweetsByHashtag($hashtag) {
        $sql = "SELECT p.*, u.username, u.display_name 
                FROM Posts p
                JOIN PostHashtag pht ON p.post_id = pht.post_id
                JOIN Hashtags h ON pht.hashtag_id = h.hashtag_id
                JOIN Users u ON p.user_id = u.user_id
                WHERE h.tag = ?
                ORDER BY p.created_at DESC";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$hashtag]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    
    
    public function getAllTweets(){
        $sql='SELECT Posts.*,Users.username,Users.display_name From Posts INNER JOIN Users On Posts.user_id=Users.user_id ORDER BY Posts.created_at';
        $stmt=$this->pdo->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }   
}
?>