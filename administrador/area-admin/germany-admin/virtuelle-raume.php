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
	<title>Virtuelle Räume - Here4you</title>
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
                <h2>Steuerung virtueller Datenräume - Here4you</h2>
            </div>
        </div>
    </section>
    <section>
        <div class="contenedor">
            <div class="botones">
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#MD-NUEVO">
                <i class="bi bi-person-add"></i> NEU
                </button>
                <!--<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#MD-BUSCAR">
                <i class="bi bi-person-add"></i> BUSCAR
                </button>-->
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
                             where cc.Id_continente=6 and s.Estado = 0 and
                             s.Idioma = 3
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
                                <button type="button" class="btn btn-warning"><a style="text-decoration:none; color:white;" href="../../procesos/germany-process/modificar-salas-germany.php?Idsalas=<?php echo $row['Codigo_sala']; ?>">Ändern</a></button> 
                                <button type="button" class="btn btn-danger"><a style="text-decoration:none; color:white;" href="../../procesos/germany-process/proceso-eliminar-salas-germany.php?Idsalas=<?php echo $row['Codigo_sala']; ?>">Beseitigen</a></button>
                                <button type="button" class="btn btn-success"><a style="text-decoration:none; color:white;" href="../../procesos/germany-process/habilitar-salas-germany.php?Idsalas=<?php echo $row['Codigo_sala']; ?>">Raum aktivieren</a></button>
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
        <h5 class="modal-title" id="staticBackdropLabel">Neuer Raum - Fürbitter</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form method="POST" action="../../procesos/proceso-guardar-reg-salas.php">
        <!--<div class="mb-3">
          <label for="nombre_intercesor" class="form-label">Nombre Intercesor:</label>
          <input type="text" class="form-control" name="nombre_intercesor" placeholder="Digite Nombre Intercesor..!" required="">
        </div>-->
        <table class="table table-striped" id="tb-editar">
                <thead>
                    <tr>
                        <th>Code</th>
                        <th>Fürbitter</th>
                        <th>Land</th>
                        <th>Aktionen</th>
                    </tr>
                </thead>
                 <?php
                            include("../../procesos/conexion.php");
                            
                            $query = "SELECT i.Codigo, i.Intercesor, p.Pais, COUNT(s.Codigo_sala) AS SALAS 
                            FROM intercesores i 
                            left join tbcpais p on i.pais=p.codigo_pais 
                            left join tbsalas s on i.Codigo=s.intercesor
                            where i.Estado = 1
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
                                <button type="button" class="btn btn-warning"><a href="../../procesos/germany-process/proceso-guardar-reg-salas.php?IdIntercesor=<?php echo $row['Codigo']; ?>">Hinzufügen</a></button>
                            </td>
                        </tr>
                        <?php
                            }
                        ?>
            </table>
      </div>
       <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Stornieren</button>
            </div>
      </form>
    </div>
  </div>
</div>
</div>


<!-- Modal Nuevos Intercesores-->
<div class="modal fade modal-lg" id="MD-BUSCAR" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Buscar Sala</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form method="GET" action="">
            <!--<input type="text" name="telefono" class="form-control" placeholder="Digite el telefono del intercesor">
            <input type="submit" name="b" id="b" value="Buscar">-->
        <table class="table table-striped" id="tb-editar">
                <thead>
                    <tr>
                        <th>Code Number</th>
                        <th>Interccesor</th>
                        <th>Country</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                 <?php
                 if(isset($_GET["telefono"]))
                            include("../../procesos/conexion.php");
                            
                            $query = "SELECT i.Codigo, i.Intercesor, p.Pais, COUNT(s.Codigo_sala) AS SALAS 
                            FROM intercesores i 
                            left join tbsalas s on i.Codigo=s.intercesor
                            left join tbcpais p on i.pais=p.codigo_pais 
                            left join tbccontinentes cc on p.Continente=cc.Id_continente
                            where 
                            i.Estado = 1 and i.Lenguaje = 2 
                            and cc.Id_continente = 3
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
                                <button type="button" class="btn btn-success"><a style="text-decoration:none; color:white;" href="../../procesos/english-process/process-new-rooms-english.php?IdIntercesor=<?php echo $row['Codigo']; ?>">Create room</a></button>
                            </td>
                        </tr>
                        <?php
                            }
                        ?>
            </table>
      </div>
       <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
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