<?php

include("./tpl/header.php");

if (!empty($_POST)) {
    $img = trim(strip_tags($_POST["img"]));
    $marque = trim(strip_tags($_POST["marque"]));
    $nom = trim(strip_tags($_POST["nom"]));
    $dimension = trim(strip_tags($_POST["dimension"]));
    $prix = trim(strip_tags($_POST["prix"]));

    $errors=[];
    if (empty($nom)) {
        $errors["nom"] = "Le nom du produit est obligatoire";
    }
    if (!filter_var($img, FILTER_VALIDATE_URL)) {
        $errors["img"] = "L'url de l'image est invalide";
    }
    if (empty($prix)) {
        $errors["prix"] = "Le prix du produit est obligatoire";
    }
    if (empty($dimension)) {
        $errors["dimension"] = "La dimension du produit est obligatoire";
    }

    if (empty($errors)) {

        $dsn = "mysql:host=localhost;dbname=literie3000_db";
        $db = new PDO($dsn, "root", "");

        $query = $db->prepare("INSERT INTO matelas (img, marque, nom, dimension, prix) VALUES (:img, :marque, :nom, :dimension, :prix)");

        $query->bindParam(":img", $img);
        $query->bindParam(":marque", $marque);
        $query->bindParam(":nom", $nom);
        $query->bindParam(":dimension", $dimension);
        $query->bindParam(":prix", $prix);

        if ($query->execute()) {

            header("Location: index.php");
        }

    }
}
?>
<div class="container">
    <p>Veuillez compléter les champs ci-dessous pour ajouter un nouveau produit.</p>
    <form action="" method="post">
        <div class="form-group">

            <label for="inputImg">Photo produit (sous forme url) :</label>
            <input type="text" name="img" id="inputImg" placeholder="">
            <?php
                    if (isset($errors["img"])) {
                        echo "<span class=\"info-error\">{$errors["img"]}</span>";
                    }
                    ?>

        </div>

        <div class="form-group">

            <label for="inputMarque">Marque :</label>
            <input type="text" name="marque" id="inputMarque" placeholder="">
            <?php
                    if (isset($errors["marque"])) {
                        echo "<span class=\"info-error\">{$errors["marque"]}</span>";
                    }
                    ?>
        </div>
        <div class="form-group">

            <label for="inputNom">Nom :</label>
            <input type="text" name="nom" id="inputNom" placeholder="">
            <?php
                    if (isset($errors["nom"])) {
                        echo "<span class=\"info-error\">{$errors["nom"]}</span>";
                    }
                    ?>

        </div>
        <div class="form-group">

            <label for="inputDimension">Dimension :</label>
            <input type="text" name="dimension" id="inputDimension" placeholder="">
            <?php
                    if (isset($errors["marque"])) {
                        echo "<span class=\"info-error\">{$errors["dimension"]}</span>";
                    }
                    ?>
        </div>

        <div class="form-group">

        <label for="inputPrix">Prix du produit :</label>
        <input type="text" name="prix" id="inputPrix">
        <?php
                    if (isset($errors["prix"])) {
                        echo "<span class=\"info-error\">{$errors["prix"]}</span>";
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