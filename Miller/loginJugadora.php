<?php
    include 'conexiones\conexion_Login.php';
    $email = $_POST ['email'];
    $password = $_POST ['password'];

    $validar_login = mysqli_query ($conexion, "SELECT * FROM cuentas
    WHERE Correo='$email' AND Passw='$password'");
    if (mysqli_num_rows($validar_login)>0){
        header("location: ./inicio.html");
        exit;
    }else{
        echo '
                <script>
                    alert ("Este usuario no existe, por favor verifique los datos introducidos");
                    "window.location = ./sesion.html";
                </script>
        ';
        exit;
    }
?>