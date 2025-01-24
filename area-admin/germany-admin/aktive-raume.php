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
<html lang="de">
<head>
	<meta charset="utf-8">
	<title>Aktive virtuelle Räume - Here4you</title>
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
                <a href="virtuelle-raume.php">VIRTUELLE RÄUME</a>
                <a href="aktive-raume.php">AKTIVE VIRTUELLE RÄUME</a>
                <a href="furbitter.php">FÜRBITTER</a>
                <a href="../../procesos/germany-process/abmelden.php">ABMELDEN</a>
            </nav>
            </div>
        </header>
<div class="panel">
    <section>
        <div class="contenedor">
            <div class="titulo-intercesores">
                <h2>Steuerung aktiver virtueller Räume - Here4you</h2>
            </div>
        </div>
    </section>
    <section>
        <div class="contenedor">
            <table class="table table-striped" id="tb-editar">
                <thead>
                    <tr>
                        <th>Code</th>
                        <th>Raumname</th>
                        <th>Fürsprecher</th>
                        <th>Land</th>
                        <th>Sprache</th>
                        <th>Zustand</th>
                        <th colspan="2">Aktionen</th>
                    </tr>
                </thead>
                 <?php
                            include("../../procesos/conexion.php");

                            $query = "SELECT s.Codigo_sala,
                            s.Nombre_sala, i.Intercesor, p.Pais, ii.Idioma,
                            case when s.Estado = 0 then 'Deaktiviert' else 'Ermöglicht'
                            end as Estado
                             FROM tbsalas s 
                             join intercesores i on s.Intercesor=i.Codigo
                             join tbcidioma ii on s.idioma=ii.Codigo_idioma
                             join tbcpais p on s.pais=p.codigo_pais
                             join tbccontinentes cc on p.Continente=cc.Id_continente
                             where cc.Id_continente=6 and s.Estado  = 1
                             ";
                            $resultados = $conexion->query($query);
                            while ($row = $resultados->fetch_assoc()) { 
                        ?>
                        <tr>
                            <td><?php echo $row['Codigo_sala']; ?></td>
                            <td><?php echo $row['Nombre_sala']; ?></td>
                            <td><?php echo $row['Intercesor']; ?></td>
                            <td><?php echo $row['Pais']; ?></td>
                            <td><?php echo $row['Idioma']; ?></td>
                            <td><?php echo $row['Estado']; ?></td>
                            <td class="EdiWeb">
                              <button type="button" class="btn btn-warning"><a style="text-decoration:none; color:white;" href="../../procesos/germany-process/modificar-sala-germany.php?Idsalas=<?php echo $row['Codigo_sala']; ?>">Bearbeiten</a></button> 
                              <button type="button" class="btn btn-danger"><a style="text-decoration:none; color:white;" href="../../procesos/germany-process/deshabilitar-salas-admin.php?Idsalas=<?php echo $row['Codigo_sala']; ?>">Raum deaktivieren</a> </button> 
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
<script type="text/javascript" src="../../bootstrap/js/bootstrap.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>