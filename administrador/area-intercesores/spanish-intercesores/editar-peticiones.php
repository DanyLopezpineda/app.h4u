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
	<title>Peticiones - Here4you</title>
	<link rel="stylesheet" type="text/css" href="../../css/menu.css">
    <link rel="stylesheet" type="text/css" href="../../bootstrap/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="../../bootstrap/css/bootstrap.min.css">
    <link rel="icon" href="../../../image/ico-here4you.ico">
    <link rel="stylesheet" type="text/css" href="../../css/styles.css">
    <link rel="stylesheet" type="text/css" href="../../css/estilos-peticiones.css">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1, maximum-scale=1, minimum-scale=1">
</head>
<body>
	<header>
            <div class="contenedor">
            <input type="checkbox" id="menu-bar">
            <label class="icon-menu" for="menu-bar"></label>
            <nav class="menu">
            <a href="salas-intercesor.php">CANCELAR</a>        
            </nav>
            </div>
        </header>
        <section>
        <div class="contenedor">
            <div class="titulo-intercesores">
                <h2>Modificación de Peticiones - Here4you</h2>
            </div>
        </div>
    </section>
<section>
    <div class="contenedor">
        <div class="panel-formulario">
        <?php
include("../../procesos/conexion.php");

$Id=$_REQUEST['Idpeticiones'];

$query = "SELECT p.Id_peticiones, p.Nombre, p.Telefono, p.Fecha_Peticion, 
                            pc.Pais, p.Petición, pc.codigo_pais
                             FROM tbpeticiones p join
                             tbcpais pc on p.Pais=pc.codigo_pais 
WHERE Id_peticiones='$Id'";
$resultados = $conexion->query($query);
$row = $resultados->fetch_assoc();
?>
        <form action="../../procesos/spanish-process/proceso-modificar-peticiones.php" method="post">
                    <label for="Id_Peticiones">(*) Id_Peticiones:</label>
                    <input type="text" name="Id_Peticiones" id="Id_Peticiones" value="<?php echo $row['Id_peticiones']; ?>" readonly>
                    <label for="Nombre">(*) Name:</label>
                    <input type="text" name="Nombre" id="Nombre" value="<?php echo $row['Nombre']; ?>" placeholder="Write your name..!" required>
                    <label for="Telefono">(optional) Phone Number:</label>
                    <input type="text" name="Telefono" id="Telefono" placeholder="(000) 0000-0000" value="<?php echo $row['Telefono']; ?>">
                    <input type="hidden" name="user" id="user" value=<?php echo $_SESSION['Clave']; ?>>
                    <label for="pais">(*) Country:</label>
                    <select name="Pais_codigo" require>
                    <option value="<?php echo $row['codigo_pais']; ?>"><?php echo $row['Pais']; ?></option>
                                <?php
                                include '../../procesos/conexion.php';
                                $consulta = "SELECT * FROM tbcpais where Continente = 1 and Estado = 1";
                                $ejecutar =mysqli_query($conexion,$consulta) or die(mysqli_error($conexion));

                                ?>

                                <?php foreach($ejecutar as $opciones): ?>
                                <option value="<?php echo $opciones['codigo_pais'] ?>"> <?php echo $opciones['Pais'] ?> </option>
                                <?php endforeach ?>
                            </select>
                    <label for="Peticion">(*) Prayer Request:</label>
                    <textarea name="Peticion" id="Peticion" placeholder="Write your prayer request...!" required><?php echo $row['Petición']; ?></textarea>
                <input type="submit" id="btn-enviar" value="Update Request">
            </form>
        </div>
    </div>
</section>
<script type="text/javascript" src="js/funciones.js"></script>
<script type="text/javascript" src="../bootstrap/js/bootstrap.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>