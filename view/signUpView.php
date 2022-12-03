<?php $title = 'Créer un utilisateur' ?>
<?php $stylesheet = 'signup' ?>
<?php $stylesheet2 = 'signup' ?>
<?php $script = '<script src="public/js/signup.js"></script>' ?>
<?php ob_start(); ?>
<div class="content content-2 card">
    <div id="content-img">
        <img src="public/img/background/example_course.png" alt="">
    </div>
    <div>
        <h3 class="title">Créer votre propre compte !</h3>
        <p><i>Le mot de passe doit faire au moins 8 caractères.</i></p>
        <form action="?page=signupdone" id="form" method="post">
            <div class="form-group">
                <div>
                    <label for="#firstname" class="form-label">Prénom:</label>
                    <input type="text" class="form-input" name="firstname" id="firstname" required>
                    <div class="err" id="errFirstname"></div>
                </div>
                <div>
                    <label for="#name" class="form-label">Nom:</label>
                    <input type="text" class="form-input" name="name" id="name" required>
                    <div class="err" id="errName"></div>
                </div>      
            </div>
            <div class="form-group">
                <label for="#birthday" class="form-label">Date de naissance:</label>
                <input type="date" class="form-date" name="birthday" id="birthday">
                <div class="err" id="errBirthday"></div>
            </div>
            <div class="form-group">
                <label for="#email" class="form-label">Adresse e-mail:</label>
                <input type="email" class="form-input" name="email" id="email" required>
                <div class="err" id="errEmail"></div>
            </div>
            <div class="form-group">
                <label for="#password" class="form-label">Mot de passe:</label>
                <input type="password" class="form-input" name="password" id="password" required>
                <div class="err" id="errPassword"></div>
            </div>
            <div class="form-group">
                <label for="#confirm-password" class="form-label">Retaper le mot de passe:</label>
                <input type="password" class="form-input" name="confirm-password" id="confirm-password" required>
                <div class="err" id="errConfirmPassword"></div>
            </div>
            <div class="form-group">
                <input type="checkbox" id="tcu" name="tcu" value='hasReadTcu' required>
                <label for="tcu">Je reconnais avoir lu et compris les <a target="_blank" href="https://licence21.nicolaslormier.fr/?page=tcu">CGU</a> et je les accepte.</label>
            </div>
            <div class="form-group">
                <input class="btn btn-block" type="submit" value="Créer son compte">
            </div>
            <div class="form-group">
                <a href="?page=signin">Déjà un compte ? Connectez vous !</a>
            </div>
        </form>
    </div>
</div>
<?php $content = ob_get_clean(); ?>
<?php require('template.php'); ?>