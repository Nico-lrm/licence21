<?php $title = 'Se connecter' ?>
<?php $stylesheet = 'signin' ?>
<?php $stylesheet2 = 'signin' ?>
<?php $script = '<script src="public/js/signin.js"></script>' ?>
<?php ob_start(); ?>

<div class="content content-2">
    <div id="content-img">
        <img src="public/img/test_1.png" alt="">
    </div>
    <div>
        <h3 class="title">Connexion</h3>
        <div class="err err-block" id="errPassword"></div>
        <form action="?page=signindone" id="form" name="form" method="post">
            <div class="form-group">
                <label for="#email" class="form-label">Adresse e-mail:</label>
                <input type="email" class="form-input" name="email" id="email" required>
                <div class="err" id="errEmail"></div>
            </div>
            <div class="form-group">
                <label for="#password" class="form-label">Mot de passe:</label>
                <input type="password" class="form-input" name="password" id="password" required>
                
            </div>
            <div class="form-group">
                <input class="loginButton" type="submit" id="btnSubmit" value="Se connecter">
            </div>
            <!--<div class="form-group">Mot de passe oublié ? (Oui eh bien c'est pas encore prêt)</div>-->
        </form>
    </div>
</div>

<?php $content = ob_get_clean(); ?>
<?php require('template.php'); ?>