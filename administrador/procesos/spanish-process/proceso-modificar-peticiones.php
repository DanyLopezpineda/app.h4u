<?php
error_reporting(0);
include("../conexion.php");

$Id = $_REQUEST['Id_Peticiones'];

$nombre = $_POST['Nombre'];
$pais = $_POST['Pais_codigo'];
$telefono = $_POST['Telefono'];
$Peticion = $_POST['Peticion'];

$query = "UPDATE tbpeticiones SET Nombre='$nombre', Pais = $pais, 
Telefono = '$telefono', Petición = '$Peticion', Fecha_Peticion = DATE(Now()), Fecha_Registro = DATE(Now())
WHERE Id_peticiones='$Id'";
$resultado = $conexion->query($query);

if($resultado)
{
	echo "<script>location.href='../../area-intercesores/spanish-intercesores/enviado-intercesores.php'</script>";
}
else
{
	echo '<script>alert("ERROR EN LA ACTUAZACION")</script>';
	echo "<script>location.href='../../area-intercesores/spanish-intercesores/peticiones.php'</script>";
}
?>