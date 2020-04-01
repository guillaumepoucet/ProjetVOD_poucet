<?php
require_once 'functions/auth.php';
online();
header('Content-type: text/html; charset=utf-8');
require_once 'styleswitcher.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ALLO SIMPLON</title>

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

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <!--FOTORAMA-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/fotorama/4.6.4/fotorama.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fotorama/4.6.4/fotorama.js"></script>


    <script src="https://cdn.jsdelivr.net/parallax.js/1.4.2/parallax.min.js"></script>

</head>

<body>
    <?php include 'include/nav.php'; ?>


<div class="contact-form">
  <form action="contact-form.php">

    <label for="prenom">Prénom</label>
    <input type="text" id="fname" name="prenom" placeholder="Votre prénom">

    <label for="nom">Nom</label>
    <input type="text" id="lname" name="nom" placeholder="Votre nom">

    <label for="sujet">Mail</label>
    <input type="email" id="sujet" name="mail" placeholder="Votre adresse mail">
    
    <label for="sujet">Sujet</label>
    <input type="text" id="sujet" name="sujet" placeholder="Sujet de votre message">
    
    <label for="sujet">Sujet</label>
    <input id="sujet" name="sujet" placeholder="Sujet de votre message" style="height:200px"></textarea>

    <input type="submit" value="Submit">

  </form>
</div>

    <?php include 'include/footer.php'; ?>

</body>

</html>