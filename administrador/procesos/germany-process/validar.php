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
Lenguaje = 3 AND i.Rol = 0 AND
c.Id_continente = 6";
$resultado=mysqli_query($conexion, $consulta);

$fila=mysqli_num_rows($resultado);
if($fila > 0)
{
	echo "<script>location.href='../../area-admin/germany-admin/virtuelle-raume.php'</script>";
}
else
{
	echo '<script>alert("FALSCHER BENUTZER UND PASSWORT")</script>';
	echo "<script>location.href='../../area-admin/germany-admin/lgo-admon-germany.php'</script>";	
}
mysqli_free_result($resultado);
mysql_close($conexion);
?>