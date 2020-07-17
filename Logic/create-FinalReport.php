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
			$checksiexitePPS = "SELECT * FROM solicitudes WHERE idPPS = '$idPPS'";
			$result = $conn-> query($checksiexitePPS);
			$countsiexitePPS = mysqli_num_rows($result);			
			
			if ($countsiexitePPS == 1) {
				$checksiYaenvioFR = "SELECT * FROM finalReport WHERE idPPS_FP = '$idPPS' ";				
				$result = $conn-> query($checksiYaenvioFR);
				$countsiYaenvioFR = mysqli_num_rows($result);

				if ($countsiYaenvioFR == 1) {
						header('location:../views/formFinalReport.php?r=2');
						}else{
							$conclusiones = $_POST['conclusiones'];
							$query = "INSERT INTO finalReport (conclusiones, idPPS_FP ) VALUES ('$conclusiones',$idPPS)";
							if (mysqli_query($conn, $query)) {
								header('location:../views/formFinalReport.php?a=1');
							} else {
								echo "Error: " . $query . "<br>" . mysqli_error($conn);
							}
						}			
			} else {	
				header('location:../views/formFinalReport.php?e=1');		
			}	
			mysqli_close($conn);
		?>
