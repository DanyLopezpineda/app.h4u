<!DOCTYPE html>
<html lang="es">
    <head>
        <title>Login - Admon - Here4you</title>
        <meta charset="utf-8">
        <link rel="stylesheet" type="text/css" href="../../css/menu.css">
        <link rel="stylesheet" type="text/css" href="../../css/styles.css">
        <link rel="icon" href="../../../image/ico-here4you.ico">
    </head>
        <body>
        <section>
        <header>
            <div class="contenedor">
                <input type="checkbox" id="menu-bar">
                <label class="icon-menu" for="menu-bar"></label>
                <nav class="menu">
                   
                </nav>
                </div>
        </header>
        </section>
        <section>
	<div class="contenedor">
		<div class="login">
			<img src="../../../image/h4y-mesa.png">
		</div>
	</div>
</section>
<section>
	<div class="contenedor">
		<div class="FormLogin">
			<form method="POST" action="../../procesos/spanish-process/validar.php">
				<h2>Administrador</h2>
				<input type="text" name="User" placeholder="Telefono" required>
				<input type="Password" name="Clave" placeholder="Password" required>
				<input type="submit" id="btnlogin" value="Ingresar">
			</form>
		</div>
	</div>
</section>
        </body>
</html>