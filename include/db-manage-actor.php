<div id="actorAdd" class="">
    <h3>Ajouter un acteur</h3>

    <div class="insert-actor">

        <form action="traitement/insert-actor.php" method="POST" enctype="multipart/form-data">

            <label for="nom">Nom</label>
            <input type="text" id="nom" name="nom" placeholder="Nom" required><br>

            <label for="trailer">Prénom</label>
            <input type="text" id="prenom" name="trailer" placeholder="Prénom" required><br>

            <label for="dateSortie">Date de naissance</label>
            <input type="date" id="dateBirth" name="dateSortie"><br>

            <label for="dateSortie">Date de décès</label>
            <input type="date" id="dateDeath" name="dateSortie"><br>

            <label for="portrait">Portrait</label>
            <input type="file" id="portrait" name="portrait"><br>

            <label for="synopsis">Biograghie</label>
            <textarea id="bio" name="bio" placeholder="Biographie" style="height:200px"></textarea><br>


            <input type="submit" value="Enregistrer">

        </form>
    </div>
</div>

<div class="sub-grid">
    <div id="actorDelete" class="">
        <h3>Supprimer un acteur</h3>

        <div class="delete-actor">
            <form action="../traitement/film-delete.php" method="POST">
                <label for="films"><b>Sélectionner un acteur à supprimer :</b></label>
                <select class="" style="" name="acteurs" id="acteurs">
                    <option selected disabled>Sélectionner...</option>

                    <?php 

        $req = $bdd->prepare('SELECT * FROM acteurs');
        $req ->execute();

        while($acteurs = $req->fetch()) {
        ?>
                    <option value="<?=$acteurs['id_acteur']?>"><?=ucwords($acteurs['nom'] . ", " . $acteurs['prenom'])?>
                    </option>
                    <?php
        }
        ?>
                </select>

                <input type="submit" value="Supprimer" class="btn-delete">

            </form>
        </div>
    </div>

    <div id="actorEdit" class="">

        <h3>Modifier les infos d'un acteur</h3>
        <div class="edit-actor">
            <form action="traitement/film-edit.php" method="POST">

                <label for="films"><b>Sélectionner un acteur à modifier :</b></label>

                <select class="" style="" name="acteurs" id="acteurs">
                    <option selected disabled>Sélectionner...</option>

                    <?php 

        $req = $bdd->prepare('SELECT * FROM acteurs');
        $req ->execute();

        while($acteurs = $req->fetch()) {
        ?>
                    <option value="<?=$acteurs['id_acteur']?>"><?=ucwords($acteurs['nom'] . ", " . $acteurs['prenom'])?>
                    </option>
                    <?php
        }
        ?>
                </select>
                <br>

                <input type="submit" value="Continuer">

            </form>
        </div>
    </div>
</div>