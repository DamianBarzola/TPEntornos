<?php
session_start();
?>

	<?php
	include '../Data/conn.php';
	// Check connection
	if (!$conn) {
		die("Connection failed: " . mysqli_connect_error());
	}
	$idPPS=$_SESSION['idPPS'];
	$checkID = "SELECT * FROM solicitudes WHERE idPPS = '$idPPS' and id_Profe IS NOT NULL";
	$result = $conn-> query($checkID);
	$count = mysqli_num_rows($result);

	if ($count == 1) {
	$actividadesRealizadas = $_POST['actividadesRealizadas'];
	$actividadesProximas = $_POST['actividadesProximas'];
	$cuestionesPendientes = $_POST['cuestionesPendientes'];
    $experiencias = $_POST['experiencias'];
    $desvioCronograma = $_POST['desvioCronograma'];
	$hsTrabajadas = $_POST['hsTrabajadas'];
	$TotalhsTrabajadas = $_POST['TotalhsTrabajadas'];  

	$query = "INSERT INTO seguimientos (actividadesRealizadas, actividadesProximas, cuestionesPendientes, experiencias, desvioCronograma, hsTrabajadas, TotalhsTrabajadas, id_PPS ) 
                                VALUES ('$actividadesRealizadas', '$actividadesProximas','$cuestionesPendientes','$experiencias', '$desvioCronograma', '$hsTrabajadas','$TotalhsTrabajadas',$idPPS)";

	if (mysqli_query($conn, $query)) {
		header('location:../views/formSeguimiento.php?a=1');	
		} else {
			echo "Error: " . $query . "<br>" . mysqli_error($conn);
		}
	} else {	
        header('location:../views/formSeguimiento.php?e=1');		
	}	
	mysqli_close($conn);
	?>
