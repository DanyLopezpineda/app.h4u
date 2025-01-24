<?php
session_start();
$varsesion = $_SESSION['Clave'];
error_reporting(0);
if($varsesion == null || $varsesion = '')
{
    echo '<script>alert("USTED NO TIENE AUTORIZACIÓN")</script>';
    echo "<script>location.href='https://here4you.live/'</script>"; 
    die();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Edit Interccesor - Here4you</title>
	<link rel="stylesheet" type="text/css" href="../../css/menu.css">
    <link rel="stylesheet" type="text/css" href="../../css/styles.css">
    <link rel="icon" href="../../../image/ico-here4you.ico">
    <link rel="stylesheet" type="text/css" href="../../bootstrap-5.3.3-dist/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="../../bootstrap-5.3.3-dist/css/bootstrap.min.css">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1, maximum-scale=1, minimum-scale=1">
</head>
<body>
	<header>
            <div class="contenedor">
            <input type="checkbox" id="menu-bar">
            <label class="icon-menu" for="menu-bar"></label>
            <nav class="menu">
            <a href="../../area-admin/english-admin/intercesores-english.php">RETURN</a>
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

$query = "SELECT i.Codigo, i.Intercesor, i.Telefono, p.Pais, p.codigo_pais,
i.Clave, Fnacimiento FROM intercesores i 
join tbcpais p on i.pais=p.Codigo_pais WHERE Codigo='$Id'";
$resultados = $conexion->query($query);
$row = $resultados->fetch_assoc();
?>
                <form method="POST" action="proceso-modificar-intercesor-english.php?IdIntercesores=<?php echo $row['Codigo']; ?>" enctype="multipart/form-data">
                <h3>Edit Interccesor</h3>
                    <p>Code Interccesor:</p>
                    <input type="text" name="Codigo" placeholder="Id Blogs" value="<?php echo $row['Codigo']; ?>" readonly>
                    <p>Interccesor:</p>
                    <input type="text" name="Intercesor" placeholder="Nombre del Blogs" value="<?php echo $row['Intercesor']; ?>">
                    <p>Country:</p>
                    <select name="C_pais" id="C_pais">
                              <option value="<?php echo $row['codigo_pais']; ?>"><?php echo $row['Pais']; ?></option>
                              <?php
                                include '../conexion.php';

                                $consulta = "SELECT * FROM tbcpais where Continente = 3 and Estado = 1";
                                $ejecutar =mysqli_query($conexion,$consulta) or die(mysqli_error($conexion));

                                ?>

                                <?php foreach($ejecutar as $opciones): ?>
                                <option value="<?php echo $opciones['codigo_pais'] ?>"> <?php echo $opciones['Pais'] ?> </option>
                                <?php endforeach ?>
                    </select> 
                    <p>Phone Number:</p>
                    <input type="text" name="Telefono" placeholder="Telefono" value="<?php echo $row['Telefono']; ?>">
                    <p>Password:</p>
                    <input type="text" name="Clave" placeholder="Telefono" value="<?php echo $row['Clave']; ?>">
                    <p>Birthday:</p>
                    <input type="date" name="Fnacimiento" placeholder="Telefono" value="<?php echo $row['Fnacimiento']; ?>">
                    
                    <input type="submit" value="UPDATE" name="btn">
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