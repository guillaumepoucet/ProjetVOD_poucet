<?php
session_start();
header('Content-type: text/html; charset=utf-8');
require_once 'styleswitcher.php';
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - Insérer un film</title>

    <link rel="stylesheet" href="css/reset.css">

    <link rel="stylesheet" media="screen, projection" type="text/css" id="css" href="<?php echo $url; ?>" />

    <!--GOOGLE FONTS-->

    <link
        href="https://fonts.googleapis.com/css?family=Baloo+Tammudu+2:400,500,600,700,800|Ubuntu:300,300i,400,400i,500,500i,700,700i&display=swap"
        rel="stylesheet">
    <link
        href="https://fonts.googleapis.com/css?family=Raleway:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i|Rubik:300,300i,400,400i,500,500i,700,700i,900,900i&display=swap"
        rel="stylesheet">
    <link
        href="https://fonts.googleapis.com/css?family=Asap:400,400i,500,500i,600,600i,700,700i|Bellota+Text:300,300i,400,400i,700,700i&display=swap"
        rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Orbitron:700,800,900|Quicksand:300,400,500,600,700&display=swap"
        rel="stylesheet">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">




</head>

<body>

    <?php include 'include/connectBDD.php'; ?>
    <?php include 'include/nav.php'; ?>

    <section class="admin">

        <h3>Bienvenue, <?=$_SESSION['prenom']?></h3>

        <a href="">Modifier un film</a>
        <a href="delete-film.php">Supprimer un film</a>
        <h2>Ajouter un film</h2>

        <div class="insert-film">
            <form action="insert-film.php" method="POST">

                <label for="nom">Titre du film</label>
                <input type="text" id="nom" name="nom" placeholder="Titre du film"><br>

                <label for="dateSortie">Date de sortie</label>
                <input type="date" id="dateSortie" name="dateSortie" placeholder="Date de sortie"><br>

                <label for="trailer">Trailer</label>
                <input type="text" id="trailer" name="trailer" placeholder="Lien du trailer"><br>

                <label for="duree">Durée</label>
                <input type="number" id="duree" name="duree" placeholder="Durée du film"><br>
                <p>*en minutes</p><br>

                <label for="synopsis">Synopsis</label>
                <textarea id="sujet" name="synopsis" placeholder="synopsis" style="height:200px"></textarea><br>

                <label for="poster">Affiche</label>
                <input type="file" id="poster" name="poster"><br>

                <?php

                $req = $bdd->prepare('SELECT * FROM types');
                $req ->execute();

                while($genres = $req->fetch()) {
                ?>

                    <input type="checkbox" id="<?=$genres['id_genre']?>" name="<?=$genres['genre']?>" value="<?=$genres['genre']?>">
                    <label for="<?=$genres['genre']?>"><?=$genres['genre']?></label><br>

                <?php
                }
                ?>
                <br>

                <input type="submit" value="Submit">

            </form>
        </div>




    </section>


</body>

</html>