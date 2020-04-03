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
    <title><?=$_GET['id']?></title>

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

    $id = $_GET['id'];

    $req = $bdd->prepare("SELECT * FROM types WHERE types.id_genre =" . $id);
    $req ->execute();
    
    $donnees = $req->fetch(PDO::FETCH_OBJ);
    ?>

    <section class="fiche-genre">

        <h2><?=$donnees->genre?></h2>

        <ul>

            <?php 
                $req->closeCursor();
                $req = $bdd->prepare(' SELECT types.genre, films.nom, films.id_film
                FROM types 
                LEFT JOIN est ON est.id_genre = types.id_genre 
                LEFT JOIN films ON films.id_film = est.id_film 
                WHERE types.id_genre ='.$id);
                $req->execute();
                
                while($donnees = $req->fetch()) { 
                    ?>
                    <li>
                        <a href="film_title.php/?id=<?=$donnees['id_film']?>"><?=$donnees['nom']?></a>
                    </li>
                <?php 
                } ?>

        </ul>

    </section>

    <?php 
    
    $req->closeCursor();
    include 'include/footer.php';
    ?>

</body>

</html>