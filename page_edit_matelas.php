<?php
$id_edit = $_POST["id"];
// $dsn = "mysql:host=localhost;dbname=literie3000_db";
// $db = new PDO($dsn, "root", "");
// $query =  $db->query("SELECT * FROM matelas;");

// $matelas = $query->fetchAll();
// if (!empty($_POST)) {
//     $img = trim(strip_tags($_POST["img"]));
//     $marque = trim(strip_tags($_POST["marque"]));
//     $nom = trim(strip_tags($_POST["nom"]));
//     $dimension = trim(strip_tags($_POST["dimension"]));
//     $prix = trim(strip_tags($_POST["prix"]));
//     $errors = [];
//     if (empty($errors)) {
//         $db = new PDO("mysql:host=localhost;dbname=literie3000_db", "root", "");
//         $query =  $db->prepare("update  matelas where id=:id set img=:img, marque=:marque, nom=:nom, dimension=:dimension, prix=:prix ");
//         $query->bindParam(":id", $id_edit);
//         $query->bindParam(":img", $img);
//         $query->bindParam(":marque", $marque);
//         $query->bindParam(":nom", $nom);
//         $query->bindParam(":dimension", $dimension);
//         $query->bindParam(":prix", $prix);

//         if ($query->execute()) {

//             header("Location: index.php");
//         }
//     }
// }
include("./tpl/header.php");
?>
<div class="container">
    <p>Veuillez modifier les champs ci-dessous pour mettre à jour votre produit.</p>
    <form action="" method="post">
        <div class="form-group">

            <label for="inputImg">Photo produit (sous forme url) :</label>
            <input type="text" name="img" id="inputImg" placeholder="">


        </div>

        <div class="form-group">

            <label for="inputMarque">Marque :</label>
            <input type="text" name="marque" id="inputMarque" placeholder="">

        </div>
        <div class="form-group">

            <label for="inputNom">Nom :</label>
            <input type="text" name="nom" id="inputNom" placeholder="">


        </div>
        <div class="form-group">

            <label for="inputDimension">Dimension :</label>
            <input type="text" name="dimension" id="inputDimension" placeholder="">

        </div>

        <div class="form-group">

            <label for="inputPrix">Prix du produit :</label>
            <input type="text" name="prix" id="inputPrix">

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