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
Lenguaje = 4 AND c.Id_continente in (3,6)";
$resultado=mysqli_query($conexion, $consulta);

$fila=mysqli_num_rows($resultado);
if($fila > 0)
{
	echo "<script>location.href='../../area-intercesores/french-intercesores/salles-intercesseurs.php'</script>";
}
else
{
	echo '<script>alert("UTILISATEUR ET MOT DE PASSE INCORRECTS")</script>';
	echo "<script>location.href='../../area-intercesores/french-intercesores/salles-intercesseurs.php'</script>";	
}
mysqli_free_result($resultado);
mysql_close($conexion);
?>