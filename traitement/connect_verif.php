<?php

    include ('../include/connectBDD.php');

    $nom = !empty($_POST['nom']) ? $_POST['nom'] : NULL;
    $motdepasse = !empty($_POST['motdepasse']) ? $_POST['motdepasse'] : NULL;

    $user = $bdd->prepare ('SELECT * FROM user WHERE nom="'.$nom.'"');
    $user ->execute();
    
    $member = $user->fetch();

    $mdpval = password_verify($motdepasse, $member['motdepasse']);

    //var_dump($member)

    if (!$member) {
        header('location:../connexion.php?error=login');
    } else {
        if ($mdpval) {
        session_start();
        $_SESSION['online'] = 1;
        $_SESSION['id_user'] = $member['id_user'];
        $_SESSION['nom'] = $member['nom'];
        $_SESSION['prenom'] = $member['prenom'];
        $_SESSION['log_in'] = $member['log_in'];
        $_SESSION['id_type'] = $member['id_type'];
        header('location: ../admin.php');
        } else {
            header('location:../connexion.php?error=login');
        }
    }
    
?>