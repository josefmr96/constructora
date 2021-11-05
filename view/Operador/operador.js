var tabla;

function init(){
    $("#usuario_form").on("submit",function(e){
        guardaryeditar(e);	
    });
}

function guardaryeditar(e){
    e.preventDefault();
	var formData = new FormData($("#usuario_form")[0]);
    swal({
        title: "Estas seguro de Agregar este Registro?",
        type: "warning",
        showCancelButton: true,
        confirmButtonColor: "#DD6B55",
        confirmButtonText: "Si, Agregar!",
        closeOnConfirm: false
    }, function (isConfirm) {
        if (!isConfirm) return;
        $.ajax({
            url: "../../controller/operador/operadorController.php?op=guardaryeditar",
            type: "POST",
            data: formData,
            contentType: false,
            processData: false,
            dataType: "html",
            success: function () {
                $('#usuario_form')[0].reset();
                $("#modalOperador").modal('hide');
                $('#usuario_data').DataTable().ajax.reload();
    
                swal({
                    title: "Agregado Correctamente!",
                    text: "Completado.",
                    type: "success",
                    confirmButtonClass: "btn-success"
                });
            },
            error: function (xhr, ajaxOptions, thrownError) {
                swal("Error!", "No se pudo agregar el registro", "error");
            }
        });
    });
}

$(document).ready(function(){
    tabla=$('#usuario_data').dataTable({
        "aProcessing": true,
        "aServerSide": true,
        dom: 'Bfrtip',
        "searching": true,
        lengthChange: false,
        colReorder: true,
        buttons: [		          
             
                // 'excelHtml5',
                // 'csvHtml5',
                // 'pdfHtml5'
                ],
        "ajax":{
            url: '../../controller/operador/operadorController.php?op=listar',
            type : "post",
            dataType : "json",						
            error: function(e){
                console.log(e.responseText);	
            }
        },
        "bDestroy": true,
        "responsive": true,
        "bInfo":true,
        "iDisplayLength": 10,
        "autoWidth": false,
        "language": {
            "sProcessing":     "Procesando...",
            "sLengthMenu":     "Mostrar _MENU_ registros",
            "sZeroRecords":    "No se encontraron resultados",
            "sEmptyTable":     "Ningún dato disponible en esta tabla",
            "sInfo":           "Mostrando un total de _TOTAL_ registros",
            "sInfoEmpty":      "Mostrando un total de 0 registros",
            "sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
            "sInfoPostFix":    "",
            "sSearch":         "Buscar:",
            "sUrl":            "",
            "sInfoThousands":  ",",
            "sLoadingRecords": "Cargando...",
            "oPaginate": {
                "sFirst":    "Primero",
                "sLast":     "Último",
                "sNext":     "Siguiente",
                "sPrevious": "Anterior"
            },
            "oAria": {
                "sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
                "sSortDescending": ": Activar para ordenar la columna de manera descendente"
            }
        }     
    }).DataTable(); 
});

function editar(idOperador){
    $('#mdltitulo').html('Editar Registro');

    $.post("../../controller/operador/operadorController.php?op=mostrar", {idOperador : idOperador}, function (data) {
        console.log(data);
        data = JSON.parse(data);
        $('#idOperador').val(data.idOperador);
        $('#operador').val(data.operador);
        $('#descripcion').val(data.descripcion);
    }); 

    $('#modalOperador').modal('show');
}

function eliminar(idOperador){
    swal({
        title: "Registro",
        text: "Esta seguro de Eliminar el registro?",
        type: "error",
        showCancelButton: true,
        confirmButtonClass: "btn-danger",
        confirmButtonText: "Si",
        cancelButtonText: "No",
        closeOnConfirm: false
    },
    function(isConfirm) {
        if (isConfirm) {
            $.post("../../controller/operador/operadorController.php?op=eliminar", {idOperador : idOperador}, function (data) {

            }); 

            $('#usuario_data').DataTable().ajax.reload();	

            swal({
                title: "Registro!",
                text: "Registro Eliminado.",
                type: "success",
                confirmButtonClass: "btn-success"
            });
        }
    });
}

$(document).on("click","#btnnuevo", function(){
    $('#mdltitulo').html('Nuevo Registro');
    $('#usuario_form')[0].reset();
    $('#modalOperador').modal('show');
});

init();