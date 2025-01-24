<?php
error_reporting(0);
include("../conexion.php");

$Id = $_REQUEST['Idsalas'];

$query = "UPDATE tbsalas SET Estado=1 WHERE Codigo_sala='$Id'";
$resultado = $conexion->query($query);

$Codigo = $_REQUEST['Idsalas'];

$audi = "INSERT INTO activintercesores (Intercesor, Fecha) VALUES ('$Codigo',DATE(NOW()))";
$auditoria = $conexion->query($audi);

if($auditoria){

	if($resultado)
	{
		echo '<script>alert("SALA DE ORACIÓN HABILITADA")</script>';
		echo "<script>location.href='../../area-admin/spanish-admin/salas-spanish.php'</script>";
	}
}

else
{
	echo '<script>alert("ERROR EN LA ACTIVACIÓN")</script>';
	echo "<script>location.href='../../area-admin/spanish-admin/salas-spanish.php'</script>";
}
?>