
/* Validación de DNI
   Versión 1.0
   Autor: Sergio Gallego
*/

/* Esta funcion valida si el DNI introducido por el usuario cumple con la expresión regular y la formula para calcular la letra del DNI */

$("#enviar").click(function(){

    event.preventDefault(); //Inhabilita el envío del formulario
    var validChars = 'TRWAGMYFPDXBNJZSQVHLCKET';
    var regex = /^[0-9]{8}[TRWAGMYFPDXBNJZSQVHLCKET]$/i;
    var dni = $("#dni").val().toUpperCase(); //Guarda el valor del campo, todo en mayúsculas, en una variable

    if(dni.match(regex) && dni != ''){ //Compara lo introducido con la expresión regular
        var letter = dni.substr(-1); //Si es correcto, guarda en una variable las letras del DNI introducido
        var charIndex = parseInt(dni.substr(0, 8)) % 23; //Calcula la posición en la variable validChars a partir de los digitos y una formula
        if (validChars.charAt(charIndex) === letter){ //Compara si la letra que hemos introducido nosotros equivale a la letra situada en la variable validChars en la posicion formulada
            $('form').submit(); //Si coincide, permite el envío del formulario
        } else{ //Si no lo permite, avisa al usuario del problema
            alert("Los digitos no corresponden con la letra introducida, inténtelo de nuevo.");
        }
    } else{ //Si lo introducido no cumple con la expresión regular avisa al usuario del problema
        alert("Formato DNI incorrecto, inténtelo de nuevo.");
    }
    
});