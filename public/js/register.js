document.getElementById("registerForm").addEventListener("submit", function (e) {
    
    let errors = [];
    
    const username = document.getElementById("username").value.trim();
    const displayname = document.getElementById("displayname").value.trim();
    const email = document.getElementById("email").value.trim();
    const dateofbirth = document.getElementById("dateofbirth").value;
    const password = document.getElementById("password").value;
    const password2 = document.getElementById("password2").value;
    const errorSpans = document.querySelectorAll(".error");

    errorSpans.forEach(span => {
        span.textContent = "";
        span.style.display = "none";
    });

    if (username.length < 3) errors.push({ index: 0, message: "Pseudo trop court" });
    
    let namePattern = /^[A-Za-zÀ-ÖØ-öø-ÿ\s'-]+$/;
    
    if (!namePattern.test(displayname) || displayname.length < 3) {
        errors.push({ index: 1, message: "Nom invalide (pas de chiffres ou symboles)" });
    }
    
    let birthDate = new Date(dateofbirth);
    let today = new Date();
    let age = today.getFullYear() - birthDate.getFullYear();
    if ( age < 15) {
        errors.push({ index: 2, message: "Vous devez avoir au moins 15 ans" });
    }
    if (!email.includes("@") || !email.includes(".")) errors.push({ index: 3, message: "Email invalide" });
    if (password.length < 6) errors.push({ index: 4, message: "Mot de passe trop court" });
    if (password !== password2) errors.push({ index: 5, message: "Les mots de passe ne correspondent pas" });
    if (errors.length > 0) {
        e.preventDefault();
        errors.forEach(err => {
            if (errorSpans[err.index]) {
                errorSpans[err.index].textContent = err.message;
                errorSpans[err.index].style.display = "block";
            }
        });
    }
});