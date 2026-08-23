<?php

include("connection.php");

$con = connection();

$nombres = $_POST["nombres"];
$appaterno = $_POST["appaterno"];
$apmaterno = $_POST["apmaterno"];

$sql = "INSERT INTO cliente (nombres, appaterno, apmaterno)
        VALUES ('$nombres', '$appaterno', '$apmaterno')";

$query = mysqli_query($con, $sql);

if ($query) {

    header("Location: cliente.php");
    exit();

} else {

    echo "Error al registrar el cliente: " . mysqli_error($con);

}

?>