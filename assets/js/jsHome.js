function ajax_(parametros,url) {

    var resp = $.ajax({
        //data= parametros que se envian a AccionesAjax
        data: parametros,
        //forma en que se envia
        type: 'POST',
        //a donde se envia
        url: url,
        global: false,
        async: false,
        //funcion que ejecuta cuando todo funciona
        success: function (response) {
            return response;
        },
        error: function (request, status, error) {
            return status;
        }
    }).responseText; //fin ajax

    return resp;
}