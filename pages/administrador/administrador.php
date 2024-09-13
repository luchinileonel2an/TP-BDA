<?php
include_once '..\..\bd\conexion.php';
$objeto = new Conexion();
$conexion = $objeto->Conectar();

$consulta = "SELECT id, descripcion, precio, stock FROM articulos";
$resultado = $conexion->prepare($consulta);
$resultado->execute();
$data=$resultado->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width = device-width, initial-scale = 1">
    <link rel="shortcut icon" href="#">
    <link rel="stylesheet" href="../../bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="..\..\styles\estilos-bts.css">
    <link rel="stylesheet" href="..\..\plugins\sweetalert\sweetalert2.min.css">
    <link rel="stylesheet" href="../../styles/estilos-bts.css">
    <link rel="stylesheet" type="text/css" href="../../datatables/datatables.min.css">

    <title>CRUD Articulos</title>
</head>

<body>
    <header>
        <h3 class="text-center text-light">Inicio</h3>
    </header>

    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <button id="btnNuevo" type="button" class="btn btn-success">Nuevo</button>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row">
                <div class="col-lg-12">
                    <div class="table-responsive">        
                        <table id="tablaArticulos" class="table table-striped table-bordered table-condensed" style="width:100%">
                        <thead class="text-center">
                            <tr>
                                <th>Id</th>
                                <th>Descripcion</th>
                                <th>Precio</th>                                
                                <th>Stock</th>  
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php                            
                            foreach($data as $dat) {                                                        
                            ?>
                            <tr>
                                <td><?php echo $dat['id'] ?></td>
                                <td><?php echo $dat['descripcion'] ?></td>
                                <td><?php echo $dat['precio'] ?></td>
                                <td><?php echo $dat['stock'] ?></td>    
                                <td></td>
                            </tr>
                            <?php
                                }
                            ?>                                
                        </tbody>        
                    </table>                    
                    </div>
                </div>
        </div>  
    </div>    


    <div class="modal fade" id="modalCRUD" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"></h5>
            </div>
        <form id="formArticulos">    
            <div class="modal-body">
                <div class="form-group">
                <label for="descripcion" class="col-form-label">Descripcion:</label>
                <input type="text" class="form-control" id="descripcion">
                </div>
                <div class="form-group">
                <label for="precio" class="col-form-label">Precio:</label>
                <input type="number" class="form-control" id="precio">
                </div>                
                <div class="form-group">
                <label for="stock" class="col-form-label">Stock:</label>
                <input type="number" class="form-control" id="stock">
                </div>            
            </div>
            <div class="modal-footer">
            <button type="button" class="btn btn-light" onclick="$('#miModal').modal('hide');">Cancelar</button>
                <button type="submit" id="btnGuardar" class="btn btn-dark">Guardar</button>
            </div>
        </form>    
        </div>
    </div>
</div> 

    <script src="../../jquery/jquery-3.7.1.min.js"></script>
    <script src="..\..\popper\popper.min.js"></script>
    <script src="..\..\bootstrap\js\bootstrap.min.js"></script>
    <script type="text/javascript" src="../../datatables/datatables.min.js"></script>
    <script type="text/javascript" src="../administrador/main.js"></script>
</body>

</html>