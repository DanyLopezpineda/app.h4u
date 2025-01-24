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
                    <a href="../../procesos/french-process/quittez-intercesseurs.php">QUITTEZ</a>
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
                            $varsesion = $_SESSION['Clave'];
                            $query = "SELECT s.Codigo_sala,
                            s.Nombre_sala, i.Intercesor, p.Pais, ii.Idioma,
                            case when s.Estado = 0 then 'Désactivé' else 'Activé'
                            end as Estado, s.Url
                             FROM tbsalas s 
                             join intercesores i on s.Intercesor=i.Codigo
                             join tbcidioma ii on s.idioma=ii.Codigo_idioma
                             join tbcpais p on s.pais=p.codigo_pais
                             WHERE i.Telefono=$varsesion";
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
                            <td class="Edi">
                                <button type="button" class="btn btn-success"><a style="text-decoration:none; color:white;" href="../../procesos/french-process/activer-salle-intercesseurs.php?Idsalas=<?php echo $row['Codigo_sala']; ?>">Activer la salle</a></button> 
                                <button type="button" class="btn btn-danger"><a style="text-decoration:none; color:white;" href="../../procesos/french-process/desactiver-salle-intercesseurs.php?Idsalas=<?php echo $row['Codigo_sala']; ?>">Désactiver la salle</a></button> 
                                <button type="button" class="btn btn-primary"><a style="text-decoration:none; color:white;" href="<?php echo $row['Url']; ?>">Entrer dans la pièce</a></button>
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