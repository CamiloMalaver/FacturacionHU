$( document ).ready(function() {

    //Boton Archivos
    $('#btn-archivos').click(function(){
        $.ajax({
            url : "Archivos",
            success : function(data){
                $("#content").html(data);            
            }
        }); 
    });

    //Boton clientes
    $('#btn-clientes').click(function(){
        $.ajax({
            url : "Clientes",
            success : function(data){
                $("#content").html(data);            
            }
        }); 
    });

    //Boton cotizaciones
    $('#btn-cot').click(function(){
        $.ajax({
            url : "Archivos",
            success : function(data){
                $("#content").html(data);            
            }
        }); 
    });

     //Boton cotizaciones
     $('#btn-cuent').click(function(){
        $.ajax({
            url : "ArchivosCuent",
            success : function(data){
                $("#content").html(data);            
            }
        }); 
    });

});
