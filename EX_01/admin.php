<?php session_start(); ?>
<html>

<head>
    <title>Administration</title>
</head>

<body>
    <?php if (isset($_SESSION['id'])) ?>


    <form method="POST" enctype="multipart/form-data">
        <input type="file" name="upload_photo" /> <br />
        <input type="submit" name="submit" />
    </form>


    <?php

    if (isset($_POST['submit'])) {
        $maxSize = 2097152;
        $validExt = array(".jpg" => "image/jpg", ".jpeg" => "image/jpeg", ".png" => "image/png");
        $fileSize = $_FILES['photo']['size'];
        $filename = $_FILES['photo']['name'];
        $fileExt = "." . strtolower(substr(strrchr($_FILES['upload_photo']['name'], '.'), 1));
        $file_name_size = strlen($filename) - strlen($fileExt);

        if ($_FILES['upload_photo']['error'] > 0) {
            echo "Une erreur est survenue lors du transfert";
            die;
        }

        if ($fileSize > $maxSize) {
            echo "Le fichier est trop gros !";
            die;
        }

        if (!array_key_exists($fileExt, $validExt)) {
            echo "Le fichier n'est pas une image !";
            die;
        }
        if ($file_name_size <= 4) {
            echo "Le nom du fichier est trop court !";
        }
        move_uploaded_file($_FILES['photo']['tmp_name'], "C:\\SUMMERCODECAMP\\ISCC-2020\\J09\\EX_01" . $filename);
        $_SESSION['image'] = $filename;
        $_SESSION['titre'] = $_POST["titre"];
        $_SESSION['description'] = $_POST['description'];
    }
    if (isset($_SESSION['image'])) {
        echo "<img src=" . $_SESSION["image"] . ">";
        echo "<p>" . $_SESSION['titre'] . "</p>";
        echo "<p>" . $_SESSION['description'] . "</p>";
    }

    ?>