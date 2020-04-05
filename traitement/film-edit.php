<?php
session_start();

    var_dump($_POST);
    include '../include/connectBDD.php';

    $id_film = !empty($_POST['films']) ? $_POST['films'] : NULL;

    $nom = !empty($_POST['nom']) ? $_POST['nom'] : NULL;
    $dateSortie = !empty($_POST['dateSortie']) ? $_POST['dateSortie'] : NULL;
    $trailer = !empty($_POST['trailer']) ? $_POST['trailer'] : NULL;
    $duree = !empty($_POST['duree']) ? $_POST['duree'] : NULL;
    $synopsis = !empty($_POST['synopsis']) ? $_POST['synopsis'] : NULL;
    $poster = !empty($_POST['poster']) ? $_POST['poster'] : NULL;
    $synopsis = !empty($_POST['synopsis']) ? $_POST['synopsis'] : NULL;

    $sql = $bdd->prepare ('UPDATE films
                          SET 
                            nom = (:nom),
                            dateSortie = (:dateSortie),
                            trailer = (:trailer),
                            duree = (:duree),
                            synopsis = (:synopsis),
                            poster = (:poster)
                          WHERE id_film ='.$id_film);


    $sql->execute(array(
        'nom' => $nom,
        'dateSortie' => $dateSortie,
        'trailer' => $trailer,
        'duree' => $duree,
        'synopsis' => $synopsis,
        'poster' => $poster
    ));

    $sql-> closeCursor();
    header('location:../admin.php');
?>