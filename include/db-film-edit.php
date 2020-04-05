<?php
require_once '../functions/auth.php';
user_online();
header('Content-type: text/html; charset=utf-8');
require_once '../styleswitcher.php';
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bienvenue, <?=ucwords($_SESSION['prenom'])?></title>

    <link rel="stylesheet" href="../css/reset.css">

    <link rel="stylesheet" media="screen, projection" type="text/css" id="css" href="../index.css" />

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

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"
        integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/js/select2.min.js"></script>


</head>

<body>

    <?php include 'connectBDD.php'; ?>

    <?php   
    $id = $_POST['films'];                        
    $req = $bdd->prepare('SELECT * FROM films WHERE id_film =' .$id);
    $req ->execute();
    $film = $req->fetch()
    ?>

<div class="db-film-edit">
    <h3>Modifier <?=$film['nom']?></h3>

        <form action="../traitement/film-edit.php" method="POST" enctype="multipart/form-data">
            <?php $film['id_film'] = $film['id_film'];?>
            <label for="nom">Titre du film</label>
            <input type="text" id="nom" name="nom" placeholder="<?=$film['nom']?>"><br>

            <label for="dateSortie">Date de sortie : 
                <?php if(isset($film['dateSortie'])):?>
                    <?=strftime('%d/%m/%Y', strtotime($film['dateSortie']))?>
                    <?php endif ?>
            </label>
        <input type="date" id="dateSortie" name="dateSortie" placeholder=""><br>
            <?=$film['dateSortie']?>
            <label for="trailer">Trailer</label>
            <input type="text" id="trailer" name="trailer" placeholder="<?=$film['trailer']?>"><br>

            <label for="duree">Durée</label>
            <input type="number" id="duree" name="duree" placeholder="<?=$film['duree']?>"><br>
            <p>*en minutes</p><br>

            <label for="synopsis">Synopsis</label>
            <textarea id="sujet" name="synopsis" style="height:200px" placeholder="<?=$film['synopsis']?>"></textarea><br>
            <label for="poster">Affiche</label>
            <input type="file" id="poster" name="poster"><br>
            
            <div class="genre-checkbox">
                <p>Choisissez un genre :</p>
                <?php

$req = $bdd->prepare('SELECT * FROM types');
    $req ->execute();
    
    while($genres = $req->fetch()) {
        ?>

<input type="checkbox" id="<?=$genres['id_genre']?>" name="<?=$genres['genre']?>"
value="<?=$genres['genre']?>">
<label for="<?=$genres['genre']?>"><?=$genres['genre']?></label><br>

<?php
    }
    ?>
            </div>
            <br>
            
            <input type="submit" value="Soumettre">
            
        </form>
        
    </div>
</body>

</html>