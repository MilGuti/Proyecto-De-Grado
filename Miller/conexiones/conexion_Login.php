 <?php
    $conexion = mysqli_connect("localhost", "root", "", "mayam");

    if (!$conexion) {
        echo "Error: No se pudo conectar al servidor." . PHP_EOL;
        echo "errno de depuración: " .mysqli_connect_errno().PHP_EOL;
        echo "error de depuración: " .mysqli_connect_error().PHP_EOL;
        exit;
    }
    ?>