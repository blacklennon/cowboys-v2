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
            <textarea name="manifest" cols="50" rows="40">
            </textarea>
            <br>

            <input type="submit" name="submit" value="Envoyer manifeste">
        </form>

        <form action="" method="post" enctype="multipart/form-data">
            <label for="contact">Texte Contact :</label>
            <textarea name="contact" cols="100" rows="40">
            <table>
                <tr>
                    <th></th>
                    <th class="contact-type">Nicolas Tzipine<br /><em>Producteur</em></th>
                </tr>
                <tr>
                    <td class="pre-text">Tel.</td>
                    <td>00 00 00 00 00</td>
                </tr>
                <tr>
                    <td class="contact-mail pretext">Mail.</td>
                    <td class="contact-mail">nicolastzipine@cowboysfilms.com</td>
                </tr>
                <tr>
                    <td class="pre-text">Add.</td>
                    <td>0, rue Emile Allez<br />00000 Paris</td>
                </tr>
            </table>
            <table>
                <tr>
                    <th></th>
                    <th class="contact-type">Nicolas Tzipine<br /><em>Producteur</em></th>
                </tr>
                <tr>
                    <td class="pre-text">Tel.</td>
                    <td>00 00 00 00 00</td>
                </tr>
                <tr>
                    <td class="contact-mail pretext">Mail.</td>
                    <td class="contact-mail">nicolastzipine@cowboysfilms.com</td>
                </tr>
                <tr>
                    <td class="pre-text">RS.</td>
                    <td><table>
                        <tr>
                            <td><a href="//instagram.com">Instagram</a></td>
                            <td><a href="//twitter.com">Twitter</a></td>
                        </tr>
                        <tr>
                            <td><a href="//facebook.com">Facebook</a></td>
                            <td><a href="//pinterest.com">Pinterest</a></td>
                        </tr>
                    </table></td>
                </tr>
            </table>
            </textarea>
            <br>

            <input type="submit" name="submit" value="Envoyer contact">
        </form>
    </body>
</html>