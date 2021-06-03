$(document).ready(function(){

    $("#agregarCarrito").click(function(e){
        e.preventDefault();
        

        let id = $(this).data('id');
        let nombre = $(this).data('nombre');
        let web_path = $(this).data('web_path');
        let cantidad = $('#cantidadProducto').val();

        $.ajax({
            type: "post",
            url: "ajax/agregarCarrito.php",
            data: {"id":id,"nombre":nombre,"web_path":web_path,"cantidad": cantidad},
            dataType: "json",
            success: function(response){
                    let cantidad = Object.keys(response).length;
                    $("#badgeProducto").text(cantidad);
            }


        });
        

    });






});