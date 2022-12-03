document.getElementById('form').addEventListener("submit", function(e) {
    e.preventDefault();
    document.getElementById('errPassword').innerHTML = "";
    document.getElementById('errPassword').style.border = "none";
    document.getElementById('errPassword').style.margin = "auto";
    var email = document.getElementById("email").value;
    var password = document.getElementById("password").value;
    var xhttp = new XMLHttpRequest();
    xhttp.open("POST", "ajax/password-verify.php", true);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.onload = function() {
        if (this.status == 200 &&  this.responseText =='L\'adresse e-mail ou le mot de passe est incorrect.') {
            document.getElementById('errPassword').innerHTML = this.responseText;
            document.getElementById('errPassword').style.border = "1px solid";
            document.getElementById('errPassword').style.margin = "1rem auto";
        } else {
            document.getElementById("form").submit();
        }
    }
    xhttp.send("email="+email+"&password="+password);
});
document.getElementById("email").addEventListener("focusout", function() {
    email = document.getElementById("email").value;
    if (email.match(RegExp(regexEmail))) {
        document.getElementById("errEmail").textContent = "";
        document.getElementById("email").style.borderColor = "#ccc";
    } else {
        document.getElementById("email").style.borderColor = "red";
        document.getElementById("errEmail").textContent = "Format d'adresse e-mail non respecté.";
    }
});