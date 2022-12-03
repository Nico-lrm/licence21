<?php
session_start();
require('controller/frontend.php');
require('controller/backend.php');
// Try - Catch pour la gestion des erreurs
try {
    // Récupérer la valeur de la variable page pour la gestion des erreurs
    if(isset($_GET['page'])) {
        switch($_GET['page']) {
            case 'home':
                getHome();
            break;
            case 'signin': 
                if (isset($_COOKIE['uid']) && (isset($_COOKIE['role']))) {
                    throw new Exception("Impossible de se connecter 2 fois.");
                } else {
                    getSignIn();
                }
            break;
            case 'signindone': 
                if (!empty($_POST['email']) && !empty($_POST['password'])) {
                    loginUser(filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL), $_POST['password']);
                } else {
                    throw new Exception("Tous les champs ne sont pas remplis.");
                }
            break;
            case 'signup':
                if (isset($_COOKIE['uid']) && (isset($_COOKIE['role']))) {
                    throw new Exception("Impossible de créer un compte une fois connecté.");
                } else {
                    throw new Exception("Indisponible pour le moment.");
                }
            break;
            case 'signupdone':
                if (!empty($_POST['firstname']) && !empty($_POST['name']) && !empty($_POST['birthday']) && !empty($_POST['email']) && !empty($_POST['password']) && !empty($_POST['confirm-password'])) {
                    if ($_POST['password'] == $_POST['confirm-password']) {
                        if (filter_var($_POST['email'], FILTER_VALIDATE_EMAIL) == $_POST['email']) {
                            addUser(htmlspecialchars($_POST['firstname']), htmlspecialchars($_POST['name']), $_POST['birthday'], $_POST['email'], $_POST['password']);
                        } else {
                            throw new Exception("L'un des champs est incorrect");
                        }
                    } else {
                        throw new Exception("Les mots de passes ne correspondent pas ou l'email n'est pas valide.");
                    }
                } else {
                    throw new Exception("Tous les champs ne sont pas remplis.");
                }
            break;
            case 'contact':
                if (isset($_COOKIE['uid']) && (isset($_COOKIE['role']))) {
                    getContact();
                } else {
                    header('Location: ?page=signin');
                }
            break;
            case 'courses':
                if (isset($_COOKIE['uid']) && (isset($_COOKIE['role']))) {
                    if (isset($_GET['id']) && $_GET['id'] > 0) {
                        listCourseUnique($_GET['id']);
                    } else {
                        listCourses();
                    }
                } else {
                    header('Location: ?page=signin');
                }
            break;
            case 'deletecourse': 
                if (isset($_COOKIE['uid']) && (isset($_COOKIE['role']) && $_COOKIE['role'] == 'admin')) {
                    if (isset($_GET['id'])) {
                        deleteCourse($_GET['id']);
                    } else {
                        throw new Exception("Impossible de supprimer le fichier.");
                    }
                } else {
                    throw new Exception('Veuillez vous connecter.');
                }
            break;
            case 'addcourse' :
                if (isset($_COOKIE['uid']) && (isset($_COOKIE['role']))) {
                    getAddCourse();
                } else {
                    throw new Exception('Veuillez vous connecter.');
                }
            break;
            case 'addcoursedone': 
                if (isset($_COOKIE['uid']) && (isset($_COOKIE['role']))) {
                    if (!empty($_POST['content']) && !empty($_POST['title']) && !empty($_POST['subject']) && !empty($_POST['professor']) && !empty($_POST['semester']) && isset($_FILES['file_pdf'])) {
                        if ($_POST['content'] != 'null' && $_POST['semester'] != 'null' && $_POST['subject'] != 'null') {
                            $file_pdf = $_FILES['file_pdf']['name'];
                            $semester = $_POST['semester'];
                            $subject = $_POST['subject'];
                            $professor = $_POST['professor'];
                            //Dossier pour les fichiers PDF
                            $target = "uploads/".$semester."/".$subject."/".basename($file_pdf);
                            $infosfichier = pathinfo($file_pdf);
                            //Vérifier la taille du fichier
                            if ($_FILES['file_pdf']['size']  <= 50000000) {
                                $extension_upload = $infosfichier['extension'];
                                $extensions_autorisees = array('jpg', 'JPG', 'jpeg', 'JPEG', 'png', 'webp', 'PNG', 'pdf', 'PDF', 'TXT', 'txt');
                                //Et son format
                                if (in_array($extension_upload, $extensions_autorisees)) {
                                    //Déplacer le fichier dans le dossier ciblé
                                    if (@move_uploaded_file($_FILES['file_pdf']['tmp_name'], $target)) {
                                        addCourse($_SESSION['id'], htmlspecialchars($_POST['content']), htmlspecialchars($_POST['title']), htmlspecialchars($_POST['subject']), htmlspecialchars($_POST['semester']), htmlspecialchars($_POST['professor']),  $file_pdf, date('Y-m-d'));
                                        header ('Location: ?page=courses');
                                    } else {
                                        throw new Exception("Impossible de déplacer le fichier, les champs ne sont peut-être pas compatibles.");
                                    }
                                } else {
                                    throw new Exception("Format de fichier non accepté.");
                                }
                            } else {
                                throw new Exception("Fichier trop volumineux.");
                            }
                        } else {
                            throw new Exception("L'un des champs n'est pas saisie.");
                        }
                    } else {
                        throw new Exception("Veuillez remplir tout les champs.");
                    }
                } else {
                    throw new Exception('Veuillez vous connecter.');
                }
            break;
            case 'logout': 
                sessionDestroy();
            break;
            case 'tcu':
                getTcu();
            break;
            default:
                throw new Exception("404: Page non trouvée.");
            break;
        }
    } else {
        getHome();
    }
} catch(Exception $e) {
    $e->getMessage();
    require('view/errorView.php');
}