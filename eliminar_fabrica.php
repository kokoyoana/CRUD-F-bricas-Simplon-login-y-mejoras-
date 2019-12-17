<?php

include 'conexion.php';

$idfab = $_GET['idfab'];

$eliminar =  "UPDATE fabrica SET estatus=0  where id_fabrica='$idfab'";
$resultado= mysqli_query($link,$eliminar);
if (mysqli_error($link)){
		header("location:fabrica.php?msj=1");
	}
	else {
		header("location:fabrica.php?msj=0");
	}
    ?>