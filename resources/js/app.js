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

function printCot(id){  
    var url = "print/"+id; 
    window.open(url, "Imprimir", 'location=yes,height=800,width=900,scrollbars=yes,status=yes');      
};