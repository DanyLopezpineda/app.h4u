<?php
/*utilizar este codigo para eliminar un error*/error_reporting(0);
include("../conexion.php");

$Solicitante = $_POST['Nombre'];
$Peticion = $_POST['Peticion'];
$Pais = $_POST['Pais_codigo'];
$Telefono = $_POST['Telefono'];
$intercesor = $_POST['user'];

$query = "INSERT INTO tbpeticiones
(Fecha_Registro,Fecha_Peticion,Nombre,Petición,Estado,Telefono,Pais,Id_intercesor) VALUES 
(DATE(NOW()),DATE(NOW()),'$Solicitante','$Peticion',1,'$Telefono',$Pais,'$intercesor')";
$resultado = $conexion->query($query);

if($resultado)
{
	echo "<script>location.href='../../area-intercesores/spanish-intercesores/enviado-intercesores.php'</script>";
}
else
{
	echo '<script>alert("ERROR AL GUARDAR PETICIÓN DE ORACIÓN")</script>';
	echo "<script>location.href='../../area-intercesores/spanish-intercesores/peticiones.php'</script>";
}
?>