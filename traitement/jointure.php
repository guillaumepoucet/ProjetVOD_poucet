<?php

include '../include/connectBDD.php';

$req = $bdd->prepare(' SELECT types.genre, films.nom, films.duree 
                        FROM types 
                        LEFT JOIN est ON est.id_genre = types.id_genre 
                        LEFT JOIN films ON films.id_film = est.id_film 
                        WHERE types.id_genre = 2');
$req->execute();



?>

<?php while($donnees = $req->fetch()): ?>
    <p><?=$donnees['nom']?></p>
<?php endwhile ?>