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
	<title>Peticiones de Oración - Here4you</title>
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
                <p>“Porque donde dos o tres se reúnen en mi nombre, allí estoy yo en medio de ellos”<br> Mt.18:20 (NVI)</p>
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
                        <th>Telefono</th>
                        <th>Fecha Petición</th>
                        <th>País</th>
                        <th>Peticiones</th>
                    </tr>
                </thead>
                 <?php
                            include("../../procesos/conexion.php");
                            $query = "SELECT p.Id_peticiones, p.Nombre, p.Telefono, p.Fecha_Peticion
                                        ,'LATINOAMÉRICA' as Pais , p.Petición
                                        from `tbpeticiones` As p join
                                        tbcpais pc on p.Pais=pc.codigo_pais
                                        where p.Estado = 1
                                        and p.PermanenteSI_NO = 1
                                        union ALL
                                        SELECT p.Id_peticiones, UPPER(p.Nombre), p.Telefono, p.Fecha_Peticion, 
                                                                    pc.Pais, p.Petición from(
                                        SELECT 
                                        Id_peticiones,
                                        Fecha_Registro,
                                        Fecha_Peticion,
                                        Estado,
                                        Idioma,
                                        Nombre,
                                        Pais,
                                        Petición,
                                        Telefono,
                                        DATEDIFF(DATE(Now()),Fecha_Peticion) as Conteo
                                        FROM tbpeticiones
                                        where
                                        PermanenteSI_NO = 0) as p join
                                        tbcpais pc on p.Pais=pc.codigo_pais
                                        where conteo < 8 and p.Estado = 1 and
                                        Id_peticiones not in (select Id_peticiones 
                                        from tbpeticiones_resueltas)";
                            $resultados = $conexion->query($query);
                            while ($row = $resultados->fetch_assoc()) { 
                        ?>
                        <tr>
                            <td><?php echo $row['Id_peticiones']; ?></td>
                            <td><?php echo $row['Nombre']; ?></td>
                            <td><?php echo $row['Telefono']; ?></td>
                            <td><?php echo $row['Fecha_Peticion']; ?></td>
                            <td><?php echo $row['Pais']; ?></td>
                            <td><?php echo $row['Petición']; ?></td>
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