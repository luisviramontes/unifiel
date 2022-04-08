function hola() {
    alert('hola');
}


function display_lobby(value) {
    if (value == "FISICA") {
        document.getElementById('display_fisica').style.display = 'block';
        document.getElementById('display_moral').style.display = 'none';
        document.getElementById('display_autoridad').style.display = 'none';
        document.getElementById('nombre').required = true;
        document.getElementById('apellido_p').required = true;
        document.getElementById('sexo').required = true;
        document.getElementById('rfc').required = false;
        document.getElementById('razon').required = false;
        document.getElementById('nombre_aut').required = false;

        document.getElementById('nombre_text').innerHTML="Nombre"+'<span class="text-danger">*</span>';

    } else if (value == "MORAL") {
        document.getElementById('display_fisica').style.display = 'block';
        document.getElementById('display_moral').style.display = 'block';
        document.getElementById('display_autoridad').style.display = 'none';

        document.getElementById('nombre_text').innerHTML="Nombre del representante legal de la empresa"+'<span class="text-danger">*</span>';


        document.getElementById('rfc').required = true;
        document.getElementById('razon').required = true;
        document.getElementById('nombre_aut').required = false;

    } else {
        document.getElementById('display_fisica').style.display = 'none';
        document.getElementById('display_moral').style.display = 'none';
        document.getElementById('display_autoridad').style.display = 'block';

        document.getElementById('nombre_text').innerHTML="Nombre del representante legal de la autoridad pública"+'<span class="text-danger">*</span>';
      
        document.getElementById('rfc').required = false;
        document.getElementById('razon').required = false;
        document.getElementById('nombre_aut').required = true;

    }
    document.getElementById('calle').required = true;
}

function display_doc(value) {
    if (value == "FISICA") {

        document.getElementById('display_doc_moral').style.display = 'none';
        document.getElementById('display_doc_aut').style.display = 'none';

        document.getElementById('acta_moral').required = false;
        document.getElementById('nom_rep_leg').required = false;
        document.getElementById('ident_text').innerHTML="Identificación oficial con fotografía "+'<span class="text-danger">*</span>';


    } else if (value == "MORAL") {
       
    document.getElementById('ident_text').innerHTML="Identificación oficial con fotografía del representante legal de la empresa"+'<span class="text-danger">*</span>';
        document.getElementById('display_doc_moral').style.display = 'block';
        document.getElementById('display_doc_aut').style.display = 'none';

        document.getElementById('acta_moral').required = true;
        document.getElementById('nom_rep_leg').required = false;

    } else {
        document.getElementById('ident_text').innerHTML="Identificación oficial con fotografía del representante legal de la autoridad pública"+'<span class="text-danger">*</span>';
        document.getElementById('display_doc_moral').style.display = 'none';
        document.getElementById('display_doc_aut').style.display = 'block';

        document.getElementById('acta_moral').required = false;
        document.getElementById('nom_rep_leg').required = true;

    }

}

//FUNCION PARA PERMITIR SOLO NUMEROS
function soloNumeros(e) {
    key = e.keyCode || e.which;
    tecla = String.fromCharCode(key);
    letras = " 1,2,3,4,5,6,7,8,9,0,.";
    especiales = "8-37-39-46";

    tecla_especial = false
    for (var i in especiales) {
        if (key == especiales[i]) {
            tecla_especial = true;
            break;
        }
    }

    if (letras.indexOf(tecla) == -1 && !tecla_especial) {
        return false;
    }
}

//Función para validar un RFC
// Devuelve el RFC sin espacios ni guiones si es correcto
// Devuelve false si es inválido
// (debe estar en mayúsculas, guiones y espacios intermedios opcionales)
function rfcValido(rfc, aceptarGenerico = true) {
    const re = /^([A-ZÑ&]{3,4}) ?(?:- ?)?(\d{2}(?:0[1-9]|1[0-2])(?:0[1-9]|[12]\d|3[01])) ?(?:- ?)?([A-Z\d]{2})([A\d])$/;
    var validado = rfc.match(re);
    if (!validado)  //Coincide con el formato general del regex?
        return false;
    //Separar el dígito verificador del resto del RFC
    const digitoVerificador = validado.pop(),
        rfcSinDigito = validado.slice(1).join(''),
        len = rfcSinDigito.length,
        //Obtener el digito esperado
        diccionario = "0123456789ABCDEFGHIJKLMN&OPQRSTUVWXYZ Ñ",
        indice = len + 1;
    var suma,
        digitoEsperado;
    if (len == 12) suma = 0
    else suma = 481; //Ajuste para persona moral
    for (var i = 0; i < len; i++)
        suma += diccionario.indexOf(rfcSinDigito.charAt(i)) * (indice - i);
    digitoEsperado = 11 - suma % 11;
    if (digitoEsperado == 11) digitoEsperado = 0;
    else if (digitoEsperado == 10) digitoEsperado = "A";
    //El dígito verificador coincide con el esperado?
    // o es un RFC Genérico (ventas a público general)?
    if ((digitoVerificador != digitoEsperado)
        && (!aceptarGenerico || rfcSinDigito + digitoVerificador != "XAXX010101000"))
        return false;
    else if (!aceptarGenerico && rfcSinDigito + digitoVerificador == "XEXX010101000")
        return false;
    return rfcSinDigito + digitoVerificador;
}

//Handler para el evento cuando cambia el input
// -Lleva la RFC a mayúsculas para validarlo
// -Elimina los espacios que pueda tener antes o después
function validarInput(input) {
    var rfc = input.trim().toUpperCase(),
        resultado = document.getElementById("resultado"),
        valido;
    var rfcCorrecto = rfcValido(rfc);   // ⬅️ Acá se comprueba
    if (rfcCorrecto) {
        document.getElementById("error_rfc").innerHTML = "";
        document.getElementById("error_rfc").value = "0";
        //document.getElementById('submit3').disabled=false;
        valido = "Válido";
        resultado.classList.add("ok");
    } else {
        document.getElementById("error_rfc").innerHTML = "RFC Incorrecto";
        document.getElementById("error_rfc").value = "1";
        // document.getElementById('submit3').disabled=true;
        valido = "No válido-Compruebe el RFC";
        resultado.classList.remove("ok");
    }
    resultado.innerText = "RFC: " + rfc

        + "\nResultado: " + rfcCorrecto

        + "\nFormato: " + valido;

}

//FUNCION PARA SOLO PERMITIR LETRAS
function soloLetras(e) {
    key = e.keyCode || e.which;
    tecla = String.fromCharCode(key).toLowerCase();
    letras = " áéíóúabcdefghijklmnñopqrstuvwxyz.";
    especiales = "8-37-39-46";

    tecla_especial = false
    for (var i in especiales) {
        if (key == especiales[i]) {
            tecla_especial = true;
            break;
        }
    }

    if (letras.indexOf(tecla) == -1 && !tecla_especial) {
        return false;
    }
}

function validaCodigoPostal(value) {
    $.ajax({
        // url: "https://api.copomex.com/query/info_cp/"+value+"?token=81bcc525-986b-4a32-8c95-832197e0e0ce",pruebas
        url: "https://api.copomex.com/query/info_cp/" + value + "?token=pruebas",
        type: 'get',
        dataType: 'json',
        success: function (data) {
            //pais 
            pais = data[0].response.pais;
            $("#pais").empty();
            var x = $('#pais');
            option = new Option(pais, pais, true, true);
            x.append(option).trigger('change');
            //estado
            estado = data[0].response.estado;
            $("#estado").empty();
            var x = $('#estado');
            option = new Option(estado, estado, true, true);
            x.append(option).trigger('change');
            //municipio
            municipio = data[0].response.municipio;
            $("#municipio").empty();
            var x = $('#municipio');
            option = new Option(municipio, municipio, true, true);
            x.append(option).trigger('change');
            //asentamiento
            $("#asentamiento").empty();
            data.forEach(dato => {
                var x = $('#asentamiento');
                option = new Option(dato.response.asentamiento, dato.response.asentamiento, true, true);
                x.append(option).trigger('change');
            });//END FOR EACH    
            $('#asentamiento').append(new Option("Seleccione una opción...", null))
        }
    });
}

function validaCodigoPostalAut(value) {
    $.ajax({
        // url: "https://api.copomex.com/query/info_cp/"+value+"?token=81bcc525-986b-4a32-8c95-832197e0e0ce",pruebas
        url: "https://api.copomex.com/query/info_cp/" + value + "?token=pruebas",
        type: 'get',
        dataType: 'json',
        success: function (data) {
            //pais 
            pais = data[0].response.pais;
            $("#pais_aut").empty();
            var x = $('#pais_aut');
            option = new Option(pais, pais, true, true);
            x.append(option).trigger('change');
            //estado
            estado = data[0].response.estado;
            $("#estado_aut").empty();
            var x = $('#estado_aut');
            option = new Option(estado, estado, true, true);
            x.append(option).trigger('change');
            //municipio
            municipio = data[0].response.municipio;
            $("#localidad_aut").empty();
            var x = $('#localidad_aut');
            option = new Option(municipio, municipio, true, true);
            x.append(option).trigger('change');
        }
    });
}

function display_autoridad(value) {
    if (value == "SI") {
        document.getElementById('display_aut_cert').style.display = 'block';
        document.getElementById('cn').required = true;
        document.getElementById('ou').required = true;
        document.getElementById('org').required = true;
        document.getElementById('codigo_aut').required = true;
        document.getElementById('localidad_aut').required = true;
        document.getElementById('estado_aut').required = true;
        document.getElementById('pais_aut').required = true;
        document.getElementById('tiempo').required = true;

    } else {
        document.getElementById('display_aut_cert').style.display = 'none';
        document.getElementById('cn').required = false;
        document.getElementById('ou').required = false;
        document.getElementById('org').required = false;
        document.getElementById('codigo_aut').required = false;
        document.getElementById('localidad_aut').required = false;
        document.getElementById('estado_aut').required = false;
        document.getElementById('pais_aut').required = false;
        document.getElementById('tiempo').required = false;
    }

}
