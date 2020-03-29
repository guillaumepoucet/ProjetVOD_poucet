<!--CATALOGUE FILMS-->
<div id="catalogue">

<?php

include 'connectBDD.php';
include './functions/filmDuration.php';

$req = $bdd->prepare(" SELECT id_film, nom, duree FROM films");
$req ->execute();

while( $donnees = $req->fetch() ) {
        ?>
<a href="./film_title.php?id=<?=$donnees['id_film'] ?>" >
    <div class="cardaxel">
        <img class="poster-img" src="" alt="">
        <div class="titrefilm"><?= $donnees['nom'] ?></div>
        <div class="infoaxel">
            <div class="textaxel">
                <p><?= filmDuration($donnees['duree'],'%&2h %02dm') ?></p>
            </div>
        </div>
    </div>
</a>

<?php 

}

?>

</div>