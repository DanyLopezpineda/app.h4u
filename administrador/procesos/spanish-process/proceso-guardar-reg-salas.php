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
	<title>Crear Nuevas Salas - Here4you</title>
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
                <a href="../../area-admin/spanish-admin/salas-spanish.php">RETORNAR</a>
            </nav>
            </div>
        </header>
<div class="panel">
<section>
            <div class="contenedor">
                <div class="form-modificar">
<?php
include("../conexion.php");

$Id=$_REQUEST['IdIntercesor'];

$query = "SELECT i.Codigo, i.Intercesor,
p.codigo_pais, p.Pais, i.Telefono FROM intercesores i join tbcpais p on i.pais=p.codigo_pais WHERE Codigo='$Id'";
$resultados = $conexion->query($query);
$row = $resultados->fetch_assoc();
?>
                <form method="POST" action="proceso-nuevas-salas.php?IdIntercesor=<?php echo $row['Codigo']; ?>" enctype="multipart/form-data">
                <h3>Nueva Sala Virtual</h3>
                    <p>Codigo Intercesor:</p>
                    <input type="text" name="Codigo" placeholder="Id Blogs" value="<?php echo $row['Codigo']; ?>" readonly>
                    <p>Intercesor:</p>
                    <input type="text" name="Intercesor" placeholder="Nombre del Blogs" value="<?php echo $row['Intercesor']; ?>" readonly>
                    <p>Pais:</p>
                    <input type="hidden" name="C_pais" value="<?php echo $row['codigo_pais']; ?>">
                    <input type="text" name="Pais" placeholder="Nombre del Blogs" value="<?php echo $row['Pais']; ?>" readonly>
                    <p>Número de Telefono:</p>
                    <input type="text" name="Telefono" placeholder="Phone Number" value="<?php echo $row['Telefono']; ?>" readonly>
                    <p>Nombre de Sala:</p>
                    <input type="text" name="Nombre_sala" placeholder="Enter the name of the room" require>
                    <p>Fecha Creación:</p>
                    <input type="date" name="Fecha_creacion" placeholder="Nombre del Blogs" require>
                    <p>Plataforma:</p>
                    <select name="Plataforma" class="form-control" require>
                                <?php
                                include '../procesos/conexion.php';

                                $consulta = "SELECT * FROM tbcplataforma";
                                $ejecutar =mysqli_query($conexion,$consulta) or die(mysqli_error($conexion));

                                ?>

                                <?php foreach($ejecutar as $opciones): ?>
                                <option value="<?php echo $opciones['Codigo_plataforma'] ?>"> <?php echo $opciones['Plataforma'] ?> </option>
                                <?php endforeach ?>
                            </select>
                    <p>Url:</p>
                    <input type="text" name="Url" placeholder="Enter the URL of your room..." require>
                    <input type="submit" value="GUARDAR" name="btn">
                </form>
                </div>
            </div>
    </section>
</div>

<script type="text/javascript" src="js/funciones.js"></script>
<script type="text/javascript" src="../../bootstrap/js/bootstrap.js"></script>
<script type="text/javascript" src="../..bootstrap/js/bootstrap.min.js"></script>
</body>
</html>