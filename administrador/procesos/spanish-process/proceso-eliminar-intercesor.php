<?php
error_reporting(0);
include("../conexion.php");

$Id = $_REQUEST['Idintercesor'];

$query = "UPDATE intercesores SET Estado=3 WHERE Codigo='$Id'";
$resultado = $conexion->query($query);

if($resultado)
{
	echo '<script>alert("INTERCESOR ELIMINADO EXISTOSAMENTE")</script>';
	echo "<script>location.href='../../area-admin/spanish-admin/intercesores-spanish.php'</script>";
}
else
{
	echo '<script>alert("ERROR")</script>';
	echo "<script>location.href='../../area-admin/spanish-admin/intercesores-spanish.php'</script>";
}
?>