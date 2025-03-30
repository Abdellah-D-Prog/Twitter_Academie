<?php
include_once '../views/layouts/header.php';
?>

<body>
    <div class="container">
        <div class="row align-items-center min-vh-100">
            <div class="col-md-5 d-flex justify-content-center">
                <div class="logo-container">
                    <img src="assets/images/logoz.png" alt="Logo Z" class="logo-img">
                </div>
            </div>
            <div class="col-md-7">
                <div class="right-content">
                    <h1>L'info et le fun en 140 caractères</h1>
                    <p class="signup-text">Inscrivez-vous!</p>

                    <a href="../controllers/RegisterController.php"><button class="btn create-account">Créer un compte</button></a>

                    <p class="login-text">Vous avez déjà un compte ?</p>

                    <a href="../controllers/LoginController.php"><button class="btn login">Se connecter</button></a>
                </div>
            </div>
        </div>
    </div>
</body>

</html>