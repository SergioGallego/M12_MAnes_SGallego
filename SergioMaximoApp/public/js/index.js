$("#alumno").mouseenter(function(){
    $("#info").html("Desde esta vista podrás consultar toda la informacion de los alumnos registrados en la base de datos, así como dar de alta y baja en caso de entrar como superusuario.<br>");
    $("#img1").attr("src", "https://raw.githubusercontent.com/SergioGallego/M12_MAnes_SGallego/main/img/Usuario-Alumnos.drawio.png");
    $("#img2").attr("src", "https://raw.githubusercontent.com/SergioGallego/M12_MAnes_SGallego/main/img/Detalles-Alumno.drawio.png");
});

$("#usuario").mouseenter(function(){
    $("#info").text("Desde la vista de usuarios puedes consultar la informacion de cada usuario, incluyendo su rol que puede variar entre profesor (ver informacion de sus modulos y poner notas a sus alumnos) y superusuario (añadir usuarios, ya sean profesores u otros superusuarios).");
    $("#img1").attr("src", "https://raw.githubusercontent.com/SergioGallego/M12_MAnes_SGallego/main/img/Admin-Usuarios.drawio.png");
    $("#img2").attr("src", "https://raw.githubusercontent.com/SergioGallego/M12_MAnes_SGallego/main/img/Detalles-Usuario.drawio.png");
});

$("#ciclo").mouseenter(function(){
    $("#info").text("Desde esta vista puedes consultar la informacion de todos los ciclos, dar de alta nuevos y consultar las notas estadisticas de cada uno.");
    $("#img1").attr("src", "https://raw.githubusercontent.com/SergioGallego/M12_MAnes_SGallego/main/img/Usuarios-Ciclos.drawio.png");
    $("#img2").attr("src", "https://raw.githubusercontent.com/SergioGallego/M12_MAnes_SGallego/main/img/Estadisticas-Ciclos-1.drawio.png");
});

$("#modulo").mouseenter(function(){
    $("#info").text("Desde esta vista podras consultar todos los modulos de la base de datos y el ciclo que pertenece, además de añadir y borrarlos.");
    $("#img1").attr("src", "https://raw.githubusercontent.com/SergioGallego/M12_MAnes_SGallego/main/img/Usuarios-Modulos.drawio.png");
    $("#img2").attr("src", "https://raw.githubusercontent.com/SergioGallego/M12_MAnes_SGallego/main/img/Detalles-Modulos.drawio.png");
});

$("#modulo, #ciclo, #usuario, #alumno").mouseenter(function(){
    $(this).css("background-color", "#fcddbd");
    $("#info, #info2").css("display", "block");
});

$("#modulo, #ciclo, #usuario, #alumno").mouseleave(function(){
    $("#info, #info2").css("display", "none");
    $(this).css("background-color", "#FFC288");
});
