<?php
$fabrica=$_GET['fabri'];
$sql="select nombre, fk_ciudad
      from fabrica
      where ID_FABRICA='$fabrica'";

include 'conexion.php';
$r=mysqli_query($link,$sql);
$arreglo=mysqli_fetch_array($r);
?>
<form method="post">
    NOMBRE
    <input type="text" name="nombre" id="fabrica" onblur="validarF(d,m,a,enviar)" value="<?php echo $arreglo[0];?>">
    <span id="agregar"></span>
    CIUDAD
    <select name="ciudad">
        <?php
			$consulta="select id_ciudad,nombre from ciudad";
			$re=mysqli_query($link,$consulta);
			while ($arr=mysqli_fetch_array($re)){ ?>
        <option value="<?php echo $arr[0];?>" <?php if ($arr[0]==$arreglo[1]){ echo " selected" ; }?>>
            <?php echo $arr[1];?>
        </option>
        <?php } ?>
    </select>
    <input type="submit" id="enviar" name="MODIFICAR">
    <a href="index.html" class="btn btn-block btn-lg btn-secondary">HOME</a>
</form>
<script type="text/javascript" src="js/registrar.js">
</script>
<?php
if (isset($_POST['nombre'])){
	$nom=$_POST['nombre'];
	$ciu=$_POST['ciudad'];
	
	$update="update fabrica set nombre='$nom', fk_ciudad='$ciu'
	where id_fabrica='$fabrica'";
	mysqli_query($link,$update);
	if (mysqli_error($link)){
		header("location:fabrica.php?msj=1");
	}
	else {
		header("location:fabrica.php?msj=0");
	}
} 
?>