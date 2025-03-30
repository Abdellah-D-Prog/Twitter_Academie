<?php 
include_once 'layouts/header.php';
?>
<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6 col-lg-4">                    
            <div class="text-center mb-4 d-flex align-items-center justify-content-center gap-2">
                <h1 class="mb-0">Connectez-vous à</h1> 
                <img src="../public/assets/images/logoz.png" alt="Logo Z" class="logo-img-login">
            </div>
                <div class="login-container">
                    <form id="loginForm" action="../controllers/LoginController.php" method="POST">
                        <div class="mb-3">
                            <label for="login" class="form-label">Nom d'utilisateur/E-mail:</label>
                            <input type="text" class="form-control custom-input" id="login" name="login" placeholder="Pseudo ou Email">
                            <?php if (!empty($errors['login'])): ?>
                                <p style="color: red;"><?= $errors['login'] ?></p>
                            <?php endif; ?>
                        </div>
                        
                        <div class="mb-3">
                            <label for="password" class="form-label">Mot de passe:</label>
                            <input type="password" class="form-control custom-input" id="password" name="password" 
                            placeholder="Mot de passe">
                            <?php if (!empty($errors['password'])): ?>
                                <p style="color: red;"><?= $errors['password'] ?></p>
                            <?php endif; ?>
                        </div>
                        
                        <div class="mb-3">
                            <input type="submit" value="Se connecter" class="btn btn-login w-100">
                        </div>
                        
                        <div class="text-center mt-3">
                            <p class="mb-1">Vous n'avez pas de compte ?</p>
                            <a href="../controllers/RegisterController.php" class="register-link">Inscrivez-vous à Zwitter</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>