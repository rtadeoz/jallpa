// =======================================================================================================
// FUNCIONES =============================================================================================
// =======================================================================================================


// Funcion para mostar elemento (Card)
function showElementCard(idElementCard) {
    //console.log("showElementCard ------------------------");
    //console.log("idElementCard: "+idElementCard);
    //console.log("Comando: $('"+idElementCard+"').show();");
    //console.log("----------------------------------------");
    $(idElementCard).show();
}

// Funcion para ocultar elemento (Card)
function hideElementCard(idElementCard) {
    //console.log("hideElementCard ------------------------");
    //console.log("idElementCard: "+idElementCard);
    //console.log("Comando: $('"+idElementCard+"').hide();");
    //console.log("----------------------------------------");
    $(idElementCard).hide();
}

// Funcion para asignar focus()
function focusInput(idInput) {
    //Focus
    $(idInput).focus();
}

// Funcion para limpiar campos.
function clearInput(idInput) {
    //limpiar
    $(idInput).val("");
    $('.form-line').removeClass('focused');
}

// Funcion para verificar si un valor esta vacio y adicionar o quitar estilo de focus en el campo.
function valElementFocused(idElement, varNameBD) {
    //console.log("valInputFocused ------------------------");
    //console.log("idElement: "+idElement);
    //console.log("varNameBD: "+varNameBD);
    //console.log("----------------------------------------");
    if (varNameBD == '' || varNameBD == null) {
        //console.log("Nulo");
        $(idElement).removeClass('focused');
    } else {
        //console.log("No es nulo");
        $(idElement).addClass('focused');
    }
}

// Funcion de mensajes con limite de tiempo
function showMessageCRUD (idElement, varStatusMessage, varTextMessage) {
    $(idElement).show();
    $(idElement).delay(4000).fadeOut(600);
    $(idElement).html('<div class="alert alert-'+varStatusMessage+' alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>'+varTextMessage+'</div>');
}