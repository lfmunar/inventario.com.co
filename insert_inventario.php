<?php
include("connection.php");
$con = connection();

$Id = null;
$producto = $_POST['producto'];
$cantidad= $_POST['cantidad'];
$valor = $_POST['valor'];


$sql = "INSERT INTO inventario VALUES('$Id','$producto','$cantidad','$valor')";
$query = mysqli_query($con, $sql);

if($query){
    Header("Location: index.php");
}else{

}

?>