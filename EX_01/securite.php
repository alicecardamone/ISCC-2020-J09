<html>

<head>
    <meta charset="UTF-8">
</head>

<body>
    <?php
    session_start();
    if ((isset($_POST['password'])) && ($_POST['password'] == 2020) && (isset($_POST['login']))) {
        $_SESSION['id'] = $_POST['login'];
        setcookie('id', $_POST['login']);
        header('location: mini-site-routing.php?page=admin');
    } else {
        echo "<p>Mauvais couple identifiant / mot de passe.</p>"
            . "<a href='mini-site-routing.php?page=connexion'>Connexion</a>";
    } ?>