<?php

    include '../include/connectBDD.php';
       
    $nom = !empty($_POST['nom']) ? $_POST['nom'] : NULL;
    $prenom = !empty($_POST['prenom']) ? $_POST['prenom'] : NULL;
    $log_in = !empty($_POST['log_in']) ? $_POST['log_in'] : NULL;
    $motdepasse = !empty($_POST['motdepasse']) ? $_POST['motdepasse'] : NULL;
    $passVerif = !empty($_POST['passVerif']) ? $_POST['passsVerif'] : NULL;
    
    if($motdepasse == $passVerif) {
    $motdepasse = password_hash($motdepasse, PASSWORD_DEFAULT);
    } else {
        $_GET['mdp'] = 0;
        header('location:../admin.php?mdp=0');
    };


    var_dump($motdepasse); exit();
    $sql = $bdd->prepare ("INSERT INTO user (nom, prenom, log_in, motdepasse)
                          VALUES (:nom, :prenom, :log_in, :motdepasse)");

    $sql->execute(array(
        'nom' => $nom,
        'prenom' => $prenom,
        'log_in' => $log_in,
        'motdepasse' => $motdepasse
    ));
 
    $sql-> closeCursor();
    header('location:../admin.php');
?>