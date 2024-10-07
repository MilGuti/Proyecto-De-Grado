<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/registrar.css?v=1">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <title>Proyecto SENA | Consulta de Personas</title>
</head>
<body>

<body>
    <header>
        <h2 class="antares">Antares Barranquilla FC<a href="noticias.html"><img src="../css/img/antares.png" class="escudo"></a></h2>
        <nav class="navegacion">
            <a href="inicio.html" class="a">Inicio</a>
            <a href="noticias.html" class="a">Principal</a>
            <a href="calendario.html" class="a">Calendario</a>
            <a href="#" class="a">Contactos</a>
            <a href="sesion.html"><button class="btnLogin-popup">Iniciar sesion</button></a>
        </nav>
    </header>

    <h2 class="titulo">CALENDARIO</h2>

    <div class="container-block">
        <div class="container" id="slider">
            <div class="container-box">

            <h2 class="subtitulo">Registrar</h2>

            <form action="../calendario/registrar.php" method="post">
                
            <div class="box1">

                    <label for="">Fecha</label>
                
                <div class="form-group">
                    <input type="date" name="fecha" placeholder="Fecha del encuentro" required>
                </div>

                
                    <label for="lugar">Lugar</label>
                
                <div class="form-group">
                    <input type="text" name="lugar" id="lugar" placeholder="Lugar del Encuentro" id required>
                </div>

            </div>
                
            <div class="box2">
                    <label for="">Hora</label>    

                <div class="form-group">
                    <input type="time" name="hora" placeholder="Hora del Encuentro" required>
                </div>


                    <label for="adversario">Adversario</label>

                <div class="form-group">
                    <input type="text" name="adversario" placeholder="Nombre del Rival" required>
                </div>


                <input type="submit" class="btn-submit" value="REGISTRAR">
                </div>
            </form>
            <?php
            if ($_POST){
                $fecha = $_POST['fecha'];
                $lugar = $_POST['lugar'];
                $hora = $_POST['hora'];
                $adversario = $_POST['adversario'];
                require_once('../calendario/conexion.php');
                $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $sql = 'INSERT INTO calendario (fecha, lugar, hora, adversario) VALUES
                (:f, :l, :h, :a)';
                $stmt = $conexion->prepare($sql);+

                $stmt->bindParam(":f", $td);
                $stmt->bindParam(":l", $id);
                $stmt->bindParam(":h", $nom);
                $stmt->bindParam(":a", $ape);
                $stmt->execute();
                print("<script> alert ('Registro guardado con éxito');</script>");
            }
            ?>
            </div>
            <div class="container-box dos">
                <h2 class="subtitulo">Actualizar</h2>
                <form action="actualizar.php" method="post">
                <div class="form-group">
                    <div class="form-group">
                        <label for="txtID">Ingrese Identificacion</label>
                        <input type="text" class="form-control" name="txtID" placeholder="Identificacion" required>
                    </div>
                    <input type="submit" class="btn btn-succes" value="Buscar">
                </div>
            </form>

            <?php
                if ($_POST) {
                    $fecha = $_POST['fecha'];
                    require_once('../calendario/conexion.php');
                    $conexion ->setAttribute(\PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                    $SQL = 'SELECT * FROM calendario WHERE fecha=:f';
                    $stmt = $conexion->prepare($SQL);
                    $stmt->bindParam(':f', $fecha);
                    $result = $stmt->execute();
                    $rows = $stmt->fetchAll(\PDO::FETCH_ASSOC);
                    if (count($rows)) {
                        foreach ($rows as $row){
                            ?>
                            <form action="../calendario/actualizar_datos.php" method="post">
                                <p>Por favor, diligencie todo los campos de este formulario, para actualizar.</p>
                                <input type="number" name="id" readonly value="<?php print($row['id'])?>"/>

                                </div>

                                <div class="form-group">
                                    <label for="fecha">Fecha</label>
                                    <input type="date" class="form-control" name="fecha" required value="<?php print($row['fecha'])?>">
                                </div>

                                <div class="form-group">
                                    <label for="lugar">Lugar</label>
                                    <input type="text" class="form-control" name="lugar" placeholder="Lugar del Encuentro" required value="<?php print($row['lugar'])?>">
                                </div>

                                <div class="form-group">
                                    <label for="hora">Hora</label>
                                    <input type="time" class="form-control" name="time" required value="<?php print($row['hora'])?>">
                                </div>

                                <div class="form-group">
                                    <label for="adversario">Adversario</label>
                                    <input type="text" class="form-control" name="adversario" placeholder="Nombre del Rival" required value="<?php print($row['adversario'])?>">
                                </div>

                            <input type="submit" value="Actualizar Datos" class="btn-submit">
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

            <div class="container-box tres">
                <h2 class="subtitulo">Eliminar</h2>
            </div>
        </div>
        <div class="btn-left"><i class='bx bx-chevron-left'></i></div>
        <div class="btn-right"><i class='bx bx-chevron-right'></i></div>
    </div>

    <script>
        const btnLeft = document.querySelector(".btn-left"),
              btnRight = document.querySelector(".btn-right"),
              slider = document.querySelector("#slider"),
              containerBox = document.querySelectorAll(".container-box");
        
        btnLeft.addEventListener("click", e => moveToLeft())
        btnRight.addEventListener("click", e => moveToRight())

            let operacion = 0,
                counter = 0,
                widthing = 100 / containerBox.length;
        function moveToRight()  {
            if (counter >= containerBox.length-1){
                counter = 0;
                operacion = 0;
                slider.style.transform = `translate(-${operacion}%)`
                return;
            }
                counter++;
                operacion = operacion + widthing;
                slider.style.transform = `translate(-${operacion}%)`
                slider.style.transition = "all ease .6s"
        }

        function moveToLeft()  {
            counter--;
            if (counter < 0){
                counter = containerBox.length-1;
                operacion = widthing * (containerBox. length-1)
                slider.style.transform = `translate(-${operacion}%)`
                return;
            }
                operacion = operacion - widthing;
                slider.style.transform = `translate(-${operacion}%)`  
                slider.style.transition = "all ease .6s"
        }
    </script>
</body>
</html>