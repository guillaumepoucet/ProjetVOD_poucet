<!--AFFICHE-->

<?php 

include 'connectBDD.php';

?>

<div class="title-dada-affiche">
    <h2>A l'affiche</h2>
</div>

<div class="center slider">

    <?php
    $req = $bdd->prepare('SELECT id_film, nom, poster FROM films');
    $req ->execute();
    
    while($posterFilm = $req->fetch()) {
    ?>

    <a class="link-poster" href="film_title.php?id=<?=$posterFilm['id_film']?>"><img src="<?=$posterFilm['poster']?>" alt="<?=$posterFilm['nom']?>"></a>

    <?php
    }
    ?>
</div>