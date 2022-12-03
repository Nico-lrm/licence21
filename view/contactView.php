<?php $title = 'Contact' ?>
<?php $stylesheet = 'contact' ?>
<?php $stylesheet2 = 'contact' ?>
<?php $script = '<script src="public/js/contact.js"></script>' ?>
<?php ob_start(); ?>
    <div class="content content-2">
        <div>
            <h3 class="title">Formulaire de contact</h3>
            <p>Ceci est le formulaire de contact lié au site TD21.</p>
            <p>Veuillez l'utiliser afin de reporter un bug ou demander une modification sur un fichier avec la syntaxe suivante :
                <ul>
                    <li>Objet: <i><b>Bug / Modification</b> : Bug rencontré / Titre du fichier à modifié</i>.</li>
                    <li>Message: <i>Votre message (en évitant tout caractères non utilisable dans un texte)</i>.</li>
                </ul>
            </p>
            <p>Ne vous inquiétez pas, il ne manque pas de champ pour votre adresse de contact, celle-ci se récupère par le biais de la connexion.</p>
        </div>
        <div>
            <h3 class="title">Envoyez un message</h3>
            <div class="err err-block" id="errContact"></div>
            <form id="form" name="form" method="post">
                <div class="form-group">
                    <label for="#subject" class="form-label">Objet</label>
                    <input type="text" class="form-input" name="subject" id="subject" required>
                    <div class="err" id="errSubject"></div>
                </div>
                <div class="form-group">
                    <label class="form-label" for="body">Message</label>
                    <textarea name="body" class="form-input" id="body" cols="30" rows="12" required></textarea>
                    <div class="err" id="errBody"></div>
                </div>
                <div class="form-group">
                    <input type="text" class="form-input" name="subname" id="subname" value="">
                </div>
                <div class="form-group">
                    <input class="loginButton" type="submit" id="btnSubmit" value="Envoyez le message">
                </div>
            </form>
        </div>
    </div>
<?php $content = ob_get_clean(); ?>
<?php require('template.php'); ?>