
<?php
session_start();
if($_SESSION['type']==1){
	header('location:../views/mainAlumno.php');	
}elseif($_SESSION['type']==2){
	header('location:../views/mainDocente.php');	
}elseif($_SESSION['type']==3){
}else{
	header('location:../views/login.php');}
?>
<!doctype html>
<html lang="es">
  <head>
    <title>Definir Tutores</title>
	
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
     
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous"">
    <link rel="stylesheet" href="../../public/css/main.css">
    
  </head>

  <body>
		<div class="container">
			<div class="cardtable">
				<div class="row">
				<?php 
					include 'head.php';
				?>					
                </div><!-- row 1 --><hr>
                
				<div class="row">
					<div class="col-md-12">	
							<h2>Definir Tutores de PPS</h2>		<br>				
                            <?php
                                include("../../config/conn.php");
                                $Cant_por_Pag = 5;
                                $pagina = isset ( $_GET['pagina']) ? $_GET['pagina'] : null ;
                                if (!$pagina) {
                                    $inicio = 0;
                                    $pagina=1;
                                    }
                                else {
                                    $inicio = ($pagina - 1) * $Cant_por_Pag;
                                    }// total de páginas
                                $vSql = "SELECT * FROM solicitudes where id_Profe IS NULL";
                                $vResultado = mysqli_query($conn, $vSql);
                                $total_registros=mysqli_num_rows($vResultado);
                                $total_paginas = ceil($total_registros/ $Cant_por_Pag);
                                $vSql = "SELECT * FROM solicitudes sol inner join users u on u.id=sol.id_user WHERE sol.id_Profe IS NULL"." limit " . $inicio . "," . $Cant_por_Pag;
                                $vResultado = mysqli_query($conn, $vSql);
                                $total_registros=mysqli_num_rows($vResultado);
                                if(mysqli_num_rows($vResultado) == 0) {
                                    echo("<p style='text-align: center;'>No hay PPS Pendientes.<br />");
                                    }
                                    else{
                            ?>
                            <table class="table">
                                <tr class="bg-primary">
                                    <td><b>Apellido</b></td>
                                    <td><b>Nombre</b></td>
                                    <td><b>Nro de PPS</b></td>
                                    <td><b>Tipo de PPS</b></td>
                                    <td><b>Entidad</b></td>
                                    <td><b>Direccion</b></td>
                                    <td><b>Contacto</b></td>
                                    <td><b>Seleccionar Docente</b></td>
                                </tr>
                            <?php
                                while ($fila = mysqli_fetch_array($vResultado))
                                {
                            ?>
                                <tr>
                                    <td><?php echo ($fila['apellido']); ?></td>
                                    <td><?php echo ($fila['nombre']); ?></td>
                                    <td><?php echo ($fila['idPPS']); ?></td>
                                    <td><?php echo ($fila['caractPPS']); ?></td>
                                    <td><?php echo ($fila['nombreEntidad']); ?></td>
                                    <td><?php echo ($fila['direccion'].", ".$fila['localidad']); ?></td>
                                    <td><?php echo ($fila['emailE']); ?></td>
                                    <td>
                                        <button class="btn btn-warning" >
                                            Elegir Docente
                                         </button>
                                    </td>
                                </tr>                               
                                        <?php
                                        }
                                        // Liberar conjunto de resultados
                                        mysqli_free_result($vResultado);
                                        // Cerrar la conexion
                                        mysqli_close($conn);
                                        ?>
                                   
                            </table>
                            <p style='text-align: center;'>
                            <?php
                            if ($total_paginas > 1){
                                for ($i=1;$i<=$total_paginas;$i++){
                                    if ($pagina == $i)
                                    //si muestro el índice de la página actual, no coloco enlace
                                    echo $pagina . " ";
                                    else
                                    //si la página no es la actual, coloco el enlace para ir a esa página
                                    echo "<a href='viewPPS.php?pagina=" . $i ."'>" . $i . "</a> ";}}}?>
                                    <p>&nbsp;</p>
                    </div>
                </div><!-- row 2 -->
                <div class="row">
                    <div class="col-lg-12">
                        <input type="button" class="btn btn-secondary btn-block" onclick="location.href='mainResponsable.php';" value="Volver" />
                    </div>
                </div><!-- row 3 -->
                <?php 
							include 'footer.html';
						?>
			</div>
        </div>

		<!-- Optional JavaScript -->
		<!-- jQuery first, then Popper.js, then Bootstrap JS -->
		<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>	
	</body>
</html>	