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
    //Récupérer les informations
    $page = $_POST['page'];
    $semester = $_POST['semester'];
    $subject = $_POST['subject'];
    $content = $_POST['content'];
    //Afficher les cours 10 par 10
    $db = dbConnect();
    $per_page = 12;
    if (isset($page)) {
        $page = $page;
    } else {
        $page = 1;
    }
    $page_start =  ($page - 1) * $per_page;
    if ($semester == 'null') {
        if ($content == 'null') {
            if ($subject == 'null') {
                $courses = $db->prepare("SELECT course.*, user.name user_name, user.id id_user, user.firstname user_firstname FROM course INNER JOIN user ON course.id_user = user.id ORDER BY course.id DESC LIMIT $page_start, $per_page");
            } else {
                $courses = $db->prepare("SELECT course.*, user.name user_name, user.id id_user, user.firstname user_firstname FROM course INNER JOIN user ON course.id_user = user.id WHERE subject = :subject ORDER BY course.id DESC LIMIT $page_start, $per_page");
                $courses->bindParam(':subject', $subject);
            }
        } else {
            if ($subject == 'null') {
                $courses = $db->prepare("SELECT course.*, user.name user_name, user.id id_user, user.firstname user_firstname FROM course INNER JOIN user ON course.id_user = user.id WHERE content = :content ORDER BY course.id DESC LIMIT $page_start, $per_page");
                $courses->bindParam(':content', $content);
            } else {
                $courses = $db->prepare("SELECT  course.*, user.name user_name, user.id id_user, user.firstname user_firstname FROM course INNER JOIN user ON course.id_user = user.id WHERE subject = :subject AND content = :content ORDER BY course.id DESC LIMIT $page_start, $per_page");
                $courses->bindParam(':subject', $subject);
                $courses->bindParam(':content', $content);
            }
        }
    } else {
        if ($content == 'null') {
            if ($subject == 'null') {
                $courses = $db->prepare("SELECT  course.*, user.name user_name, user.id id_user, user.firstname user_firstname FROM course INNER JOIN user ON course.id_user = user.id WHERE semester = :semester ORDER BY course.id DESC LIMIT $page_start, $per_page");
                $courses->bindParam(':semester', $semester);
            } else {
                $courses = $db->prepare("SELECT  course.*, user.name user_name, user.id id_user, user.firstname user_firstname FROM course INNER JOIN user ON course.id_user = user.id WHERE semester = :semester AND subject = :subject ORDER BY course.id DESC LIMIT $page_start, $per_page");
                $courses->bindParam(':subject', $subject);
                $courses->bindParam(':semester', $semester);
            }
        } else {
            if ($subject == 'null') {
                $courses = $db->prepare("SELECT  course.*, user.name user_name, user.id id_user, user.firstname user_firstname FROM course INNER JOIN user ON course.id_user = user.id WHERE semester = :semester AND content = :content ORDER BY course.id DESC LIMIT $page_start, $per_page");
                $courses->bindParam(':content', $content);
                $courses->bindParam(':semester', $semester);
            } else {
                $courses = $db->prepare("SELECT  course.*, user.name user_name, user.id id_user, user.firstname user_firstname FROM course INNER JOIN user ON course.id_user = user.id WHERE semester = :semester AND subject = :subject AND content = :content ORDER BY course.id DESC LIMIT $page_start, $per_page");
                $courses->bindParam(':subject', $subject);
                $courses->bindParam(':content', $content);
                $courses->bindParam(':semester', $semester);
            }
        }
    }
    $courses->execute();
?>
<?php if (isset($_POST['page'])): ?>
    <?php if ($courses->rowCount() > 0): ?>
        <?php foreach ($courses as $course): ?>
            <div class="card">
                <div class="card-body">
                    <h3><?= $course['subject'] ?></h3>
                    <h5 class="title"><?= $course['title'] ?></h5>
                    <span class="">Section :</span>&nbsp;<span class="card-data"><?= $course['content']?></span><br>
                    <span class="">Semestre :</span>&nbsp;<span class="card-data"><?= $course['semester']?></span><br>
                    <span class="">Professeur :</span>&nbsp;<span class="card-data"><?= $course['professor']?></span><br>
                    <span class="">Déposé par :</span>&nbsp;<span class="card-data"><?= $course['user_firstname']?>&nbsp;<span class="text-format-upper"><?= $course['user_name']?></span></span><br>
                    <span class="">Le : </span>&nbsp;<span class="card-data"><?= date("d/m/Y", strtotime($course['created_at']))?></span><br>
                    <a href="?page=courses&id=<?= $course['id'] ?>" class="loginButton" style="margin-top:1rem">Voir le fichier</a><br>
                    <?php if (isset($_COOKIE['isloggedin']) && (isset($_COOKIE['role']) && $_COOKIE['role'] == 'admin')):?>
                        <a href="?page=deletecourse&id=<?= $course['id'] ?>" onclick="return confirmDelete()" class="loginButton">Supprimer le fichier</a>
                    <?php endif ?>
                </div>
            </div>
        <?php endforeach ?>
    <?php endif ?>
<?php endif ?>