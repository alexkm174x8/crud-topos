<?php
	require 'TC2005B_601_06.php';

	if ( !empty($_POST)) {

		$nombres = $_POST['nombres'];
        $apellidos = $_POST['apellidos'];
		$equipo = $_POST['equipo'];
		$estado   = $_POST['estado'];
        $numero = $_POST['numero'];

		// insert data
			$pdo = Database::connect();
			$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$sql = "INSERT INTO auto (idjugador, nombres, apellidos, idequipo,estado,numero) values(null, ?, ?, ?)";
			$q = $pdo->prepare($sql);
			($estado=="S")?$estadoq=1:$estadoq=0;
			$q->execute(array($nombres,$apellidos,$equipo,$estado,$numero));
			Database::disconnect();
			header("Location: index.php");
	}
?>
