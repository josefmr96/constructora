var tabla;

function init(){
    $("#usuario_form").on("submit",function(e){
        guardaryeditar(e);	
    });
}
function guardaryeditar(e){
    e.preventDefault();
	var formData = new FormData($("#usuario_form")[0]);
    let searchParams = new URLSearchParams(window.location.search)
    searchParams.has('id')
    let param = searchParams.get('id')//id para hacer filtro luego
    let configURL;
    if(param){
         configURL= `../../controller/elemento/elementoController.php?op=guardaryeditar&id=${param}`
    }else{
        configURL=`../../controller/elemento/elementoController.php?op=guardaryeditar`
    }
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
            url: "../../controller/elemento/elementoController.php?op=guardaryeditar",
            type: "POST",
            data: formData,
            contentType: false,
            processData: false,
            dataType: "html",
            success: function () {
                $('#usuario_form')[0].reset();
                $("#modalElementos").modal('hide');
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
    let searchParams = new URLSearchParams(window.location.search)
    searchParams.has('id')
    let param = searchParams.get('id')//id para hacer filtro luego
    let configURL;
    if(param){
         configURL= `../../controller/elemento/elementoController.php?op=listar&id=${param}`
    }else{
        configURL=`../../controller/elemento/elementoController.php?op=listar`
    }
    $("#dispositivos").on("change",function(){
        var id=$(this).val()//obtenemos el valor seleccionado en una variable
        console.log(id)
        $.ajax({
           type:'GET', //aqui puede ser igual get
           url:`../../controller/sensor/buscarSensorController.php?id=${id}`,//aqui va tu direccion donde esta tu funcion php
           data: {'id':id},//aqui tus datos
        }).done(function(lista_localidad){
           $("#fk_sensor").html(lista_localidad)
   
        });
       }),
       $("#nombreEmpresa").on("change",function(){
           var id=$(this).val()//obtenemos el valor seleccionado en una variable
           console.log(id)
           $.ajax({
              type:'GET', //aqui puede ser igual get
              url:`../../controller/obra/buscarObrasController.php?id=${id}`,//aqui va tu direccion donde esta tu funcion php
              data: {'id':id},//aqui tus datos
           }).done(function(lista_localidad){
              $("#fk_obra").html(lista_localidad)
      
           });
          }),
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
            url: `${configURL}`,
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

function editar(idElemento){
    $('#mdltitulo').html('Editar Registro');

    $.post("../../controller/elemento/elementoController.php?op=mostrar", {idElemento : idElemento}, function (data) {
        console.log(data);
        data = JSON.parse(data);
        $('#idElemento').val(data.idElemento);
        $('#nombreEmpresa').val(data.fk_empresa).prop('disabled', true);
        $('#fk_obra').val(data.fk_obra).prop('disabled', true);
        $('#obraInput').val(data.fk_obra);     
        $('#empresaInput').val(data.fk_empresa);     
        $('#elemento').val(data.elemento);     
        $('#hormigon').val(data.fk_hormigon);     
        $('#alarmas').val(data.fk_alarmas);     
        $('#dispositivos').val(data.fk_dispositivo);     
        $('#fk_sensor').val(data.fk_sensor);     
        $('#sensorElse').val(data.fk_sensor);     
        $('#select2-fk_sensor-container').html(data.numero_serie);
        $('#select2-dispositivos-container').html(data.dispositivo);
        $('#select2-nombreEmpresa-container').html(data.nombreEmpresa);
        $('#select2-alarmas-container').html(data.descripcion);
        $('#select2-hormigon-container').html(data.tipo_hormigon);
        $('#select2-fk_obra-container').html(data.nombreObra);
        $('#numero_remito').val(data.numero_remito);
        $('#hora').val(data.hora);
        $('#fecha_hormigonado').val(data.fecha_hormigonado);
      
    }); 

    $('#modalElementos').modal('show');
}

function eliminar(idElemento){
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
            $.post("../../controller/elemento/elementoController.php?op=eliminar", {idElemento : idElemento}, function (data) {

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
    $('#modalElementos').modal('show');
});

init();