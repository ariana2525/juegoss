$(document).ready(function() {
                $("#boton").click(function(event) {
                    
                    $("#contenido").load('<?php echo BASE_URL . $controlador . "/load_enero" ?> ',function(){
                       
                    });


                });
            });

