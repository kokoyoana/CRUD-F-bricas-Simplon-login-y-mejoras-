<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <title>SIMPLON</title>
</head>
<style type="text/css">
.error {
    background-color: gainsboro;
    color: coral;
}
</style>

<body>
    <div>
    <form method="post" action="CodersA.php">
        <label for="fname" id="label">DNI</label>
        <input type="text" name="dni" id="dniOk" placeholder=" Dni / Nie con letra mayuscula " onblur="validarDni('dniOk','dni','enviar')"><br>
        <span id="dni"></span>
        <label for="fname" id="label">NOMBRE</label>
        <input type="text" name="nombre" id="nombre" placeholder="Escriba su nombre" onblur="validarcoder('nombre','nombres','enviar')">
        <span id="nombres"></span><br>
        <label for="fname" id="label">APELLIDO</label>
        <input type="text" name="apellido" id="apellido" placeholder="Escriba su apellido" onblur="validarcoder('apellido','apellidos','enviar')">
        <span id="apellidos"></span><br>
        <label for="fname" id="label">FECHA DE NACIMIENTO</label>
        <input type="date" name="fecha" id="fecha" onblur="validarF()">
        <span id="date"></span><br>
        <label for="fname" id="label">PROMOCION</label>
        <select name="promociones">
            <?php //consulta base de datos
            include 'conexion.php';
            $consulta = "select id_prom,nombre,anprom from prom";
            $agre = mysqli_query($link, $consulta);

            while ($r= mysqli_fetch_array($agre)) { ?>
            <option value="<?php echo $r[0];?>">
                <?php echo $r[1] ?>
            </option>
            <?php } ?>
        </select>
        <label for="fname" id="label">PAIS</label>
        <select name="pais">
            <?php 

            $consulta = "select id_pais,nombre from pais";
            $agre = mysqli_query($link, $consulta);

            while ($r= mysqli_fetch_array($agre)) { ?>
            <option value="<?php echo $r[0];?>">
                <?php echo $r[1] ?>
            </option>
            <?php } ?>
        </select>
        <input type="submit" value="ENVIAR" id="enviar">
        <button type="submit"><a href="index.html">INICIO</a></button>
    </form>

    <div class="mensaje">
        <?php
        if(isset($_GET['msj'])){
            if($_GET['msj']==1){
                echo "error en la modificación";
            }
            else{
                echo "exito";
            }
        }
        ?>
    </div>
</div>
    <script type="text/javascript" src="js/registrar.js">
        </script>
</body>

</html>