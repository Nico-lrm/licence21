<?php 
require('model/frontend.php');
function getHome() {
    require('view/homeView.php');
}
function getSignUp() {
    require('view/signUpView.php');
}
function getSignIn() {
    require('view/signInView.php');
}
function getAddCourse() {
    require('view/addCourseView.php');
}
function getContact() {
    require('view/contactView.php');
}
function getTcu() {
    require('view/tcuView.php');
}
function listCourses() {
    $courses = getCourses();
    if ($courses === null) {
        throw new Exception("Connexion à la BDD impossible");
    } else {
        require('view/coursesView.php');
        return $courses;
    }
}
function listCourseUnique($id) {
    $course = getCourseUnique($id);
    if ($course === null) {
        throw new Exception("Connexion à la BDD impossible");
    } else {
        require('view/courseUniqueView.php');
        return $course;
    }
}