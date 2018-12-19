<?php
include 'conexion.php';
session_start();


	// Check connection
	if (!$conexion) {
		die("Connection failed: " . mysqli_connect_error());
	}
	
	// data sent from form login.html 
	$nick = $_POST['name']; 
	$pass = $_POST['pass'];
	
    // Query sent to database
    $sql = "SELECT nombre, pass, foto FROM usuario WHERE nombre = '$nick'";
	$result = mysqli_query($conexion, $sql);
	mysqli_close($conexion);
	
	// Variable $row hold the result of the query
	$row = mysqli_fetch_assoc($result);
	
	// Variable $hash hold the password hash on database
	$hash = $row['pass'];

	/* 
	password_Verify() function verify if the password entered by the user
	match the password hash on the database. If everything is ok the session
	is created for one minute. Change 1 on $_SESSION[start] to 5 for a 5 minutes session.
	*/
	if ($_POST['pass'] == $hash) {	
		
		$_SESSION['loggedin'] = true;
		$_SESSION['name'] = $row['nombre'];
		$_SESSION['foto'] = $row['foto'];
		$_SESSION['pass'] = $row['pass'];
		$_SESSION['start'] = time();
		$_SESSION['expire'] = $_SESSION['start'] + (1 * 60) ;						
		
		header("location: ../index.php");
		
	
	} else {
        //echo $row[];
        echo "<script>alert('Pailas perro')</script>";
        header("location: ../index.php");
	}

?>