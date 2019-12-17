<?php

include 'conexion.php';

$idprom = $_GET['idprom'];

$eliminar =  "UPDATE prom SET estatus=0  where id_prom='$idprom'";
$resultado= mysqli_query($link,$eliminar);
if (mysqli_error($link)){
		header("location:promociones.php?msj=1");
	}
	else {
		header("location:promociones.php?msj=0");
	} 

    ?>