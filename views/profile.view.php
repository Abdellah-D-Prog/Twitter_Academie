<?php include_once("layouts/header.php"); ?>
<body>
    <div class="container-fluid">
        <!-- Barre latérale gauche -->
        <?php include_once("layouts/navbar_left.php"); ?>
        <!-- Contenu principal -->
        <div class="col-md-6 main-content p-0">
            <!-- Bannière de profil -->
            <div class="profile-banner position-relative" style="height: 200px; background-color: #2d2d2d;">
                <div class="profile-photo position-absolute start-0 bottom-0 ms-3" style="transform: translateY(50%);">
                    <div class="rounded-circle border-4 border-dark" style="width: 120px; height: 120px; background-color: #1a1a1a; overflow: hidden;">
                        <?php if (!empty($_SESSION['user']['profile_pic'])) : ?>
                            <img src="../public/assets/uploads/<?php echo htmlspecialchars($_SESSION['user']['profile_pic']); ?>" alt="Profile" class="w-100 h-100 object-fit-cover">
                        <?php endif; ?>
                    </div>
                </div>

                <div class="position-absolute top-0 end-0 m-3 d-flex gap-2">
                    <a href="../controllers/UpdateUserController.php" class="btn btn-light rounded-pill px-4">
                        <i class="fas fa-edit me-2"></i>Modifier votre profil
                    </a>
                    <a href="../controllers/LogoutController.php" class="btn btn-danger rounded-pill px-4">
                        <i class="fas fa-sign-out-alt me-2"></i>Déconnexion
                    </a>
                </div>
            </div>

            <!-- Informations profil -->
            <div class="profile-info px-4" style="margin-top: 80px;">
                <h2 class="text-white mb-1"><?php echo htmlspecialchars($_SESSION['user']['display_name']); ?></h2>
                <p class="text-muted">@<?php echo htmlspecialchars($_SESSION['user']['username']); ?></p>
                
                <div class="d-flex gap-4 mb-3">
                    <div>
                        <span class="fw-bold text-white"><?php echo number_format($userStats['following']); ?></span>
                        <span class="text-muted">Abonnements</span>
                    </div>
                    <div>
                        <span class="fw-bold text-white"><?php echo number_format($userStats['followers']); ?></span>
                        <span class="text-muted">Abonnés</span>
                    </div>
                </div>
            </div>
            <!-- Tweets -->
            <div class="px-4">
                <h3 class="text-white mb-4">Tweets</h3>
                <?php if (empty($tweets)) : ?>
                    <div class="alert alert-dark">Aucun Tweets.</div>
                <?php else : ?>
                    <?php foreach ($tweets as $tweet) : ?>
                        <div class="card bg-dark text-white mb-3">
                            <div class="card-body">
                                <div class="d-flex align-items-start gap-3">
                                    <div class="user-img-small bg-secondary rounded-circle"></div>
                                    <div class="flex-grow-1">
                                        <div class="d-flex justify-content-between align-items-start">
                                            <div>
                                                <span class="fw-bold text-white"><?php echo htmlspecialchars($_SESSION['user']['display_name']); ?></span>
                                                <span class="text-muted">@<?php echo htmlspecialchars($_SESSION['user']['username']); ?></span>
                                                <span class="text-muted mx-2">·</span>
                                                <span class="text-muted"><?php echo date('d M Y H:i', strtotime($tweet['created_at'])); ?></span>
                                                <button class="btn btn-link text-muted p-0">
                                                    <i class="fas fa-ellipsis-h"></i>
                                                </button>
                                            </div>
                                        </div>                              
                                        <p class="mt-2 mb-3"><?php echo htmlspecialchars($tweet['content']); ?></p>
                                        <div class="d-flex justify-content-between text-muted">
                                            <button class="btn btn-link text-muted">
                                                <i class="far fa-comment"></i>
                                                <?php echo $tweet['comments_count']; ?>
                                            </button>
                                            <button class="btn btn-link text-muted">
                                                <i class="fas fa-retweet"></i>
                                                <?php echo $tweet['retweets_count']; ?>
                                            </button>
                                            <button class="btn btn-link text-muted">
                                                <i class="far fa-heart"></i>
                                                <?php echo $tweet['likes_count']; ?>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                <?php endif; ?>
            </div>
        </div>
        <!-- Barre latérale droite -->
        <?php include_once("layouts/navbar_right.php"); ?>
    </div>
</div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>