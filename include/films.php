<!--CATALOGUE FILMS-->
<?php

include 'connectBDD.php';

$req = $bdd->prepare(" SELECT nom, duree FROM films");
        $req ->execute();
        
        while( $donnees = $req->fetch() ) {
        ?>

<a href="" class="versfilm">
    <div class="cardaxel">
        <img class="poster-img" src="" alt="">
        <div class="titrefilm"><?= $donnees['nom'] ?></div>
        <div class="infoaxel">
            <div class="textaxel">
                <p><?= $donnees['duree'] ?></p>
            </div>
        </div>
    </div>
</a>

<?php 

}

?>