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
        <button class="navbar-toggl
        er" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" 
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

    <div class="conteiner">
        <div class="conteiner-sm">
        <?php
require_once("conexion.php");
if ($_POST)  {
    $cod = $_POST['txtCodigo'];
    $td = $_POST['txtTD'];
    $id = $_POST['txtDoc'];
    $nom = $_POST['txtNombres'];
    $ape = $_POST['txtApellidos'];
    $tel = $_POST['txtTelefono'];
    $dir = $_POST['txtDir'];
    $fecha = $_POST['txtFecha'];
    $hora = $_POST['txtHora'];
    $mot = $_POST['txtMotivo'];

    $sql = "UPDATE ingresos SET Identificacion = :iden, Nombres = :n, Apellidos = :a, Telefono = :t, Direccion = :d, Fecha_Ingreso = :f, Hora_Ingreso = :h, Motivo = :m WHERE id=:cod";
    $stmt = $conexion->prepare($sql);
    $stmt->bindParam(":iden", $id);
    $stmt->bindParam(":n", $nom);
    $stmt->bindParam(":a", $ape);
    $stmt->bindParam(":t", $tel);
    $stmt->bindParam(":d", $dir);
    $stmt->bindParam(":f", $fecha);
    $stmt->bindParam(":h", $hora);
    $stmt->bindParam(":m", $mot);
    $stmt->bindParam(":cod", $cod);
    if ($stmt->execute()) {
        header("location: index.php");
    }else {
        print"Complete todos los campos del formulario";
    }
}
?>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</body>