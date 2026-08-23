<?php
include("connection.php");
$con = connection();

$sql = "SELECT * FROM producto";
$query = mysqli_query($con, $sql);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="style.css" rel="stylesheet">
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

                    <th><?= $row['idproducto'] ?></th>
                    <th><?= $row['nombre'] ?></th>
                    <th><?= $row['stokc'] ?></th>
                    <th><?= $row['precioproducto'] ?></th>
                    <th><a href="update.php?Id=<?= $row['idproducto'] ?>" class="inventario-table--edit">Editar</a></th>
                    <th>
                    <button 
                    type="button"
                    class="inventario-table--delete"
                    onclick="confirmarEliminacion(<?= $row['idproducto'] ?>, '<?= htmlspecialchars($row['nombre'], ENT_QUOTES) ?>')">
                    Eliminar
                </button>
             </th>
                </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    </div>
<style>
    .ventana-confirmacion {
        display: none;
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: rgba(0, 0, 0, 0.6);
        justify-content: center;
        align-items: center;
        z-index: 1000;
    }

    .cuadro-confirmacion {
        background: white;
        width: 400px;
        padding: 30px;
        border-radius: 10px;
        text-align: center;
        box-shadow: 0 0 15px rgba(0,0,0,0.4);
    }

    .cuadro-confirmacion h2 {
        color: #b11e1e;
        margin-bottom: 15px;
    }

    .cuadro-confirmacion p {
        font-size: 18px;
        margin-bottom: 25px;
    }

    .boton-cancelar {
        background: #777;
        color: white;
        border: none;
        padding: 10px 20px;
        border-radius: 5px;
        cursor: pointer;
        margin-right: 10px;
    }

    .boton-confirmar {
        background: #b11e1e;
        color: white;
        border: none;
        padding: 10px 20px;
        border-radius: 5px;
        cursor: pointer;
    }

    .boton-cancelar:hover {
        background: #555;
    }

    .boton-confirmar:hover {
        background: #8c1515;
    }
</style>

<div id="ventanaConfirmacion" class="ventana-confirmacion">

    <div class="cuadro-confirmacion">

        <h2>⚠️ Confirmar eliminación</h2>

        <p>
            ¿Estás seguro de que deseas eliminar
            <strong id="nombreProducto"></strong>
            de tu inventario?
        </p>

        <button 
            type="button" 
            class="boton-cancelar"
            onclick="cerrarConfirmacion()">
            Cancelar
        </button>

        <button 
            type="button" 
            class="boton-confirmar"
            onclick="eliminarProducto()">
            Sí, eliminar
        </button>

    </div>

</div>

<script>

    let idProductoEliminar = null;

    function confirmarEliminacion(id, nombre) {

        idProductoEliminar = id;

        document.getElementById("nombreProducto").textContent = '"' + nombre + '"';

        document.getElementById("ventanaConfirmacion").style.display = "flex";
    }

    function cerrarConfirmacion() {

        document.getElementById("ventanaConfirmacion").style.display = "none";

        idProductoEliminar = null;
    }

    function eliminarProducto() {

        if (idProductoEliminar !== null) {

            window.location.href = "delete_inventario.php?Id=" + idProductoEliminar;

        }

    }

</script>
</body>

</html>