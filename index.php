<?php
include("connection.php");
$con = connection();

$sql = "SELECT * FROM inventario";
$query = mysqli_query($con, $sql);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="CSS/style.css" rel="stylesheet">
    <title>inventario</title>
</head>

<body>
    <div class="inventario-form">
        <h1
        style="color:green; 
        font-family:algerian" 
        >Ingresar productos</h1>
        <form action="insert_inventario.php" method="POST">
            <input type="text" name="producto" placeholder="producto">
            <input type="text" name="cantidad" placeholder="cantidad">
            <input type="text" name="valor" placeholder="valor">

            <input type="submit" value="Agregar">
        </form>
    </div>

    <div class="inventario-table">
        <h2
        style="color:green; 
        font-family:algerian" 
        >Productos en inventario</h2>
        <table>
            <thead>
                <tr>
                    <th>Id</th>
                    <th>producto</th>
                    <th>cantidad</th>
                    <th>valor</th>
                    <th></th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = mysqli_fetch_array($query)): ?>
                <tr>

                    <th><?= $row['Id'] ?></th>
                    <th><?= $row['producto'] ?></th>
                    <th><?= $row['cantidad'] ?></th>
                    <th><?= $row['valor'] ?></th>
                    <th><a href="update.php?Id=<?= $row['Id'] ?>" class="inventario-table--edit">Editar</a></th>
                    <th><a href="delete_inventario.php?Id=<?= $row['Id'] ?>" class="inventario-table--delete" >Eliminar</a></th>
                    
                </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    </div>

</body>

</html>