<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title>SIMLPON</title>
</head>

<body>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-4">
            </div>
            <div class="col-md-4">
                <form role="role" method="post">
                    <div class="form-group">
                        <label for="colFormLabelLg" class="col-form-label col-form-label-lg ">Consulta tu Promoción</label>
                        <input type="text" name="nombre" class="form-control form-control-lg" id="colFormLabelLg1" placeholder="Promoción ">
                    </div>
                    <div class="form-group">
                        <input type="submit" class="btn btn-primary btn-lg btn-block" value="CONSULTAR">
                        <a href="index.html" class="btn btn-block btn-lg btn-secondary">HOME</a>
                    </div>
                </form>
            </div>

        </div>
        <?php

        if (isset($_POST['nombre'])) { ?>
            <table id="Example" data-order='[[1,"asc"]]' data-page-length='25' class="table table-ms table-striped table-hover table-bordered">

                <thead>


                    <tr>
                        <th scope="col">NOMBRE</th>
                        <th scope="col">AÑO DE PROMOCIÓN</th>
                        <th scope="col">FABRICA</th>
                        <th scope="col">ACCIÓN</th>
                    </tr>
                </thead>
                <?php
                include 'conexion.php';
                $n = $_POST['nombre'];
                $promo = "SELECT prom.nombre, prom.anprom, fabrica.nombre, prom.id_prom FROM prom 
              INNER JOIN fabrica ON fabrica.id_fabrica=prom.fk_fabrica
              WHERE prom.nombre LIKE '%$n%' and prom.estatus='1'";
                $r = mysqli_query($link, $promo);
                while ($a = mysqli_fetch_array($r)) { ?>

                    <tr>
                        <td><?php echo $a[0]; ?></td>
                        <td><?php echo $a[1]; ?></td>
                        <td><?php echo $a[2]; ?></td>
                        <td>
                            <a href="modificarp.php?pro=<?php echo $a[3]; ?>"> MODIFICAR /</a>
                            <a href="eliminar_prom.php?idprom=<?php echo $a[3]; ?>"> ELIMINAR</a>
                        </td>
                    </tr>

            <?php   }
                                                        } ?>
            </table>
 


            </div>
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