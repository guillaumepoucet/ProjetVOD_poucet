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
    <title>Bienvenue, <?=ucwords($_SESSION['prenom'])?></title>

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
            <input class="tablink" onclick="openPage('user_profile', this, '#FF7200')" id="defaultOpen" value="Mon profil">
            <input class="tablink" onclick="openPage('userInfoEdit', this, '#FF7200')" value="Modifier mes informations" type="button">
            <?php if($_SESSION['id_type'] === "3"): ?>
                <input class="tablink" onclick="openPage('filmAdd', this, '#FF7200')" value="Ajouter un film">
                <input class="tablink" onclick="openPage('filmEdit', this, '#FF7200')" value="Modifier un film">
                <input class="tablink" onclick="openPage('filmDelete', this, '#FF7200')" value="Supprimer un film">
            <?php endif ?>
        </div>

        <div id="user_profile" class="tabcontent">
            <h3 class="liens-footer">Mes informations</h3>
            <p>Nom : <?=$_SESSION['nom']?></p>
            <p>Prénom : <?=$_SESSION['prenom']?></p>
            <p>Login : <?=$_SESSION['nom']?></p>
        </div>

            
            <div id="userInfoEdit" class="tabcontent">
                <form action="traitement/userInfoEdit.php" method="GET">
                    <label for="nom">J'ai changé de nom : </label>
                    <input type="text" placeholder="<?=$_SESSION['nom']?>" name="nom" value="<?=$_SESSION['nom']?>"><br>
                    <label for="prenom">J'ai changé de prénom : </label>
                    <input type="text" placeholder="<?=$_SESSION['prenom']?>" name="prenom" value="<?=$_SESSION['prenom']?>"><br>
                    <label for="log_in">Je veux changé de login : </label>
                    <input type="text" placeholder="<?=$_SESSION['log_in']?>" name="log_in" value="<?=$_SESSION['log_in']?>"><br>
                    <input class="ok" type="submit" id='submit' value='Enregistrer les modifications'> <br>
                </form>
            </div>


        <div id="filmAdd" class="tabcontent">
            <?php include 'admin/filmAdd.php' ?>
        </div>

        <div id="filmEdit" class="tabcontent">
            <?php include 'admin/filmEdit.php' ?>
        </div>

        <div id="filmDelete" class="tabcontent">
            <?php include 'admin/filmDelete.php' ?>
        </div>

    </section>
    <?php include 'include/footer.php'; ?>
    <script src="functions/adminTab.js"></script>
</body>

</html>