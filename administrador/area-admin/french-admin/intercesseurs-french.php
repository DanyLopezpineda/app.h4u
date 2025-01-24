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
<html lang="fr">
<head>
	<meta charset="utf-8">
	<title>Intercesseurs - Here4you</title>
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
                <a href="salles-admon-french.php">VIRTUALLES SALLES</a>
                <a href="salles-actives-french.php">SALLES ACTIVES</a>
                <a href="intercesseurs-french.php">INTERCESSEURS</a>
                <a href="../../procesos/french-process/quittez.php">QUITTEZ</a>
            </nav>
            </div>
        </header>
<div class="panel">
    <section>
        <div class="contenedor">
            <div class="titulo-intercesores">
                <h2>Control de Usuarios - Here4you</h2>
            </div>
        </div>
    </section>
    <section>
        <div class="contenedor">
            <div class="botones">
                <button type="button" class="btn btn-primary">
                  <a style="color:white; text-decoration:none;" href="../../procesos/french-process/nouveau-intercesor.php" class="href">
                  Nouveau
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
                        <th>Intercesseur</th>
                        <th>Pays</th>
                        <th>Téléphone</th>
                        <th>Mot de passe</th>
                        <th>Responsabilité</th>
                        <th>État</th>
                        <th colspan="2">Actions</th>
                    </tr>
                </thead>
                 <?php
                            include("../../procesos/conexion.php");

                            $query = "SELECT i.Codigo, i.Intercesor, p.Pais, i.Telefono, i.Clave, CASE WHEN i.Rol = 0 THEN 'Administrator' else 'Intercesseurs' end AS Rol,
                                CASE WHEN i.Estado = 1 THEN 'Activé' ELSE 'Désactivé' END AS Estado 
                                FROM intercesores i 
                                join tbcpais p on i.pais=p.codigo_pais
                                join tbccontinentes cc on p.Continente=cc.Id_continente
                                join tbcidioma ii on i.Lenguaje=ii.Codigo_idioma
                                where 
                                i.Estado in (1,0) and
                                cc.Id_continente in (3,6) and
                                ii.Codigo_idioma = 4
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
                                <button type="button" class="btn btn-warning"><a style="text-decoration:none; color:white;" href="../../procesos/french-process/modifier-intercesseurs-french.php?Idintercesor=<?php echo $row['Codigo']; ?>">Modifier</a></button> 
                                <button type="button" class="btn btn-danger"><a style="text-decoration:none;color:white;" href="../../procesos/french-process/proceso-supprimer-intercesseurs-french.php?Idintercesor=<?php echo $row['Codigo']; ?>">Supprimer</a></button>
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