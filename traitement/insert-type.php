<?php

    include '../include/connectBDD.php';
    
    $genre = !empty($_POST['type']) ? $_POST['type'] : NULL;

    $sql = $bdd->prepare ("INSERT INTO types (genre)
                          VALUES (:genre)");

    $sql->execute(array('genre'=>$genre));
  
    $sql-> closeCursor();
    header('location:../admin.php');
?>