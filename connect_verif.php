<?php

    include ('include/connectBDD.php');

    $login = !empty($_POST['login']) ? $_POST['login'] : NULL;
    $motdepasse = !empty($_POST['motdepasse']) ? $_POST['motdepasse'] : NULL;

    $user = $bdd->prepare ('SELECT * FROM user WHERE log_in="'.$login.'"');
    $user ->execute();
    
    $member = $user->fetch();

    //var_dump($member)

    if (!$member) {
        $_GET['erreur'] = "Mauvais identifiant ou mot de passe !";
        header('location=connexion.php');
    } else {
        if ($motdepasse == $member['motdepasse']) {
        session_start();
        $_SESSION['online'] = 1;
        $_SESSION['id_user'] = $member['id_user'];
        $_SESSION['nom'] = $member['nom'];
        $_SESSION['prenom'] = $member['prenom'];
        $_SESSION['id_type'] = $member['id_type'];
        header('location: admin.php');
        } else {
            $_GET['erreur'] = "Mauvais identifiant ou mot de passe !";
            header('location=connexion.php');
        }
    }
    
?>