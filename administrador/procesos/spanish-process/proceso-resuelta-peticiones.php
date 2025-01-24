<?php
/*utilizar este codigo para eliminar un error*/error_reporting(0);
include("../conexion.php");

$Id = $_POST['Id_Peticiones'];
$Resueltas = $_POST['Observacion'];

$query = "INSERT INTO tbpeticiones_resueltas (Id_peticiones,Fecha_resuelta,Observacion) 
VALUES ($Id,DATE(Now()),'$Resueltas')";
$resultado = $conexion->query($query);

if($resultado)
{
	echo '<script>alert("NOS ALEGRA SABER QUE DIOS TOMO EL CONTROL")</script>';
	echo "<script>location.href='../../area-intercesores/spanish-intercesores/mispeticiones.php'</script>";
}
else
{
	echo '<script>alert("ERROR AL MOMENTO DE GUARDAR REGISTRO")</script>';
	echo "<script>location.href='../../area-intercesores/spanish-intercesores/mispeticiones.php'</script>";
}
?>