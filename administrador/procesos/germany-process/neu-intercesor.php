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
	<title>Neue Fürbitter - Here4you</title>
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
                <a href="../../area-admin/germany-admin/furbitter.php">ZURÜCKKEHREN</a>
            </nav>
            </div>
        </header>
<div class="panel">
<section>
            <div class="contenedor">
                <div class="form-modificar">
                <form method="POST" action="proceso-guardar-reg-intercesores.php">
            <div class="mb-3">
          <label for="intercesor" class="form-label">Vollständiger Name:</label>
          <input type="text" class="form-control" name="Intercesor" placeholder="Geben Sie den vollständigen Namen ein..!" required="">
        </div>
        <div class="mb-3">
          <label for="telefono" class="form-label">Telefon:</label>
          <input type="numero" class="form-control" name="Telefono" placeholder="Geben Sie die Telefonnummer ein..!" required="">
        </div>
        <div class="mb-3">
          <label for="Pais" class="form-label">Land:</label>
                    <select name="Pais_codigo" class="form-control" require>
                                <?php
                                include '../conexion.php';

                                $consulta = "SELECT * FROM tbcpais where Continente = 6 and Estado = 1";
                                $ejecutar =mysqli_query($conexion,$consulta) or die(mysqli_error($conexion));

                                ?>

                                <?php foreach($ejecutar as $opciones): ?>
                                <option value="<?php echo $opciones['codigo_pais'] ?>"> <?php echo $opciones['Pais'] ?> </option>
                                <?php endforeach ?>
                            </select>
        </div>
        <div class="mb-3">
          <label for="Lenguaje" class="form-label">Sprache:</label>
                    <select name="Codigo_idioma" class="form-control" require>
                                <?php
                                include '../conexion.php';

                                $consulta = "SELECT * FROM tbcidioma where Estado = 1";
                                $ejecutar =mysqli_query($conexion,$consulta) or die(mysqli_error($conexion));

                                ?>

                                <?php foreach($ejecutar as $opciones): ?>
                                <option value="<?php echo $opciones['Codigo_idioma'] ?>"> <?php echo $opciones['Idioma'] ?> </option>
                                <?php endforeach ?>
                            </select>
        </div>
        <div class="mb-3">
          <label for="Genero" class="form-label">Geschlecht</label>
          <select name="Genero" id="Genero" class="form-control">
            <option value="">- - - Geschlecht - - -</option>
            <option value="1">MÄNNLICH</option>
            <option value="2">WEIBLICH</option>
          </select>
        </div>
        <div class="mb-3">
          <label for="Fnacimiento" class="form-label">Geburtsdatum:</label>
          <input type="date" class="form-control" name="Fnacimiento" placeholder="Digite la clave...!!" required="">
        </div>
         <div class="mb-3">
          <label for="clave" class="form-label">Passwort:</label>
          <input type="text" class="form-control" name="Clave" placeholder="Geben Sie das Passwort ein...!!" required="">
        </div>
        <div class="mb-3">
          <label for="rol" class="form-label">Privilegien:</label>
          <select class="form-control" name="Rol" required="">
              <option value="" style="text-align: center;"> - - - PRIVILEG AUSWÄHLEN - - - </option>
              <option value="0" style="text-align: center;">ADMINISTRATOR</option>
              <option value="1" style="text-align: center;">FÜRBITTER</option>
          </select>
      </div>
      <input type="submit" value="Halten" name="btn">
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