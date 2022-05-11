<?php

if (isset($_POST['inicio'])) {
    if (isset($_POST['correo']) && isset($_POST['pwd']) ) {
        $correo = $_POST['correo'];
        $pwd=sha1($_POST['pwd']);
        $sql="SELECT * FROM tbl_usuario WHERE correo_usu = '{$correo}' and pwd_usu = '{$pwd}';" ;
        $connection = mysqli_connect('localhost', 'root', '', 'bd_actividades');
        $result = mysqli_query($connection, $sql);
        $num = mysqli_num_rows($result);
       
        if($num==1){
            session_start();
            $_SESSION['correo']= $correo;
            ?>
            <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
            <script>
                function aviso(url) {
                    Swal.fire({
                            title: 'Usuario Correcto',
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

                aviso('../index.html');
            </script>
            <?php 
            //header("Location:index1.php");
        }else {

        }
    }else {
        echo "Introduzca su correo y su contraseña";
    }

}

?>
</body>
</html>