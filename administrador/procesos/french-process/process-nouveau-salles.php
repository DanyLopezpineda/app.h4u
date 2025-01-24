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

$query = "INSERT INTO tbsalas (Nombre_sala,Fecha_creacion,Url,Telefono,Intercesor,Idioma,Plataforma,Pais) VALUES ('$Nombre_sala','$Fecha_creacion','$Url','$Telefono',$Intercesor,4,$Plataforma, $Pais)";
$resultado = $conexion->query($query);

if($resultado)
{
	echo '<script>alert("SALLE DE PRIÈRE VIRTUELLE CRÉÉE")</script>';
	echo "<script>location.href='../../area-admin/french-admin/salles-admon-french.php'</script>";
}
else
{
	echo '<script>alert("ERREUR LORS DE LA CRÉATION DE LA SALLE VIRTUELLE")</script>';
	echo "<script>location.href='../../area-admin/french-admin/salles-admon-french.php'</script>";
}
?>