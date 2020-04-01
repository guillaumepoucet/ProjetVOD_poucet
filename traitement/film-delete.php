<?php
session_start();

include '../include/connectBDD.php';

    
$id_film = !empty($_POST['films']) ? $_POST['films'] : NULL;


$delete = $bdd->prepare ('DELETE FROM films WHERE id_film='.$id_film);
$delete ->execute();

echo "Le film a bien été supprimé";
header('location:admin.php')
?>