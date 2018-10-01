<?php
require "../functions.php";

// print_r($_POST);
// print_r($_FILES);

if (!empty($_POST)) {
    switch ($_POST['submit']) {
        case 'Envoyer':
            if (empty($_POST['project'])) {
                echo 'Project empty';
            } else if (empty($_POST['description'])) {
                echo 'Description empty';
            } else if (empty($_FILES['media'])) {
                echo 'Media empty';
            } else {
                create_project($_POST, $_FILES);
            }
            break;

        case 'Supprimer':
            if (empty($_POST['project'])) {
                echo 'No Project Specified';
            } else {
                delete_project($_POST['project']);
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
        <h3><a href="/admin/contact.php">Modifier contact et manifeste</a></h3>
        <form action="" method="post" enctype="multipart/form-data">
            <label for="project">Nom du projet :</label>
            <input type="text" name="project" value="" />
            <br>
            <label for="description">Description :</label>
            <textarea name="description" cols="50" rows="50"><?php echo(file_get_contents("../__INDEX.txt")) ?></textarea>
            <br>
            <h4>Upload photo</h4>
            <label for="media1" id="mediaLabel">Media1</label>
            <input type="file"
                id="media1" name="media[]"
                accept="image/*" />
            <br>
            <button type="button" onClick="addMediaInput()">+</button>
            <h4>Vidéo :</h4>
            <p>Si une des images est une miniature de vidéo, indiquez le numéro du l'image ainsi que l'url de la vidéo.</p>
            <label for="link-video">URL de la vidéo :</label>
            <input type="text" name="link-video" />
            <br>
            <label for="num-video">Numéro de la miniature (format: 00 pour la première 01, 02, 03 etc...) :</label>
            <input type="text" name="num-video" />
            <br>
            <br>

            <input type="submit" name="submit" value="Envoyer">
        </form>

        <h2>Supprimer un projet</h2>

        <form action="" method="post">
            <select name="project">
                <?php
                foreach (get_project() as $key => $value) {
                    echo "<option value='$value'>$value</option>";
                }
                ?>
            </select>
            <input type="submit" name="submit" value="Supprimer">
        </form>

        <h2>Liste des projets</h2>

        <div>
            <?php
            foreach (get_project() as $key => $value) {
                echo '<br><br>';
                echo $value;
                echo '<br>';
                foreach (get_files($value) as $key => $value) {
                    echo "<li>$value</li>";
                }
                // print_r(get_files($value));
            }
            ?>
        </div>
    </body>
</html>

<script>
    index = 1

    function addMediaInput() {
        input = document.getElementById('media1').cloneNode()
        media = document.getElementById('media'+index)
        label = document.getElementById('mediaLabel').cloneNode()
        index++

        input.setAttribute('id', 'media'+index)
        label.setAttribute('id', 'mediaLabel'+index)
        label.innerText = "Media"+index

        media.after(document.createElement('br'), label, input)
    }
</script>