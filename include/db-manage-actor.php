<div id="actorAdd" class="">
    <h3>Ajouter un acteur</h3>

    <div class="insert-actor">

        <form action="traitement/insert-acteur.php" method="POST" enctype="multipart/form-data">

            <label for="nom">Nom</label>
            <input type="text" id="nom" name="nom" placeholder="Nom" required><br>

            <label for="prenom">Prénom</label>
            <input type="text" id="prenom" name="prenom" placeholder="Prénom" required><br>

            <label for="dateBirth">Date de naissance</label>
            <input type="date" id="dateBirth" name="dateBirth"><br>

            <label for="dateDeath">Date de décès</label>
            <input type="date" id="dateDeath" name="dateDeath"><br>

            <label for="portrait">Portrait</label>
            <input type="file" id="portrait" name="portrait"><br>

            <label for="synopsis">Biograghie</label>
            <textarea id="bio" name="bio" placeholder="Biographie" style="height:200px"></textarea><br>

            <input type="submit" value="Enregistrer">

        </form>


        <!-- <script>alert("L'acteur a bien été enregistré.\<br\>N'oubliez pas de l'ajouter à un film le cas échéant")</script> -->

    </div>
</div>

<div class="sub-grid">
    <div id="actorDelete" class="">
        <h3>Supprimer un acteur</h3>

        <div class="delete-actor">
            <form action="traitement/actor-delete.php" method="POST">
                <label for="films"><b>Sélectionnez un acteur à supprimer :</b></label>
                <select name="acteurs" id="acteurs">
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

                <label for="search">Ou effectuez une recherche</label>

                <div class="db-film-search">
                    <input type="text" placeholder="" name="search">
                    <button class="search-button" type="submit"><i class="fa fa-search"></i></button>
                </div>

                <input type="submit" value="Supprimer" class="btn-delete">

            </form>

            <?php if(isset($_GET['actor']) && $_GET['actor'] == 'deleted'): ?>
            <?= "<p class=\"error msg\">L'acteur a bien été supprimé</p>"?>
            <?php endif ?>

        </div>
    </div>

    <div id="actorEdit" class="">

        <h3>Modifier les infos d'un acteur</h3>
        <div class="edit-actor">
            <form action="traitement/film-edit.php" method="POST">

                <label for="films"><b>Sélectionner un acteur à modifier :</b></label>

                <select name="acteurs" id="acteurs">
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

                <label for="search">Ou effectuez une recherche</label>

                <div class="db-film-search">
                    <input type="text" placeholder="" name="search">
                    <button class="search-button" type="submit"><i class="fa fa-search"></i></button>
                </div>

                <input type="submit" value="Continuer">

            </form>
        </div>
    </div>
</div>