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
	<title>Estadisticas - Here4you</title>
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
                <a href="salas-spanish.php">SALAS VIRTUALES</a>
                <a href="salas-activas-spanish.php">SALAS ACTIVAS</a>
                <a href="intercesores-spanish.php">INTERCESORES</a>
                <a href="estadisticas.php">ESTADISTICAS</a>
                <a href="../../procesos/spanish-process/salir.php">SALIR</a>
            </nav>
            </div>
        </header>
<div class="panel">
    <section>
        <div class="contenedor">
            <div class="titulo-intercesores">
                <h2>Estadisticas Generales - Here4you</h2>
            </div>
        </div>
    </section>
    <section>
        <div class="contenedor">
          <h3>Salas Activas</h3>
            <table class="table table-striped" id="tb-editar">
                <thead>
                    <tr>
                        <th>Total Salas Activas</th>
                        <th>Idioma</th>
                        <th>País</th>
                    </tr>
                </thead>
                 <?php
                            include("../../procesos/conexion.php");

                            $query = "SELECT COUNT(*) Salas_Activas, 
                                        i.Idioma,
                                        p.Pais
                                        FROM 
                                        `tbsalas` as s join 
                                        `tbcidioma` as i on s.Idioma=i.Codigo_idioma join
                                        `tbcpais` as p on s.Pais=p.Codigo_pais
                                        WHERE s.Estado = 1 
                                        GROUP by i.Idioma, p.Pais;
                             ";
                            $resultados = $conexion->query($query);
                            while ($row = $resultados->fetch_assoc()) { 
                        ?>
                        <tr>
                            <td><?php echo $row['Salas_Activas']; ?></td>
                            <td><?php echo $row['Idioma']; ?></td>
                            <td><?php echo $row['Pais']; ?></td>
                        </tr>
                        <?php
                            }
                        ?>
            </table>
        </div>
    </section>
    <section>
        <div class="contenedor">
          <h3>Personas Alcanzadas Por Genero</h3>
            <table class="table table-striped" id="tb-editar">
                <thead>
                    <tr>
                        <th>Total de Almas</th>
                        <th>Genero</th>
                    </tr>
                </thead>
                 <?php
                            include("../../procesos/conexion.php");

                            $query = "SELECT count(*) as Total, case when Genero = '1' THEN 'MASCULINO' ELSE 'FEMENINO' END AS Genero  FROM `tbvisitas` where Fecha = '2025-01-11' GROUP by Genero;
                             ";
                            $resultados = $conexion->query($query);
                            while ($row = $resultados->fetch_assoc()) { 
                        ?>
                        <tr>
                            <td><?php echo $row['Total']; ?></td>
                            <td><?php echo $row['Genero']; ?></td>
                        </tr>
                        <?php
                            }
                        ?>
            </table>
        </div>
    </section>

    <section>
        <div class="contenedor">
          <h3>Personas Alcanzadas por Nación</h3>
            <table class="table table-striped" id="tb-editar">
                <thead>
                    <tr>
                        <th>Total de Almas</th>
                        <th>País</th>
                    </tr>
                </thead>
                 <?php
                            include("../../procesos/conexion.php");

                            $query = "SELECT * from(
SELECT DISTINCT COUNT(v.Id) AS Alcanzadas, p.Pais 
from tbvisitas as v join tbcpais as p on v.Pais=p.codigo_pais where v.Fecha = '2025-01-11' GROUP BY p.Pais)as C
order by Alcanzadas asc;
                             ";
                            $resultados = $conexion->query($query);
                            while ($row = $resultados->fetch_assoc()) { 
                        ?>
                        <tr>
                            <td><?php echo $row['Alcanzadas']; ?></td>
                            <td><?php echo $row['Pais']; ?></td>
                        </tr>
                        <?php
                            }
                        ?>
            </table>
        </div>
    </section>
</div>
<script type="text/javascript" src="js/funciones.js"></script>
<script type="text/javascript" src="../../bootstrap/js/bootstrap.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>