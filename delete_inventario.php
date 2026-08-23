<?php

include("connection.php");
$con = connection();

$Id=$_GET["Id"];

$sql="DELETE FROM producto WHERE idproducto='$Id'";
$query = mysqli_query($con, $sql);

if($query){
    Header("Location: index.php");
}else{
    echo "Error al eliminar el producto: " . mysqli_error($con);
}

?>