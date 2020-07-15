<?php
session_start();
?>

<!doctype html>
<html lang="es">
	<head>
		<title>Valida login y crea sesion</title>
		<!-- Required meta tags -->
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

		<!-- Bootstrap CSS -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
	</head>
	<body>
		<div class="container">
		
			<?php
			// Connection info. file
			include '../Data/conn.php';				

			// Check connection
			if (!$conn) {
				die("Connection failed: " . mysqli_connect_error());
			}
			
			// data sent from form login.html 
			$name = $_POST['name']; 
			$password = $_POST['password'];
			
			// Query sent to database
			$result = mysqli_query($conn, "SELECT id,email, password, nombre,tipo,apellido FROM users WHERE nombre = '$name'");
			
			// Variable $row hold the result of the query
			$row = mysqli_fetch_assoc($result);
			
			// Variable $hash hold the password hash on database
			$hash = $row['password'];
			
			/* 
			password_Verify() function verify if the password entered by the user
			match the password hash on the database. If everything is OK the session
			is created for one minute. Change 1 on $_SESSION[start] to 5 for a 5 minutes session.
			*/
			if (password_verify($_POST['password'], $hash)) {	
				
				$_SESSION['loggedin'] = true;
				$_SESSION['name'] = $row['nombre'];				
				$_SESSION['id'] = $row['id'];
				$_SESSION['type'] = $row['tipo'];
				$_SESSION['start'] = time();
				$_SESSION['expire'] = $_SESSION['start'] + (1 * 60) ;						
					
				
				if($row['tipo']==1){
					header('location:../views/mainAlumno.php');	
				}elseif($row['tipo']==2){
					header('location:../views/mainDocente.php');	
				}elseif($row['tipo']==3){
					header('location:../views/mainResponsable.php');	
				}
			
			} else { 
				header('location:../views/login.php?e=1');
			}	
			?>
		</div>
		<!-- Optional JavaScript -->
		<!-- jQuery first, then Popper.js, then Bootstrap JS -->
		<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>

	</body>
</html>