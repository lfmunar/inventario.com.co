<?php

include("connection.php");
$con = connection();

$Id=$_GET["Id"];

$sql="DELETE FROM inventario WHERE Id='$Id'";
$query = mysqli_query($con, $sql);

if($query){
    Header("Location: index.php");
}else{

}

?>