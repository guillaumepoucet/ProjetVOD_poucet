<?php
session_start();

include '../include/connectBDD.php';

    
$id_acteur = !empty($_POST['acteurs']) ? $_POST['acteurs'] : NULL;

$portrait = $bdd->prepare ('SELECT portrait FROM acteurs WHERE id_acteur ='.$id_acteur);
$portrait -> execute();

$portrait = $portrait->fetchColumn();

unlink($portrait);

$delete = $bdd->prepare ('DELETE FROM acteurs WHERE id_acteur='.$id_acteur);
$delete ->execute();

$_GET['actor'] = 'deleted';
header('location:../admin.php?actor=deleted#actorDelete')

?>