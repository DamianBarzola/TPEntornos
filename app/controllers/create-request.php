<?php
session_start();
?>

	<?php

	include '../Data/conn.php';

	// Check connection
	if (!$conn) {
		die("Connection failed: " . mysqli_connect_error());
	}
	$id_user=$_SESSION['id'];
	$checkID = "SELECT * FROM solicitudes WHERE id_user = '$id_user' ";
	$result = $conn-> query($checkID);
	$count = mysqli_num_rows($result);

	if ($count == 1) {
        header('location:../views/requestPPS.php?e=1');
	} else {		
	$caractPPS = $_POST['caractPPS'];
	$nombreEntidad = $_POST['nombreEntidad'];
	$direccion = $_POST['direccion'];
    $cp = $_POST['cp'];
    $localidad = $_POST['localidad'];
	$telefono = $_POST['telefono'];
	$email = $_POST['email'];
    $contacto = $_POST['contacto'];    

	$query = "INSERT INTO solicitudes (caractPPS, nombreEntidad, direccion, cp, localidad, tel, emailE, contactoEntidad, id_user) VALUES ('$caractPPS', '$nombreEntidad', '$direccion','$cp','$localidad', '$telefono', '$email','$contacto',$id_user)";

	if (mysqli_query($conn, $query)) {
		header('location:../views/requestPPS.php?a=1');	
		} else {
			echo "Error: " . $query . "<br>" . mysqli_error($conn);
		}	
	}	
	mysqli_close($conn);
	?>
