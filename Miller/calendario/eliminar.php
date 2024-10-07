<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <title>Registro Personas</title>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <a class="navbar-brand" href="index.php">Proyecto SENA</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" 
        aria-label="Toggle navigation">
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
    <div class="container-sm" style="margin-top:1%">
        <div class="alert alert-danger" role="alert">
            <b>aviso:</b> La persona sera eliminada permanentemente
        </div>
        <form action="eliminar.php" method="post">
            <div class="form-group">
                <label for="txtTDoc">Tipo de documento</label>
                <select name="txtTDoc" class="form-control">
                    <option value="CC">Cedula de ciudadania</option>
                    <option value="TI">Targeta de identidad</option>
                    <option value="CE">Cedula de extrangeria</option>
                </select>
            </div>
            <div class="form-group">
                <label for="txtID">Ingrese una identificacion</label>
                <input type="text" name="txtID" class="form-control" placeholder="Identificacion" required>
            </div>
            <input type="submit" class="btn btn-danger" value="Eliminar">
        </form>
        <?php
        if ($_POST) {
            $td = $_POST['txtTD'];
            $id = $_POST['txtID'];
            require_once('conexion.php');
            $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $SQL = 'DELETE FROM ingresos WHERE TD=:td AND Identificacion=:id';
            $stmt=$conexion->prepare($SQL);
            $stmt->bindParam('td', $td);
            $stmt->bindParam('id', $id);
            $stmt->execute();
            print("<script> alert('registro eliminado con exito');</script>");
        }
        ?>
    </div>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</body>
</html>
