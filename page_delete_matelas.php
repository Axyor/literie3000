<?php
$id_del=$_POST["id"];

$db = new PDO("mysql:host=localhost;dbname=literie3000_db", "root", "");
$query =  $db->prepare("delete  from matelas where id=:id ");
$query->bindParam(":id",$id_del);

if ($query->execute()) {
    header("Location: index.php");
}

?>