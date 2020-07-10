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


});
