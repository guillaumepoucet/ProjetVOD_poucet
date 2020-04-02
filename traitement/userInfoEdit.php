<?php
session_start();
var_dump($_GET);
exit();
include '../include/connectBDD.php';

    $nom = !empty($_GET['nom']) ? $_GET['nom'] : NULL;
    $prenom = !empty($_GET['prenom']) ? $_GET['prenom'] : NULL;
    $log_in = !empty($_GET['log_in']) ? $_GET['log_in'] : NULL;

    $sql = $bdd->prepare ("UPDATE user
                            SET
                            nom = (:nom)
                            prenom = (:prenom)
                            log_in = (:log_in)
                            WHERE id_user =".$_SESSION['id_user']);

$sql->execute(array(
    'nom' => $nom,
    'prenom' => $prenom,
    'log_in' => $log_in
));

$sql-> closeCursor();
header('location:../admin.php');
?>