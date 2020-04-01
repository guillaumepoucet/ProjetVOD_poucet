<?php
require_once 'functions/auth.php';
user_online();
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

        <h2>
            <center>Bienvenue, <?=ucwords($_SESSION['prenom'])?></center>
        </h2>
        <div class="tabs">
            <div class="tablink" onclick="openPage('filmAdd', this, '#FF7200')" id="defaultOpen">Ajouter un film</div>
            <div class="tablink" onclick="openPage('filmEdit', this, '#FF7200')">Modifier un film</div>
            <div class="tablink" onclick="openPage('filmDelete', this, '#FF7200')">Supprimer un film</div>
        </div>
        <div id="filmAdd" class="tabcontent">
            <?php include 'filmAdd.php' ?>
        </div>

        <div id="filmEdit" class="tabcontent">
            <?php include 'filmEdit.php' ?>
        </div>

        <div id="filmDelete" class="tabcontent">
            <?php include 'filmDelete.php' ?>
        </div>

    </section>
    <?php include 'include/footer.php'; ?>
    <script src="functions/adminTab.js"></script>
</body>

</html>