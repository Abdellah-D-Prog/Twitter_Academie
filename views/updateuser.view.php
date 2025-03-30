<?php
include_once 'layouts/header.php';
?>

<div class="container-fluid">
    <?php include_once 'layouts/navbar.php'; ?>
    <!-- Section principale pour l'édition du profil -->
    <div class="col-md-9 main-content p-4">
        <h2 class="text-white mb-4">Éditer le profil</h2>
        <form action="../controllers/UpdateUserController.php" method="POST" class="bg-dark p-4 rounded shadow">
            <div class="mb-3">
                <label for="display_update" class="form-label text-white">Changez votre nom :</label>
                <input type="text" name="display_update" id="display_update" class="form-control" placeholder="Nouveau Nom/Prénom" value="<?php echo htmlspecialchars($_SESSION['user']['display_name']); ?>">
            </div>

            <div class="mb-3">
                <label for="email_update" class="form-label text-white">Changez votre email :</label>
                <input type="email" name="email_update" id="email_update" class="form-control" placeholder="Nouvel Email" value="<?php echo htmlspecialchars($_SESSION['user']['email']); ?>">
            </div>

            <div class="mb-3">
                <label for="password_update" class="form-label text-white">Changez votre mot de passe :</label>
                <input type="password" name="password_update" id="password_update" class="form-control" placeholder="Nouveau Mot de Passe">
            </div>

            <div class="mb-3">
                <label for="password_confirm" class="form-label text-white">Confirmez votre mot de passe :</label>
                <input type="password" name="password_confirm" id="password_confirm" class="form-control" placeholder="Confirmez votre Mot de Passe">
            </div>

            <div class="d-flex justify-content-between">
                <a href="../controllers/ProfileController.php" class="btn btn-secondary">Annuler</a>
                <input type="submit" class="btn btn-success" value="Mettre à jour">
                    <button type="submit" name="delete_account" class="btn btn-danger" onclick="return confirm('Êtes-vous sûr de vouloir supprimer votre compte ? Cette action est irréversible.');">
                        Supprimer mon compte
                    </button>
            </div>
        </form>
    </div>
</div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>