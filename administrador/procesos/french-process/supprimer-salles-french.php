<?php
error_reporting(0);
include("../conexion.php");

$Id = $_REQUEST['Idsala'];

$query = "UPDATE tbsalas SET Estado=3 WHERE Codigo_sala='$Id'";
$resultado = $conexion->query($query);

if($resultado)
{
	echo '<script>alert("ENREGISTREMENT SUPPRIMÉ")</script>';
	echo "<script>location.href='../../area-admin/french-admin/salles-admon-french.php'</script>";
}
else
{
	echo '<script>alert("ERREUR AU MOMENT DE LA SUPPRESSION")</script>';
	echo "<script>location.href='../../area-admin/french-admin/salles-admon-french.php'</script>";
}
?>