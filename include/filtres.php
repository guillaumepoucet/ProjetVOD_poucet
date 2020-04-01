<!--NOS FILMS-->


<?php include './include/connectBDD.php' ?>

<div class="axelcontainer">

    <!--FILTRES-->

    <div class="axelgauche">

        <h5 class="axelH5">Filtres</h5>

        <h5 class="axelgenre">Genre</h5>

        <!-- On récupère les données de la table types -->
        <?php

        $req = $bdd->prepare('SELECT * FROM types');
        $req ->execute();

        // On crée une boucle qui fera apparaître chaque types de film
        while($genre=$req->fetch()) {
        ?>

            <div class="axelcase">
                <input type="checkbox" id="coding" name="" value="">
                <label for="coding"><?=ucwords($genre['genre'])?></label>
            </div>
            
        <?php
        }
        // Fin de la boucle
        ?>

        <h5 class="axelgenre">Durée</h5>
        <div class="axelcase">
            <input type="checkbox" id="" name="" value="">
            <label for="">moins d'1h30</label>
        </div>
        <div class="axelcase">
            <input type="checkbox" id="" name="" value="">
            <label for="">plus d'1h30</label>
        </div>
        <div class="axelcase">
            <input type="checkbox" id="" name="" value="">
            <label for="">Plus d'2h</label>
        </div>

        <h5 class="axelgenre">Note</h5>
        <div class="axelcase">
            <input type="checkbox" id="coding" name="" value="">
            <label for="coding">5/5</label>
        </div>
        <div class="axelcase">
            <input type="checkbox" id="coding" name="" value="">
            <label for="coding">4/5</label>
        </div>
        <div class="axelcase">
            <input type="checkbox" id="coding" name="" value="">
            <label for="coding">3/5</label>
        </div>
        <div class="axelcase">
            <input type="checkbox" id="coding" name="" value="">
            <label for="coding">2/5</label>
        </div>
        <div class="axelcase">
            <input type="checkbox" id="coding" name="" value="">
            <label for="coding">1/5</label>
        </div>
    </div>
