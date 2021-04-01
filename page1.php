<?php
include("./tpl/header.php");
$dsn = "mysql:host=localhost;dbname=literie3000_db";
$db = new PDO($dsn, "root", "");
$query =  $db->query("SELECT * FROM matelas;");

$matelas = $query->fetchAll();

$dsn = "mysql:host=localhost;dbname=literie3000_db";
$db = new PDO($dsn, "root", "");
$query =  $db->query("SELECT * FROM marques;");
$marques = $query->fetchAll();
?>

<div class="mainCatalogue">
    <div class="brands">
        <p>Marques partenaires</p>
        <div class="itemB">
            
            <?php
            foreach ($marques as $marque) {

                $imageB = $marque["img"];
                $nomB = $marque["nom"];

            ?>
            
                <div class="itemB-img">
                    
                    <img src="<?= $imageB ?>" alt="">
                </div>
            <?php
            }
            ?>
        </div>
    </div>
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

                <p>Dimension : <span><?= $dimension ?> cm</span></p>

                <p>Prix : <span><?= $prix ?> euros</span></p>

            </div> <?php
                }
                    ?>
    </div>


</div>
<?php
include("./tpl/footer.php");
?>