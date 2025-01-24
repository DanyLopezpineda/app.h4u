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
	echo '<script>alert("GEBETSRAUM ERFOLGREICH AKTUALISIERT")</script>';
	echo "<script>location.href='../../area-admin/germany-admin/virtuelle-raume.php'</script>";
}
else
{
	echo '<script>alert("FEHLER BEIM AKTUALISIEREN DES RAUMS")</script>';
	echo "<script>location.href='../../area-admin/germany-admin/virtuelle-raume.php'</script>";
}
?>