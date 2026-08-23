<?php 
    include("connection.php");
    $con=connection();

    $Id=$_GET['Id'];

    $sql="SELECT * FROM producto WHERE idproducto='$Id'";
    $query=mysqli_query($con, $sql);

    $row=mysqli_fetch_array($query);
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="style.css" rel="stylesheet">
        <title>Editar Inventario</title>
        
    </head>
    <body>
        <div class="inventario-form">
            <h1
            style="color:green; 
            font-family:algerian" 
        >Editar Inventario</h1>
            <form action="edit_inventario.php" method="POST">
                <input type="hidden" name="idproducto" value="<?= $row['idproducto']?>">
                <input type="text" name="nombre" placeholder="nombre" value="<?= $row['nombre']?>">
                <input type="text" name="stokc" placeholder="stock" value="<?= $row['stokc']?>">
                <input type="text" name="precioproducto" placeholder="precio" value="<?= $row['precioproducto']?>">
                
                <input type="submit" value="Actualizar">
            </form>
        </div>
    </body>
</html>