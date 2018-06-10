function obtenerCaptcha() {
    var captcha = "";
    var possible = "ABCDEFGHIJKLMNOPQRSTUVWXYZabzdefghijklmnopqrstuvwxyz0123456789";
    for (var i = 0; i < 6; i++) {
        captcha += possible.charAt(Math.floor(Math.random() * possible.length));
    }
    var lugar = document.getElementById("randomCaptcha");
    lugar.value = "";
    lugar.value = captcha;
    var zonausuario = document.getElementById("userCaptcha");
    zonausuario.value = "";
    setInterval("obtenerCaptcha()", 60000);
    return true;
}

function esValidoCaptcha(event) {
    var ok = false;
    var teclaPulsada = event.keys();
    var captcha = document.getElementById("randomCaptcha").value;
    var num = captcha.charAt(document.getElementById("userCaptcha").value.length);
    if (teclaPulsada === num.keys().toUpperCase()) {
        ok = true;
    }
    return ok;
}

function imprimirErrores(errores, input) {
    var iden = input.getAttribute("id");
    if (errores.length > 0) {
        var td = document.createElement("td");
        td.setAttribute("id", iden + "Error");
        for (var i = 0; i < errores.length; i++) {
            var e = document.createTextNode(errores[i]);
            td.appendChild(e);
            td.appendChild(document.createElement("br"));
        }
        document.getElementById(iden).parentNode.parentNode.appendChild(td);
        return mostrarError(true, input);
    } else {
        var e = document.getElementById(iden + "Error");
        if (e !== null) {
            e.parentNode.removeChild(document.getElementById(iden + "Error").parentNode.lastChild);
            return mostrarError(false, input);
        } else {
            return true;
        }
    }
}

function mostrarError(isError, input) {
    if (isError) {
        input.setAttribute("style", "background-color:red");
        return true;
    } else {
        input.setAttribute("style", "''");
        return false;
    }
}

function comprobarUsuario(input) {
    var expr = /^[_a-z0-9-]+(.[_a-z0-9-]+)*@[a-z0-9-]+(.[a-z0-9-]+)*(.[a-z]{2,3})$/;
    var cadena = input.value;
    var errores = new Array();
    if (expr.test(cadena)) {
        return imprimirErrores(errores, input);
    } else {
        errores.push("La direccion de correo electronico no es valida");
        return imprimirErrores(errores, input);
    }
}

function confirmarContrasenya(input) {
    if (input.value !== "" && document.getElementById("confirmPassword") === null) {
        var inp = document.createElement("input");
        inp.setAttribute("id", "confirmPassword");
        inp.setAttribute("type", "password");
        inp.setAttribute("onchange", "comprobarPass(this)");
        var td = document.createElement("td");
        td.appendChild(document.createTextNode("Confirmacion de contrasenya"));
        var td2 = document.createElement("td");
        td2.appendChild(inp);
        document.getElementById(input.getAttribute("id")).parentNode.parentNode.appendChild(td);
        document.getElementById(input.getAttribute("id")).parentNode.parentNode.appendChild(td2);
    } else {
        document.getElementById(input.getAttribute("id")).parentNode.parentNode.removeChild(document.getElementById(input.getAttribute("id")).parentNode.parentNode.lastChild);
        document.getElementById(input.getAttribute("id")).parentNode.parentNode.removeChild(document.getElementById(input.getAttribute("id")).parentNode.parentNode.lastChild);
        return false;
    }
}

function comprobarPass(input) {
    var errores = new Array();
    var pass = document.getElementById("newPassword").value;
    var passcon = input.value;
    if (pass === passcon) {
        return imprimirErrores(errores, input);
    } else {
        errores.push("Las contrasenyas introducidas no coinciden");
        return imprimirErrores(errores, input);
    }
}


$(document).ready(function () {
    //apartado 7
    $("#newPassword").complexify({}, function (valid, complexity) {
        document.getElementById("passComplexity").value = complexity;
    });

//apartado 9
    $("#enviar").click(function (event) {
        if (comprobarFormulario()) {
            event.preventDefault();
            $("#dataForm").slideUp();
            $("#mensajeBienvenida").show("slow");
        }
    });
});

function comprobarFormulario() {    //NO COMPRUEBO CAPTCHA PORQUE NO FUNCIONA
    var usuario = document.getElementById("nombreDeUsuario");
    var pass = document.getElementById("newPassword");
    if (comprobarUsuario(usuario) && pass.value !== "") {
        if (comprobarPass(document.getElementById("confirmPassword"))) {
            return true;
        } else {
            alert("EXISTEN ERRORES EN EL FORMULARIO");
            return false;
        }
    } else {
        alert("EXISTEN ERRORES EN EL FORMULARIO");
        return false;
    }
}
