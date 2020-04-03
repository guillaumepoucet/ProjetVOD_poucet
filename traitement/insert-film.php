<?php

    include '../include/connectBDD.php';
    
    
    
    $nom = !empty($_POST['nom']) ? $_POST['nom'] : NULL;
    $dateSortie = !empty($_POST['dateSortie']) ? $_POST['dateSortie'] : NULL;
    $trailer = !empty($_POST['trailer']) ? $_POST['trailer'] : NULL;
    $duree = !empty($_POST['duree']) ? $_POST['duree'] : NULL;
    $synopsis = !empty($_POST['synopsis']) ? $_POST['synopsis'] : NULL;
    
    // on récupère le dossier où sont stockés les affiches de film
    $poster_dir = "assets\poster\\";
    $poster_file = basename($_FILES["poster"]["name"]);
    $targetPosterPath = $poster_dir . $poster_file;
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($poster_file, PATHINFO_EXTENSION));
    
    // Allow certain file formats
    if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
    && $imageFileType != "gif" ) {
        echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
        $uploadOk = 0;
    };

    // je renomme le poster avec le nom du film
    // $posterName = str_replace(CHR(32),"",$nom);
    // $poster = rename($poster, $posterName);

    // var_dump($posterName);
    // exit();

    // lien youtube
    $trailer = str_replace("watch", "embed", $trailer);
  
    $sql = $bdd->prepare ("INSERT INTO films (nom, dateSortie, trailer, duree, synopsis, poster)
                          VALUES (:nom, :dateSortie, :trailer, :duree, :synopsis, :poster)");
  

    $sql->execute(array(
        'nom' => $nom,
        'dateSortie' => $dateSortie,
        'trailer' => $trailer,
        'duree' => $duree,
        'synopsis' => $synopsis,
        'poster' => $targetPosterPath
    ));

    move_uploaded_file($_FILES["poster"]["tmp_name"], $targetPosterPath);
  
    $sql-> closeCursor();
    header('location:../admin.php');
?>