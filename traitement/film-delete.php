<?php
session_start();

include '../include/connectBDD.php';

    
$id_film = !empty($_POST['films']) ? $_POST['films'] : NULL;

$poster = $bdd->prepare ('SELECT poster FROM films WHERE id_film ='.$id_film);
$poster -> execute();

$poster = $poster->fetchColumn();

unlink($poster);

$delete = $bdd->prepare ('DELETE FROM films WHERE id_film='.$id_film);
$delete ->execute();

$_GET['film'] = 'deleted';
header('location:../admin.php?film=deleted')
?>