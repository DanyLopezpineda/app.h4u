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
	<title>New Interccesors - Here4you</title>
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
                <form method="POST" action="proceso-guardar-reg-intercesores-english.php">
            <div class="mb-3">
          <label for="intercesor" class="form-label">Name:</label>
          <input type="text" class="form-control" name="Intercesor" placeholder="Write the Name..!" required="">
        </div>
        <div class="mb-3">
          <label for="telefono" class="form-label">Phone Number:</label>
          <input type="numero" class="form-control" name="Telefono" placeholder="Write the country code and phone number..!" required="">
        </div>
        <div class="mb-3">
          <label for="Pais" class="form-label">Country:</label>
                    <select name="Pais_codigo" class="form-control" require>
                                <?php
                                include '../conexion.php';

                                $consulta = "SELECT * FROM tbcpais where Continente = 3 and Estado = 1";
                                $ejecutar =mysqli_query($conexion,$consulta) or die(mysqli_error($conexion));

                                ?>

                                <?php foreach($ejecutar as $opciones): ?>
                                <option value="<?php echo $opciones['codigo_pais'] ?>"> <?php echo $opciones['Pais'] ?> </option>
                                <?php endforeach ?>
                            </select>
        </div>
        <div class="mb-3">
          <label for="Lenguaje" class="form-label">Lenguage:</label>
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
          <label for="Genero" class="form-label">Gender:</label>
          <select name="Genero" id="Genero" class="form-control">
            <option value="">- - - GENDER - - -</option>
            <option value="1">MALE</option>
            <option value="2">FEMALE</option>
          </select>
        </div>
        <div class="mb-3">
          <label for="Fnacimiento" class="form-label">Date pf Birth:</label>
          <input type="date" class="form-control" name="Fnacimiento" placeholder="Digite la clave...!!" required="">
        </div>
         <div class="mb-3">
          <label for="clave" class="form-label">Password:</label>
          <input type="text" class="form-control" name="Clave" placeholder="Write the to password...!" required="">
        </div>
        <div class="mb-3">
          <label for="rol" class="form-label">Credentials:</label>
          <select class="form-control" name="Rol" required="">
              <option value="" style="text-align: center;"> - - - Choose the credential - - - </option>
              <option value="0" style="text-align: center;">ADMINISTRATOR</option>
              <option value="1" style="text-align: center;">INTERCCESOR</option>
          </select>
      </div>
      <input type="submit" value="SAVE" name="btn">
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