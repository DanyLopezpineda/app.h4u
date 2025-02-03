
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Virtual Prayer Rooms - Here4you</title>
          <link rel="stylesheet" type="text/css" href="css/index.css">
	<link rel="stylesheet" type="text/css" href="css/publicidad.css">
          <link rel="icon" href="image/ico-here4you.ico">
    <link rel="stylesheet" type="text/css" href="administrador/bootstrap/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="administrador/bootstrap/css/bootstrap.min.css">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1, maximum-scale=1, minimum-scale=1">
</head>
<body>
<h2>Upcoming events</h2>
<div class="contenedor">
<div class="slider-frame">
        <ul>
            <li><img src="image/imagen1.png" alt=""></li>
            <li><img src="image/imagen3.png" alt=""></li>
            <li><img src="image/imagen4.png" alt=""></li>
<li><a href="semana/index.html"><img src="image/imagen6.png" alt=""></a></li>
        </ul>
    </div>
    </div>
    <section>
        <div class="contenedor">
            <div class="idio" style='text-align:center;'>
                <img src="image/logo-principal.png" alt="">
              <p style="color:#D08512; text-align:center; font-size:35px; font-family:Arial Black;">Start here</p>
              <p style="text-align:center; font-family:Britannic Bold; font-size:25px;">Select your language</p>
            </div>
        </div>
    </section>
    <section>
        <div class="contenedor">
          <div class="titulo-salas" style="text-align:center;">
                 <?php
                            include("administrador/procesos/conexion.php");

                            $query = "SELECT * FROM tbcidioma where Plataforma = 1";
                            $resultados = $conexion->query($query);
                            while ($row = $resultados->fetch_assoc()) { 
                        ?>
                        <a style="text-decoration:none; font-family:Britannic Bold; color:Black;" href="<?php echo $row['Salas']; ?>"><img style="width:10%;" src="data:image/jpg;base64,<?php echo base64_encode($row['logo']); ?>" alt=""><h3><?php echo $row['Idioma']; ?></h3></a>
                        
                        <?php
                            }
                        ?>
          </div>       
        </div>
    </section>



<script type="text/javascript" src="js/funciones.js"></script>
<script type="text/javascript" src="administrador/bootstrap/js/bootstrap.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>