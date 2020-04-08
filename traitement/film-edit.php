<?php
session_start();

include '../include/connectBDD.php';

  $id_film = !empty($_SESSION['film']) ? $_SESSION['film'] : NULL;

  $nom = !empty($_POST['nom']) ? $_POST['nom'] : NULL;
  $dateSortie = !empty($_POST['dateSortie']) ? $_POST['dateSortie'] : NULL;
  $trailer = !empty($_POST['trailer']) ? $_POST['trailer'] : NULL;
  $duree = !empty($_POST['duree']) ? $_POST['duree'] : NULL;
  $synopsis = !empty($_POST['synopsis']) ? $_POST['synopsis'] : NULL;
  $poster = !empty($_POST['poster']) ? $_POST['poster'] : NULL;
  
  if(!empty($nom)) {
    $sql = $bdd->prepare('UPDATE films SET nom = ? WHERE id_film ='.$id_film);
    $sql->execute([$nom]);
  };

  if(!empty($dateSortie)) {
    $sql = $bdd->prepare('UPDATE films SET dateSortie = ? WHERE id_film ='.$id_film);
    $sql->execute([$dateSortie]);
  };

  if(!empty($trailer)) {
    $sql = $bdd->prepare('UPDATE films SET trailer = ? WHERE id_film ='.$id_film);
    $sql->execute([$trailer]);
  };

  if(!empty($duree)) {
    $sql = $bdd->prepare('UPDATE films SET duree = ? WHERE id_film ='.$id_film);
    $sql->execute([$duree]);
  };

  if(!empty($synopsis)) {
    $sql = $bdd->prepare('UPDATE films SET synopsis = ? WHERE id_film ='.$id_film);
    $sql->execute([$synopsis]);
  };

  if(!empty($poster)) {
    $sql = $bdd->prepare('UPDATE films SET poster = ? WHERE id_film ='.$id_film);
    $sql->execute([$poster]);
  };

  unset($_SESSION['film']);
  $sql-> closeCursor();
  echo "le film a bien été mis à jour";