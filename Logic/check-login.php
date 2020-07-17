<?php
session_start();
?>
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
			$result = mysqli_query($conn, "SELECT id,email, password, nombre,tipo,apellido,idPPS FROM users left join solicitudes on id=id_user WHERE nombre = '$name'");
			
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
				$_SESSION['idPPS'] = $row['idPPS'];				
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