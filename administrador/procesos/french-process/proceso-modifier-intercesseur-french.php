<?php
error_reporting(0);
include("../conexion.php");

$Id = $_REQUEST['IdIntercesores'];

$nombre = $_POST['Intercesor'];
$pais = $_POST['C_pais'];
$telefono = $_POST['Telefono'];
$clave = $_POST['Clave'];
$fnacimiento = $_POST['Fnacimiento'];

$query = "UPDATE intercesores SET Intercesor='$nombre', Pais = $pais, 
Telefono = '$telefono', Clave = '$clave', Fnacimiento = $fnacimiento WHERE Codigo='$Id'";
$resultado = $conexion->query($query);

if($resultado)
{
	echo '<script>alert("INTERCESSEUR MISE À JOUR AVEC SUCCÈS")</script>';
	echo "<script>location.href='../../area-admin/french-admin/intercesseurs-french.php'</script>";
}
else
{
	echo '<script>alert("ERREUR DE PERFORMANCE")</script>';
	echo "<script>location.href='../../area-admin/french-admin/intercesseurs-french.php'</script>";
}
?>