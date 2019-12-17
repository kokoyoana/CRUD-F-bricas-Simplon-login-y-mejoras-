<?php
include 'conexion.php';
$dni=$_POST['dni'];
$nom= $_POST['nombre']; 
$apel= $_POST['apellido'];
$fec=$_POST['fecha'];
$prom=$_POST['promociones'];
$pa=$_POST['pais'];
//asi insertamos datos en una base de datos
$sql="insert into coder (dni,nombre,apellido,fecha_nac,fk_prom,fk_pais) values ('$dni','$nom','$apel','$fec','$prom','$pa')";

mysqli_query($link,$sql);

if (mysqli_error($link)){
		header("location:coders.php?msj=1");
	}
	else {
		header("location:coders.php?msj=0");
	}

?>