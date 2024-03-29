$(document).ready(function(){

    $.ajax({
        type: "post",
        url: "ajax/leerCarrito.php",
        dataType: "json",
        success: function(response){
            llenaCarrito(response);
        }


    });

    $.ajax({
        type: "post",
        url: "ajax/leerCarrito.php",
        dataType: "json",
        success: function(response){

            llenarTablaCarrito(response);
        }
    });

    function llenarTablaCarrito(response){
        let totalCarrito=0;
        response.forEach(element=>{
            let totalProducto = element['cantidad']* element['precio'];
            totalCarrito+= totalProducto;
            $("#tablaCarrito").append(
               `
                <tr>
                <td><img src="${element['web_path']}" class="img-size-50" /></td>
                <td>${element['nombre']}</td>
                <td>${element['cantidad']}</td>
                <td>$${element['precio']}</td>
                <td>$${totalProducto}</td>
                <td><i class="fa fa-trash text-danger"></i></td>
                </tr>    
                `
            );


        });
        $("#tablaCarrito").append(
            `
             <tr class="table-primary">
             <td colspan="3"></td>
             <td ><h5>Total</h5></td>
             <td><h5>$${totalCarrito}</h5></td>
             <td></td>
             </tr>    
             `
         );
    }


    $("#agregarCarrito").click(function(e){
        e.preventDefault();
        

        let id = $(this).data('id');
        let nombre = $(this).data('nombre');
        let web_path = $(this).data('web_path');
        let cantidad = $('#cantidadProducto').val();
        let precio = $(this).data('precio');

        $.ajax({
            type: "post",
            url: "ajax/agregarCarrito.php",
            data: {"id":id,"nombre":nombre,"web_path":web_path,"cantidad": cantidad, "precio": precio},
            dataType: "json",
            success: function(response){
                    llenaCarrito(response);   
                    $("#badgeProducto").hide(500).show(500);
                    $("#iconoCarrito").click();
            }


        });
        

    });


function llenaCarrito(response){
    let cantidad = Object.keys(response).length;
    if(cantidad>0){
        $("#badgeProducto").text(cantidad);
    }else{
        $("#badgeProducto").text("");
    }

    $("#listaCarrito").text("");
    response.forEach(element =>{
        $("#listaCarrito").append(
            ` <a href="index.php?modulo=detalleProducto&id=${element['id']}" class="dropdown-item">
            <!-- Message Start -->
            <div class="media">
              <img src="${element['web_path']}" class="img-size-50 mr-3 img-circle">
              <div class="media-body">
                <h3 class="dropdown-item-title">
                    ${element['nombre']}
                  <span class="float-right text-sm text-gray"><i class="fas fa-eye"></i></span>
                </h3>
                <p class="text-sm">Cantidad ${element['cantidad']}</p>
               
              </div>
            </div>
            <!-- Message End -->
          </a>
            
            `

        );


    });

    $("#listaCarrito").append(
        ` 
        <a href="index.php?modulo=carrito" class="dropdown-item dropdown-footer text-primary">
        Ver Carrito
        <i class="fa fa-cart-plus ml-2"></i>
        </a>
        <div class="dropdown-divider"></div>
        <a href="#" class="dropdown-item dropdown-footer text-danger" id="borrarCarrito">
        Borrar Carrito
        <i class="fa fa-trash ml-2"></i>
        </a>
        `
    );
}

$(document).on("click","#borrarCarrito", function(e){
    
        e.preventDefault();
        $.ajax({
            type: "post",
            url: "ajax/borrarCarrito.php",
            dataType: "json",
            success: function(response){
                llenaCarrito(response);
            }
    
        });

    



});



});