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
        <div class="conteiner-sm" style="margin: 50px 500px 50px 500px;">
            <form action="actualizar.php" method="post">
                <div class="form-group">
                    <label for="txtTD">Tipo de Documento</label>
                    <select name="txtTD" class="form-control">
                        <option value="CC">Cedula de Ciudadania</option>
                        <option value="TI">Tarjeta de Identidad</option>
                        <option value="CE">Cedula de Extrajería</option>
                    </select>
                    <div class="form-group">
                        <label for="txtID">Ingrese Identificacion</label>
                        <input type="text" class="form-control" name="txtID" placeholder="Identificacion" required>
                    </div>
                    <input type="submit" class="btn btn-succes" value="Buscar">
                </div>
            </form>

            <?php
                if ($_POST) {
                    $td = $_POST['txtTD'];
                    $id = $_POST['txtID'];
                    require_once('conexion.php');
                    $conexion ->setAttribute(\PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                    $SQL = 'SELECT * FROM ingresos WHERE TD=:td AND Identificacion=:id';
                    $stmt = $conexion->prepare($SQL);
                    $stmt->bindParam(':td', $td);
                    $stmt->bindParam(':id', $id);
                    $result = $stmt->execute();
                    $rows = $stmt->fetchAll(\PDO::FETCH_ASSOC);
                    if (count($rows)) {
                        foreach ($rows as $row){
                            ?>
                            <form action="actualizar_datos.php" method="post">
                                <p>Por favor, diligencie todo los campos de este formulario, para actualizar.</p>
                                <input type="hidden" name="txtCodigo" readonly value="<?php print($row['ID'])?>"/>
                                <div class="form-group">
                                    <select name="txtTD" class="form-control" require>
                                        <option value="CC">Cédula de ciudadania</option>
                                        <option value="TI">Tarjeta de identidad</option>
                                        <option value="CE">Cédula de extranjeria</option>
                                    </select>

                                </div>

                                <div class="form-group">
                                    <label for="txtDoc">Identificacion</label>
                                    <input type="text" class="form-control" name="txtDoc" placeholder="Ingrese el Documento de Identidad" required value="<?php print($row['Identificacion'])?>">
                                </div>

                                <div class="form-group">
                                    <label for="txtNombres">Nombres</label>
                                    <input type="text" class="form-control" name="txtNombres" placeholder="Ingrese Nombres" required value="<?php print($row['Nombres'])?>">
                                </div>

                                <div class="form-group">
                                    <label for="txtApellidos">Apellidos</label>
                                    <input type="text" class="form-control" name="txtApellidos" placeholder="Ingrese Apellidos" required value="<?php print($row['Apellidos'])?>">
                                </div>

                                <div class="form-group">
                                    <label for="txtTelefono">Teléfono</label>
                                    <input type="number" class="form-control" name="txtTelefono" placeholder="Ingrese Teléfono o Celular" required value="<?php print($row['Telefono'])?>">
                                </div>

                                <div class="form-group">
                                    <label for="txtDir" >Dirección</label>
                                    <input type="text" class="form-control" name="txtDir" placeholder="Ingrese la Dirección" required value="<?php print($row['Direccion'])?>">
                                </div>

                                <div class="form-group">
                                    <label for="txtFecha" >Fecha</label>
                                    <input type="date" class="form-control" name="txtFecha" placeholder="Ingrese la Fecha de Ingreso" required value="<?php print($row['Fecha_ingreso'])?>">
                                </div>

                                <div class="form-group">
                                    <label for="txtHora" >Hora</label>
                                    <input type="time" class="form-control" name="txtHora" placeholder="Ingrese la Hora de Ingreso" required value="<?php print($row['Hora_ingreso'])?>">
                                </div>

                                <div class="form-group">
                                    <label for="txtMotivo" >Motivo</label>
                                    <input type="text" class="form-control" name="txtMotivo" placeholder="Ingrese el Motivo de Ingreso" required value="<?php print($row['Motivo'])?>">
                                </div>
                            <input type="submit" value="Actualizar Datos" class="btn btn-success">
                            </form>

                            <?php
                        }
                            }else{
                                ?>
                                <div class="alert alert-danger" role="alert" style="margin-top: 1%;">
                                    <b>Aviso:</b> ¡El usuario no existe!
                                </div>
                                <?php
                            }
                        }
                            ?>
            
        </div>
    </div>
    
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</body>