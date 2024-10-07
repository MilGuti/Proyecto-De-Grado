<?php
    include 'conexiones\conexion_Login.php';
    $email = $_POST ['email'];
    $password = $_POST ['password'];

    $validar_login = mysqli_query ($conexion, "SELECT * FROM cuentaowner 
    WHERE Correo='$email' AND Passw='$password'");
    if (mysqli_num_rows($validar_login)>0){
        header("location: ./inicio-admin.html");
        exit;
    }else{
        echo '
                <script>
                    alert ("ACESS_DENIED");
                    "window.location = ./sesion.html";
                </script>
        ';
        exit;
    }
?>