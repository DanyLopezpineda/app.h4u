<?php
session_start();
$usuario=$_POST['User'];
$clave=$_POST['Clave'];
$_SESSION['Clave']=$clave;
//----------- VALIDACION PARA LAS PLANTILLAS EN INGLES---------
/*

*/
include("../conexion.php");
$consulta= "SELECT i.* FROM intercesores i join
tbcpais p on i.Pais=codigo_pais join
tbccontinentes c on p.Continente=c.Id_continente
WHERE Telefono='$usuario' AND 
Clave='$clave' AND i.Estado = 1 AND 
Lenguaje in (2,4) AND i.Rol = 0 AND
c.Id_continente IN (1,2,3)";
$resultado=mysqli_query($conexion, $consulta);

$fila=mysqli_num_rows($resultado);
if($fila > 0)
{
	echo "<script>location.href='../../area-admin/english-admin/intercesores-english.php'</script>";
}
else
{
	echo '<script>alert("Incorrect username and password")</script>';
	echo "<script>location.href='../../area-admin/english-admin/lgo-admon-english.php'</script>";	
}
mysqli_free_result($resultado);
mysql_close($conexion);
?>