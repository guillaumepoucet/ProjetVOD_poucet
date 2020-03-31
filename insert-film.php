<?php

    include 'include/connectBDD.php';

    
    $nom = !empty($_POST['nom']) ? $_POST['nom'] : NULL;
    $dateSortie = !empty($_POST['dateSortie']) ? $_POST['dateSortie'] : NULL;
    $trailer = !empty($_POST['trailer']) ? $_POST['trailer'] : NULL;
    $duree = !empty($_POST['duree']) ? $_POST['duree'] : NULL;
    $synopsis = !empty($_POST['synopsis']) ? $_POST['synopsis'] : NULL;
    $poster = !empty($_POST['poster']) ? $_POST['poster'] : NULL;
    $synopsis = !empty($_POST['synopsis']) ? $_POST['synopsis'] : NULL;
  
    $sql = $bdd->prepare ("INSERT INTO films (nom, dateSortie, trailer, duree, synopsis, poster )
                          VALUES ( :nom, :dateSortie, :trailer, :duree, :synopsis, :poster)");
  

    $sql->execute(array(
        'nom' => $nom,
        'dateSortie' => $dateSortie,
        'trailer' => $trailer,
        'duree' => $duree,
        'synopsis' => $synopsis,
        'poster' => $poster
    ));
  
    $sql-> closeCursor();
    header('location:admin.php');
?>