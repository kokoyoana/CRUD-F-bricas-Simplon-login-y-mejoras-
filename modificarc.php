<?php
$coder=$_GET['cod'];
$sql="select dni, nombre, apellido, fecha_nac, fk_prom, fk_pais
      from coder
      where id_coder='$coder'";

include 'conexion.php';
$r=mysqli_query($link,$sql);
$arreglo=mysqli_fetch_array($r);
?>
<form method="post">
    DNI
    <input type="text" name="dni" id="dni" placeholder="Dni con letra" onblur="validarDni()" value="<?php echo $arreglo[0];?>">
    <span id="dni"></span>
    NOMBRE
    <input type="text" name="nombre" id="nombre" placeholder="Escriba su nombre" onblur="validarcoder('nombre','nombres','enviar')" value="<?php echo $arreglo[1];?>">
    <span id="nombres"></span>
    APELLIDO
    <input type="text" name="apellido" id="apellido" placeholder="Escriba su apellido" onblur="validarcoder('apellido','apellidos','enviar')" value="<?php echo $arreglo[2];?>">
    <span id="apellidos"></span>
    FECHA DE NACIMIENTO
    <input type="date" name="fecha" id="fecha" onblur="validarF(d,m,a,enviar)" value="<?php echo $arreglo[3];?>">
    <span id="date"></span>
    AÑO DE PROMOCION
    <select name="anaci">
        <?php
			$consulta="select id_prom,anprom from prom";
			$re=mysqli_query($link,$consulta);
			while ($arr=mysqli_fetch_array($re)){?>
        <option value="<?php echo $arr[0];?>" <?php if ($arr[0]==$arreglo[4]){ echo " selected" ; }?>>
            <?php echo $arr[1];?>
        </option>
        <?php } ?>
    </select>
    NACIONALIDAD
    <select name="nacio">
        <?php
			$consultan="select id_pais,nombre from pais";
			$res=mysqli_query($link,$consultan);
			while ($arreg=mysqli_fetch_array($res)){ ?>
        <option value="<?php echo $arreg[0];?>" <?php if ($arreg[0]==$arreglo[5]){ echo " selected" ; }?>>
            <?php echo $arreg[1];?>
        </option>
        <?php } ?>
    </select>
    <input type="submit" name="MODIFICAR" id="enviar" value="MODIFICAR">
    <a href="index.html" class="btn btn-block btn-lg btn-secondary">HOME</a>
</form>
<script type="text/javascript" src="js/registrar.js">
</script>
<?php
if (isset($_POST['dni'])){
	$dni=$_POST['dni'];
	$nom=$_POST['nombre'];
	$ape=$_POST['apellido'];
	$fech=$_POST['fecha'];
	$anp=$_POST['anaci'];
	$nac=$_POST['nacio'];

	
	$update="update coder set  dni='$dni', nombre='$nom', apellido='$ape', fecha_nac='$fech', fk_prom='$anp', fk_pais='$nac'
	where id_coder='$coder'";
	mysqli_query($link,$update);
	if (mysqli_error($link)){
		header("location:coders.php?msj=1");
	}
	else {
		header("location:coders.php?msj=0");
	}


} 
?>