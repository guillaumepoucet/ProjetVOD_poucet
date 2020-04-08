<?php

    include '../include/connectBDD.php';
    
    setlocale(LC_TIME, 'fr', 'fr_FR', 'fr_FR.ISO8859-1');
    
    $nom = !empty($_POST['nom']) ? $_POST['nom'] : NULL;
    $prenom = !empty($_POST['prenom']) ? $_POST['prenom'] : NULL;
    $dateBirth = !empty($_POST['dateBirth']) ? $_POST['dateBirth'] : NULL;
    $dateDeath = !empty($_POST['dateDeath']) ? $_POST['dateDeath'] : NULL;
    $bio = !empty($_POST['bio']) ? $_POST['bio'] : NULL;


    // we get the movie poster directory
    $portrait_dir = "..\assets\img\acteur\\";
    $portrait_file = basename($_FILES["portrait"]["name"]);
    $targetPortraitPath = $portrait_dir . $portrait_file;
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($portrait_file, PATHINFO_EXTENSION));

    // Allowing certain file formats
    if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
    && $imageFileType != "gif" ) {
        echo "Désolé, seulement les fichiers JPG, JPEG, PNG & GIF sont acceptés.";
        $uploadOk = 0;
    };

    $sql = $bdd->prepare ("INSERT INTO acteurs (nom, prenom, dateBirth, dateDeath, portrait, bio)
                          VALUES (:nom, :prenom, :dateBirth, :dateDeath, :portrait, :bio)");

    $sql->execute(array(
        'nom' => $nom,
        'prenom' => $prenom,
        'dateBirth' => $dateBirth,
        'dateDeath' => $dateDeath,
        'bio' => $bio,
        'portrait' => $targetPortraitPath
    ));

    move_uploaded_file($_FILES["portrait"]["tmp_name"], $targetPortraitPath);
  
    $sql-> closeCursor();
    header('location:../admin.php');
?>