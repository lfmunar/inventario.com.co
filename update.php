<?php 
    include("connection.php");
    $con=connection();

    $Id=$_GET['Id'];

    $sql="SELECT * FROM inventario WHERE Id='$Id'";
    $query=mysqli_query($con, $sql);

    $row=mysqli_fetch_array($query);
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="css/style.css" rel="stylesheet">
        <title>Editar Inventario</title>
        
    </head>
    <body>
        <div class="inventario-form">
            <h1
            style="color:green; 
            font-family:algerian" 
        >Editar Inventario</h1>
            <form action="edit_inventario.php" method="POST">
                <input type="hidden" name="Id" value="<?= $row['Id']?>">
                <input type="text" name="producto" placeholder="producto" value="<?= $row['producto']?>">
                <input type="text" name="cantidad" placeholder="cantidad" value="<?= $row['cantidad']?>">
                <input type="text" name="valor" placeholder="valor" value="<?= $row['valor']?>">
                
                <input type="submit" value="Actualizar">
            </form>
        </div>
    </body>
</html>