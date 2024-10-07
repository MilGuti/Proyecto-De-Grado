<?php
    include 'conexion_login.php';
    $correo = $_POST ['correo'];
    $contraseña = $_POST ['contrasena'];

    $validar_login = mysqli_query ($conexion, "SELECT * FROM usuarios
    WHERE correo='$correo' AND contrasena='$contraseña'");
    if (mysqli_num_rows($validar_login)>0){
        header("location: ./index1.php");
        exit;
    }else{
        echo '
                <script>
                    alert ("Usuario no existe, por favor verifique los datos introducidos");
                    "window.location = ./login.php";
                </script>
        ';
        exit;
    }


?>