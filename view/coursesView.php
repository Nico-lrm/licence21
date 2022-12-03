<?php $title = 'Cours' ?>
<?php $stylesheet = 'courses' ?>
<?php $stylesheet2 = 'courses' ?>
<?php $script = '<script src="public/js/course.js"></script>' ?>
<?php ob_start(); ?>
    <div id="card-search" class="card-search">
        <form id="form" method="POST">
            <div class="form-group">
                <label for="#table" class="form-label">Section:</label>
                <select class="form-select" name="content" id="content" required style="max-width: 500px;">
                    <option value="null" default>-- Sélectionner une valeur --</option>
                    <option value="Cours Magistraux">Cours Magistraux</option>
                    <option value="Travaux Dirigés">Travaux dirigés</option>
                    <option value="Licence Accès Santé">Licence Accès Santé</option>
                    <option value="Révisions">Révisions</option>
                    <option value="Travaux Pratiques">Travaux Pratiques</option>
                </select>
            </div>
            <div class="form-group">
                <label for="#semester" class="form-label">Semestre:</label>
                <select class="form-select" name="semester" id="semester" style="max-width: 500px;">
                    <option value="null" default>-- Sélectionner une valeur --</option>
                    <option value="Semestre 1">Semestre 1</option>
                    <option value="Semestre 2">Semestre 2</option>
                </select>
            </div>
            <div class="form-group">
                <label for="#subject" class="form-label">Unité d'enseignement:</label>
                <select class="form-select" name="subject" id="subject" style="max-width: 500px;" required>
                    <option value="null" default>-- Sélectionner une valeur --</option>
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
                    <optgroup label="Licence Accès Santé - Semestre 1">
                        <option value="Anatomie">Anatomie</option>
                        <option value="Biologie Cellulaire">Biologie Cellulaire</option>
                        <option value="Histologie">Histologie</option>
                        <option value="Métier et Santé">Métier et Santé</option>
                        <option value="Droit">Droit</option>   
                    </optgroup>
                        <optgroup label="Licence Accès Santé - Semestre 2">
                        <option value="Pharmacologie">Pharmacologie</option>
                        <option value="Maïeutique">Maïeutique</option>
                        <option value="Dentaire">Dentaire</option>
                        <option value="Biophysique">Biophysique</option>
                        <option value="Biochimie">Biochimie</option>
                        <option value="Monde Végétal">Monde Végétal</option>
                        <option value="Embryologie">Embryologie</option>
                    </optgroup>
                </select>
            </div>
            <div class="form-group">
                <input type="button" class="loginButton" onclick="resetSearch()" value="Réinitialiser">
            </div>
        </form>
    </div>
    <div class="content content-4" id="main-content"><!-- Contenu chargé via AJAX --></div>
<?php $content = ob_get_clean(); ?>
<?php require('template.php'); ?>
