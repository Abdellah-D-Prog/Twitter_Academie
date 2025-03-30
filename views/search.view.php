<?php
include_once("layouts/header.php");
?>
<body>
    <div class="container-fluid">
        <!-- Barre latérale gauche -->
        <?php include_once("layouts/navbar_left.php"); ?>
        <!-- Contenu de la recherche -->
        <div class="col-md-6 main-content p-0">
            <div class="p-3 border-bottom border-secondary">
                <form action="../controllers/SearchController.php" method="GET">
                    <input type="text" name="query" class="form-control search-input" placeholder="Rechercher un utilisateur (@exemple) ou un hashtag (#exemple)">
                    <button type="submit" class="btn btn-primary mt-2">Rechercher</button>
                </form>
                <div class="container">
                    <!-- Résultats des utilisateurs -->
                    <?php if (!empty($users)): ?>
                        <h3>Utilisateurs Trouvés: </h3>
                        <?php foreach ($users as $user): ?>
                            <div class="card p-3 mb-3">
                                <strong>@<?php echo htmlspecialchars($user['username']); ?></strong>
                                <p><?php echo htmlspecialchars($user['display_name']); ?></p>
                            </div>
                        <?php endforeach; ?>
                    <?php endif; ?>

                    <!-- Résultats des tweets -->
                    <?php if (!empty($tweets)): ?>
                        <h3>Tweets Relié au Hashtags:</h3>
                        <?php foreach ($tweets as $tweet): ?>
                            <div class="card p-3 mb-3">
                                <strong>@<?php echo htmlspecialchars($tweet['username']); ?></strong>
                                <p><?php echo htmlspecialchars($tweet['content']); ?></p>
                                <small><?php echo $tweet['created_at']; ?></small>
                            </div>
                        <?php endforeach; ?>
                    <?php endif; ?>

                    <?php if (empty($users) && empty($tweets)): ?>
                        <p>Aucun résultat.</p>
                    <?php endif; ?>
                </div>
            </div>
        </div>
        <?php include_once("layouts/navbar_right.php"); ?>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>