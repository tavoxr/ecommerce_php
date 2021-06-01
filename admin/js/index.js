var editor;
$(document).ready(function(){

    //Delete User
    $(".deleteUser").click(function(e){
      e.preventDefault();
      let message = confirm("Estas seguro de eliminar este usuario?");
      if(message){
        let link = $(this).attr("href");
        window.location= link;
      }
    })


    $(".deleteProduct").click(function(e){
        e.preventDefault();
        let message = confirm("Estas seguro de eliminar este producto?");
        if(message){
          let link = $(this).attr("href");
          window.location= link;
        }
      })



    //DataTables
    editor = new $.fn.dataTable.Editor( {
        ajax: "../controllers/products.php", 
        table: "#tablaProductos",
        fields: [ {
                label: "Nombre",
                name: "nombre"
            }, {
                label: "Precio",
                name: "precio"
            }, {
                label: "Existencia",
                name: "stock"
            }
        ]
    } );
    
    $('#tablaProductos').DataTable( {
        dom: "Bfrtip",
        ajax: "../controllers/products.php",
        columns: [
            { data: "nombre" },
            { data: "precio", render: $.fn.dataTable.render.number( ',', '.', 0, '$' ) },
            { data: "stock" },
        ],
        select: true,
        buttons: [
            { extend: "create", editor: editor },
            { extend: "edit",   editor: editor },
            { extend: "remove", editor: editor }
        ]
    } );






  
  
  });


