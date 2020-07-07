<?php session_start(); ?>

<html lang="fr">

<head>
    <meta charset="utf-8">
    <title>mini-site-routing</title>

</head>

<body>
    <header>
        <nav id="Menu">
            <ul>
                <li><a href="mini-site-routing.php?page=1">Accueil</a></li>
                <li><a href="mini-site-routing.php?page=2">Page 2</a></li>
                <li><a href="mini-site-routing.php?page=3">Page 3</a></li>
                <li><a href="mini-site-routing.php?page=connexion">Connexion</a></li>

            </ul>
        </nav>
    </header>

    <?php
    if (isset($_GET['page'])) {
        if ($_GET['page'] == 1) {
            echo "<h1>Accueil</h1>";
        } elseif ($_GET['page'] == 2) {
            echo "<h1>Page 2</h1>";
        } elseif ($_GET['page'] == 3) {
            echo "<h1>Page 3</h1>";
        } elseif ($_GET['page'] == 'connexion') {
            include('connexion.php');
        } elseif ($_GET['page'] == 'admin') {
            include('admin.php');
        }
    }

    if ($_GET['page'] != 'connexion' && (isset($_SESSION['id']) || isset($_COOKIE['id']))) {
        echo "<p> Login : " . $_SESSION['id'] . "</p>";
    } elseif (isset($_GET['page']) && $_GET['page'] != 'connexion') {
        header('location: mini-site-routing.php?page=connexion');
    } ?>

    <img src=<?php echo $_SESSION["image"]; ?> ?>

</body>

</html>