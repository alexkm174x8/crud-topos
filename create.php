<?php
	require 'TC2005B_601_06.php';
?>


<!DOCTYPE html>
<html lang="en">
	<head>
	    <meta 	charset="utf-8">
	    <link   href=	"css/bootstrap.min.css" rel="stylesheet">
	    <script src=	"js/bootstrap.min.js"></script>
	</head>

	<body>
	    <div class="container">
	    	<div class="span10 offset1">
	    		<div class="row">
		   			<h3>Agregar un nuevo equipo</h3>
		   		</div>

					<form class="form-horizontal" action="create2.php" method="post">

						<div class="control-group">
							<label class="control-label">Nombre</label>
					    	<div class="controls">
					      	<input name="nombres" type="text"  placeholder="Nombres" value="">
									<span class="help-inline"></span>
					    	</div>
						</div>
                        <div class="control-group">
							<label class="control-label">Apellidos</label>
					    	<div class="controls">
					      	<input name="apellidos" type="text"  placeholder="Apellidos" value="">
									<span class="help-inline"></span>
					    	</div>
						</div>
						<div class="control-group ">
				    	<label class="control-label">Equipos de jugadores</label>
				    	<div class="controls">
	            		<select name ="equipo">
		              		<option value="">Selecciona el equipo de tu jugador</option>
		                  	<?php
							   					$pdo = Database::connect();
							   					$query = 'SELECT * FROM CRUD_equipo';
			 				   					foreach ($pdo->query($query) as $row) {
		                      	if ($row['idequipo']==$equipo)
		                        	echo "<option selected value='" . $row['idequipo'] . "'>" . $row['equipo'] . "</option>";
		                        else
		                        	echo "<option value='" . $row['idequipo'] . "'>" . $row['equipo'] . "</option>";
			   									}
			   									Database::disconnect();
			  								?>
              	</select>

					      <span class="help-inline"></span>
							</div>
						</div>

						<div class="control-group ">
					    <label class="control-label">Estado</label>
						    <div class="controls">
	              		<input name="estado" type="radio" value="active">Activo</input> &nbsp;&nbsp;
	                    <input name="estado" type="radio" value="inactive">Inactivo</input>
						       	<span class="help-inline"></span>
						    </div>
						</div>
                        <div class="control-group">
							<label class="control-label">Número</label>
					    	<div class="controls">
					      	<input name="numero" type="text"  placeholder="Número de jugador" value="">
									<span class="help-inline"></span>
					    	</div>
						</div>
						<div class="form-actions">
							<button type="submit" class="btn btn-success">Agregar jugador</button>
							<a class="btn" href="index.php">Regresar</a>
						</div>

					</form>
				</div>
	    </div> <!-- /container -->
	</body>
</html>
