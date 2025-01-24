<?php
error_reporting(0);
include("../conexion.php");

$Id = $_REQUEST['Idintercesor'];

$query = "UPDATE intercesores SET Estado=3 WHERE Codigo='$Id'";
$resultado = $conexion->query($query);

if($resultado)
{
	echo '<script>alert("Fürbitter erfolgreich beseitigt")</script>';
	echo "<script>location.href='../../area-admin/germany-admin/furbitter.php'</script>";
}
else
{
	echo '<script>alert("FEHLER ZUM ZEITPUNKT DER AUSFÜHRUNG DER AKTION")</script>';
	echo "<script>location.href='../../area-admin/germany-admin/furbitter.php'</script>";
}
?>