<?php
include_once 'layouts/header.php';
?>
<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6 col-lg-4">
                <div class="text-center mb-4 d-flex align-items-center justify-content-center gap-2">
                    <h1 class="mb-0">Inscrivez-vous à</h1>
                    <img src="../public/assets/images/logoz.png" alt="Logo Z" class="logo-img-register">
                </div>
                <?php if (!empty($success)): ?>
                    <div id="successMessage" style="color: green; font-weight: bold; text-align: center; margin-bottom: 15px;">
                        <?= htmlspecialchars($success) ?>
                    </div>
                <?php endif; ?>

                <div class=" signup-container">
                    <form id="registerForm" action="../controllers/RegisterController.php" method="POST">
                        <div class="mb-3">
                            <label for="username" class="form-label">Pseudo</label>
                            <input type="text" class="form-control custom-input" id="username" name="username" placeholder="Valeur">
                            <span class="error"></span>
                            <?php if (!empty($errors['username'])): ?>
                                <p style="color: red;"><?= $errors['username'] ?></p>
                            <?php endif; ?>
                        </div>

                        <div class="mb-3">
                            <label for="displayname" class="form-label">Nom prénom</label>
                            <input type="text" class="form-control custom-input" id="displayname" name="displayname" placeholder="Valeur">
                            <span class="error"></span>
                        </div>

                        <div class="mb-3">
                            <label for="dateofbirth" class="form-label">Date de naissance</label>
                            <input type="date" class="form-control custom-input" id="dateofbirth" name="dateofbirth">
                            <span class="error"></span>
                        </div>

                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control custom-input" id="email" name="email" placeholder="Valeur">
                            <span class="error"></span>
                            <?php if (!empty($errors['email'])): ?>
                                <p style="color: red;"><?= $errors['email'] ?></p>
                            <?php endif; ?>
                        </div>

                        <div class="mb-3">
                            <label for="password" class="form-label">Mot de passe</label>
                            <input type="password" class="form-control custom-input" id="password" name="password"
                                pattern="^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$"
                                title="Le mot de passe doit contenir au moins 8 caractères, une majuscule, une minuscule, un chiffre et un caractère spécial"
                                placeholder="Valeur">
                            <span class="error"></span>
                        </div>

                        <div class="mb-4">
                            <label for="password2" class="form-label">Confirmer mot de passe</label>
                            <input type="password" class="form-control custom-input" id="password2" name="password2" placeholder="Valeur">
                            <span class="error"></span>
                        </div>

                        <div class="mb-3">
                            <input type="submit" value="S'inscrire" class="btn btn-signup w-100">
                        </div>

                        <div class="text-center mt-3">
                            <p class="mb-1">Vous avez déjà un compte ?</p>
                            <a href="../controllers/LoginController.php" class="login-link">Connectez-vous à Zwitter</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script src="../public/js/register.js"></script>
</body>
</html>