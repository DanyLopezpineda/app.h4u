
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Inicio Sesión SVO - Here4you</title>
    <link rel="icon" href="../image/ico-here4you.ico">
	<link rel="stylesheet" type="text/css" href="css/idiomas.css">
    <link rel="stylesheet" type="text/css" href="administrador/bootstrap/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="administrador/bootstrap/css/bootstrap.min.css">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1, maximum-scale=1, minimum-scale=1">
</head>
<body>
    <main>
        <section id="banner">
            <img src="../image/11.png" alt="">
        </section>
        <section id="titulo">
            <h2>WELCOME SERVANT OF CHRIST</h2>
            <p>CHOOSE YOUR LANGUAGE</p>
        </section>
        <section id="blogs">
        <?php
                            include("procesos/conexion.php");

                            $query = "SELECT * FROM tbcidioma where Estado = 1 and Codigo_idioma = 1";
                            $resultados = $conexion->query($query);
                            while ($row = $resultados->fetch_assoc()) { 
                        ?>
                        <div class="contenedor">
                            <article>
                            <a style="text-decoration:none; font-family:Britannic Bold; color:Black;" href="<?php echo $row['Acceso']; ?>"><img src="data:image/jpg;base64,<?php echo base64_encode($row['logo']); ?>" alt=""></a>
                            <h4><?php echo $row['Idioma']; ?></h4>
                            </article>
                        <?php
                            }
                        ?>
        <?php
                            include("procesos/conexion.php");

                            $query = "SELECT * FROM tbcidioma where Estado = 1 and Codigo_idioma = 2";
                            $resultados = $conexion->query($query);
                            while ($row = $resultados->fetch_assoc()) { 
                        ?>
                            <article>
                            <a style="text-decoration:none; font-family:Britannic Bold; color:Black;" href="<?php echo $row['Acceso']; ?>"><img src="data:image/jpg;base64,<?php echo base64_encode($row['logo']); ?>" alt=""></a>
                            <h4><?php echo $row['Idioma']; ?></h4>
                            </article>
                        <?php
                            }
                        ?>
        <?php
                            include("procesos/conexion.php");

                            $query = "SELECT * FROM tbcidioma where Estado = 1 and Codigo_idioma = 3";
                            $resultados = $conexion->query($query);
                            while ($row = $resultados->fetch_assoc()) { 
                        ?>
                            <article>
                            <a style="text-decoration:none; font-family:Britannic Bold; color:Black;" href="<?php echo $row['Acceso']; ?>"><img src="data:image/jpg;base64,<?php echo base64_encode($row['logo']); ?>" alt=""></a>
                            <h4><?php echo $row['Idioma']; ?></h4>
                            </article>
                        <?php
                            }
                        ?>
        <?php
                            include("procesos/conexion.php");

                            $query = "SELECT * FROM tbcidioma where Estado = 1 and Codigo_idioma = 4";
                            $resultados = $conexion->query($query);
                            while ($row = $resultados->fetch_assoc()) { 
                        ?>
                            <article>
                            <a style="text-decoration:none; font-family:Britannic Bold; color:Black;" href="<?php echo $row['Acceso']; ?>"><img src="data:image/jpg;base64,<?php echo base64_encode($row['logo']); ?>" alt=""></a>
                            <h4><?php echo $row['Idioma']; ?></h4>
                            </article>
                        </div>
                        <?php
                            }
                        ?>
        </section>
    </main>
<script type="text/javascript" src="js/funciones.js"></script>
<script type="text/javascript" src="bootstrap/js/bootstrap.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>