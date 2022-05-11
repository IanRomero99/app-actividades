<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    

<?php

include 'conexion.php';

$nom = $_POST['nombre'];
$correo = $_POST['correo'];
$pwd = $_POST['pwd'];
$pwd=sha1($_POST['pwd']);

$sql = "INSERT INTO tbl_usuario (nom_usu, correo_usu, pwd_usu) VALUES ('$nom', '$correo', '$pwd');";
// echo $sql; die;
mysqli_query($connection, $sql);


?>
    
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        function aviso(url) {
            Swal.fire({
                    title: 'Usuario registrado correctamente',
                    icon: 'success',
                    confirmButtonColor: '#3085d6',
                    confirmButtonText: 'Volver'
                })
                .then((result) => {
                    if (result.isConfirmed) {
                        window.location.href = url;
                    }
                })
        }

        aviso('./login.html');
    </script>
</body>
</html>