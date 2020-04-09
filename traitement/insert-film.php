<?php

    include '../include/connectBDD.php';
    
    setlocale(LC_TIME, 'fr', 'fr_FR', 'fr_FR.ISO8859-1');
    
    $nom = !empty($_POST['nom']) ? $_POST['nom'] : NULL;
    $dateSortie = !empty($_POST['dateSortie']) ? $_POST['dateSortie'] : NULL;
    $trailer = !empty($_POST['trailer']) ? $_POST['trailer'] : NULL;
    $duree = !empty($_POST['duree']) ? $_POST['duree'] : NULL;
    $synopsis = !empty($_POST['synopsis']) ? $_POST['synopsis'] : NULL;
    
    // Checking if the movie came out more than 3 months ago
    // $date = new DateTime();
    // $date->modify('-3 month');
    // $result = $date->format('Y-m-d');
    // echo $date>$dateSortie;
    // exit();
    // if ($date>$dateSortie) {
    //     header('location:../admin.php?error=date');
    //     exit();
    // };

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

    // je renomme le poster avec le nom du film
    // $posterName = str_replace(CHR(32),"",$nom);
    // $poster = rename($poster, $posterName);

    // var_dump($posterName);
    // exit();

    // replacing the 'watch' string by 'embed'
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

    move_uploaded_file($_FILES["poster"]["tmp_name"], "..\\" . $targetPosterPath);
  
    $sql-> closeCursor();

    $_GET['film'] = 'added';
    header('location:../admin.php?film=added');
?>