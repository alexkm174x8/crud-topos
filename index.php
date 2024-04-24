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
        <h3>Ejemplo de operaciones básicas a una tabla de autos</h3>
    </div>

    <div class="row">
        <p>
            <a href="create.php" class="btn btn-success">Agregar un Auto</a>
        </p>

        <table class="table table-striped table-bordered">
            <thead>
            <tr>
                <th>submarcamarca	</th>
                <th>marca 				</th>
                <th>A/C 					</th>
            </tr>
            </thead>
            <tbody>
            <?php
            include 'database.php';
            $pdo = Database::connect();
            $sql = 'SELECT * FROM CRUD_Jugador natural join CRUD_Equipo ORDER BY idjugador';
            foreach ($pdo->query($sql) as $row) {
                echo '<tr>';
                echo '<td>'. $row['equipo'] . '</td>';
                echo '<td>'. $row['nombres'] . '</td>';
                echo '<td>';    echo ($row['estado'])?"Activo":"Inactivo"; echo'</td>';
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
