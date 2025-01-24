<?php
error_reporting(0);
include("../conexion.php");

$Id = $_REQUEST['Idsala'];

$query = "UPDATE tbsalas SET Estado=3 WHERE Codigo_sala='$Id'";
$resultado = $conexion->query($query);

if($resultado)
{
	echo '<script>alert("DELETED RECORD")</script>';
	echo "<script>location.href='../../area-admin/english-admin/roms-english.php'</script>";
}
else
{
	echo '<script>alert("ERROR THE EXECUTION WAS NOT ABLE TO COMPLETE")</script>';
	echo "<script>location.href='../../area-admin/english-admin/roms-english.php'</script>";
}
?>