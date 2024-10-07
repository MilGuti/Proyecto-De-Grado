<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <title>Proyecto SENA | Consulta de Personas</title>
</head>
<body>
    <nav class="navbar-expand-lg navbar-dark bg-primary">
        <a class="navbar-brand" href="Index.php">Proyecto SENA</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
    aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item">
                <a class="nav-link" href="registrar.php">Registrar <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="consultar.php">Consultar <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="eliminar.php">Eliminar <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="actualizar.php">Actualizar <span class="sr-only">(current)</span></a>
            </li>
        </ul>
    </div>
    </nav>
    <div class="container">
        <div class="container-sm">
    <table class="table caption-top">
        <caption>Lista de personas</caption>
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">TD</th>
                <th scope="col">Documento</th>
                <th scope="col">Nombre</th>
                <th scope="col">Apellido</th>
                <th scope="col">Teléfono</th>
                <th scope="col">Dirección</th>
                <th scope="col">Fecha</th>
                <th scope="col">Hora</th>
                <th scope="col">Motivo</th>
            </tr>
        </thead>
        <tbody>
            <?php
           require_once('conexion.php'); 
            $SQL = 'SELECT ID, TD, Identificacion, Nombres, Apellidos, Telefono, Direccion, Fecha_ingreso, Hora_ingreso, Motivo FROM
            ingresos';
            $stmt = $conexion->prepare($SQL);
            $result = $stmt->execute();
            $rows = $stmt->fetchALL(\PDO::FETCH_ASSOC);
            foreach ($rows as $row) {
                ?>
                <tr>
                    <td><?php print($row['ID']) ?></td>
                    <td><?php print($row['TD']) ?></td>
                    <td><?php print($row['Identificacion']) ?></td>
                    <td><?php print($row['Nombres']) ?></td>
                    <td><?php print($row['Apellidos']) ?></td>
                    <td><?php print($row['Telefono']) ?></td>
                    <td><?php print($row['Direccion']) ?></td>
                    <td><?php print($row['Fecha_ingreso']) ?></td>
                    <td><?php print($row['Hora_ingreso']) ?></td>
                    <td><?php print($row['Motivo']) ?></td>
                </tr>
                <?php
            }
            ?>
        </tbody>
    </table>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</body>
</html>