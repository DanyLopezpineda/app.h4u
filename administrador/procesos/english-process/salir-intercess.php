<?php
	session_start();
	error_reporting(0);

	$varsesion = $_SESSION['Clave'];
    if($varsesion == null || $varsesion = '')
    {
        echo "<script>location.href='../../area-intercesores/english-intercesores/lgo-intercess-english.php'</script>"; 
        die();
    }
    
	session_destroy();
	header("Location:../../area-intercesores/english-intercesores/lgo-intercess-english.php");
?>