<?php
// Incluir la conexión
include_once '..\..\bd\conexion.php';
$objeto = new Conexion();
$conexion = $objeto->Conectar();

// Consulta a la base de datos para obtener el stock disponible
$sql = "SELECT producto, stock FROM ventas;"; // Cambié la consulta para obtener el stock
$result = $conexion->prepare($sql);
$result->execute();

// Obtener los resultados
$rows = $result->fetchAll(PDO::FETCH_ASSOC);

// Incluir Bootstrap
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <title>Reporte de Stock</title>
</head>
<body>
<div class="container mt-5">
    <h2 class="text-center">Reporte de Stock</h2>
    
    <?php if (count($rows) > 0): ?>
        <table class="table table-bordered table-striped">
            <thead class="thead-dark">
                <tr>
                    <th>Producto</th>
                    <th>Stock Disponible</th>
                    <th>Semáforo</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($rows as $row): ?>
                    <?php
                    $producto = $row['producto'];
                    $stock = $row['stock'];
                    $color = "";

                    // Asignar color del semáforo según la cantidad de stock disponible
                    if ($stock > 20) {
                        $color = "green";
                    } elseif ($stock >= 12) {
                        $color = "yellow";
                    } else {
                        $color = "red";
                    }
                    ?>
                    <tr>
                        <td><?php echo htmlspecialchars($producto); ?></td>
                        <td><?php echo htmlspecialchars($stock); ?></td>
                        <td>
                            <div style='width: 20px; height: 20px; background-color: <?php echo $color; ?>; border-radius: 50%;'></div>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php else: ?>
        <div class="alert alert-warning" role="alert">
            No hay resultados.
        </div>
    <?php endif; ?>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.0.7/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
