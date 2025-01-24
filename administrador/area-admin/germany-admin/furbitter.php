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
	<title>Fürbitter - Here4you</title>
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
                <h2>Nutzerkontrolle - Here4you</h2>
            </div>
        </div>
    </section>
    <section>
        <div class="contenedor">
            <div class="botones">
                <button type="button" class="btn btn-primary">
                  <a style="color:white; text-decoration:none;" href="../../procesos/germany-process/neu-intercesor.php" class="href">
                  Neu
                  </a>
                </button>
            </div>
        </div>
    </section>
    <section>
        <div class="contenedor">
            <table class="table table-striped" id="tb-editar">
                <thead>
                    <tr>
                        <th>Code</th>
                        <th>Fürsprecher</th>
                        <th>Land</th>
                        <th>Telefon</th>
                        <th>Passwort</th>
                        <th>Privilegien</th>
                        <th>Zustand</th>
                        <th colspan="2">Aktionen</th>
                    </tr>
                </thead>
                 <?php
                            include("../../procesos/conexion.php");

                            $query = "SELECT i.Codigo, i.Intercesor, p.Pais, i.Telefono, i.Clave, CASE WHEN i.Rol = 0 THEN 'Administrador' else 'Intercesor' end AS Rol,
                                CASE WHEN i.Estado = 1 THEN 'Ermöglicht' ELSE 'Deaktiviert' END AS Estado 
                                FROM intercesores i 
                                join tbcpais p on i.pais=p.codigo_pais
                                join tbccontinentes cc on p.Continente=cc.Id_continente
                                where i.Estado in (1,0) and cc.Id_continente = 6
                                and i.Lenguaje = 3
                                order by i.Codigo asc";
                            $resultados = $conexion->query($query);
                            while ($row = $resultados->fetch_assoc()) { 
                        ?>
                        <tr>
                            <td><?php echo $row['Codigo']; ?></td>
                            <td><?php echo $row['Intercesor']; ?></td>
                            <td><?php echo $row['Pais']; ?></td>
                            <td><?php echo $row['Telefono']; ?></td>
                            <td><?php echo $row['Clave']; ?></td>
                            <td><?php echo $row['Rol']; ?></td>
                            <td><?php echo $row['Estado']; ?></td>
                            <td class="EliWeb">
                                <button type="button" class="btn btn-warning"><a style="text-decoration:none; color:white;" href="../../procesos/germany-process/modificar-intercesor-germany.php?Idintercesor=<?php echo $row['Codigo']; ?>">Bearbeiten</a></button> 
                                <button type="button" class="btn btn-danger"><a style="text-decoration:none;color:white;" href="../../procesos/germany-process/proceso-eliminar-intercesor.php?Idintercesor=<?php echo $row['Codigo']; ?>">Entfernen</a></button>
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