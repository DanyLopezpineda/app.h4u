<?php
error_reporting(0);
include("../conexion.php");

$Id = $_REQUEST['IdIntercesores'];

$nombre = $_POST['Intercesor'];
$pais = $_POST['C_pais'];
$telefono = $_POST['Telefono'];
$clave = $_POST['Clave'];
$fnacimiento = $_POST['Fnacimiento'];
$lenguaje = $_POST['C_idioma'];

$query = "UPDATE intercesores SET Intercesor='$nombre', Pais = $pais, 
Telefono = '$telefono', Clave = '$clave', Fnacimiento = '$fnacimiento', Lenguaje = $lenguaje
WHERE Codigo='$Id'";
$resultado = $conexion->query($query);

if($resultado)
{
	echo '<script>alert("Fürbitter erfolgreich aktualisiert")</script>';
	echo "<script>location.href='../../area-admin/germany-admin/furbitter.php'</script>";
}
else
{
	echo '<script>alert("FEHLER ZUM ZEITPUNKT DER AKTIONSAUSFÜHRUNG")</script>';
	echo "<script>location.href='../../area-admin/spanish-admin/furbitter.php'</script>";
}
?>