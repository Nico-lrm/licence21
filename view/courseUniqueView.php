<?php $title = $course[0]['title'] ?>
<?php $stylesheet = 'courseunique' ?>
<?php $stylesheet2 = 'courseunique' ?>
<?php $script = '<script src="public/js/courseunique.js"></script>' ?>
<?php ob_start(); ?>
    <div class="content card">
        <div id="globalAccordion">
            <div id="accordion">
                <div style="display: grid; grid-template-columns: 98% 2%;">
                    <h3 id="titleCourse" class="text-format-upper"><?= $course[0]['subject'] ?></h3>
                    <span id="previous">&#10005;</span>
                </div>
                <h5 id="title" class="text-format-upper"><?= $course[0]['title'] ?></h5>
            </div>
            <div id="panel">
                <!--<img src="public/img/chatcoupé2.png" width="110" height="110">-->
                <span class="card-info">Section:</span>&nbsp;<span class="card-data" id="content"><?= $course[0]['content']?></span><br>
                <span class="card-info">Matière:</span>&nbsp;<span class="card-data" id="subject"><?= $course[0]['subject']?></span><br>
                <span class="card-info">Semestre:</span>&nbsp;<span class="card-data" id="semester"><?= $course[0]['semester']?></span><br>
                <span class="card-info">Professeur:</span>&nbsp;<span class="card-data" id="professor"><?= $course[0]['professor']?></span><br>
                <span class="card-info">Déposé par:</span>&nbsp;<span class="card-data"><span id="firstname"><?=  $course[0]['userfirstname']?></span>&nbsp;<span class="text-format-upper" id="name"><?= $course[0]['username']?></span></span><br>
                <span class="card-info">Le:</span>&nbsp;<span class="card-data" id="date"><?= date("d/m/Y", strtotime($course[0]['created_at']))?></span>
            </div>
        </div>
        <div>
            <iframe id="file" src="uploads/<?=  $course[0]['semester']?>/<?=$course[0]['subject']?>/<?= $course[0]['file_src'] ?>" width="100%" align="middle"></iframe>
            <p><i>Pour télécharger le fichier, utilisez l'aperçu du PDF</i></p>
        </div>
    </div>
<?php $content = ob_get_clean(); ?>
<?php require('template.php'); ?>

