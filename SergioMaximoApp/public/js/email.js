

/* Validación de correo electrónico
   Versión 1.0
   Autor: Sergio Gallego
*/

/* Esta funcion valida si el email introducido cumple con la expresion regular correcta, 
y en caso de hacerlo permitir enviar el formulario */

$("#enviar").click(function(e){ 
    event.preventDefault(e); //Inhabilita el envío del formualrio

    var $email = $("#email").val(); //Guarda el valor del campo email en una variable
    var regex = /^[a-z\_\-\.\0-9]{1,64}@inscamidemar.cat$/;

    if($email.match(regex) && $email != '' ){ //Compara si el campo de email cumple con la expresión regular de arriba
        $("form").submit(); //En caso de cumplirla permite el envío del formulario
    } else{
        alert("ERROR: introduce una cuenta de correo válida (sample@inscamidemar.cat)"); //Si es incorrecto avisa al usuario del problema
    }

});