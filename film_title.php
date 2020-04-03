<?php
require_once 'functions/auth.php';
online();
header('Content-type: text/html; charset=utf-8');
require_once 'styleswitcher.php';
setlocale(LC_TIME, 'fr', 'fr_FR', 'fr_FR.ISO8859-1');
?>

<!DOCTYPE html>
<html lang="fr_FR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Parasite</title>

    <!--SLICK-->

    <link rel="stylesheet" type="text/css" href="slick\slick\slick.css" />
    <link rel="stylesheet" type="text/css" href="slick\slick\slick-theme.css" />

    <!--CSS-->

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

    <?php
    include 'include/nav.php';

    include 'include/connectBDD.php';
    include './functions/filmDuration.php';

    $id = $_GET['id'];

    $req = $bdd->prepare('  SELECT *
                            FROM films
                            WHERE id_film =' . $id);
    $req ->execute();
    
    $film = $req->fetch();
    ?>

<h2 class="page-film"><?=$film['nom']?></h2>

</div >
<?php
            $req->closeCursor();
            $req = $bdd->prepare('  SELECT films.*, types.*
                                    FROM films
                                    LEFT JOIN est ON est.id_film = films.id_film
                                    LEFT JOIN types ON types.id_genre = est.id_genre
                                    WHERE films.id_film =' . $id);
            $req ->execute();
            ?>
            
            <?php while($donnees = $req->fetch()): ?>
                <a href="fiche_genre.php?id=<?=$donnees['id_genre']?>" class="lien-genre"><?=$donnees['genre']?></a>
            <?php endwhile ?>
        
    </div>

    <!--SYNOPSIS-->

    <div class="img-resume">
        <img class="img-film" src="<?= $film['poster']?>" alt="<?=$film['nom']?>">

        <div class="synop">
            <p class="synop-title">Synopsis</p>
            <p><?=$film['synopsis']?></p>

        </div>
    </div>
        

        <!--INFO FILM-->


    <div class="rond-titre">Résumé</div>

    <h3 class="info-film"></h3>

    <div class="ronds-info">

        <div class="ronds-bis">
            <div class="ronds-ronds">
                <?=filmDuration($film['duree'],'%&2h %02dm')?>
            </div>
            Durée
        </div>


        <div class="ronds-bis">
            <div class="ronds-ronds">
                4.5/5
            </div>
            Note
        </div>


        <div class="ronds-bis">
            <div class="ronds-ronds">
                <?=strftime('%e %B %Y', strtotime($film['dateSortie']))?>
            </div>
            Date de sortie
        </div>


    </div>
    
    <?php
    
    ?>

    <!--Liste acteurs-->

    <section class="liste-acteurs">

        <div class="acteurs-titre">Acteurs</div>

        <?php
        $acteursListe = $bdd->prepare(' SELECT acteurs.id_acteur, acteurs.nom, acteurs.prenom, acteurs.portrait
                                        FROM acteurs
                                        LEFT JOIN joue_dans AS j ON j.id_acteur = acteurs.id_acteur
                                        LEFT JOIN films ON films.id_film = j.id_film
                                        WHERE films.id_film =' .$id);
        $acteursListe ->execute();
        ?>

        <?php while($acteur = $acteursListe->fetch()): ?>
            <a href="./fiche_acteur.php?id=<?=$acteur['id_acteur']?>" class="acteur">
                <img class="img-acteur" src="<?=$acteur['portrait']?>" alt="">
                <div><?=$acteur['prenom'] . " " . $acteur['nom']?></div>
            </a>
        <?php endwhile ?>

    </section>

    <!--REAL BA-->

    <div class="real-real">Réalisateur</div>

    <div class="real-ba">

        <?php
        $realsListe = $bdd->prepare('   SELECT r.*
                                        FROM realisateurs r
                                        LEFT JOIN a_realise AS ar ON ar.id_real = r.id_real
                                        LEFT JOIN films ON films.id_film = ar.id_film
                                        WHERE films.id_film ='. $id);
        $realsListe ->execute();
        ?>

        <?php while($real = $realsListe->fetch()): ?>
            <div class="real">
                <div class="img-real">
                    <img src="./img/real.jfif" alt="">
                    <div><?=$real['prenom'] . " " . $real['nom']?></div>
                </div>
                <p class="text-real"><?=$real['bio']?></p>
            </div>
        <?php endwhile ?>

        <!-- movie trailer -->
        
        <div class="ba-yt">
            <iframe width="400" height="250" src="<?=$film['trailer']?>" frameborder="0"
                allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture"
                allowfullscreen></iframe>
        </div>

    </div>

    <!-- film photo gallery -->

    <div class="gallery">

    <?php

    $photosFilm = $bdd->prepare( "SELECT * FROM photofilm WHERE id_film =" . $film['id_film']);
    $photosFilm ->execute();

    while($photo = $photosFilm->fetch()) {
    ?>

        <img src="<?=$photo['path']?>" alt="<?=$photo['nom']?>">

    <?php 
    }
    ?>

    </div>

    <?php include 'include/footer.php';?>

</body>

</html>