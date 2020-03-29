<?php
header('Content-type: text/html; charset=utf-8');
require_once 'styleswitcher.php';
?>

<!DOCTYPE html>
<html lang="en">

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

    $req = $bdd->prepare("SELECT * FROM films WHERE id_film =" . $id);
    $req ->execute();

    $film = $req->fetch(); {
    ?>

    <h2 class="page-film"><?=$film['nom']?></h2>

    <!--SYNOPSIS-->

    <div class="img-resume">
        <img class="img-film" src="./img/parasite.jpg" alt="">

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
                <?=date('j F Y', strtotime($film['dateSortie']))?>
            </div>
            Date de sortie
        </div>


    </div>


    <!--Liste acteurs-->

    <section class="liste-acteurs">

        <div class="acteurs-titre">Acteurs</div>

    <?php
    // On récupère les id des acteurs ayant le même id-film que le film
    $acteursListe = $bdd->prepare( "SELECT * FROM joue_dans WHERE id_film =" . $film['id_film']);
    $acteursListe ->execute();

    $acteursListe = $acteursListe->fetch();

    var_dump($acteursListe);

    // On récupère les infos des acteurs ayant le même id_acteur que $acteursListe
    $acteursFilm = $bdd->prepare( "SELECT id_acteur, nom, prenom FROM acteurs WHERE id_acteur =" . $acteursListe->id_acteur);
    $acteursFilm ->execute();

    while($acteur->$acteursFilm->fetch() ) {
    ?>

        <div class="acteur">
            <img class="img-acteur" src="./img/acteur1.jfif" alt="">
            <div><?=$acteur['prenom'] . " " . $acteur['nom']?></div>
        </div>

    <?php
    }
    ?>

    </section>


    <!--REAL BA-->

    <div class="real-real">Réalisateur</div>

    <div class="real-ba">


        <div class="real">
            <div class="img-real">
                <img src="./img/real.jfif" alt="">
                <div>Bong Joon Ho</div>
            </div>
            <div class="text-real">
                Pour son film Parasite, il remporte la Palme d'or au festival de Cannes 2019, puis en 2020, le prix du
                meilleur film en langue étrangère aux Golden Globes, quatre Oscars (meilleur scénario original, meilleur
                film international, meilleur réalisateur, et meilleur film) et le César du meilleur film étranger.
            </div>
        </div>

        <div class="ba-yt">
            <iframe width="400" height="250" src="https://www.youtube.com/embed/BboKKBYx7-0" frameborder="0"
                allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture"
                allowfullscreen></iframe>
        </div>

    </div>

    <?php
    }

    include 'include/footer.php';    
    ?>

</body>

</html>