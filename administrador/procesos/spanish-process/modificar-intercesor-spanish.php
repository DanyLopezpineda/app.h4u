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
	<title>Intercesores - Here4you</title>
	<link rel="stylesheet" type="text/css" href="../../css/menu.css">
    <link rel="stylesheet" type="text/css" href="../../css/styles.css">
    <link rel="stylesheet" type="text/css" href="../../bootstrap/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="../../bootstrap/css/bootstrap.min.css">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1, maximum-scale=1, minimum-scale=1">
</head>
<body>
	<header>
            <div class="contenedor">
            <input type="checkbox" id="menu-bar">
            <label class="icon-menu" for="menu-bar"></label>
            <nav class="menu">
                <a href="../../area-admin/spanish-admin/intercesores-spanish.php">RETORNAR</a>
            </nav>
            </div>
        </header>
<div class="panel">
<section>
            <div class="contenedor">
                <div class="form-modificar">
<?php
include("../conexion.php");

$Id=$_REQUEST['Idintercesor'];

$query = "SELECT 
i.Codigo, i.Intercesor, i.Telefono, 
p.Pais, p.codigo_pais, i.Clave, 
Fnacimiento, ii.Idioma, ii.Codigo_idioma 
FROM intercesores i 
join tbcpais p on i.pais=p.Codigo_pais 
join tbcidioma ii on i.Lenguaje=ii.Codigo_idioma
WHERE Codigo='$Id'";
$resultados = $conexion->query($query);
$row = $resultados->fetch_assoc();
?>
                <form method="POST" action="proceso-modificar-intercesor.php?IdIntercesores=<?php echo $row['Codigo']; ?>" enctype="multipart/form-data">
                <h3>Editar Intercesor</h3>
                    <p>Codigo Intercesor:</p>
                    <input type="text" name="Codigo" placeholder="Id Blogs" value="<?php echo $row['Codigo']; ?>" readonly>
                    <p>Intercesor:</p>
                    <input type="text" name="Intercesor" placeholder="Nombre del Blogs" value="<?php echo $row['Intercesor']; ?>">
                    <p>Pais:</p>
                    <select name="C_pais" id="C_pais">
                              <option value="<?php echo $row['codigo_pais']; ?>"><?php echo $row['Pais']; ?></option>
                              <?php
                                include '../conexion.php';

                                $consulta = "SELECT * FROM tbcpais where Continente = 1";
                                $ejecutar =mysqli_query($conexion,$consulta) or die(mysqli_error($conexion));

                                ?>

                                <?php foreach($ejecutar as $opciones): ?>
                                <option value="<?php echo $opciones['codigo_pais'] ?>"> <?php echo $opciones['Pais'] ?> </option>
                                <?php endforeach ?>
                    </select> 
                    <p>Lenguaje:</p>
                    <select name="C_idioma" id="C_idioma">
                              <option value="<?php echo $row['Codigo_idioma']; ?>"><?php echo $row['Idioma']; ?></option>
                              <?php
                                include '../conexion.php';

                                $consulta = "SELECT * FROM tbcidioma where Estado = 1";
                                $ejecutar =mysqli_query($conexion,$consulta) or die(mysqli_error($conexion));

                                ?>

                                <?php foreach($ejecutar as $opciones): ?>
                                <option value="<?php echo $opciones['Codigo_idioma'] ?>"> <?php echo $opciones['Idioma'] ?> </option>
                                <?php endforeach ?>
                    </select> 
                    <p>Telefono:</p>
                    <input type="text" name="Telefono" placeholder="Telefono" value="<?php echo $row['Telefono']; ?>">
                    <p>Clave:</p>
                    <input type="text" name="Clave" placeholder="Telefono" value="<?php echo $row['Clave']; ?>">
                    <p>FNacimiento:</p>
                    <input type="date" name="Fnacimiento" placeholder="Telefono" value="<?php echo $row['Fnacimiento']; ?>">
                    
                    <input type="submit" value="ACTUALIZAR" name="btn">
                </form>
                </div>
            </div>
    </section>
</div>

<script type="text/javascript" src="js/funciones.js"></script>
<script type="text/javascript" src="../../bootstrap/js/bootstrap.js"></script>
<script type="text/javascript" src="../../bootstrap/js/bootstrap.min.js"></script>
</body>
</html>