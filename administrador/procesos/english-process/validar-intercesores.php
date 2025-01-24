<?php
session_start();
$clave=$_POST['Clave'];
$_SESSION['Clave']=$clave;
//----------- PRUEBAS---------
/*
$usuario=$_POST['User'];
$clave=$_POST['Clave'];
*/

include("../conexion.php");
$consulta= "SELECT * FROM intercesores WHERE Rol in (0,1) AND Clave='$clave' and Estado=1 and Lenguaje = 2";
$resultado=mysqli_query($conexion, $consulta);

$fila=mysqli_num_rows($resultado);
if($fila > 0)
{
	echo "<script>location.href='../../area-intercesores/english-intercesores/rooms-intercess-english.php'</script>";
}
else
{
	echo '<script>alert("INCORRECT USER & PASSWORD")</script>';
	echo "<script>location.href='../../area-intercesores/english-intercesores/lgo-intercess-english.php'</script>";	
}
mysqli_free_result($resultado);
mysql_close($conexion);
?>