<?php
    // Connexion à la base de données
    function dbConnect() {
        $srv = "localhost";
        $dbname = "licence21";
        $user = 'root';
        $password = '';
        $db = new PDO('mysql:host='.$srv.';dbname='.$dbname.';charset=utf8', $user, $password);
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $db;
    }
    //Ajouter un nouveau cours -- MODEL
    function insertCourse($id_user, $content, $title, $subject, $semester, $professor, $file_src, $date) {
        $db = dbConnect();
        $course = $db->prepare("INSERT INTO course VALUES (id, :id_user, :content, :title, :subject, :semester, :professor, :file_src, :date)");
        $course->bindParam(':id_user', $id_user);
        $course->bindParam(':content', $content);
        $course->bindParam(':title', $title);
        $course->bindParam(':subject', $subject);
        $course->bindParam(':semester', $semester);
        $course->bindParam(':professor', $professor);
        $course->bindParam(':file_src', $file_src);
        $course->bindParam(':date', $date);
        $course->execute();
    }

    //Ajouter un cours - Controller
    function addCourse($id_user, $content, $title, $subject, $semester, $professor, $file_src, $date) {
        insertCourse($id_user, $content, $title, $subject, $semester, $professor, $file_src, $date);
    }

    $fileName = $_FILES["file"]["name"]; 
    $fileTmpLoc = $_FILES["file"]["tmp_name"]; 
    $fileType = $_FILES["file"]["type"];
    $fileSize = $_FILES["file"]["size"];
    $fileErrorMsg = $_FILES["file"]["error"];
    $fileExtension = pathinfo($fileName, PATHINFO_EXTENSION);
    $semester = $_POST['semester'];
    $subject = $_POST['subject'];
    $extensions_autorisees = array('jpg', 'JPG', 'jpeg', 'JPEG', 'png', 'webp', 'PNG', 'pdf', 'PDF', 'TXT', 'txt');
    if ($fileTmpLoc) {
        if ($fileSize <= 50000000) {
            if ($fileExtension == "PDF" || $fileExtension == "pdf") {
                if(move_uploaded_file($fileTmpLoc, "../uploads/$semester/$subject/$fileName")){
                    addCourse($_COOKIE['uid'], $_POST['content'], $_POST['title'], $_POST['subject'], $_POST['semester'], $_POST['professor'], $fileName, date('Y-m-d'));
                } else {
                    echo "&#9888 Erreur de déplacement";
                    return http_response_code(406);
                }
            } else {
                echo "&#9888 Erreur de format";
                return http_response_code(406);
            }
        } else {
            echo "&#9888 Erreur de taille";
            return http_response_code(406);
        }
    } else {
        echo "&#9888 Pas de fichier";
        return http_response_code(406);
    }
?>