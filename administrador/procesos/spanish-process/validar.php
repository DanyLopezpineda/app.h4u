<?php
session_start();
$usuario=$_POST['User'];
$_SESSION['User']=$usuario;
$clave=$_POST['Clave'];
$_SESSION['Clave']=$clave;
//----------- PRUEBAS---------

include("../conexion.php");
$consulta= "SELECT i.* FROM intercesores i join
tbcpais p on i.Pais=codigo_pais join
tbccontinentes c on p.Continente=c.Id_continente
WHERE Telefono='$usuario' AND 
Clave='$clave' AND i.Estado = 1 AND 
Lenguaje = 1 AND i.Rol = 0 AND
c.Id_continente in (1,2)";
$resultado=mysqli_query($conexion, $consulta);

$fila=mysqli_num_rows($resultado);
if($fila > 0)
{
	echo "<script>location.href='../../area-admin/spanish-admin/salas-spanish.php'</script>";
}
else
{
	echo '<script>alert("USUARIO & PASSWORD INCORRECTA")</script>';
	echo "<script>location.href='../../area-admin/spanish-admin/lgo-admon-spanish.php'</script>";	
}
mysqli_free_result($resultado);
mysql_close($conexion);
?>