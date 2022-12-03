<?php $title = 'Accueil' ?>
<?php $stylesheet = 'home' ?>
<?php $stylesheet2 = 'home' ?>
<?php $script = '' ?>
<?php ob_start(); ?>
    <div class="container home-container">
        <div class="content content-2">
            <div class="home-content">
                <h2>L'accès à vos cours en illimité.</h2>
                <p>
                	Le site de partage de prises de notes est de retour !<br>Il revient également avec plusieurs améliorations :
                	<ul>
                		<li>Ajout d'une barre de chargement pour l'envoi des fichiers sur le site.</li>
                		<li>Ajout de la connexion automatique grâce au bouton "Se souvenir </li>
                </p>
                <?php if(!isset($_COOKIE['uid'])): ?>
                    <div id="home-connect">
                        <a class="loginButton" href="?page=signin">Se connecter</a>
                    </div>
                <?php endif ?>
            </div>
            <div class="home-img">
                <img src="public/img/test_2.png" alt="">
            </div>
        </div>
    </div>
<?php $content = ob_get_clean(); ?>
<?php require('template.php'); ?>
