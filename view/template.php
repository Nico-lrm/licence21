<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title><?= $title ?> - Licence21</title>
        <link rel="stylesheet" href="public/css/stand/style.css">
        <link rel="stylesheet" href="public/css/media/style.css">
        <link rel="stylesheet" href="public/css/stand/navbar.css">
        <link rel="stylesheet" href="public/css/media/navbar.css">
        <link rel="shortcut icon" href="public/img/icons/favicon.gif" type="image/x-icon">
        <link rel="stylesheet" href="public/css/stand/<?= $stylesheet ?>.css">
        <link rel="stylesheet" href="public/css/media/<?= $stylesheet2 ?>.css">
    </head>
    <body>
        <header id="menu">
            <nav>
                <a href="?page=home" id="brand">Licence21</a>
                <span onclick="toggleNavigation()" id="toggle-navigation">
                    <img id="menu-icon" class="active" src="public/img/icons/menu.svg" alt=""> 
                    <img id="cross" src="public/img/icons/x.svg" class="" alt=""> 
                </span>
                <ul>
                    <li>
                        <a href="?page=home">
                            Accueil
                        </a>
                    </li>
                    <li>
                        <a href="?page=courses">
                            Cours
                        </a>
                    </li>

                    <?php if (isset($_COOKIE['uid']) && (isset($_COOKIE['role']) && $_COOKIE['role'] == 'admin' || $_COOKIE['role'] == 'user')):?>
                        <li>
                            <a href="?page=addcourse">
                                Ajouter un fichier
                            </a>
                        </li>
                        <li>
                            <a href="?page=contact">
                                Contact
                            </a>
                        </li>
                        <li style="margin-right: 0; padding-right: 0">
                            <a style="margin-right: 0; padding-right: 0" href="?page=logout">
                                Déconnexion
                            </a>
                        </li>
                    
                    <?php else: ?>
                        <li>
                            <a href="?page=signin" class="loginButton">
                                Connexion
                            </a>
                        </li>
                    <?php endif ?>
                </ul>
            </nav>
        </header>
        <main id="main">
            <div id="overlay" class="overlay">
                <ul>
                    <li>
                        <a href="?page=home">
                            Accueil
                        </a>
                    </li>
                    <li>
                        <a href="?page=courses">
                            Cours
                        </a>
                    </li>
                    <?php if (isset($_COOKIE['uid']) && (isset($_COOKIE['role']) && $_COOKIE['role'] == 'admin' || $_COOKIE['role'] == 'user')):?>
                        <li>
                            <a href="?page=addcourse">
                                Ajouter un fichier
                            </a>
                        </li>
                        <li>
                            <a href="?page=contact">
                                Contact
                            </a>
                        </li>
                        <li>
                            <a href="?page=logout">
                                Déconnexion
                            </a>
                        </li>
                    <?php else: ?>
                        <li>
                            <a class="loginButton" href="?page=signin">
                                Connexion
                            </a>
                        </li>
                    <?php endif ?>
                </ul>
            </div>
            <?= $content ?>
        </main>
        <footer>
            <a href="?page=tcu">CGU</a>
            <!--<span>- Design par </span><a href="https://www.instagram.com/elisarrat/" target="_blank">@elisarrat</a>-->
            <span>- Copyright &copy; 2021</span>
        </footer>
        <script src="public/js/script.js"></script>
        <?= $script ?>
    </body>
</html>