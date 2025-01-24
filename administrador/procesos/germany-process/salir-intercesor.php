<?php
	session_start();
	error_reporting(0);

	$varsesion = $_SESSION['Clave'];
    if($varsesion == null || $varsesion = '')
    {
        echo "<script>location.href='https://here4you.live/'</script>"; 
        die();
    }
    
	session_destroy();
	header("Location:../../area-intercesores/germany-furbitter/logo-furbitter.php");
?>