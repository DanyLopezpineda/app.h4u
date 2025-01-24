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
    <link rel="stylesheet" type="text/css" href="../../css/styles.css">
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
                <a href="../../area-admin/germany-admin/virtuelle-raume.php">ZURÜCKKEHREN</a>
            </nav>
            </div>
        </header>
<div class="panel">
<section>
            <div class="contenedor">
                <div class="form-modificar">
<?php
include("../conexion.php");

$Id=$_REQUEST['Idsalas'];

$query = "SELECT 
s.Codigo_sala, i.Intercesor, p.codigo_pais, p.Pais,
i.Telefono, s.Nombre_sala, s.Url, pt.Codigo_plataforma,
pt.Plataforma, ii.Codigo_idioma, ii.Idioma
FROM tbsalas s 
join intercesores i on s.Intercesor=i.Codigo
join tbcpais p on s.pais=p.codigo_pais 
join tbcplataforma pt on s.Plataforma=pt.Codigo_plataforma
join tbcidioma ii on s.Idioma=ii.Codigo_idioma
WHERE Codigo_sala='$Id'";
$resultados = $conexion->query($query);
$row = $resultados->fetch_assoc();
?>
                <form method="POST" action="proceso-modificar-sala-germany.php?Idsalas=<?php echo $row['Codigo_sala']; ?>" enctype="multipart/form-data">
                <h3>Raum ändern</h3>
                    <p>Zimmercode:</p>
                    <input type="text" name="Codigo_sala" placeholder="Id Blogs" value="<?php echo $row['Codigo_sala']; ?>" readonly>
                    <p>Fürbitter:</p>
                    <input type="text" name="Intercesor" placeholder="Nombre del Blogs" value="<?php echo $row['Intercesor']; ?>" readonly>
                    <p>Land:</p>
                    <input type="hidden" name="C_pais" value="<?php echo $row['codigo_pais']; ?>">
                    <input type="text" name="Pais" placeholder="Nombre del Blogs" value="<?php echo $row['Pais']; ?>" readonly>
                    <p>Telefon:</p>
                    <input type="text" name="Telefono" placeholder="Telefono" value="<?php echo $row['Telefono']; ?>" readonly>
                    <p>Raumname:</p>
                    <input type="text" name="Nombre_sala" placeholder="Nombre de la sala" value="<?php echo $row['Nombre_sala']; ?>" require>
                    <p>Tagungsprogramm:</p>
                    <select name="Plataforma" class="form-control" require>
                                <option value="<?php echo $row['Codigo_plataforma']; ?>"><?php echo $row['Plataforma']; ?></option>
                                <?php
                                include '../conexion.php';

                                $consulta = "SELECT * FROM tbcplataforma";
                                $ejecutar =mysqli_query($conexion,$consulta) or die(mysqli_error($conexion));

                                ?>

                                <?php foreach($ejecutar as $opciones): ?>
                                <option value="<?php echo $opciones['Codigo_plataforma'] ?>"> <?php echo $opciones['Plataforma'] ?> </option>
                                <?php endforeach ?>
                            </select>
                    <p>Url:</p>
                    <input type="text" name="Url" placeholder="Geben Sie die URL der Plattform ein" value="<?php echo $row['Url']; ?>" require>
                    <p>Sprache</p>
                    <select name="Idioma" class="form-control" require>
                                <option value="<?php echo $row['Codigo_idioma']; ?>"><?php echo $row['Idioma']; ?></option>
                                <?php
                                include '../procesos/conexion.php';

                                $consulta = "SELECT * FROM tbcidioma WHERE Estado = 1";
                                $ejecutar =mysqli_query($conexion,$consulta) or die(mysqli_error($conexion));

                                ?>

                                <?php foreach($ejecutar as $opciones): ?>
                                <option value="<?php echo $opciones['Codigo_idioma'] ?>"> <?php echo $opciones['Idioma'] ?> </option>
                                <?php endforeach ?>
                    </select>
                    <br>
                    <input type="submit" value="AKTUALISIEREN" name="btn">
                </form>
                </div>
            </div>
    </section>
</div>

<script type="text/javascript" src="js/funciones.js"></script>
<script type="text/javascript" src="bootstrap-5.3.3-dist/js/bootstrap.js"></script>
<script type="text/javascript" src="bootstrap-5.3.3-dist/js/bootstrap.min.js"></script>
</body>
</html>