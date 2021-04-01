<?php
include("./tpl/header.php");

$dsn = "mysql:host=localhost;dbname=literie3000_db";
$db = new PDO($dsn, "root", "");
$query =  $db->query("SELECT * FROM matelas;");

$matelas = $query->fetchAll();
?>
<div class="btnBan">
    <a class="btnAdd" href="./page_add_matelas.php">Ajouter un produit</a>
</div>

<div class="mainCatalogue">
    <div class="item">
        <?php

        foreach ($matelas as $matela) {
            $id = $matela["id"];
            $image = $matela["img"];
            $marque = $matela["marque"];
            $nom = $matela["nom"];
            $dimension = $matela["dimension"];
            $prix = $matela["prix"];
        ?>
            <div class="item-img">
                <img src="<?= $image ?>" alt="">
            </div>
            <div class="item-description">
                <p>Marque : <span><?= $marque ?></span></p>

                <p>Nom : <span><?= $nom ?></span></p>

                <p>Dimension : <span><?= $dimension ?></span></p>

                <p>Prix : <span><?= $prix ?> euros</span></p>
                <div class="btns">
                    <form class="edit" method="post" action="page_edit_matelas.php">
                        <input type="hidden" class="btn-hidden" name="id" value="<?= $id ?>">
                        <input type="submit" class="btn-edit" name="valider" value="Editer">
                    </form>
                    <form class="delete" method="post" action="page_delete_matelas.php">
                        <input type="hidden" class="btn-hidden" name="id" value="<?= $id ?>">
                        <input type="submit" class="btn-delete" name="valider" value="X">
                    </form>
                </div>
            </div>



        <?php
        }
        ?>
    </div>
</div>

<?php
include("./tpl/footer.php");
?>