<?php
$nom = $_POST['fabrica']; 
$ciu=$_POST['elige'];

//asi insertamos datos en una base de datos
$sql="insert into fabrica (nombre,fk_ciudad,estatus) values ('$nom','$ciu',1)";
include 'conexion.php';
mysqli_query($link,$sql);
if (mysqli_error($link)){
		header("location:fabrica.php?msj=1");
	}
	else {
		header("location:fabrica.php?msj=0");
	}


?>