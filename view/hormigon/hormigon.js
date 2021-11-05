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
            url: "../../controller/hormigon/hormigonController.php?op=guardaryeditar",
            type: "POST",
            data: formData,
            contentType: false,
            processData: false,
            dataType: "html",
            success: function () {
                $('#usuario_form')[0].reset();
                $("#modalHormigon").modal('hide');
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
            url: '../../controller/hormigon/hormigonController.php?op=listar',
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

function editar(idHormigon){
    $('#mdltitulo').html('Editar Registro');

    $.post("../../controller/hormigon/hormigonController.php?op=mostrar", {idHormigon : idHormigon}, function (data) {
        console.log(data);
        data = JSON.parse(data);
        $('#idHormigon').val(data.idHormigon);
        $('#tipo_hormigon').val(data.tipo_hormigon);
        $('#tipo_asentamiento').val(data.tipo_asentamiento);
        $('#ordenada_origen').val(data.ordenada_origen);
        $('#pendiente').val(data.pendiente);
        $('#nombreEmpresa').val(data.fk_empresa);
        $('#nombreProveedor').val(data.fk_proveedor);
        $('#descripcion').val(data.descripcion);

        $('#select2-nombreEmpresa-container').html(data.nombreEmpresa);
        $('#select2-nombreProveedor-container').html(data.nombreProveedor);
      
    }); 

    $('#modalHormigon').modal('show');
}

function eliminar(idHormigon){
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
            $.post("../../controller/hormigon/hormigonController.php?op=eliminar", {idHormigon : idHormigon}, function (data) {

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
    $('#modalHormigon').modal('show');
});

init();