var regexEmail = /^[A-Za-z0-9._\-]+@[A-Za-z._\-]+\.[a-z]{2,4}$/;
var regex = /^[A-Za-z0-9À-ÖØ-öø-ÿ\- \n&/]+$/;
function confirmDelete() {
    if (confirm("Voulez-vous supprimer ce cours du site ?") == false) {
        return false;
    } else {
        return true;
    }
}
function closeCourseUnique() {
    document.location.href = '?page=courses';
}
function toggleNavigation() {
    document.getElementById('overlay').classList.toggle('active');
    document.getElementById('menu-icon').classList.toggle('active');
    document.getElementById('cross').classList.toggle('active');
}
document.getElementById('overlay').addEventListener('click', function() {
    var menu = document.getElementById('menu-icon');
    var cross = document.getElementById('cross');
    var overlay = document.getElementById('overlay');
    overlay.classList.remove('active');
    menu.classList.add('active');
    cross.classList.remove('active');
})