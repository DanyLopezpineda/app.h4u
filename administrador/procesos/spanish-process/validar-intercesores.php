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
$consulta= "SELECT i.* FROM intercesores i join
tbcpais p on i.Pais=codigo_pais join
tbccontinentes c on p.Continente=c.Id_continente
WHERE Clave='$clave' AND i.Estado = 1 AND 
Lenguaje in (1,2) AND c.Id_continente in (1,2)";
$resultado=mysqli_query($conexion, $consulta);

$fila=mysqli_num_rows($resultado);
if($fila > 0)
{
	echo "<script>location.href='../../area-intercesores/spanish-intercesores/salas-intercesor.php'</script>";
}
else
{
	echo '<script>alert("USUARIO & PASSWORD INCORRECTA")</script>';
	echo "<script>location.href='../../area-intercesores/spanish-intercesores/logo-intercesores.php'</script>";	
}
mysqli_free_result($resultado);
mysql_close($conexion);
?>