<?php
session_start();

include '../include/connectBDD.php';

  $id_acteur = !empty($_SESSION['acteur']) ? $_SESSION['acteur'] : NULL;

  $nom = !empty($_POST['nom']) ? $_POST['nom'] : NULL;
  $prenom = !empty($_POST['prenom']) ? $_POST['prenom'] : NULL;
  $dateBirth = !empty($_POST['dateBirth']) ? $_POST['dateBirth'] : NULL;
  $dateDeath = !empty($_POST['dateDeath']) ? $_POST['dateDeath'] : NULL;
  $bio = !empty($_POST['bio']) ? $_POST['bio'] : NULL;

  if(!empty($nom)) {
    $sql = $bdd->prepare('UPDATE acteurs SET nom = ? WHERE id_acteur ='.$id_acteur);
    $sql->execute([$nom]);
  };

  if(!empty($prenom)) {
    $sql = $bdd->prepare('UPDATE acteurs SET prenom = ? WHERE id_acteur ='.$id_acteur);
    $sql->execute([$prenom]);
  };

  if(!empty($dateBirth)) {
    $sql = $bdd->prepare('UPDATE acteurs SET datebirth = ? WHERE id_acteur ='.$id_acteur);
    $sql->execute([$dateBirth]);
  };

  if(!empty($dateDeath)) {
    $sql = $bdd->prepare('UPDATE acteurs SET datedeath = ? WHERE id_acteur ='.$id_acteur);
    $sql->execute([$dateDeath]);
  };

  if(!empty($bio)) {
    $sql = $bdd->prepare('UPDATE acteurs SET bio = ? WHERE id_acteur ='.$id_acteur);
    $sql->execute([$bio]);
  };

  if(!empty($_FILES['portrait']['name'])) {
    $oldPortrait = $bdd->prepare ('SELECT portrait FROM acteurs WHERE id_acteur ='.$id_acteur);
    $oldPortrait -> execute();

    $oldPortrait = $oldPortrait->fetchColumn();
    $oldPortrait = "..\\".$oldPortrait;

      if(!empty($oldPortrait) && ($oldPortrait != "..\\")) {
        unlink($oldPortrait);
      }

    // we get the movie Portrait directory
    $portrait_dir = "assets\img\acteur\\";
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

    $sql = $bdd->prepare('UPDATE acteurs SET portrait = ? WHERE id_acteur ='.$id_acteur);
    $sql->execute([$targetPortraitPath]);

    move_uploaded_file($_FILES["portrait"]["tmp_name"], "..\\".$targetPortraitPath);
  };

  unset($_SESSION['acteur']);

  echo "l'acteur a bien été mis à jour.";
  echo "<a href=\"../admin.php\">Admin</a>";