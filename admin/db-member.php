<div id="admin-film">

    <div class="sub-menu">

        <h5>Gérer les membres</h5>
        <button class="subtablinks" onclick="openSubTab('userAdd', this)" id="defaultSubOpen">Ajouter un utilisateur</button>
        <button class="subtablinks" onclick="openSubTab('userDelete', this)">Supprimer un film</button>
        <button class="subtablinks" onclick="openSubTab('userEdit', this)">&Eacute;diter un film</button>
        
    </div>

    <?php include 'include/db-add-user.php' ?>

</div>