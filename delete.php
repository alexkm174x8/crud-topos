<?php
	require 'database.php';
	$id = 0;
	if ( !empty($_GET['id'])) {
		$id = $_REQUEST['id'];
	}

		$pdo = Database::connect();
		$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$sql = "DELETE FROM CRUD_Equipo WHERE idEquipo = ?";
		$q = $pdo->prepare($sql);
		$q->execute(array($id));
		Database::disconnect();
		header("Location: index.php");

?>
