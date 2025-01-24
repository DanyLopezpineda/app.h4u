<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Catalogo Paises - Here4you</title>
	<link rel="stylesheet" type="text/css" href="../css/menu.css">
    <link rel="stylesheet" type="text/css" href="../bootstrap-5.3.3-dist/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="../bootstrap-5.3.3-dist/css/bootstrap.min.css">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1, maximum-scale=1, minimum-scale=1">
</head>
<body>
	<header>
            <div class="contenedor">
            <input type="checkbox" id="menu-bar">
            <label class="icon-menu" for="menu-bar"></label>
            <nav class="menu">
                <a href="../panel-control.html">INICIO</a>
                <a href="../sala.php">SALAS VIRTUALES</a>
                <a href="../intercesores.php">INTERCESORES</a>
                <a href="idiomas.php">IDIOMA</a>
                <a href="paises.php">PAISES</a>
                <a href="#.php">ESTADISTICAS</a>
                <a href="#.php">TESTIMONIOS</a>
            </nav>
            </div>
        </header>
<div class="panel">
    <section>
        <div class="contenedor">
            <div class="titulo-intercesores">
                <h2>Catalogo Paises - Here4you</h2>
            </div>
        </div>
    </section>
    <section>
        <div class="contenedor">
            <div class="botones">
                <input type="text" id="txt-busqueda-intercesores" placeholder="Ingrese el nombre del intercesor..!">
                <!-- Button trigger modal -->
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#MD-NUEVO">
                <i class="bi bi-person-add"></i> NUEVO
                </button>
            </div>
        </div>
    </section>
    <section>
        <div class="contenedor">
            <table class="table table-striped" id="tb-editar">
                <thead>
                    <tr>
                        <th>Codigo</th>
                        <th>Pais</th>
                        <th>Estado</th>
                        <th colspan="2">Acciones</th>
                    </tr>
                </thead>
                 <?php
                            include("../procesos/conexion.php");

                            $query = "SELECT *
                             FROM tbcpais ";
                            $resultados = $conexion->query($query);
                            while ($row = $resultados->fetch_assoc()) { 
                        ?>
                        <tr>
                            <td><?php echo $row['codigo_pais']; ?></td>
                            <td><?php echo $row['Pais']; ?></td>
                            <td><?php echo $row['Estado']; ?></td>
                            <td>
                            <td class="EdiWeb"><button type="button" class="btn btn-warning"><a style="text-decoration:none;" href="procesos/modificar-salas.php?Idsalas=<?php echo $row['Codigo_sala']; ?>">Editar</button></td>
                            <td class="EliWeb"><button type="button" class="btn btn-danger"><a style="text-decoration:none;" href="procesos/proceso-eliminar-salas.php?Idsala=<?php echo $row['Codigo_sala']; ?>">Quitar</button></td>
                            </td>
                        </tr>
                        <?php
                            }
                        ?>
            </table>
        </div>
    </section>
</div>


<script type="text/javascript" src="js/funciones.js"></script>
<script type="text/javascript" src="bootstrap-5.3.3-dist/js/bootstrap.js"></script>
<script type="text/javascript" src="bootstrap-5.3.3-dist/js/bootstrap.min.js"></script>
</body>
</html>