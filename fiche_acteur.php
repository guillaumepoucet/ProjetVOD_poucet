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

    $req = $bdd->prepare('SELECT * FROM acteurs WHERE id_acteur =' . $id);
    $req ->execute();
    
    $acteur = $req->fetch();
    ?>
    <section class="fiche-acteur">
        <img src="<?=$acteur['portrait']?>" alt="">
        <h2><?=ucwords($acteur['prenom'] . " " . $acteur['nom'])?></h2>

        <div class="orbituary">
            <p>Née le <?=strftime('%e %B %Y', strtotime($acteur['datebirth']))?></p>
            <?php if (isset($acteur['datedeath'])):?>
            <p>Décédé le <?=strftime('%e %B %Y', strtotime($acteur['datedeath']))?></p>
            <?php endif ?>
        </div>

        <p><?=$acteur['bio']?></p>

    </section>

    <?php include 'include/footer.php';?>

</body>

</html>