<?php
error_reporting(0);
include("../conexion.php");

$Id = $_REQUEST['Idsalas'];

$titulo = $_POST['Nombre_sala'];
$plataforma = $_POST['Plataforma'];
$Url = $_POST['Url'];
$idioma = $_POST['Idioma'];

$query = "UPDATE tbsalas SET Nombre_sala='$titulo', Plataforma = $plataforma,
Url = '$Url', Idioma = $idioma WHERE Codigo_sala='$Id'";
$resultado = $conexion->query($query);

if($resultado)
{
	echo '<script>alert("SALA DE ORACIÓN ACTUALIZADO EXISTOSAMENTE")</script>';
	echo "<script>location.href='../../area-admin/spanish-admin/salas-spanish.php'</script>";
}
else
{
	echo '<script>alert("ERROR EN LA ACTUAZACION")</script>';
	echo "<script>location.href='../../area-admin/spanish-admin/salas-spanish.php'</script>";
}
?>