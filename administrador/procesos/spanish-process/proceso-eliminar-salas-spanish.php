<?php
error_reporting(0);
include("../conexion.php");

$Id = $_REQUEST['Idsalas'];

$query = "UPDATE tbsalas SET Estado = 3 WHERE Codigo_sala='$Id'";
$resultado = $conexion->query($query);

if($resultado)
{
	echo '<script>alert("SALA DE ORACIÓN ELIMINADA EXISTOSAMENTE")</script>';
	echo "<script>location.href='../../area-admin/spanish-admin/salas-spanish.php'</script>";
}
else
{
	echo '<script>alert("ERROR")</script>';
	echo "<script>location.href='../../area-admin/spanish-admin/salas-spanish.php'</script>";
}
?>