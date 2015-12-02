<?php include('header.php');
?>

<div class="container">


    <div >

        <h3>Insertar Juego </h3 >  
        <br> 

    </div>
    <div class="row">
        <div class="col-lg-12">
            <a href="<?php echo BASE_URL . $controlador . '/load_list' ?>" class="btn btn-danger pull-right">Regresar</a>
        </div>
    </div>

    <form action="add_juegos" method="post">
        <div class="row">
            <fieldset>
               
                <div class="col-md-4">
                    <p>Nombre</p>
                    <input   type="text" class="form-control" id="nombre" name="nombre">
                </div>

                <div class="col-md-4">
                    <p>Descripcion</p>
                    <input type="text" class="form-control" id="descripcion" name="descripcion">
                </div>

                 <div class="col-md-4">
                    <p>Categoria</p>
                    <select name="categoria" id="categoria" class="form-control">
                        <option value="">--Seleccione--</option>
                        <option value="ACCION">DEPORTE</option>
                        <option value="TERROR">TERROR</option>
                        <option value="AVENTURA">CARRERA</option>
                        <option value="ESTRATEGIA">CREATIVIDAD</option>

                    </select>
                </div>

                   <div class="col-md-4">
                    <p>Año de creacion</p>
                    <input type="date" class="form-control" id="anio_creacion" name="anio_creacion">
                </div>

                   <div class="col-md-4">
                    <p>Personajes</p>
                    <input type="text" class="form-control" id="personajes" name="personajes">
                </div>



               
            </fieldset>
        </div>


        <br>
        <br>
        <center><button type="submit" class="btn btn-danger"> Registrar</button></center>
   </form>
    

</div>
<script src="<?php echo BASE_URL; ?>static/js/master/<?php echo $controlador . '.js' ?>"></script>
<?php include('footer.php'); ?>

 