$("#enviar").click(function(e){
    event.preventDefault(e);

    var $email = $("#email").val();
    var regex = /^[a-z\_\-\.\0-9]{1,64}@inscamidemar.cat$/;

    if($email.match(regex) && $email != '' ){
        event.submit();
    } else{
        alert("Patron incorrecto");
    }

});