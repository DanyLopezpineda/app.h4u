<!DOCTYPE html>
<html lang="de">
<head>
	<meta charset="utf-8">
	<title>Anwendung - Here4you</title>
    <link rel="icon" href="../../../image/ico-here4you.ico">
	<link rel="stylesheet" type="text/css" href="../../css/menu.css">
    <link rel="stylesheet" type="text/css" href="../../css/styles.css">
    <link rel="stylesheet" type="text/css" href="bootstrap-5.3.3-dist/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="bootstrap-5.3.3-dist/css/bootstrap.min.css">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1, maximum-scale=1, minimum-scale=1">
</head>
<body>
<div class="panel">
<section>
            <div class="contenedor">
                <div class="form-modificar">
<?php
include("../conexion.php");

$Id=$_REQUEST['IdIntercesor'];

$query = "SELECT i.Codigo, i.Intercesor, i.Telefono, p.Pais, p.codigo_pais,
i.Clave, Fnacimiento, s.Url FROM intercesores i 
join tbcpais p on i.pais=p.Codigo_pais
join tbsalas s on i.Codigo=s.Intercesor
WHERE Codigo='$Id'";
$resultados = $conexion->query($query);
$row = $resultados->fetch_assoc();
?>
                <form method="POST" action="../proceso-guardar-visitas.php" enctype="multipart/form-data">
                <h3>Zimmeranfrage</h3>
                    <input type="hidden" name="Codigo" value="<?php echo $row['Codigo']; ?>" readonly>
                    <input type="hidden" name="Link" value="<?php echo $row['Url']; ?>" readonly>
                    <input type="hidden" name="Idioma" value="3" readonly>
                    <p>Name:</p>
                    <input type="text" name="Nombre" placeholder="Gib deinen Namen ein">
          <label for="Pais" class="form-label">Land:</label>
                    <select name="Pais_codigo" class="form-control" require>
                                <?php
                                include '../conexion.php';

                                $consulta = "SELECT * FROM tbcpais where Continente = 6";
                                $ejecutar =mysqli_query($conexion,$consulta) or die(mysqli_error($conexion));

                                ?>

                                <?php foreach($ejecutar as $opciones): ?>
                                <option value="<?php echo $opciones['codigo_pais'] ?>"> <?php echo $opciones['Pais'] ?> </option>
                                <?php endforeach ?>
                            </select>
                                        <label for="Genero" class="form-label">Geschlecht:</label>
                                        <select name="Genero" id="Genero" class="form-control">
                                        <option value="">- - - Geschlecht - - -</option>
                                        <option value="1">MÄNNLICH</option>
                                        <option value="2">WEIBLICH</option>
                                        <option value="3">ANDERE</option>
                                        </select>
                    <input type="submit" value="Treten Sie ein" name="btn">
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