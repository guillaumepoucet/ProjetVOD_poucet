<div id="typeManage" class="subtabcontent">
    <h3>Ajouter un genre</h3>

    <div class="insert-type">

        <form action="traitement/insert-type.php" method="POST" enctype="multipart/form-data">

            <input type="text" id="type" name="type" placeholder="Genre" required><br>

            <input type="submit" value="Enregistrer">

        </form>

    </div>

    <h3>Ajouter un genre à un film</h3>

    <form action="traitement/link-type.php" method="POST" enctype="multipart/form-data">

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
};
$req->closeCursor();
?>
        </select>
        <br>

        <label for="types"><b>Sélectionner un genre :</b></label>

        <select name="types" id="types">
            <option selected disabled>Sélectionner...</option>

            <?php 
        $req = $bdd->prepare('SELECT * FROM types');
        $req ->execute();

while($type = $req->fetch()) {
?>
            <option value="<?=$type['id_genre']?>"><?=ucwords($type['genre'])?></option>
            <?php
}
?>
        </select>

        <input type="submit" value="Lier">

    </form>

</div>