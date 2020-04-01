
        <div class="insert-film">
            <form action="../traitement/insert-film.php" method="POST" enctype="multipart/form-data">

                <label for="nom">Titre du film</label>
                <input type="text" id="nom" name="nom" placeholder="Titre du film"><br>

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
                <br>

                <input type="submit" value="Submit">

            </form>
        </div>