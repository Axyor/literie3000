<?php

include("./tpl/header.php");

if (!empty($_POST)) {
    $imgM = trim(strip_tags($_POST["img"]));

    $nomM = trim(strip_tags($_POST["nom"]));

    $errors = [];
    if (empty($nomM)) {
        $errors["nom"] = "Le nom du produit est obligatoire";
    }

    if (!filter_var($imgM, FILTER_VALIDATE_URL)) {
        $errors["img"] = "L'url de l'image est invalide";
    }

    if (empty($errors)) {

        $dsn = "mysql:host=localhost;dbname=literie3000_db";
        $db = new PDO($dsn, "root", "");

        $query = $db->prepare("INSERT INTO marques (img, nom) VALUES (:img, :nom)");

        $query->bindParam(":img", $imgM);

        $query->bindParam(":nom", $nomM);
        if ($query->execute()) {

            header("Location: index.php");
        }
    }
}

?>

<div class="container">
    <p>Veuillez compléter les champs ci-dessous pour ajouter une nouvelle marque.</p>
    <form action="" method="post">
        <div class="form-group">

            <label for="inputImgM">Photo logo marque (sous forme url) :</label>
            <input type="text" name="img" id="inputImgM" placeholder="">
            <?php
            if (isset($errors["img"])) {
                echo "<span class=\"info-error\">{$errors["img"]}</span>";
            }
            ?>

        </div>

        <div class="form-group">

            <label for="inputNom">Nom :</label>
            <input type="text" name="nom" id="inputNomM" placeholder="">
            <?php
            if (isset($errors["nom"])) {
                echo "<span class=\"info-error\">{$errors["nom"]}</span>";
            }
            ?>

        </div>

        <input class="btnAdd" type="submit" value="Ajouter">
    </form>

    <div class="backIndex">
        
            <a class="btnBack" href="./index.php">Page principale</a>
        
    </div>
</div>
<?php

include("./tpl/footer.php")

?>