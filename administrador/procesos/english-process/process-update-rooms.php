<?php
error_reporting(0);
include("../conexion.php");

$Id = $_REQUEST['Idsalas'];

$titulo = $_POST['Nombre_sala'];
$plataforma = $_POST['Plataforma'];
$Url = $_POST['Url'];
$idioma = $_POST['Idioma'];

$query = "UPDATE tbsalas SET Nombre_sala='$titulo', Plataforma = $plataforma,
Url = '$Url' WHERE Codigo_sala='$Id'";
$resultado = $conexion->query($query);

if($resultado)
{
	echo '<script>alert("PRAYER ROOM SUCCESSFULLY UPDATED")</script>';
	echo "<script>location.href='../../area-admin/english-admin/roms-english.php'</script>";
}
else
{
	echo '<script>alert("ERROR THE EXECUTION WAS NOT COMPLETED")</script>';
	echo "<script>location.href='../../area-admin/english-admin/roms-english.php'</script>";
}
?>