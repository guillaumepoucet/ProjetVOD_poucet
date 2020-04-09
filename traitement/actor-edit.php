<?php
session_start();

include '../include/connectBDD.php';

  $id_film = !empty($_SESSION['film']) ? $_SESSION['film'] : NULL;

  $nom = !empty($_POST['nom']) ? $_POST['nom'] : NULL;
  $dateSortie = !empty($_POST['dateSortie']) ? $_POST['dateSortie'] : NULL;
  $trailer = !empty($_POST['trailer']) ? $_POST['trailer'] : NULL;
  $duree = !empty($_POST['duree']) ? $_POST['duree'] : NULL;
  $synopsis = !empty($_POST['synopsis']) ? $_POST['synopsis'] : NULL;
  
  if(!empty($nom)) {
    $sql = $bdd->prepare('UPDATE films SET nom = ? WHERE id_film ='.$id_film);
    $sql->execute([$nom]);
  };

  if(!empty($dateSortie)) {
    $sql = $bdd->prepare('UPDATE films SET dateSortie = ? WHERE id_film ='.$id_film);
    $sql->execute([$dateSortie]);
  };

  if(!empty($trailer)) {
    $trailer = str_replace("watch", "embed", $trailer);

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

  if(!empty($_FILES)) {
    $oldPoster = $bdd->prepare ('SELECT poster FROM films WHERE id_film ='.$id_film);
    $oldPoster -> execute();

    $oldPoster = $oldPoster->fetchColumn();
      if(!empty($oldPoster)){
      unlink($oldPoster);
      }

    // we get the movie poster directory
    $poster_dir = "assets\poster\\";
    $poster_file = basename($_FILES["poster"]["name"]);
    $targetPosterPath = $poster_dir . $poster_file;
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($poster_file, PATHINFO_EXTENSION));
    
    // Allowing certain file formats
    if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
    && $imageFileType != "gif" ) {
        echo "Désolé, seulement les fichiers JPG, JPEG, PNG & GIF sont acceptés.";
        $uploadOk = 0;
    };

    move_uploaded_file($_FILES["poster"]["tmp_name"], $targetPosterPath);

    $sql = $bdd->prepare('UPDATE films SET poster = ? WHERE id_film ='.$id_film);
    $sql->execute([$targetPosterPath]);
  };

  unset($_SESSION['film']);

  echo "le film a bien été mis à jour.";