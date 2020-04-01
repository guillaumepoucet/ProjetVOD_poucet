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

    $req = $bdd->prepare("SELECT * FROM types WHERE id_genre =" . $id);
    $req ->execute();
    
    $genre = $req->fetch();

    ?>

    <section class="fiche-genre">

        <h2><?=$genre['genre']?></h2>

        <ul>
            <?php
            $id_genres = $bdd->prepare("SELECT * FROM est WHERE id_genre =" . $genre['id_genre']);
            $id_genres ->execute();
            
            while($genreId = $id_genres->fetch()) {

                $films = $bdd->prepare("SELECT * FROM films WHERE id_film =" . $genreId['id_film']);
                $films ->execute();

                while($film = $films->fetch()) {
                ?>

                <li><a href="film_title.php/?id=<?=$film['id_film']?>"><?=$film['nom']?></a></li>

                <?php
                }
            }
            $req->closeCursor();
            $films->closeCursor();
            ?>

        </ul>

    </section>

    <?php include 'include/footer.php';?>

</body>

</html>