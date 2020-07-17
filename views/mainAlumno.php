<?php
session_start();
if($_SESSION['type']==1){
}elseif($_SESSION['type']==2){	
	header('location:../views/mainDocente.php');
}elseif($_SESSION['type']==3){
	header('location:../views/mainResponsable.php');	
}else{
	header('location:../views/login.php');}
?>
<!doctype html>
<html lang="es">
  <head>
    <title>Principal</title>
	
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous"">
	<link rel="stylesheet" href="../css/main.css">
  </head>

  <body>
		<div class="container">
			<div class="card">
				<div class="row">
				<?php 
					include 'head.php';
				?>	
				</div><hr>
				<div class="row">
					<div class="col-lg-12">	
							<h2>MENÚ</h2>		<br>				
							<div class="page">								
							<form action="requestPPS.php" method="post">
								<button type="submit" class="btn btn-primary btn-block">Solicitud de Inicio de PPS</button>
							</form><br>
							<form action="formSeguimiento.php" method="post">
								<button type="submit" class="btn btn-primary btn-block">Subir Seguimiento Seguimientos de PPS</button>
							</form><br>
							<form action="formFinalReport.php" method="post">
								<button type="submit" class="btn btn-primary btn-block">Subir Infome Final PPS </button>
							</form><br>
							<form action="viewMyReports.php" method="post">
								<button type="submit" class="btn btn-primary btn-block">Estado de PPS </button>
							</form><br>
																
							</div>
						</div>
					</div>
					<?php 
							include 'footer.html';
						?>
				</div>
				
			</div>
		</div>
		<!-- Optional JavaScript -->
		<!-- jQuery first, then Popper.js, then Bootstrap JS -->
		<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>	
	</body>
</html>	