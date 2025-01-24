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
		echo "<script>location.href='../../area-admin/french-admin/salles-admon-french.php'</script>";
	}
}

else
{
	echo '<script>alert("ERREUR D ACTIVATION")</script>';
	echo "<script>location.href='../../area-admin/french-admin/salles-admon-french.php'</script>";
}
?>