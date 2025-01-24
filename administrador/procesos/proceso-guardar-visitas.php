<?php
/*utilizar este codigo para eliminar un error*/error_reporting(0);
include("conexion.php");

$Intercesor = $_POST['Codigo'];
$link = $_POST['Link'];
$nombre = $_POST['Nombre'];
$pais = $_POST['Pais_codigo'];
$genero = $_POST['Genero'];
$Idioma = $_POST['Idioma'];

$query = "INSERT INTO tbvisitas(Intercesor,Pais,Nombre,Genero,Fecha,Idioma) VALUES ($Intercesor,$pais,'$nombre',$genero,DATE(NOW()),$Idioma)";
$resultado = $conexion->query($query);

if($resultado)
{
	echo "<script>location.href='$link'</script>";
}
else
{
	echo '<script>alert("ERROR AL REGISTRAR DATOS, HAGALO NUEVAMENTE")</script>';
	echo "<script>location.href='https://app.here4you.live/'</script>";
}
?>