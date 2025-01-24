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
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="../../css/menu.css">
    <link rel="stylesheet" type="text/css" href="../../bootstrap/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="../../bootstrap/css/bootstrap.min.css">
    <link rel="icon" href="../../../image/ico-here4you.ico">
    <link rel="stylesheet" type="text/css" href="../../css/styles.css">
    <link rel="stylesheet" type="text/css" href="../../css/estilos-peticiones.css">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1, maximum-scale=1, minimum-scale=1">
    <title>Thank you - Here4you</title>
</head>
<body>
<header>
            <div class="contenedor">
            <input type="checkbox" id="menu-bar">
            <label class="icon-menu" for="menu-bar"></label>
            <nav class="menu">
            <a href="salas-intercesor.php">MI SALA</a>
            <a href="peticiones.php">NUEVA PETICIÓN</a>
            <a href="mispeticiones.php">MIS PETICIONES</a>
			<a href="bd-peticiones.php">PETICIONES DE ORACIÓN</a>
            <a href="../../procesos/spanish-process/salir-intercesor.php">SALIR</a>
            </nav>
            </div>
        </header>
    <section id="logo-centro">
                    <img src="../../image/mail-recibed.png" alt="">
    </section>
    <div class="panel-gracias">
        <section>
            <div class="contenedor">
                <h2>PETICIÓN DE ORACIÓN RECIBIDA</h2>
            </div>    
        </section>
        <section>
            <div class="contenedor">
                <img src="image/mail-recibed.png" alt="">
                <h3>"HEMOS RECIBIDO SU PETICIÓN, UN EQUIPO DE INTERCESORES DE TODA LATINOAMÉRICA ORARÁ POR PETICIÓN"</h3>
            </div>
        </section>
    </div>
</body>
</html>