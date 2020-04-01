<h2>Supprimer un film</h2>

<div class="insert-film">
    <form action="film-delete.php" method="POST">
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
        </select>

        <input type="submit" value="Submit">

    </form>
</div>