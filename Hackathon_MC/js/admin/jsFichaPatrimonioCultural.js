var tabla;

showForm("list");
listar();
// Ocultamos <div> de mensajes
hideElementCard("#mensaje");

$('#frmAddFichaPatrimonioCultural').validate(
{
    rules: {
        // lo que rastrea son los names!
        'patrimonio': { required: true, minlength: 3 }
    },

    highlight: function (input) {
        $(input).parents('.form-line').addClass('error');
    },

    unhighlight: function (input) {
        $(input).parents('.form-line').removeClass('error');
    },
    errorPlacement: function (error, element) {
        $(element).parents('.form-group').append(error);
    },

    submitHandler: submitAddGrupo
});


// Funcion Agregar
function submitAddGrupo()
{
    $("#btnGuardar").prop("disabled", true);
    var formData = new FormData($("#frmAddFichaPatrimonioCultural")[0]);
    $.ajax({
        url: "../../controller/phpFichaPatrimonioCultural.php?op=guardaryeditar",
        type: "POST",
        data: formData,
        contentType: false,
        processData: false,
        dataType: "json",

        success: function () {
            $("#btnGuardar").prop("disabled", false);
            showForm("list");
            tabla.ajax.reload();
            showMessageCRUD("#mensaje", "success","Ficha de Patrimonio cultural creado creado... :)");
        },

        error: function (xhr, ajaxOptions, thrownError) {
            showMessageCRUD("#mensaje", "danger", "NO se puedo crear la Ficha de Patrimonio cultural... :(");
        }

    });
}





    
$('#frmEditFichaPatrimonioCultural').validate(
{
    rules: {
        // lo que rastrea son los names!
        'edit_nombre': { required: true, minlength: 3 }
    },

    highlight: function (input) {
        $(input).parents('.form-line').addClass('error');
    },

    unhighlight: function (input) {
        $(input).parents('.form-line').removeClass('error');
    },
    errorPlacement: function (error, element) {
        $(element).parents('.form-group').append(error);
    },

    submitHandler: submitEditGrupo
});




// Funcion Editar
function submitEditGrupo()
{
    $("#btnEditar").prop("disabled", true);
    var formData = new FormData($("#frmEditFichaPatrimonioCultural")[0]);

    $.ajax({
        url: "../../controller/phpGroupPredication.php?op=guardaryeditar",
        type: "POST",
        data: formData,
        contentType: false,
        processData: false,

        success: function(datos) {
            $("#btnEditar").prop("disabled", false);
            showForm("list");
            tabla.ajax.reload();
            showMessageCRUD("#mensaje", "success","Grupo Actualizado... :)");
        },

        error: function (xhr, ajaxOptions, thrownError) {
            showMessageCRUD("#mensaje", "danger", "NO se puedo actualizar el Grupo... :(");
        }

    });
}


// Funcion Listar
function listar()
{
    tabla=$('#tbllistado').dataTable(
    {
        dom: 'Bfrtip',
        responsive: true,
        // buttons: [
        //     'copy', 'csv', 'excel', 'pdf', 'print'
        // ],
        "aProcessing": true,//Activamos el procesamiento del datatables
        "aServerSide": true,//Paginación y filtrado realizados por el servidor
        "ajax":
                {
                    // url: '../../controller/phpGroupPredication.php?op=listar',
                    url: '../../controller/phpFichaPatrimonioCultural.php?op=listarCRUD',
                    type : "get",
                    dataType : "json",
                    error: function(e){
                        console.log(e.responseText);
                    }
                },
        "bDestroy": true,
        "iDisplayLength": 5,//Paginación
        "lengthChange": false, // muestra [#] registros.
        "order": [[ 1, "asc" ]],//Ordenar (columna,orden)
        "columnDefs": [{ "orderable": false, "targets": 0 }],// Desactiva el ordenamiento de una colunma.
        "autoWidth": false,
        "language": {
            "url": "../../plugins/datatables/dataTables.spanish.lang"
        }
    }).DataTable();
}

function showEditGrupo(idgrupopredicacion, idcongregacion) 
{
    //console.log("Grupo:"+idgrupopredicacion+" - Congregacion:"+idcongregacion);
    $.post("../../controller/phpGroupPredication.php?op=mostrar",{idgrupopredicacion : idgrupopredicacion, idcongregacion : idcongregacion}, function(data, status)
    {
        data = JSON.parse(data);
        // Devolvemos los campos de la BD para mostrarlo en el TEXTBOX
        $("#idgrupopredicacion").val(data.Id_GrupoPredicacion);
        $("#edit_nombre").val(data.Nombre);
        $("#edit_descripcion").val(data.Descripcion);
        valElementFocused("#html_edit_descripcion", data.Descripcion);
        //Mostramos el CARD-EDIT
        showForm("edit");
     })
}

function desactivar(idgrupopredicacion, idcongregacion) 
{
    swal({
        title: "DESACTIVAR GRUPO?",
        text: "Si desactiva el grupo, no podra ser asignado a un publicador.",
        type: "warning",
        showCancelButton: true,
        confirmButtonColor: "#DD6B55",
        cancelButtonText: "Cancelar",
        confirmButtonText: "Si, desactivar!",
        showLoaderOnConfirm: true,
        closeOnConfirm: false
    }, function (isConfirm) {
        if (!isConfirm) return;
        $.ajax({
            url: "../../controller/phpGroupPredication.php?op=desactivar",
            type: "POST",
            data: {idgrupopredicacion : idgrupopredicacion , idcongregacion : idcongregacion},
            dataType: "json",
            success: function () {
                swal("OK!", "El grupo ha sido desactivado!", "success");
                tabla.ajax.reload();
            },
            error: function (xhr, ajaxOptions, thrownError) {
                swal("Error al desactivar!", "Por favor intente de nuevo.", "error");
            }
        });
    });
}


//Funcion que de limpieza
function cleanInput()
{
    // Guardar
    clearInput("#add_nombre");
    clearInput("#add_descripcion");
    
    // Editar
    clearInput("#idgrupopredicacion");
    clearInput("#edit_nombre");
    clearInput("#edit_descripcion");
}

//Función cancelarform
function cancelarform()
{
    cleanInput();
    showForm("list");
}

function showForm(flgAction) 
{
    if (flgAction=="list") {
        showElementCard("#cardListadoRegistros");
        hideElementCard("#cardGuardarRegistro");
        hideElementCard("#cardEditarRegistro");
        //cleanInput();
    }
    else if (flgAction=="save") {
        hideElementCard("#cardListadoRegistros");
        showElementCard("#cardGuardarRegistro");
        hideElementCard("#cardEditarRegistro");
        focusInput("#add_nombre");
        cleanInput();
    }
    else if (flgAction=="edit") {
        hideElementCard("#cardListadoRegistros");
        hideElementCard("#cardGuardarRegistro");
        showElementCard("#cardEditarRegistro");
        focusInput("#edit_nombre");
        //cleanInput();
    } else {
        alert("ERROR SHOW CARD");
    }
}