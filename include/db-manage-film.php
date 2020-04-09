<div id="filmAdd" class="subtabcontent">
    <h3>Ajouter un film</h3>

    <?php if(isset($_GET['film']) && $_GET['film'] == 'added'): ?>
    <?= "<p class=\"error msg\">Le film a bien été ajouté</p>"?>
    <?php endif ?>

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

            <br>

            <input type="submit" value="Soumettre">

        </form>
    </div>
</div>


<div id="filmDelete" class="subtabcontent">
    <h3>Supprimer un film</h3>

    <div class="delete-film">
        <form action="traitement/film-delete.php" method="POST">
            <label for="films"><b>Sélectionner un film par son titre :</b></label>
            <select name="films" id="films">
                <option selected disabled>Sélectionner...</option>

                <?php 

        $req = $bdd->prepare('SELECT id_film, nom FROM films');
        $req ->execute();

        while($films = $req->fetch()) {
        ?>
                <option value="<?=$films['id_film']?>"><?=$films['nom']?></option>
                <?php
        }
        ?>
            </select>

            <label for="search">Ou effectuez une recherche</label>

            <div class="db-film-search">
                <input type="text" placeholder="" name="search">
                <button class="search-button" type="submit"><i class="fa fa-search"></i></button>
            </div>

            <input type="submit" value="Supprimer" class="btn-delete">

        </form>


        <?php if(isset($_GET['film']) && $_GET['film'] == 'deleted'): ?>
        <?= "<p class=\"error msg\">Le film a bien été supprimé</p>"?>
        <?php endif ?>

    </div>
</div>


<div id="filmEdit" class="subtabcontent">

    <h3>&Eacute;diter un film</h3>
    <div class="edit-film">
        <form action="include/db-film-edit.php" method="POST">

            <label for="films"><b>Sélectionner un film par son titre :</b></label>

            <select name="films" id="films">
                <option selected disabled>Sélectionner...</option>

                <?php 
                            $req = $bdd->prepare('SELECT id_film, nom FROM films');
                            $req ->execute();

            while($films = $req->fetch()) {
            ?>
                <option value="<?=$films['id_film']?>"><?=$films['nom']?></option>
                <?php
            }
            ?>
            </select><br>

            <label for="search">Ou effectuez une recherche</label>

            <div class="db-film-search">
                <input type="text" placeholder="" name="search">
                <button class="search-button" type="submit"><i class="fa fa-search"></i></button>
            </div>

            <input type="submit" value="Continuer">

        </form>
    </div>

</div>