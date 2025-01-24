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
		echo '<script>alert("SALLE DE PRIÈRE ACTIVÉE")</script>';
		echo "<script>location.href='../../area-intercesores/french-intercesores/salles-intercesseurs.php'</script>";
	}
}
else
{
	echo '<script>alert("ERREUR")</script>';
	echo "<script>location.href='../../area-intercesores/french-intercesores/salles-intercesseurs.php'</script>";
}
?>