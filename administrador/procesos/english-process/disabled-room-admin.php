<?php
error_reporting(0);
include("../conexion.php");

$Id = $_REQUEST['Idsalas'];

$query = "UPDATE tbsalas SET Estado=0 WHERE Codigo_sala='$Id'";
$resultado = $conexion->query($query);

if($resultado)
{
	echo '<script>alert("PRAYER ROOM DISABLED")</script>';
	echo "<script>location.href='../../area-admin/english-admin/roms-english.php'</script>";
}
else
{
	echo '<script>alert("ERROR IN EXECUTION")</script>';
	echo "<script>location.href='../../area-admin/english-admin/roms-english.php'</script>";
}
?>