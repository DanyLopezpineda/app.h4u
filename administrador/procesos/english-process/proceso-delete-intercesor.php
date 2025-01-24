<?php
error_reporting(0);
include("../conexion.php");

$Id = $_REQUEST['Idintercesor'];

$query = "UPDATE intercesores SET Estado=3 WHERE Codigo='$Id'";
$resultado = $conexion->query($query);

if($resultado)
{
	echo '<script>alert("DELETED RECORD")</script>';
	echo "<script>location.href='../../area-admin/english-admin/intercesores-english.php'</script>";
}
else
{
	echo '<script>alert("ERROR THE EXECUTION WAS NOT ABLE TO COMPLETE")</script>';
	echo "<script>location.href='../../area-admin/english-admin/intercesores-english.php'</script>";
}
?>