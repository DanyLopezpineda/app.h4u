<?php
error_reporting(0);
include("../conexion.php");

$Id = $_REQUEST['Idintercesor'];

$query = "UPDATE intercesores SET Estado=3 WHERE Codigo='$Id'";
$resultado = $conexion->query($query);

if($resultado)
{
	echo '<script>alert("ENREGISTREMENT SUPPRIMÉ AVEC SUCCÈS")</script>';
	echo "<script>location.href='../../area-admin/french-admin/intercesseurs-french.php'</script>";
}
else
{
	echo '<script>alert("ERREUR")</script>';
	echo "<script>location.href='../../area-admin/french-admin/intercesseurs-french.php'</script>";
}
?>