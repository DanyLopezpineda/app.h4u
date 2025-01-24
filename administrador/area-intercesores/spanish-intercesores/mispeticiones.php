<?php
session_start();
$varsesion = $_SESSION['Clave'];
error_reporting(0);
if($varsesion == null || $varsesion = '')
{
    echo "<script>location.href='https://here4you.live/'</script>"; 
    die();
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8">
	<title>Mis Peticiones de Oración - Here4you</title>
	<link rel="stylesheet" type="text/css" href="../../css/menu.css">
    <link rel="stylesheet" type="text/css" href="../../bootstrap/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="../../bootstrap/css/bootstrap.min.css">
    <link rel="icon" href="../../../image/ico-here4you.ico">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1, maximum-scale=1, minimum-scale=1">
</head>
<body>
	<header>
            <div class="contenedor">
            <input type="checkbox" id="menu-bar">
            <label class="icon-menu" for="menu-bar"></label>
            <nav class="menu">
            <a href="salas-intercesor.php">MI SALA</a>
            <a href="peticiones.php">NUEVA PETICIÓN</a>
            <a href="mispeticiones.php">MIS PETICIONES</a>
			<a href="bd-peticiones.php">PETICIONES DE ORACIÓN</a>
            <a href="../../procesos/spanish-process/salir-intercesor.php">SALIR</a>
            </nav>
            </div>
        </header>
<div class="panel">
    <section>
        <div class="contenedor">
            <div class="titulo-intercesores">
                <h2>Peticiones de la Oración - Here4you</h2>
            </div>
        </div>
    </section>
    <section>
        <div class="contenedor">
            <table class="table table-striped" id="tb-editar">
                <thead>
                    <tr>
                        <th>Codigo</th>
                        <th>Solicitante</th>
                        <th>Fecha Petición</th>
                        <th>País</th>
                        <th>Peticiones</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                 <?php
                            include("../../procesos/conexion.php");
                            $varsesion = $_SESSION['Clave'];
                            $query = "SELECT p.Id_peticiones, p.Nombre, p.Telefono, p.Fecha_Peticion, 
                            pc.Pais, p.Petición
                             FROM tbpeticiones p join
                             tbcpais pc on p.Pais=pc.codigo_pais where Id_intercesor= $varsesion
                             AND p.Estado = 1";
                            $resultados = $conexion->query($query);
                            while ($row = $resultados->fetch_assoc()) { 
                        ?>
                        <tr>
                            <td><?php echo $row['Id_peticiones']; ?></td>
                            <td><?php echo $row['Nombre']; ?></td>
                            <td><?php echo $row['Fecha_Peticion']; ?></td>
                            <td><?php echo $row['Pais']; ?></td>
                            <td><?php echo $row['Petición']; ?></td>
                            <td class="Edi">
                                <button type="button" class="btn btn-warning"><a style="text-decoration:none; color:white;" href="editar-peticiones.php?Idpeticiones=<?php echo $row['Id_peticiones']; ?>">Editar</button> 
                                <button type="button" class="btn btn-success"><a style="text-decoration:none; color:white;" href="resuelta-peticiones.php?Idpeticiones=<?php echo $row['Id_peticiones']; ?>">Resuelta</button> 
                                <button type="button" class="btn btn-danger"><a style="text-decoration:none; color:white;" href="eliminar-peticiones.php?Idpeticiones=<?php echo $row['Id_peticiones']; ?>">Eliminar</a></button>
                            </td>
                        </tr>
                        <?php
                            }
                        ?>
            </table>
        </div>
    </section>
</div>



<script type="text/javascript" src="js/funciones.js"></script>
<script type="text/javascript" src="../bootstrap/js/bootstrap.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>