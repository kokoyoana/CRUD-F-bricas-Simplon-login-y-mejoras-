<?php
include 'conexion.php';
$alias = $_POST['nombre'];
$anno = $_POST['fecha'];
$selecion = $_POST['promo'];
$sql="insert into prom (nombre,anprom,fk_fabrica,estatus) values ('$alias','$anno','$selecion',1)";
mysqli_query($link,$sql);


if (mysqli_error($link)){
		header("location:promociones.php?msj=1");
	}
	else {
		header("location:promociones.php?msj=0");
	}
?>