<?php

include("connection.php");

$con = connection();

$sql = "SELECT * FROM cliente";

$query = mysqli_query($con, $sql);

?>

<!DOCTYPE html>
<html lang="es">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="style.css" rel="stylesheet">

    <title>Clientes</title>

</head>

<body>

    <div class="inventario-form">

        <h1 style="color:green; font-family:algerian">
            Registrar Cliente
        </h1>

        <form action="insert_cliente.php" method="POST">

            <input 
                type="text" 
                name="nombres" 
                placeholder="Nombres"
                required
            >

            <input 
                type="text" 
                name="appaterno" 
                placeholder="Apellido paterno"
                required
            >

            <input 
                type="text" 
                name="apmaterno" 
                placeholder="Apellido materno"
                required
            >

            <input 
                type="submit" 
                value="Agregar cliente"
            >

        </form>

    </div>


    <div class="inventario-table">

        <h2 style="color:green; font-family:algerian">
            Clientes registrados
        </h2>

        <table>

            <thead>

                <tr>

                    <th>Id</th>

                    <th>Nombres</th>

                    <th>Apellido paterno</th>

                    <th>Apellido materno</th>

                </tr>

            </thead>

            <tbody>

                <?php while ($row = mysqli_fetch_array($query)): ?>

                <tr>

                    <th><?= $row['idcliente'] ?></th>

                    <th><?= htmlspecialchars($row['nombres']) ?></th>

                    <th><?= htmlspecialchars($row['appaterno']) ?></th>

                    <th><?= htmlspecialchars($row['apmaterno']) ?></th>

                </tr>

                <?php endwhile; ?>

            </tbody>

        </table>

    </div>


    <br>

    <a href="index.php">
        Volver al inventario
    </a>

</body>

</html>