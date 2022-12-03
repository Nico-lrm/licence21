<?php $title = 'Erreur' ?>
<?php $stylesheet = 'error' ?>
<?php $stylesheet2 = 'error' ?>
<?php $script = '' ?>
<?php ob_start(); ?>
    <p>
        <img src="public/img/icons/warning.svg" alt="">
        <span>Erreur :</span>&nbsp;<?= $e->getMessage() ?>
    </p>
    <button class="loginButton" onclick="history.back()">Précédent</button>
<?php $content = ob_get_clean(); ?>
<?php require('template.php'); ?>
