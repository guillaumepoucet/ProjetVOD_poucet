<?php
require_once 'functions/auth.php';
user_online();
header('Content-type: text/html; charset=utf-8');
setlocale(LC_TIME, 'fr', 'fr_FR', 'fr_FR.ISO8859-1');
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
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/js/select2.min.js"></script>
    <script src="functions/select.js"></script>


</head>

<body>

    <?php include 'include/connectBDD.php'; ?>
    <?php include 'include/nav.php'; ?>

    <section class="admin">

        <h2>
            <center>Bienvenue, <?=ucwords($_SESSION['prenom'])?></center>
        </h2>

        <div class="tabs">
            <input class="tablink" onclick="openPage('user_profile', this, '#FF7200')" type="button" value="Mon profil">
            <input class="tablink" onclick="openPage('userInfoEdit', this, '#FF7200')" value="Modifier mes informations" type="button">
            <?php if($_SESSION['id_type'] === "2" || $_SESSION['id_type'] === "3"): ?>
                <input class="tablink" onclick="openPage('db-manage', this, '#FF7200')" type="button" value="Gérer la base de données" id="defaultOpen" >
            <?php endif ?>
            <?php if($_SESSION['id_type'] === "3"): ?>
                <input class="tablink" onclick="openPage('db-member', this, '#FF7200')" type="button" value="Gérer les membres">
            <?php endif ?>
        </div>

        <?php if(isset($_GET['actor']) && $_GET['actor'] == 'deleted'): ?>
        <?= "<p class=\"error msg\">L'acteur a bien été supprimé</p>"?>
        <?php endif ?>
        
            <?php if(isset($_GET['mdp']) &&  $_GET['mdp'] == 0): ?>
                <?= "<p class=\"error msg\">Les mots de passes ne correspondent pas.</p>"?>
            <?php endif ?>

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


        <div id="db-manage" class="tabcontent">
            <?php include 'admin/db-manage.php' ?>
        </div>

        <div id="db-member" class="tabcontent">
            <?php include 'admin/db-member.php' ?>
        </div>

    </section>
    
    <?php include 'include/footer.php'; ?>
    <script src="functions/adminTab.js"></script>
    <script src="functions\subtab.js"></script>

</body>

</html>