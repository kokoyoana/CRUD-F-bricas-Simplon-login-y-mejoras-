<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <title>Document</title>
</head>
<style type="text/css">
.error {
    background-color: gainsboro;
    color: coral;
}
</style>

<body>
    <div>
    <form action="promo.php" method="post">
  
        <label for="fname" id="label">NOMBRE</label>
        <input type="text" name="nombre" id="nombre" onblur="validarcoder('nombre','agregar','enviar')" placeholder="Escriba el nombre">
        <span id="agregar"></span>
        <label for="fname" id="label">AÑO DE PROMOCIÓN</label><br>
        <input type="date" name="fecha" id="fecha" onblur="validarF()"><br>
        <span id="date"></span><br>
        <label for="fname" id="label">FABRICA</label>
        <select name="promo">
            <?php //consulta base de datos
            include 'conexion.php';
            $consulta = "select id_fabrica,nombre from fabrica";
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