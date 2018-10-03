<?php
require "../functions.php";

// print_r($_POST);
// print_r($_FILES);

if (!empty($_POST)) {
    switch ($_POST['submit']) {
        case 'Envoyer':
            if (empty($_POST['project'])) {
                echo 'Project empty';
            } else if (empty($_POST['project-title'])) {
                echo 'Title empty';
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
        <br>
        <h2>Créer un projet</h2>
        <form action="" method="post" enctype="multipart/form-data">
            <label for="project">Nom du dossier du projet :</label>
            <input type="text" name="project" placeholder="Mettez un chiffre au début du nom pour définir l'ordre des projets" style="width: 350px;"/>
            <br>
            <label for="project-title">Nom du projet :</label>
            <input type="text" name="project-title" value="" />
            <h4>Upload vidéo</h4>
            <label for="video">Code de la vidéo Vimeo :</label>
            <input type="text" name="video" />
            <br>
            <label for="video-nb">Numéro de la miniature :</label>
            <input type="text" name="video-nb" placeholder="Attention, la miniature doit être au format PNG" style="width: 250px;"/>
            <h4>Upload photo</h4>
            <label for="media1" id="mediaLabel">Media1</label>
            <input type="file"
                id="media1" name="media[]"
                accept="image/*" />
            <br>
            <button type="button" onClick="addMediaInput()">+</button>
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