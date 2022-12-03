<?php
require('model/backend.php');
//Ajouter un utilisateur - Controller
function addUser($firstname, $name, $birthday, $email, $password) {
    $data = noTwinEmail($email); 
    if ($data['email'] == true) {
        throw new Exception('Email déjà utilisée');
    } else {
        $users = createUser($firstname, $name, $birthday, $email, $password);
        if ($users === false) {
            throw new Exception("Erreur lors de l'insertion dans la BDD"); 
        } else {
            echo '<script>alert("Votre compte à bien été créer.")</script>';
            echo '<script>document.location.href=  "?page=home"</script>';
        }
    }
}

//Connexion d'un utilisateur - Controller
function loginUser($email, $password) {
    $user[0] = connectUser($email);
    if ($user[0] === null) {
        throw new Exception("Connexion Impossible.");
    } else {
        if (password_verify($password, $user[0]['password'])) {
            //Régénère la session
            //session_regenerate_id();
            //On ajoute les variables de sessions pour la connexion
            setcookie("prenom", $user[0]['firstname'], time() + (86400 * 30), "/");
            setcookie("nom", $user[0]['name'], time() + (86400 * 30), "/");
            setcookie("email", $user[0]['email'], time() + (86400 * 30), "/");
            setcookie("role", $user[0]['role'], time() + (86400 * 30), "/");
            setcookie("uid", $user[0]['id'], time() + (86400 * 30), "/");
            setcookie("isloggedin", $_COOKIE['PHPSESSID'], time() + (86400 * 30), "/");
            header('Location: ?page=courses');
        } 
    }
}

//Ajouter un cours - Controller
function addCourse($id_user, $content, $title, $subject, $semester, $file_src, $professor, $date) {
    insertCourse($id_user, $content, $title, $subject, $semester, $file_src, $professor, $date);
}
//Supprimer un cours - Controller
function deleteCourse($id) {
    $course_file = dropFileCourse($id);
    if ($course_file === null) {
        throw new Exception("Aucun fichier trouvé.");
    } else {
        $course_file = "uploads/".$course_file['semester']."/".$course_file['subject']."/".$course_file['file_src']."";
        @unlink($course_file);
        dropCourse($id);
        header('Location: ?page=courses');
    }
}
//Déconnexion
function sessionDestroy() {
    setcookie(session_name(),'',0,'/');
    setcookie("role", null, time() - 3600, "/");
    setcookie("email", null, time() - 3600, "/");
    setcookie("isloggedin", null, time() - 3600, "/");
    setcookie("uid", null, time() - 3600, "/");
    session_regenerate_id(true);
    session_unset();
    session_destroy();
    session_write_close();
    header('Location: ?page=home');
}