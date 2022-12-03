/* Vérification des champs d'inscriptions côté client */
document.getElementById("firstname").addEventListener("focusout", function() {
    firstname = document.getElementById("firstname").value;
    if (firstname.match(RegExp(regex))) {
        document.getElementById("errFirstname").textContent = "";
        document.getElementById("firstname").style.borderColor = "green";
    } else {
        document.getElementById("firstname").style.borderColor = "red";
        document.getElementById("errFirstname").textContent = "Caractères spéciaux saisis.";
    }
});
document.getElementById("name").addEventListener("focusout", function() {
    name = document.getElementById("name").value;
    if (name.match(RegExp(regex))) {
        document.getElementById("errName").textContent = "";
        document.getElementById("name").style.borderColor = "green";
    } else {
        document.getElementById("name").style.borderColor = "red";
        document.getElementById("errName").textContent = "Caractères spéciaux saisis.";
    }
});
document.getElementById("email").addEventListener("focusout", function() {
    email = document.getElementById("email").value;
    if (email.match(RegExp(regexEmail))) {
        document.getElementById("errEmail").textContent = "";
        document.getElementById("email").style.borderColor = "green";
    } else {
        document.getElementById("email").style.borderColor = "red";
        document.getElementById("errEmail").textContent = "Format d'adresse e-mail non respecté.";
    }
});
document.getElementById("password").addEventListener("focusout", function() {
    password = document.getElementById("password").value;
    confirmPassword = document.getElementById("confirm-password").value;
    if (password.length >= 8) {
        document.getElementById("password").style.borderColor = "green";
        document.getElementById("errPassword").textContent = "";
    } 
    else if (password != confirmPassword && password.length >=8 && confirmPassword.length >=8 ) {
        document.getElementById("password").style.borderColor = "red";
        document.getElementById("confirm-password").style.borderColor = "red";
        document.getElementById("errPassword").textContent = "Les mots de passes ne sont pas identiques.";
    }   
    else {
        document.getElementById("password").style.borderColor = "red";
        document.getElementById("errPassword").textContent = "Le mot de passe doit faire au moins 8 caractères.";
    }
});
document.getElementById("confirm-password").addEventListener("focusout", function() {
    confirmPassword = document.getElementById("confirm-password").value;
    password = document.getElementById("password").value;
    if (confirmPassword == password && password.length >=8 && confirmPassword.length >=8) {
        document.getElementById("password").style.borderColor = "green";
        document.getElementById("confirm-password").style.borderColor = "green";
        document.getElementById("errConfirmPassword").textContent = "";
        document.getElementById("errPassword").textContent = "";
    }  else if (confirmPassword != password) {
        document.getElementById("password").style.borderColor = "red";
        document.getElementById("confirm-password").style.borderColor = "red";
        document.getElementById("errConfirmPassword").textContent = "Les mots de passes ne sont pas identiques.";
    }
    else {
        document.getElementById("password").style.borderColor = "red";
        document.getElementById("confirm-password").style.borderColor = "red";
        document.getElementById("errConfirmPassword").textContent = "Le mot de passe doit faire au moins 8 caractères.";
    }
});
document.getElementById("birthday").addEventListener("change", function() {
    birthday = document.getElementById("birthday").value;
    birthday = new Date(birthday);
    today = new Date();
    if (birthday > today) {
        document.getElementById("errBirthday").textContent = "Vous ne pouvez pas être naître demain !";
        document.getElementById("birthday").style.borderColor = "red";
    } 
    else if (isNaN(birthday)) {
        document.getElementById("errBirthday").textContent = "Format de date invalide.";
        document.getElementById("birthday").style.borderColor = "red";
    }
    else {
        document.getElementById("errBirthday").textContent = "";
        document.getElementById("birthday").style.borderColor = "green";
    }
});

document.getElementById("tcu").addEventListener('change', function() {
    console.log(document.getElementById("tcu").value)
});


document.getElementById("form").addEventListener("submit", function(e) {
    birthday = document.getElementById("birthday").value;
    birthday = new Date(birthday);
    today = new Date();
    confirmPassword = document.getElementById("confirm-password").value;
    password = document.getElementById("password").value;
    email = document.getElementById("email").value;
    name = document.getElementById("name").value;
    firstname = document.getElementById("firstname").value;
    if (confirmPassword.length == 0 || password.length == 0 ||  email.length == 0 || name.length == 0 || firstname.length == 0 || password.length <= 8 || confirmPassword != password ||  isNaN(birthday) || !name.match(RegExp(regex)) || !firstname.match(RegExp(regex)) || !email.match(RegExp(regexEmail)) || birthday > today) {
        alert("L'un des champs à mal été saisi. Veuillez vous référer à l'erreur inscrite en dessous du champ concerné.")
        e.preventDefault();
    }
});