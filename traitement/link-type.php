<?php

    include '../include/connectBDD.php';
    
    $id_film = !empty($_POST['films']) ? $_POST['films'] : NULL;
    $id_genre = !empty($_POST['types']) ? $_POST['types'] : NULL;

    $sql = $bdd->prepare ("INSERT INTO est (id_genre, id_film)
                          VALUES (:id_genre, :id_film)");

    $sql->execute(array('id_genre' => $id_genre,
                        'id_film' => $id_film
                    ));
  
    $sql-> closeCursor();
    header('location:../admin.php?genre=linked');
?>