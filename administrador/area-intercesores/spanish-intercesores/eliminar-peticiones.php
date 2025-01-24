<?php
error_reporting(0);
include("../../procesos/conexion.php");

$Id = $_REQUEST['Idpeticiones'];

$query = "UPDATE tbpeticiones SET Estado = 0 WHERE Id_peticiones='$Id'";
$resultado = $conexion->query($query);

if($resultado)
{
	echo '<script>alert("PETICIÓN ELIMINADA DE MANERA EXITOSA")</script>';
	echo "<script>location.href='../../area-intercesores/spanish-intercesores/mispeticiones.php'</script>";
}
else
{
	echo '<script>alert("ERROR")</script>';
	echo "<script>location.href='../../area-intercesores/spanish-intercesores/mispeticiones.php'</script>";
}
?>