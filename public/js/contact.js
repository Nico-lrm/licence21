// Fonction pour le chargement en continu des éléments
document.getElementById('form').addEventListener('submit', function(e) {
    e.preventDefault();
    var subject = document.getElementById('subject').value;
    var body = document.getElementById('body').value;
    var subname = document.getElementById('subname').value; 
    var xhttp = new XMLHttpRequest();
    xhttp.open("POST", "ajax/mail.php", true);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.onload = function() {
        if (this.status == 200 && this.readyState == 4 && this.responseText == 'Erreur') {
            alert("L'un des champs contient des caractères spéciaux. Veuillez ressaisir le mail en retirant tout caractère or caractère de syntaxe.");

        } else if (this.status == 200 && this.readyState == 4 && this.responseText != 'Erreur') {
            alert("Votre mail à bien été envoyé. Vous allez être redirigés vers l'accueil.");
            document.location.href = '?page=home';
        }
    }
    xhttp.send("subject="+subject+"&body="+body+"&subname="+subname);
})