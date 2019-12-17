<?php
$promo=$_GET['pro'];
$sql="select nombre, anprom, fk_fabrica
      from prom
      where id_prom='$promo'";

include 'conexion.php';
$r=mysqli_query($link,$sql);
$arreglo=mysqli_fetch_array($r);
?>

<form method="post"> 
	
	NOMBRE
	<input type="text" name="nombre" id="nombre" onblur="validarcoder('nombre','agregar','enviar')" value="<?php echo $arreglo[0];?>">
	<span id="agregar"></span>
	AÑO DE PROMOCIÓN
	<input type="date" name="anprom" onblur="validarF(d,m,a,enviar)" value="<?php echo $arreglo[1];?>">
	FABRICA
	<select name="fabr" >
			<?php
			$consulta="select id_fabrica,nombre from fabrica";
			$re=mysqli_query($link,$consulta);
			while ($arr=mysqli_fetch_array($re)){ ?>
			<option value="<?php echo $arr[0];?>" 
				<?php 
				if ($arr[0]==$arreglo[2]){
					echo " selected";
					
				}?>>
				<?php echo $arr[1];?>
			</option>
			
		   <?php } ?>
			
		</select>
	
	
	<input type="submit" name="MODIFICAR" id="enviar" value="MODIFICAR">
	<a href="index.html" class="btn btn-block btn-lg btn-secondary">HOME</a>
</form>

<?php
if (isset($_POST['nombre'])){
	$nom=$_POST['nombre'];
	$anp=$_POST['anprom'];
	$fab=$_POST['fabr'];
	
	$update="update prom set nombre='$nom', anprom='$anp', fk_fabrica='$fab'
	where id_prom='$promo'";
	mysqli_query($link,$update);
	if (mysqli_error($link)){
		header("location:promociones.php?msj=1");
	}
	else {
		header("location:promociones.php?msj=0");
	}


} 
?>
<script type="text/javascript" src="js/registrar.js">
</script>