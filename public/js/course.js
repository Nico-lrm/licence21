
// Fermer la fenêtre de recherche via le croix
function closeSearchWindow() {
    document.getElementById('overlay').classList.remove('active');
    document.getElementById('card-search').classList.remove('active');
}
// Réinitialiser la recherche
function resetSearch() {
    document.getElementById('content').value = 'null';
    document.getElementById('subject').value = 'null';
    document.getElementById('semester').value = 'null';
    document.getElementById('main-content').innerHTML = "";
    page_num = 1;
    load_page(page_num);
}
// Event listener pour le changement de contenu
document.getElementById('content').addEventListener("change", function() {
    document.getElementById('main-content').innerHTML = "";
    page_num = 1;
    load_page(page_num);
})
document.getElementById('semester').addEventListener("change", function() {
    document.getElementById('main-content').innerHTML = "";
    page_num = 1;
    load_page(page_num);
})
document.getElementById('subject').addEventListener("change", function() {
    document.getElementById('main-content').innerHTML = "";
    page_num = 1;
    load_page(page_num);
})
// Ajout de l'event Listener et lancement automatique du premier chargement
var subject = document.getElementById("subject").value;
var semester = document.getElementById("semester").value;
var content = document.getElementById("content").value;
var page_num = 1;
load_page(page_num)
window.addEventListener('scroll', function()  {
    if (subject == 'null' && content == 'null' && semester == 'null') {
        if (window.scrollY + window.innerHeight > document.getElementById('main-content').offsetHeight + 80) {
            page_num = page_num + 1;
            load_page(page_num);
        }
    }
})
// Fonction pour le chargement en continu des éléments
function load_page(page_num) {
    var subject = document.getElementById("subject").value;
    var semester = document.getElementById("semester").value;
    var content = document.getElementById("content").value;
    var xhttp = new XMLHttpRequest();
    xhttp.open("POST", "ajax/infinite-scroll.php", true);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.onload = function() {
        if (this.status == 200 && this.readyState == 4 &&  this.responseText == 'Erreur') {
            document.getElementById('main-content').innerHTML += this.responseText;
        } else if (this.status == 200 && this.readyState == 4 && this.responseText != 'Erreur') {
            document.getElementById('main-content').innerHTML += this.responseText;
        }
    }
    xhttp.send("page="+page_num+"&subject="+subject+"&semester="+semester+"&content="+content);
}