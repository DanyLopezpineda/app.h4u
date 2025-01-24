<?php
error_reporting(0);
include("../conexion.php");

$Id = $_REQUEST['Idsalas'];

$titulo = $_POST['Nombre_sala'];
$plataforma = $_POST['Plataforma'];
$Url = $_POST['Url'];

$query = "UPDATE tbsalas SET Nombre_sala='$titulo', Plataforma = $plataforma,
Url = '$Url' WHERE Codigo_sala='$Id'";
$resultado = $conexion->query($query);

if($resultado)
{
	echo '<script>alert("SALA DE ORACIÓN ACTUALIZADO EXISTOSAMENTE")</script>';
	echo "<script>location.href='../../area-admin/french-admin/salles-admon-french.php'</script>";
}
else
{
	echo '<script>alert("ERROR EN LA ACTUAZACION")</script>';
	echo "<script>location.href='../../area-admin/french-admin/salles-admon-french.php'</script>";
}
?>