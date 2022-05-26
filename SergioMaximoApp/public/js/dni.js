$("#enviar").click(function(){

    event.preventDefault();
    var validChars = 'TRWAGMYFPDXBNJZSQVHLCKET';
    var regex = /^[0-9]{8}[TRWAGMYFPDXBNJZSQVHLCKET]$/i;
    var dni = $("#dni").val().toUpperCase();

    if(dni.match(regex) && dni != ''){
        var letter = dni.substr(-1);
        var charIndex = parseInt(dni.substr(0, 8)) % 23;
        if (validChars.charAt(charIndex) === letter){
            $('form').submit();
        } else{
            alert("Los digitos no corresponden con la letra introducida, inténtelo de nuevo.");
        }
    } else{
        alert("Formato DNI incorrecto, inténtelo de nuevo.");
    }
    
});