<?php

include("connection.php");

$con = connection();

$Id = $_POST["idproducto"];
$nombre = $_POST["nombre"];
$stokc = $_POST["stokc"];
$precioproducto = $_POST["precioproducto"];

$sql = "UPDATE producto 
        SET nombre='$nombre', stokc='$stokc', precioproducto='$precioproducto'
        WHERE idproducto='$Id'";

$query = mysqli_query($con, $sql);

if ($query) {
    header("Location: index.php");
    exit();
} else {
    echo "Error al actualizar: " . mysqli_error($con);
}

?>