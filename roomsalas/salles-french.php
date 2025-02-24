   
<!DOCTYPE html>
<html lang="fr">
<head>
	<meta charset="utf-8">
	<title>Salas Virtuales - Here4you</title>
	<link rel="stylesheet" type="text/css" href="../css/menu.css">
          <link rel="icon" href="../image/ico-here4you.ico">
          <link rel="stylesheet" type="text/css" href="../css/estyles.css">
          <link rel="stylesheet" type="text/css" href="../css/fontello.css">
    <link rel="stylesheet" type="text/css" href="../administrador/bootstrap/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="../administrador/bootstrap/css/bootstrap.min.css">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1, maximum-scale=1, minimum-scale=1">
</head>
<body>
    <section>
        <div class="contenedor">
            <div class="Acciones" style="text-align:center;">
              <img style="width:15%;" src="../image/h4y-mesa.png" alt="">
              <p style="color:#D08512; text-align:center; font-size:35px; font-family:Arial Black;">SALLES DE PRIÈRE VIRTUELLES DISPONIBLES</p>
            </div>
        </div>
    </section>
    <section style="text-align:center;">
        <div class="contenedor">
            
                 <?php
                            include("../administrador/procesos/conexion.php");

                            $query = "SELECT i.Codigo, s.Url, i.Intercesor, p.Pais, s.Nombre_sala
                            FROM tbsalas s join
                            intercesores i on s.Intercesor=i.Codigo join
                            tbcpais p on i.Pais=p.codigo_pais
                             WHERE s.Estado = 1 and s.Idioma = 4";
                            $resultados = $conexion->query($query);
                            while ($row = $resultados->fetch_assoc()) { 
                        ?>
                        <H2><img style="width:3%;" src="../image/manos.png" alt=""> <a href="../administrador/procesos/french-process/registrar-french.php?IdIntercesor=<?php echo $row['Codigo']; ?>" class="href" style="text-decoration:none; font-size:15px; font-family:Cooper Black; color:gray;">SALLES <?php echo $row['Nombre_sala']; ?> <?php echo $row['Pais']; ?></a></H2>
                        <?php
                            }
                        ?>
        </div>
    </section>

<script type="text/javascript" src="../administrador/js/funciones.js"></script>
<script type="text/javascript" src="../administrador/bootstrap/js/bootstrap.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>