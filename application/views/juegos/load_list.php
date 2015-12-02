<?php include('header.php');
?>

<div class="container">
    <br>
    <br>
    <div class="row">
        <div class="col-lg-12">
            <a href="<?php echo BASE_URL . $controlador . '/load_add' ?>" class="btn btn-danger pull-right">
                Nuevo Registro
            </a>
        </div>	
    </div>



    <table class="table table-hover">
        <thead>
            <tr>
                <th>Id</th>
                <th>Nombre</th>
                <th>descripcion</th>
                <th>categoria</th>
                 <th>año de creacion</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            <?php for ($x = 0; $x < count($items_juegos); $x++): ?>
                <tr>
                    <td><?php echo $items_juegos[$x]->id ?></td>
                    <td><?php echo $items_juegos[$x]->nombre ?></td>
                    <td><?php echo $items_juegos[$x]->descripcion ?></td>
                    <td><?php echo $items_juegos[$x]->categoria?></td>
                    <td><?php echo $items_juegos[$x]->anio_creacion?></td>
                    <td>
                    </td>
                </tr>
            <?php endfor; ?>
        </tbody>
    </table>

</div>
<script src="<?php echo BASE_URL; ?>static/js/master/<?php echo $controlador . '.js' ?>"></script>
<?php include('footer.php'); ?>


