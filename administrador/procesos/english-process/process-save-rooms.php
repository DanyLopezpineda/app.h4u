<?php
/*utilizar este codigo para eliminar un error*/error_reporting(0);
include("../conexion.php");

$Intercesor = $_POST['Codigo'];
$Pais = $_POST['C_pais'];
$Telefono = $_POST['Telefono'];
$Plataforma = $_POST['Plataforma'];
$Url = $_POST['Url'];
$Fecha_creacion = $_POST['Fecha_creacion'];
$Nombre_sala = $_POST['Nombre_sala'];

$query = "INSERT INTO tbsalas (Nombre_sala,Fecha_creacion,Url,Telefono,Intercesor,Idioma,Plataforma,Pais) VALUES ('$Nombre_sala','$Fecha_creacion','$Url','$Telefono',$Intercesor,2,$Plataforma, $Pais)";
$resultado = $conexion->query($query);

if($resultado)
{
	echo '<script>alert("ROOM SUCCESSFULLY REGISTERED")</script>';
	echo "<script>location.href='../../area-admin/english-admin/roms-english.php'</script>";
}
else
{
	echo '<script>alert("ERROR THE OPERATION WAS NOT POSSIBLE TO EXECUTE")</script>';
	echo "<script>location.href='../../area-admin/english-admin/roms-english.php'</script>";
}
?>