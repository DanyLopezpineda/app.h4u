<?php
/*utilizar este codigo para eliminar un error*/error_reporting(0);
include("../conexion.php");

$Intercesor = $_POST['Intercesor'];
$Pais = $_POST['Pais_codigo'];
$Telefono = $_POST['Telefono'];
$Clave = $_POST['Clave'];
$Rol = $_POST['Rol'];
$Genero = $_POST['Genero'];
$FNacimiento = $_POST['Fnacimiento'];
$Lenguaje = $_POST['Codigo_idioma'];

$query = "INSERT INTO intercesores
(Intercesor, Pais, Lenguaje, Telefono, Clave, Estado, Rol, Genero, Fnacimiento) VALUES 
('$Intercesor',$Pais,$Lenguaje,'$Telefono','$Clave',1,$Rol,$Genero,'$FNacimiento')";
$resultado = $conexion->query($query);

if($resultado)
{
	echo '<script>alert("INTERCESSOR SUCCESSFULLY REGISTERED")</script>';
	echo "<script>location.href='../../area-admin/english-admin/intercesores-english.php'</script>";
}
else
{
	echo '<script>alert("ERROR SAVE INTERCESSOR")</script>';
	echo "<script>location.href='../../area-admin/english-admin/intercesores-english.php'</script>";
}
?>