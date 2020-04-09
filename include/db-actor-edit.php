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
    $id = $_POST['acteurs'];                        
    $req = $bdd->prepare('SELECT * FROM acteurs WHERE id_acteur =' .$id);
    $req ->execute();
    $acteur = $req->fetch()
    ?>

<div class="db-film-edit">
    <h3>Vous modifiez <?=ucwords($acteur['prenom']." ".$acteur['nom'])?></h3>

        <form action="../traitement/actor-edit.php" method="POST" enctype="multipart/form-data">
            
            <?php $_SESSION['acteur'] = $acteur['id_acteur'] ?>
        
            <label for="nom">Nom</label>
            <input type="text" id="nom" name="nom" placeholder="<?=$acteur['nom']?>"><br>

            <label for="prenom">Prénom</label>
            <input type="text" id="prenom" name="prenom" placeholder="<?=$acteur['prenom']?>"><br>

            <label for="dateBirth">Date de naissance : 
                <?php if(isset($acteur['dateBirth'])):?>
                    <?=strftime('%d/%m/%Y', strtotime($acteur['dateBirth']))?>
                    <?php endif ?>
            </label>
            <input type="date" id="dateBirth" name="dateBirth" placeholder=""><br>

            <label for="dateDeath">Date de décès : 
                <?php if(isset($acteur['dateDeath'])):?>
                    <?=strftime('%d/%m/%Y', strtotime($acteur['dateDeath']))?>
                    <?php endif ?>
            </label>
            <input type="date" id="dateDeath" name="dateDeath" placeholder=""><br>

            <label for="bio">Biographie</label>
            <textarea id="sujet" name="bio" style="height:200px" placeholder="<?=$acteur['bio']?>"></textarea><br>
            
            <label for="portrait">Portrait</label>
            <input type="file" id="portrait" name="portrait"><br>
            
            <br>
            
            <input type="submit" value="Soumettre">
            
        </form>
        
    </div>

</body>

</html>