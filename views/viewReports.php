<?php
session_start();
if($_SESSION['type']==1){
	header('location:../views/mainAlumno.php');	
}elseif($_SESSION['type']==2){	
}elseif($_SESSION['type']==3){
	header('location:../views/mainResponsable.php');	
}else{
	header('location:../views/login.php');}
?>
<!doctype html>
<html lang="es">
  <head>
    <title>Informes</title>
	
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
     
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous"">
    <link rel="stylesheet" href="../css/main.css">
    
  </head>

  <body>
		<div class="container">
			<div class="cardtable" style="max-width: 700px">
				<div class="row">
				<?php 
                    include 'head.php';
				?>					
                </div><!-- row 1 --><hr>
                
				<div class="row">
					<div class="col-md-12">	
							<h2>Seguimientos</h2>		<br>				
                            <?php
                                include("../Data/conn.php");                                                                              
                                $idP=$_SESSION['id']; 
                                $vSql = "SELECT * FROM seguimientos se inner join solicitudes s on se.id_PPS=s.idPPS inner join users u on u.id=s.id_user where s.id_Profe='$idP'";
                                $vResultado = mysqli_query($conn, $vSql);
                                if(mysqli_num_rows($vResultado) == 0) {
                                    echo("<p style='text-align: center;'>No hay Seguimientos para corregir.<br />");
                                    }
                                    else{
                            ?>
                            <table class="table ">
                                <tr class="bg-primary">
                                    <td><b>Nro</b></td>
                                    <td><b>Alumno</b></td>
                                    <td><b>Ver Informe</b></td>
                                </tr>
                            <?php
                                while ($fila = mysqli_fetch_array($vResultado))
                                {
                            ?>
                                <tr>
                                    <td><?php echo ($fila['idSeguimientos']); ?></td>
                                    <td><?php echo($fila['apellido'].', '.$fila['nombre']) ?></td>
                                    <td>
                                        <button class="btn btn-warning" >
                                        <strong>Ver</strong>
                                         </button>
                                    </td>
                                </tr>                               
                                        <?php
                                        }
                                        // Liberar conjunto de resultados
                                        mysqli_free_result($vResultado);}
                                        ?>
                                   
                            </table>                           
                    </div>
                </div><!-- row 2 --> <hr>

                <div class="row">
					<div class="col-md-12">	
                        <h2>Informes Finales</h2>		<br>				
                            <?php                                                                                     
                                $idP=$_SESSION['id'];        
                                $vSql = "SELECT * FROM finalReport f inner join solicitudes s on f.idPPS_FP=s.idPPS inner join users u on u.id=s.id_user where s.id_Profe='$idP'";
                                $vResultado = mysqli_query($conn, $vSql);
                                if(mysqli_num_rows($vResultado) == 0) {
                                    echo("<p style='text-align: center;'>No hay Informes Finales para corregir.<br />");
                                    }
                                    else{                                                                           
                            ?> 
                            
                            <table class="table">
                                <tr class="bg-primary">
                                    <td><b>Nro</b></td>
                                    <td><b>Alumno</b></td>
                                    <td><b>Ver Documento</b></td>
                                </tr>
                            <?php
                                while ($fila = mysqli_fetch_array($vResultado))
                                {
                            ?>
                                <tr>
                                <td><?php echo ($fila['idFR']); ?></td>
                                    <td><?php echo ($fila['apellido'].', '.$fila['nombre']); ?> </td>
                                    <td>
                                        <button class="btn btn-warning" >
                                        <strong>Ver</strong>
                                         </button>
                                    </td>
                                </tr>                               
                                        <?php
                                        }
                                        // Liberar conjunto de resultados
                                        mysqli_free_result($vResultado);
                                        // Cerrar la conexion
                                        mysqli_close($conn);}
                                        ?>
                                   
                            </table>                           
                    </div>
                </div><!-- row 3 -->

                <div class="row">
                    <div class="col-lg-12">
                        <input type="button" class="btn btn-secondary btn-block" onclick="location.href='mainDocente.php';" value="Volver" />
                    </div>
                </div><!-- row 4 -->
                <?php 
							include 'footer.html';
						?>
			</div><!-- card -->
        </div>

		<!-- Optional JavaScript -->
		<!-- jQuery first, then Popper.js, then Bootstrap JS -->
		<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>	
	</body>
</html>	