<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body>
    <div class="row">
        <div class="col-md-4">
        </div>
        <div class="col-md-4">
            <form role="role" method="post">
                <div class="form-group">
                    <label for="colFormLabelLg" class="col-form-label col-form-label-lg ">Consulta tu Fabrica</label>
                    <input type="text" name="nombre" class="form-control form-control-lg" id="colFormLabelLg" placeholder="Nombre de la Fabrica">
                    <input type="text" name="pais" class="form-control form-control-lg" id="colFormLabelLg2" placeholder="Nombre del Pais">
                    <!-- <input type="text" name="apellido" class="form-control form-control-lg" id="colFormLabelLg" placeholder="Nombre del Coders">
                        <input type="text" name="nacionalidad" class="form-control form-control-lg" id="colFormLabelLg" placeholder="Nombre del Coders"> -->
                </div>
                <div class="form-group">
                    <input type="submit" class="btn btn-primary btn-lg btn-block" value="CONSULTAR">
                    <a href="index.html" class="btn btn-block btn-lg btn-secondary">HOME</a>
                </div>
            </form>
        </div>
        <div class="col-md-4">
        </div>
    </div>
    <div class="container">
        <div class="table-responsive">
            <?php if (isset($_POST['nombre'])) { ?>
                <table id="Example" data-order='[[1,"asc"]]' data-page-length='25' class="table table-sm
 table-striped table-hover table-bordered">
                    <thead>
                        <!--asi decimos cuantas filas queremos q aparezcan tambien   -->
                        <tr>
                            <th>Nombre</th>
                            <th>Ciudad</th>
                            <th>Acción</th>
                        </tr>
                    </thead>
                    <?php
                    include 'conexion.php';

                    $n = $_POST['nombre'];
                    $n_pais = $_POST['pais'];
                    $fabrik = "SELECT fabrica.nombre, ciudad.nombre, pais.nombre, fabrica.estatus
                    FROM fabrica 
INNER JOIN ciudad ON fabrica.fk_ciudad = ciudad.id_ciudad
INNER JOIN pais ON ciudad.fk_pais = pais.id_pais
where fabrica.nombre like '%$n%' and pais.nombre like'%$n_pais%'and fabrica.estatus='1'";

                    $r = mysqli_query($link, $fabrik);
                    while ($a = mysqli_fetch_array($r)) { ?>

                        <tr>
                            <td><?php echo $a[0]; ?></td>
                            <td><?php echo $a[1]; ?></td>

                            <td>
                                <a href="modificar.php?fabri=<?php echo $a[2]; ?>"> MODIFICAR /</a>
                                <a href="eliminar_fabrica.php?idfab=<?php echo $a[2]; ?>"> ELIMINAR</a>

                            </td>
                        </tr>

                    <?php
                                                                }
                    ?>
                </table>
            <?php }


            ?>
        </div>
    </div>

</body>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

<!--datatables-->
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/dt-1.10.18/datatables.min.css" />
<script type="text/javascript" src="https://cdn.datatables.net/v/bs4/dt-1.10.18/datatables.min.js"></script>
<script type="text/javascript" src="js/datatable.js"></script>
<!--datatables-->


</html>