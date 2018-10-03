<?php
require "../functions.php";

// print_r($_POST);
// print_r($_FILES);

if (!empty($_POST)) {
    switch ($_POST['submit']) {
        case 'Envoyer manifeste':
            if (empty($_POST['manifest'])) {
                echo 'Manifest empty';
            } else {
                create_manifest($_POST);
            }
            break;

        case 'Envoyer contact':
            if (empty($_POST['contact'])) {
                echo 'Contact empty';
            } else {
                create_contact($_POST);
            }
            break;

        default:
            echo 'Unknown Submit Type';
            break;
    }

}
?>

<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="utf-8">
        <title>Admin - CowbowFilms</title>
    </head>
    <body>
        <h3><a href="/admin">Modifier projets</a></h3>
        <form action="" method="post" enctype="multipart/form-data">
            <label for="manifest">Texte Manifeste :</label>
            <textarea name="manifest" cols="50" rows="40"><?php echo(file_get_contents(__DIR__."/../__MANIFEST.txt")); ?></textarea>
            <br>

            <input type="submit" name="submit" value="Envoyer manifeste">
        </form>

        <form action="" method="post" enctype="multipart/form-data">
            <label for="contact">Texte Contact :</label>
            <textarea name="contact" cols="100" rows="40"><?php echo(file_get_contents(__DIR__."/../__CONTACT.txt")); ?></textarea>
            <br>

            <input type="submit" name="submit" value="Envoyer contact">
        </form>
    </body>
</html>