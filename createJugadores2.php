<?php
    require 'database.php';
	if ( !empty($_POST)) {

		$nombres = $_POST['nombres'];
        $apellidos = $_POST['apellidos'];
		$estado   = $_POST['estado'];
        $numero = $_POST['numero'];

		$pdo = Database::connect();
		$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql_last_id = "SELECT MAX(idjugador) AS last_id FROM CRUD_Jugador";
        $stmt_last_id = $pdo->query($sql_last_id);
        $row = $stmt_last_id->fetch(PDO::FETCH_ASSOC);
        $lastId = $row['last_id'];
        $idjugador = $lastId + 1;

        $team_id = $_REQUEST['id'];

		$sql_check_player = "SELECT COUNT(*) AS player_count FROM CRUD_Jugador WHERE nombres = ? AND apellidos = ?";
        $stmt_check_player = $pdo->prepare($sql_check_player);
        $stmt_check_player->execute(array($nombres, $apellidos));
        $player_count = $stmt_check_player->fetch(PDO::FETCH_ASSOC)['player_count'];

        if ($player_count > 0) {
            echo "<script>alert('Este jugador ya esta registrado'); window.location.href = 'createJugadores.php?id=$team_id';</script>";
        } 
        else {
            $sql = "INSERT INTO CRUD_Jugador (nombres, apellidos, idequipo, estado, numero) 
                SELECT ?, ?, ?, ?, ? 
                FROM CRUD_Jugador
                WHERE NOT EXISTS (
                    SELECT 1 
                    FROM CRUD_Jugador 
                    WHERE nombres = ? AND apellidos = ?
                )";
        $q = $pdo->prepare($sql);
        $estadoq = ($estado == "S") ? 'activo' : 'inactivo';
        $q->execute(array($nombres, $apellidos, $team_id, $estadoq, $numero, $nombres, $apellidos));
        echo "Jugador agregado correctamente.";

		Database::disconnect();
		header("Location: index.php");
	    }
    }
?>