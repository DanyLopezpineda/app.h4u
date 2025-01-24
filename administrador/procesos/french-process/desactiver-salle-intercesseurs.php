<?php
error_reporting(0);
include("../conexion.php");

$Id = $_REQUEST['Idsalas'];

$query = "UPDATE tbsalas SET Estado=0 WHERE Codigo_sala='$Id'";
$resultado = $conexion->query($query);

if($resultado)
{
	echo '<script>alert("SALLE DE PRIÈRE DESACTIVÉE")</script>';
	echo "<script>location.href='../../area-intercesores/french-intercesores/salles-intercesseurs.php'</script>";
}
else
{
	echo '<script>alert("ERREUR")</script>';
	echo "<script>location.href='../../area-intercesores/french-intercesores/salles-intercesseurs.php'</script>";
}
?>