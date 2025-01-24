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
Telefono = '$telefono', Clave = '$clave', Fnacimiento = '$fnacimiento' WHERE Codigo='$Id'";
$resultado = $conexion->query($query);

if($resultado)
{
	echo '<script>alert("INTERCESOR ACTUALIZADO EXISTOSAMENTE")</script>';
	echo "<script>location.href='../../area-admin/english-admin/intercesores-english.php'</script>";
}
else
{
	echo '<script>alert("ERROR EN LA ACTUAZACION")</script>';
	echo "<script>location.href='../../area-admin/english-admin/intercesores-english.php'</script>";
}
?>