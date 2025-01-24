<?php
error_reporting(0);
include("../conexion.php");

$Id = $_REQUEST['Idsalas'];

$query = "UPDATE tbsalas SET Estado = 3 WHERE Codigo_sala='$Id'";
$resultado = $conexion->query($query);

if($resultado)
{
	echo '<script>alert("GEBETSRAUM ERFOLGREICH ENTFERNT")</script>';
	echo "<script>location.href='../../area-admin/germany-admin/virtuelle-raume.php'</script>";
}
else
{
	echo '<script>alert("FEHLER BEI DER AUSFÜHRUNG DER AKTION")</script>';
	echo "<script>location.href='../../area-admin/germany-admin/virtuelle-raume.php'</script>";
}
?>