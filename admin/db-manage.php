<div id="admin-film">

    <div class="sub-menu">

        <h5>Gérer les films</h5>
        <button class="subtablinks" onclick="openSubTab('filmAdd', this)" id="defaultSubOpen">Ajouter un film</button>
        <button class="subtablinks" onclick="openSubTab('filmDelete', this)">Supprimer un film</button>
        <button class="subtablinks" onclick="openSubTab('filmEdit', this)">&Eacute;diter un film</button>
        <h5>Gérer les acteurs</h5>
        <button class="subtablinks" onclick="openSubTab('actorAdd', this)">Ajouter des acteurs</button>
        <button class="subtablinks" onclick="openSubTab('actorDelete', this)">Supprimer des acteurs</button>
        <button class="subtablinks" onclick="openSubTab('actorEdit', this)">&Eacute;diter un acteur</button>

    </div>

    <?php include 'include/db-manage-film.php' ?>
    <?php include 'include/db-manage-actor.php' ?>

</div>