<?php
// Connexion à la base de données
function dbConnect() {
    $srv = "nicolaslvs241197.mysql.db";
    $dbname = "nicolaslvs241197";
    $user = 'nicolaslvs241197';
    $password = 'LeGigaflare2411';
    $db = new PDO('mysql:host='.$srv.';dbname='.$dbname.';charset=utf8', $user, $password);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    return $db;
}
// Créer l'utilisateur dans la BDD
function createUser($firstname, $name, $birthday, $email, $password) {
    $password = password_hash($password, PASSWORD_DEFAULT);
    $db = dbConnect();
    $users = $db->prepare('INSERT INTO user(firstname, name, birthday, email, password, role) VALUES(:firstname, :name, :birthday, :email, :password, "user")');
    $users->bindParam(':firstname', $firstname);
    $users->bindParam(':name', $name);
    $users->bindParam(':birthday', $birthday);
    $users->bindParam(':email', $email);
    $users->bindParam(':password', $password);
    $users->execute();
}
//Fonction pour éviter les doublons de compte
function noTwinEmail($email) {
    $db = dbConnect();
    $users = $db->prepare('SELECT EXISTS(SELECT email FROM user WHERE email = :email) AS email');
    $users->bindParam(':email', $email);
    $users->execute();
    $user = $users->fetchAll(PDO::FETCH_ASSOC);
    return $user[0];
}
// Vérifier que l'utilisateur existe bien
function connectUser($email) {
    $db = dbConnect();
    $users = $db->prepare('SELECT * FROM user WHERE email = :email');
    $users->bindParam(':email', $email);
    $users->execute();
    if ($users ->rowCount() > 0) {
        $user = $users->fetchAll(PDO::FETCH_ASSOC);
        return $user[0];
    } else {
        throw new Exception('Pas d\'utilisateur trouvé.');
    }
}
//Ajouter un nouveau cours
function insertCourse($id_user, $content, $title, $subject, $semester, $file_src, $date) {
    $db = dbConnect();
    $course = $db->prepare("INSERT INTO course VALUES (id, :id_user, :content, :title, :subject, :semester, :file_src, :date)");
    $course->bindParam(':id_user', $id_user);
    $course->bindParam(':content', $content);
    $course->bindParam(':title', $title);
    $course->bindParam(':subject', $subject);
    $course->bindParam(':semester', $semester);
    $course->bindParam(':file_src', $file_src);
    $course->bindParam(':date', $date);
    $course->execute();
}
// Trouver et supprimer le fichier du cours
function dropFileCourse($id) {
    $db = dbConnect();
    $course = $db->prepare("SELECT * FROM course WHERE id = :id");
    $course->bindParam(':id', $id);
    $course->execute();
    if ($course ->rowCount() > 0) {
        $course = $course->fetchAll(PDO::FETCH_ASSOC);
        return $course[0];
    } else {
        throw new Exception("Le fichier n'a pas été trouvé.");
    }
}
//Supprimer le cours de la BDD
function dropCourse($id) {
    $db = dbConnect();
    $course = $db->prepare("DELETE FROM course WHERE id = :id");
    $course->bindParam(':id', $id);
    $course->execute();
}