<?php
	session_start();
	error_reporting(0);

	$varsesion = $_SESSION['Clave'];
    if($varsesion == null || $varsesion = '')
    {
        echo '<script>alert("YOU DO NOT HAVE AUTHORIZATION")</script>';
        echo "<script>location.href='https://here4you.live/'</script>"; 
        die();
    }
    
	session_destroy();
	header("Location:../../area-admin/english-admin/lgo-admon-english.php");
?>