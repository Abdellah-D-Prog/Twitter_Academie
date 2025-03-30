<div class="row">
    <div class="col-md-3 sidebar p-3">
        <div class="d-flex flex-column" style="height: 100%;">
            <!-- Logo Z -->
            <div class="logo">
                <img src="../public/assets/images/logoz.png" alt="Logo Z" class="logo-img-home">
            </div>

            <div class="nav flex-column">
                <a href="../controllers/HomeController.php" class="nav-link text-white mb-3">
                    <i class="fas fa-home fs-2" style="color: #E05353;"></i> <span class="ms-2">Page d'accueil</span>
                </a>
                <a href="../controllers/SearchController.php" class="nav-link text-white mb-3">
                    <i class="fas fa-search fs-2" style="color: #E05353;"></i> <span class="ms-2">Barre de recherche</span>
                </a>
                <a href="#" class="nav-link text-white mb-3">
                    <i class="fas fa-envelope fs-2" style="color: #E05353;"></i> <span class="ms-2">Messages</span>
                </a>
                <a href="../controllers/ProfileController.php" class="nav-link text-white mb-3">
                    <i class="fas fa-user fs-2" style="color: #E05353;"></i> <span class="ms-2">Profil</span>
                </a>
            </div>
            <div class="mt-auto d-flex align-items-center">
                <div class="user-img me-2 bg-secondary"></div>
                <div>
                    <div class="fw-bold"><?php echo htmlspecialchars($_SESSION['user']['display_name']); ?></div>
                    <div class="text-muted">@<?php echo htmlspecialchars($_SESSION['user']['username']); ?></div>
                </div>
                <div class="ms-auto">⋯</div>
            </div>
        </div>
    </div>