$(document).ready(function(){
    tablaArticulos = $("#tablaArticulos").DataTable({
        "columnDefs":[{
            "targets": -1,
            "data":null,
            "defaultContent": "<div class='text-center'><div class='btn-group'><button class='btn btn-primary btnEditar'>Editar</button><button class='btn btn-danger btnBorrar'>Borrar</button></div></div>"
        }],

        "language": {
            "lengthMenu": "Mostrar _MENU_ registros",
            "zeroRecords": "No se encontraron resultados",
            "info": "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
            "infoEmpty": "Mostrando registros del 0 al 0 de un total de 0 registros",
            "infoFiltered": "(filtrado de un total de _MAX_ registros)",
            "sSearch": "Buscar:",
            "oPaginate": {
                "sFirst": "Primero",
                "sLast":"Último",
                "sNext":"Siguiente",
                "sPrevious": "Anterior"
            },
            "sProcessing":"Procesando...",
        }
    });

    $("#btnNuevo").click(function(){
        $("#formArticulos").trigger("reset");
        $(".modal-header").css("background-color", "#28a745");
        $(".modal-header").css("color", "white");
        $(".modal-title").text("Nuevo Articulo");            
        $("#modalCRUD").modal("show");        
        id=null;
        opcion = 1; //alta
    });

    var fila; //capturar la fila para editar o borrar el registro
    
//botón EDITAR    
$(document).on("click", ".btnEditar", function(){
    fila = $(this).closest("tr");
    id = parseInt(fila.find('td:eq(0)').text());
    descripcion = fila.find('td:eq(1)').text();
    precio = parseInt(fila.find('td:eq(2)').text());
    stock = parseInt(fila.find('td:eq(3)').text());
    
    $("#descripcion").val(descripcion);
    $("#precio").val(precio);
    $("#stock").val(stock);
    opcion = 2; //editar
    
    $(".modal-header").css("background-color", "#007bff");
    $(".modal-header").css("color", "white");
    $(".modal-title").text("Editar Articulo");            
    $("#modalCRUD").modal("show");  
    
});

//botón BORRAR
$(document).on("click", ".btnBorrar", function(){    
    fila = $(this);
    id = parseInt($(this).closest("tr").find('td:eq(0)').text());
    opcion = 3 //borrar
    var respuesta = confirm("¿Está seguro de eliminar el registro: "+id+"?");
    if(respuesta){
        $.ajax({
            url: "../../bd/crud.php",
            type: "POST",
            dataType: "json",
            data: {opcion:opcion, id:id},
            success: function(){
                tablaArticulos.row(fila.parents('tr')).remove().draw();
            }
        });
    }   
});
    
$("#formArticulos").submit(function(e){
    e.preventDefault();    
    descripcion = $.trim($("#descripcion").val());
    precio = $.trim($("#precio").val());
    stock = $.trim($("#stock").val());    
    $.ajax({
        url: "../../bd/crud.php",
        type: "POST",
        dataType: "json",
        data: {descripcion:descripcion, precio:precio, stock:stock, id:id, opcion:opcion},
        success: function(data){  
            console.log(data);
            id = data[0].id;            
            descripcion = data[0].descripcion;
            precio = data[0].precio;
            stock = data[0].stock;
            if(opcion == 1){tablaArticulos.row.add([id,descripcion,precio,stock]).draw();}
            else{tablaArticulos.row(fila).data([id,descripcion,precio,stock]).draw();}            
        }        
    });
    $("#modalCRUD").modal("hide");    
    
});

$('#miModal').modal('hide');
    
});