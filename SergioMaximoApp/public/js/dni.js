$("#enviar").click(function(){
    
    var regex = /^[0-9]{8}[TRWAGMYFPDXBNJZSQVHLCKET]$/i;
    var dni = $("#dni").toString().toUpperCase();

    if(dni.match(regex) && dni != ''){

        var letter = dni.substr(-1);
        var charIndex = parseInt(dni.substr(0, 8)) % 23;
        var str = value.toString().toUpperCase();
        var nie = str
            .replace(/^[X]/, '0')
            .replace(/^[Y]/, '1')
            .replace(/^[Z]/, '2');

        var letter = str.substr(-1);
        var charIndex = parseInt(nie.substr(0, 8)) % 23;

        if (validChars.charAt(charIndex) === letter) return true;

    } else{
        alert("Formato DNI incorrecto, inténtelo de nuevo.");
    }
});