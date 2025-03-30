<?php
session_start();

if (!isset($_SESSION['user'])) {
    header("Location: ./public/index.php");
    exit;
}
?>
<?php 
include_once("layouts/header.php"); 
?>
<body>
<div class="container-fluid">
        <?php include_once("layouts/navbar_left.php"); ?>
        <div class="col-md-6 main-content p-0">
            <div class="p-3 border-bottom border-secondary">
                <div class="d-flex">
                    <div class="user-img me-2 bg-secondary"></div>
                    <div class="flex-grow-1">
                        <div class="card p-3 mb-3">
                            <form action="../controllers/TweetController.php" method="POST">
                                <textarea class="form-control" id="tweetContent" name="content" placeholder="Quoi de neuf ?" rows="3" maxlength="140" required style="resize:none"></textarea>
                                <button type="submit" class="btn btn-primary mt-2">Tweeter</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Boucle d'affichage des tweets -->
            <?php foreach ($hometweets as $hometweet) : ?>
                <div class="border-bottom border-secondary p-3">
                    <div class="d-flex mb-2">
                        <div class="user-img me-2 bg-secondary"></div>
                        <div>
                            <span class="fw-bold"><?= htmlspecialchars($hometweet['display_name']) ?></span>
                            <span class="text-muted">@<?= htmlspecialchars($hometweet['username']) ?> · <?= date("d M Y", strtotime($hometweet['created_at'])) ?></span>
                            <span class="ms-2">⋯</span>
                        </div>
                    </div>
                    <div class="mb-3">
                        <?= nl2br(htmlspecialchars($hometweet['content'])) ?>
                    </div>
                    <div class="d-flex justify-content-between text-muted">
                        <button class="btn btn-sm text-muted"><i class="far fa-comment fs-5" style="color: #E05353;"></i></button>
                        <button class="btn btn-sm text-muted"><i class="fas fa-retweet fs-5" style="color: #E05353;"></i></button>
                        <button class="btn btn-sm text-muted"><i class="far fa-heart fs-5" style="color: #E05353;"></i></button>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>

        <?php include_once("layouts/navbar_right.php"); ?>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
