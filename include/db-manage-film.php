<div id="filmAdd" class="">
    <h3>Ajouter un film</h3>

    <div class="insert-film">

        <form action="traitement/insert-film.php" method="POST" enctype="multipart/form-data">

            <label for="nom">Titre du film</label>
            <input type="text" id="nom" name="nom" placeholder="Titre du film"><br>

            <?php if(isset($_GET['error'])): ?>
                <?= "<p class=\"error\">La sortie ne peut être inférieure à 3 mois</p>"?>
            <?php endif ?>

            <label for="dateSortie">Date de sortie</label>
            <input type="date" id="dateSortie" name="dateSortie" placeholder="Date de sortie"><br>


            <label for="trailer">Trailer</label>
            <input type="text" id="trailer" name="trailer" placeholder="Lien du trailer"><br>

            <label for="duree">Durée</label>
            <input type="number" id="duree" name="duree" placeholder="Durée du film"><br>
            <p>*en minutes</p><br>

            <label for="synopsis">Synopsis</label>
            <textarea id="sujet" name="synopsis" placeholder="synopsis" style="height:200px"></textarea><br>

            <label for="poster">Affiche</label>
            <input type="file" id="poster" name="poster"><br>

            <div class="genre-checkbox">
                <p>Choisissez un genre :</p>
                <?php

    $req = $bdd->prepare('SELECT * FROM types');
    $req ->execute();

    while($genres = $req->fetch()) {
    ?>

                <input type="checkbox" id="<?=$genres['id_genre']?>" name="<?=$genres['genre']?>"
                    value="<?=$genres['genre']?>">
                <label for="<?=$genres['genre']?>"><?=$genres['genre']?></label><br>

                <?php
    }
    ?>
            </div>
            <br>

            <input type="submit" value="Soumettre">

        </form>
    </div>
</div>

<div>
    <div id="filmDelete" class="">
        <h3>Supprimer un film</h3>

        <div class="delete-film">
            <form action="../traitement/film-delete.php" method="POST">
                <label for="films"><b>Sélectionner un film par son titre :</b></label>
                <select class="" style="" name="films" id="films">
                    <option selected disabled>Sélectionner...</option>

                    <?php 

        $req = $bdd->prepare('SELECT * FROM films');
        $req ->execute();

        while($films = $req->fetch()) {
        ?>
                    <option value="<?=$films['id_film']?>"><?=$films['nom']?></option>
                    <?php
        }
        ?>
                </select>

                <input type="submit" value="Supprimer" class="btn-delete">

            </form>
        </div>
    </div>

    <div id="filmEdit" class="">

        <h3>&Eacute;diter un film</h3>
        <div class="edit-film">
            <form action="include/db-film-edit.php" method="POST">

                <label for="films"><b>Sélectionner un film par son titre :</b></label>

                <select name="films" id="films">
                    <option selected disabled>Sélectionner...</option>

                    <?php 
                            $req = $bdd->prepare('SELECT * FROM films');
                            $req ->execute();

            while($films = $req->fetch()) {
            ?>
                    <option value="<?=$films['id_film']?>"><?=$films['nom']?></option>
                    <?php
            }
            ?>
                </select><br>

                <input type="submit" name ="submit" value="Continuer" formtarget="popup">

            </form>
        </div>

    </div>
</div>