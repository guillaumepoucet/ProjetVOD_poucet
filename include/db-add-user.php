<div id="userAdd" class="subtabcontent">
    <h3>Ajouter un acteur</h3>

    <div class="insert-user">

        <form action="traitement/insert-user.php" method="POST" enctype="multipart/form-data">

            <label for="nom">Nom</label>
            <input type="text" id="nom" name="nom" placeholder="Nom" required><br>

            <label for="prenom">Prénom</label>
            <input type="text" id="prenom" name="prenom" placeholder="Prénom" required><br>

            <label for="log_in">Login</label>
            <input type="text" id="log_in" name="log_in"><br>

            <label for="motdepasse">Mot de passe</label>
            <input type="text" id="motdepasse" name="motdepasse"><br>

            <label for="passVerif">Répéter le mot de passe</label>
            <input type="text" id="passVerif" name="passVerif"><br>

            <input type="submit" value="Enregistrer">

        </form>

    </div>
</div>


<div id="userDelete" class="subtabcontent">
    <h3>Supprimer un utilisateur</h3>

    <div class="delete-actor">
        <form action="traitement/user-delete.php" method="POST">
            <label for="user"><b>Sélectionnez un acteur à supprimer :</b></label>
            <select name="user" id="user">
                <option selected disabled>Sélectionner...</option>

                <?php 

        $req = $bdd->prepare('SELECT * FROM user');
        $req ->execute();

        while($user = $req->fetch()) {
        ?>
                <option value="<?=$user['id_user']?>"><?=ucwords($user['nom'] . ", " . $user['prenom'])?>
                </option>
                <?php
        }
        ?>
            </select>

            <label for="search">Ou effectuez une recherche</label>

            <div class="db-film-search">
                <input type="text" placeholder="" name="search">
                <button type="submit"><i class="fa fa-search"></i></button>
            </div>

            <input type="submit" value="Supprimer" class="btn-delete">

        </form>



    </div>
</div>

<div id="actorEdit" class="subtabcontent">

    <h3>Modifier les infos d'un acteur</h3>
    <div class="edit-actor">
        <form action="include\db-actor-edit.php" method="POST">

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