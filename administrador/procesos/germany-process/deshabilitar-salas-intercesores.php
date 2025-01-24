<?php
error_reporting(0);
include("../conexion.php");

$Id = $_REQUEST['Idsalas'];

$query = "UPDATE tbsalas SET Estado=0 WHERE Codigo_sala='$Id'";
$resultado = $conexion->query($query);

if($resultado)
{
	echo '<script>alert("GEBETSRAUM BEHINDERT")</script>';
	echo "<script>location.href='../../area-intercesores/germany-furbitter/virtuelle-furbitter.php'</script>";
}
else
{
	echo '<script>alert("FEHLER ZUM ZEITPUNKT DER AKTIONSAUSFÜHRUNG")</script>';
	echo "<script>location.href='../../area-intercesores/germany-furbitter/virtuelle-furbitter.php'</script>";
}
?>