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
	<title>Virtualles Salles - Here4you</title>
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
                <a href="salles-activates.php">SALLES ACTIVES</a>
                <a href="intercesseurs-french.php">INTERCESSEURS</a>
                <a href="../../procesos/french-process/quittez.php">QUITTEZ</a>
            </nav>
            </div>
        </header>
<div class="panel">
    <section>
        <div class="contenedor">
            <div class="titulo-intercesores">
                <h2>Contrôle des salles virtuelles - Here4you</h2>
            </div>
        </div>
    </section>
    <section>
        <div class="contenedor">
            <div class="botones">
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#MD-NUEVO">
                <i class="bi bi-person-add"></i> Nouveau
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
                        <th>Nom des salles</th>
                        <th>Intercesseur</th>
                        <th>Pays</th>
                        <th>Langue</th>
                        <th>État</th>
                        <th colspan="2">Actions</th>
                    </tr>
                </thead>
                 <?php
                            include("../../procesos/conexion.php");

                            $query = "SELECT s.Codigo_sala,
                            s.Nombre_sala, i.Intercesor, p.Pais, ii.Idioma,
                            case when s.Estado = 0 then 'Désactivé' else 'Activé'
                            end as Estado
                             FROM tbsalas s 
                             join intercesores i on s.Intercesor=i.Codigo
                             join tbcidioma ii on s.idioma=ii.Codigo_idioma
                             join tbcpais p on s.pais=p.codigo_pais
                             join tbccontinentes cc on p.Continente=cc.Id_continente
                             where 
                             cc.Id_continente in (3,6) and 
                             s.Estado = 0 and 
                             ii.Codigo_idioma = 4
                             order by s.Codigo_sala asc
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
                                <button type="button" class="btn btn-warning"><a style="text-decoration:none; color:white;" href="../../procesos/french-process/modifier-salles-french.php?Idsalas=<?php echo $row['Codigo_sala']; ?>">Modifier</a></button> 
                                <button type="button" class="btn btn-danger"><a style="text-decoration:none; color:white;" href="../../procesos/french-process/supprimer-salles-french.php?Idsalas=<?php echo $row['Codigo_sala']; ?>">Supprimer</a></button>
                                <button type="button" class="btn btn-success"><a style="text-decoration:none; color:white;" href="../../procesos/french-process/activer-salles-french.php?Idsalas=<?php echo $row['Codigo_sala']; ?>">Activer la salle</a></button>
                            </td>
                        </tr>
                        <?php
                            }
                        ?>
            </table>
        </div>
    </section>
</div>

<!-- Modal Nuevos Intercesores-->
<div class="modal fade" id="MD-NUEVO" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Nouveau Salles - Intercesseurs</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form method="POST" action="../../procesos/french-process/proceso-agregar-salles.php">
            <div class="mb-3">
        </div>
        <table class="table table-striped" id="tb-editar">
                <thead>
                    <tr>
                        <th>Code</th>
                        <th>Intercesseurs</th>
                        <th>Pays</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                 <?php
                            include("../../procesos/conexion.php");
                            
                            $query = "SELECT i.Codigo, i.Intercesor, p.Pais, COUNT(s.Codigo_sala) AS SALAS 
                            FROM intercesores i 
                            left join tbcpais p on i.pais=p.codigo_pais 
                            left join tbsalas s on i.Codigo=s.intercesor
                            left join tbccontinentes cc on p.Continente=cc.Id_continente
                            where 
                            i.Estado = 1 and
                            cc.Id_continente in (3,6) and
                            i.Lenguaje = 4
                            GROUP BY i.Codigo, i.Intercesor, i.Pais 
                            having COUNT(s.Codigo_sala) < 1";
                            $resultados = $conexion->query($query);
                            while ($row = $resultados->fetch_assoc()) { 
                        ?>
                        <tr>
                            <td><?php echo $row['Codigo']; ?></td>
                            <td><?php echo $row['Intercesor']; ?></td>
                            <td><?php echo $row['Pais']; ?></td>
                            
                            <td>
                                <button type="button" class="btn btn-success"><a style="text-decoration:none; color:white;" href="../../procesos/french-process/proceso-agregar-salles.php?IdIntercesor=<?php echo $row['Codigo']; ?>">Agregar</a></button>
                            </td>
                        </tr>
                        <?php
                            }
                        ?>
            </table>
      </div>
       <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
            </div>
      </form>
    </div>
  </div>
</div>
</div>

<script type="text/javascript" src="js/funciones.js"></script>
<script type="text/javascript" src="../../bootstrap/js/bootstrap.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>