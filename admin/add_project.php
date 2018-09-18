<?php

require "db.php";

if (isset($_POST['submit'])) {
    try {
        $connection = new PDO($dsn, $username, $password, $options);

        $new_project = array(
            "name" => $_POST['name'],
            "da" => $_POST['da'],
            "date" => $_POST['date'],
            "team" => $_POST['team']
        );

        $sql = sprintf(
            "INSERT INTO %s (%s) values (%s)",
            "v2_projects",
            implode(", ", array_keys($new_project)),
            ":" . implode(", :", array_keys($new_project))
        );

        $statement = $connection->prepare($sql);
        $statement->execute($new_project);
    } catch(PDOException $error) {
        echo $error->getMessage();
    }
}

?>

<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="utf-8">
        <title></title>
    </head>
    <body>
        <form action="add_project.php" method="post">
            <label for="name">Nom du projet:</label>
            <input type="text" name="name" value="" />

            <label for="da">Direction artistique:</label>
            <input type="text" name="da" value="" />

            <label for="date">Date du projet:</label>
            <input type="date" name="date" value="">

            <label for="team">Equipe:</label>
            <input type="text" name="team" value="" />

            <input type="submit" name="submit" value="Envoyer">
        </form>
    </body>
</html>
