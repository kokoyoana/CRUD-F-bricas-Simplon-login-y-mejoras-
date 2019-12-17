<?php

include 'conexion.php';

$idcoder = $_GET["idcoder"];

$eliminar =  "DELETE FROM coder  WHERE coder.id_coder='$idcoder'";
$resultado= mysqli_query($link,$eliminar);
if (mysqli_error($link)){
		header("location:coders.php?msj=1");
	}
	else {
		header("location:coders.php?msj=0");
	}

    ?>