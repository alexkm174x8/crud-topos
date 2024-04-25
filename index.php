<!DOCTYPE html>

<html lang="en">
<head>
    <meta 	charset="utf-8">
    <link   href="css/bootstrap.min.css" rel="stylesheet">
    <script src="js/bootstrap.min.js"></script>
</head>

<body>
<div class="container">

    <div class="row">
        <h3>Ejemplo de operaciones básicas a una tabla de jugadores</h3>
    </div>

    <div class="row">
        <p>
            <a href="create.php" class="btn btn-success">Agregar un jugador</a>
        </p>

        <table class="table table-striped table-bordered">
            <thead>
            <tr>
                <th>Nombres	</th>
                <th>Apellidos				</th>
                <th>Equipo					</th>
                <th>Estado					</th>
                <th>Número				</th>
            </tr>
            </thead>
            <tbody>
            <?php
            include 'database.php';
            $pdo = Database::connect();
            $sql = "SELECT J.idjugador, J.nombres AS 'Nombre Jugador', J.apellidos AS 'Apellidos Jugador', E.equipo AS 'Equipo', J.numero AS 'Número', J.estado AS 'Estado' FROM CRUD_Jugador AS J JOIN CRUD_Equipo AS E ON J.idequipo = E.idequipo ORDER BY J.idjugador;";
            foreach ($pdo->query($sql) as $row) {
                echo '<tr>';
                echo '<td>'. $row['idjugador'] . '</td>';
                echo '<td>'. $row['Nombres Jugador'] . '</td>';
                echo '<td>'. $row['Apellidos Jugador'] . '</td>';
                echo '<td>'. $row['Equipo'] . '</td>';
                echo '<td>'. $row['Número'] . '</td>';
                echo '<td>';    echo ($row['Estado'])?"activo":"inactivo"; echo'</td>';
                echo '<td width=250>';
                echo '<a class="btn" href="read.php?id='.$row['idjugador'].'">Detalles</a>';
                echo '&nbsp;';
                /*echo '<a class="btn btn-success" href="update.php?id='.$row['idjugador'].'">Actualizar</a>';
                 echo '&nbsp;';*/
                echo '<a class="btn btn-danger" href="delete2.php?id='.$row['idjugador'].'">Eliminar</a>';
                echo '</td>';
                echo '</tr>';
            }
            Database::disconnect();
            ?>
            </tbody>
        </table>

    </div>

</div> <!-- /container -->
</body>
</html>
