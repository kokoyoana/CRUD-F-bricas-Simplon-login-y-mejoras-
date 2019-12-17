<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <title>SIMLPON</title>
</head>

<body>
    <div>
    <form method="post" action="insertarFabrica.php">
        <label for="fname" id="label">NOMBRE</label>
        <input type="text" name="fabrica" id="fabrica" onblur="validaciones('fabrica','agregar','enviar')">
        <span id="agregar"></span>
        <label for="fname" id="label">CIUDAD</label>
        <select name="elige">
            <?php //consulta base de datos
            include 'conexion.php';
            $consulta = "select id_ciudad,nombre from ciudad";
            $agre = mysqli_query($link, $consulta);
            while ($r= mysqli_fetch_array($agre)) { ?>
            <option value="<?php echo $r[0];?>">
                <?php echo $r[1];?>
            </option>
            <?php } ?>
        </select>
        <input type="submit" id="enviar" value="AGREGAR">
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