<?php $title = 'Ajouter un cours' ?>
<?php $stylesheet = 'addcourse' ?>
<?php $stylesheet2 = 'addcourse' ?>
<?php $script = '<script src="public/js/addcourse.js"></script>' ?>
<?php ob_start(); ?>
    <div class="content content-2">
        <form enctype="multipart/form-data" method="POST">
            <h3 class="title">Ajouter un cours sur le site.</h3>
            <div class="form-2">
                <div class="form-group">
                    <label for="#title" class="form-label">Titre:</label>
                    <input type="text" class="form-input" name="title" id="title" required>
                    <div class="err" id="errTitle"></div>
                </div>
                <div class="form-group">
                    <label for="#professor" class="form-label">Professeur :</label>
                    <input type="text" class="form-input" name="professor" id="professor" required>
                    <div class="err" id="errProf"></div>
                </div>
            </div>

            <div class="form-2">
                <div class="form-group">
                    <label for="#content" class="form-label">Section:</label>
                    <select class="form-select" name="content" id="content" required>
                        <option value="" default>-- Sélectionner une valeur --</option>
                        <option value="Cours Magistraux">Cours Magistraux</option>
                        <option value="Travaux Dirigés">Travaux dirigés</option>
                        <option value="Licence Accès Santé">Licence Accès Santé</option>
                        <option value="Révisions">Révisions</option>
                        <option value="Travaux Pratiques">Travaux Pratiques</option>
                    </select>
                    <div class="err" id="errContent"></div>
                </div>
                <div class="form-group">
                    <label for="#semester" class="form-label">Semestre:</label>
                    <select class="form-select" name="semester" id="semester" required>
                        <option value="" default>-- Sélectionner une valeur --</option>
                        <option value="Semestre 1">Semestre 1</option>
                        <option value="Semestre 2">Semestre 2</option>
                    </select>
                    <div class="err" id="errSemester"></div>
                </div>
            </div>
            <div class="form-group">
                <label for="#subject" class="form-label">Unité d'enseignement:</label>
                <select class="form-select" name="subject" id="subject" required>
                    <option value="" default>-- Sélectionner une valeur --</option>
                    <optgroup label="Général - Semestre 1">
                        <option value="Circuit Electrique">Circuit Electrique</option>
                        <option value="Base de Programmation">Base de Programmation</option>
                        <option value="Physique du Mouvement">Physique du Mouvement</option>
                        <option value="Internet et Web">Internet et Web</option>
                        <option value="Méthodes et Techniques de Calcul">Méthodes et Techniques de Calcul</option>
                    </optgroup>
                    <optgroup label="Général - Semestre 2">
                        <option value="Algorithmique et Programmation">Algorithmique et Programmation</option>
                        <option value="Architecture Ordinateur Représentation Information">Architecture Ordinateur Représentation Information</option>
                        <option value="Electricité Industrielle">Electricité Industrielle</option>
                        <option value="Eléments de Logique Formelle et du Raisonnement Mathématique">Eléments de Logique Formelle et du Raisonnement Mathématique</option>
                        <option value="Initiation Aux Bases De Données">Initiation aux Bases de Données</option>
                        <option value="Probabilité Statistique">Probabilité Statistique</option>
                        <option value="Scilab Mathlab">Scilab Mathlab</option>
                        <option value="Systèmes Numériques">Systèmes Numériques</option>
                    </optgroup>
                    <optgroup label="Licence Accès Santé">
                        <option value="Anatomie">Anatomie</option>
                        <option value="Biologie Cellulaire">Biologie Cellulaire</option>
                        <option value="Histologie">Histologie</option>
                        <option value="Métier et Santé">Métier et Santé</option>
                        <option value="Droit">Droit</option>
                        <option value="Pharmacologie">Pharmacologie</option>
                        <option value="Maïeutique">Maïeutique</option>
                        <option value="Dentaire">Dentaire</option>
                        <option value="Biophysique">Biophysique</option>
                        <option value="Biochimie">Biochimie</option>
                        <option value="Monde Végétal">Monde Végétal</option>
                        <option value="Embryologie">Embryologie</option>
                    </optgroup>
                </select>
                <div class="err" id="errSubject"></div>
            </div>
            <div class="form-group">
                <label class="form-label" for="#file">Fichier du cours</label>
                <input type="file" name="file" id="file" accept=".jpg, .jpeg, .JPG, .JPEG, .png, .PNG, .pdf, .PDF, .TXT, .txt, .webp" class="form-input custom-file-input" required>
                <p><i>Le fichier doit faire maximum 50Mo.</i></p>
                <progress id="progressBar" value="0" max="100" style="width:100%"></progress>
                <p id="status"></p>
            </div>
            <div class="form-group" id="send-form">
                <input class="loginButton" id="btnSubmit" type="button" onclick="uploadFile()" value="Ajouter un cours">
            </div>
        </form>
        <img src="public/img/img-4.png">
    </div>
<?php $content = ob_get_clean(); ?>
<?php require('template.php'); ?>