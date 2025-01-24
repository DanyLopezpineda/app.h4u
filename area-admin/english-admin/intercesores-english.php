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
	<title>Intercesores - Here4you</title>
	<link rel="stylesheet" type="text/css" href="../../css/menu.css">
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
                <a href="roms-english.php">VIRTUAL ROOMS</a>
                <a href="intercesores-english.php">PRAYER INTERCESSORS</a>
                <a href="../../procesos/english-process/salir.php">EXIT</a>
            </nav>
            </div>
        </header>
<div class="panel">
    <section>
        <div class="contenedor">
            <div class="titulo-intercesores">
                <h2>User Control - Here4you</h2>
            </div>
        </div>
    </section>
    <section>
        <div class="contenedor">
            <div class="botones">
                <button type="button" class="btn btn-primary">
                  <a style="color:white; text-decoration:none;" href="../../procesos/english-process/new-interccesor.php" class="href">
                  NEW USERS
                  </a>
                </button>
            </div>
        </div>
    </section>
    <section>
        <div class="contenedor">
            <table class="table table-striped" id="tb-editar">
                <thead>
                    <tr>
                        <th>Code Number</th>
                        <th>Interccesor</th>
                        <th>Country</th>
                        <th>Phone Number</th>
                        <th>Password</th>
                        <th>Credentials</th>
                        <th>Estatus</th>
                        <th colspan="2">Actions</th>
                    </tr>
                </thead>
                 <?php
                            include("../../procesos/conexion.php");

                            $query = "SELECT i.Codigo, i.Intercesor, p.Pais, i.Telefono, i.Clave, CASE WHEN i.Rol = 0 THEN 'Administrator' else 'Interccesors' end AS Rol,
                                CASE WHEN i.Estado = 1 THEN 'Enable' ELSE 'Desable' END AS Estado 
                                FROM intercesores i 
                                join tbcpais p on i.pais=p.codigo_pais
                                join tbccontinentes c on p.Continente=c.Id_continente
                                WHERE 
                                i.Lenguaje = 2 and 
                                i.Estado in (1,0) and 
                                c.Id_continente = 3";
                            $resultados = $conexion->query($query);
                            while ($row = $resultados->fetch_assoc()) { 
                        ?>
                        <tr>
                            <td><?php echo $row['Codigo']; ?></td>
                            <td><?php echo $row['Intercesor']; ?></td>
                            <td><?php echo $row['Pais']; ?></td>
                            <td><?php echo $row['Telefono']; ?></td>
                            <td><?php echo $row['Clave']; ?></td>
                            <td><?php echo $row['Rol']; ?></td>
                            <td><?php echo $row['Estado']; ?></td>
                            <td class="EliWeb"><button type="button" class="btn btn-warning"><a style="text-decoration:none; color:white;" href="../../procesos/english-process/edit-interccers-english.php?Idintercesor=<?php echo $row['Codigo']; ?>">Edit</a></button> <button type="button" class="btn btn-danger"><a style="text-decoration:none;color:white;" href="../../procesos/english-process/proceso-delete-intercesor.php?Idintercesor=<?php echo $row['Codigo']; ?>">Delete</a></button> 
                          </td>
                        </tr>
                        <?php
                            }
                        ?>
            </table>
        </div>
    </section>
</div>

<!-- Modal Nuevos Intercesores-->
<div class="modal fade" id="MD-NUEVO" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Nuevo Intercesor</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form method="POST" action="../procesos/proceso-guardar-reg-intercesores.php">
            <div class="mb-3">
          <label for="intercesor" class="form-label">Nombre Completo:</label>
          <input type="text" class="form-control" name="Intercesor" placeholder="Digite Nombre Completo..!" required="">
        </div>
        <div class="mb-3">
          <label for="telefono" class="form-label">Telefono:</label>
          <input type="numero" class="form-control" name="Telefono" placeholder="Digite el numero de telefono..!!" required="">
        </div>
        <div class="mb-3">
          <label for="Pais" class="form-label">Pais:</label>
                    <select name="Pais_codigo" class="form-control" require>
                                <?php
                                include '../procesos/conexion.php';

                                $consulta = "SELECT * FROM tbcpais";
                                $ejecutar =mysqli_query($conexion,$consulta) or die(mysqli_error($conexion));

                                ?>

                                <?php foreach($ejecutar as $opciones): ?>
                                <option value="<?php echo $opciones['codigo_pais'] ?>"> <?php echo $opciones['Pais'] ?> </option>
                                <?php endforeach ?>
                            </select>
        </div>
        <div class="mb-3">
          <label for="Genero" class="form-label">Genero</label>
          <select name="Genero" id="Genero" class="form-control">
            <option value="">- - - GENERO - - -</option>
            <option value="1">MASCULINO</option>
            <option value="2">FEMENINO</option>
          </select>
        </div>
        <div class="mb-3">
          <label for="Fnacimiento" class="form-label">Fecha Nacimiento:</label>
          <input type="date" class="form-control" name="Fnacimiento" placeholder="Digite la clave...!!" required="">
        </div>
         <div class="mb-3">
          <label for="clave" class="form-label">Clave:</label>
          <input type="text" class="form-control" name="Clave" placeholder="Digite la clave...!!" required="">
        </div>
        <div class="mb-3">
          <label for="rol" class="form-label">Rol:</label>
          <select class="form-control" name="Rol" required="">
              <option value="" style="text-align: center;"> - - - SELECCIONE EL ROL - - - </option>
              <option value="0" style="text-align: center;">ADMINISTRADOR</option>
              <option value="1" style="text-align: center;">INTERCESOR</option>
          </select>
      </div>
       <div class="modal-footer">
             <button type="Submit" class="btn btn-primary">Guardar</button>
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
            </div>
      </form>
    </div>
  </div>
</div>
</div>


<!-- Modal Eliminar Intercesores-->
<div class="modal fade" id="MD-QUITAR" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Deshabilitar Intercesor</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <h2 class="titulo">
            ¿Desea deshabilitar el intercesor?
        </h2>
        <form method="POST" action="../procesos/proceso-eliminar-reg-intercesores.php">
            <?php
                                include("../procesos/conexion.php");

                                $Id=['Id'];

                                $query = "SELECT Codigo, Intercesor FROM Intercesores WHERE Codigo='$Id'";
                                $resultados = $conexion->query($query);
                                $row = $resultados->fetch_assoc();
                                ?>
            <div class="mb-3">
          <label for="intercesor" class="form-label">Nombre Completo:</label>
          <input type="text" class="form-control" name="Intercesor" placeholder="Digite Nombre Completo..!" value="<?php echo $row['Intercesor']; ?>" required="">
        </div>
       <div class="modal-footer">
             <button type="Submit" class="btn btn-primary">Guardar</button>
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
            </div>
      </form>
    </div>
  </div>
</div>
</div>

<script type="text/javascript" src="js/funciones.js"></script>
<script type="text/javascript" src="../bootstrap/js/bootstrap.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>