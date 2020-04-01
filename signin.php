<?php

  include ('include/connectBDD.php');

  $nom = !empty($_POST['nom']) ? $_POST['nom'] : NULL;
  $prenom = !empty($_POST['prenom']) ? $_POST['prenom'] : NULL;
  $login = !empty($_POST['login']) ? $_POST['login'] : NULL;
  $motdepasse = !empty($_POST['motdepasse']) ? $_POST['motdepasse'] : NULL;

  $sql = $bdd->prepare ("INSERT INTO user (nom, prenom, log_in, motdepasse )
                        VALUES ( :nom, :prenom, :log_in, :motdepasse)");

  $sql->execute(array(
      'nom' => $nom,
      'prenom' => $prenom,
      'log_in' => $login,
      'motdepasse' => $motdepasse
  ));

  $sql-> closeCursor();
  header('location:index.php');

?>