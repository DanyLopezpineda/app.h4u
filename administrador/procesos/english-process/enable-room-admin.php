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
		echo '<script>alert("ENABLED PRAYER ROOM")</script>';
		echo "<script>location.href='../../area-admin/english-admin/roms-english.php'</script>";
	}
}
else
{
	echo '<script>alert("ACTIVATION ERROR")</script>';
	echo "<script>location.href='../../area-admin/english-admin/roms-english.php'</script>";
}
?>