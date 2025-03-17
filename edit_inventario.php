<?php

include("connection.php");
$con = connection();

$Id=$_POST["Id"];
$producto = $_POST['producto'];
$cantidad = $_POST['cantidad'];
$valor = $_POST['valor'];

$sql="UPDATE inventario SET producto='$producto', cantidad='$cantidad', valor='$valor' WHERE Id='$Id'";
$query = mysqli_query($con, $sql);

if($query){
    Header("Location: index.php");
}else{

}

?>