$("#alumno").mouseenter(function(){
    $("#info").html("Desde esta vista podrás consultar toda la informacion de los alumnos registrados en la base de datos, así como dar de alta y baja en caso de entrar como superusuario.<br> <img src='https://raw.githubusercontent.com/SergioGallego/M12DAWProyecto_MAnes_SGallego/main/cropped-logo_calafell_favorit_icon.png' width='10%'>");
    $("#info2").html("");
});

$("#usuario").mouseenter(function(){
    $("#info").text("Desde la vista de usuarios puedes consultar la informacion de cada usuario, incluyendo su rol que puede variar entre profesor (ver informacion de sus modulos y poner notas a sus alumnos) y superusuario (añadir usuarios, ya sean profesores u otros superusuarios).");
});

$("#ciclo").mouseenter(function(){
    $("#info").text("Desde esta vista puedes consultar la informacion de todos los ciclos, dar de alta nuevos y consultar las notas estadisticas de cada uno.");
});

$("#modulo").mouseenter(function(){
    $("#info").text("Desde esta vista podras consultar todos los modulos de la base de datos y el ciclo que pertenece, además de añadir y borrarlos.");
});

$("#modulo, #ciclo, #usuario, #alumno").mouseenter(function(){
    $(this).css("background-color", "#fcddbd");
    $("#info").css("display", "block");
    $("#info2").css("display", "block");
});

$("#modulo, #ciclo, #usuario, #alumno").mouseleave(function(){
    $("#info").css("display", "none");
    $("#info2").css("display", "none");
    $(this).css("background-color", "#FFC288");
});
