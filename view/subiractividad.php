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

    session_start();
    
    $nom = $_POST['nom'];
    $desc= $_POST['desc'];
    $img = $_FILES['img'];
    $imagen=$img['name'];
    

    $ruta="../img/";
    
    $destino=$_SERVER['DOCUMENT_ROOT'].$ruta.'/'.$imagen['name']; 
   
   

  
    if(($img['size']<1000*1024) && ($img['type']=="image/jpeg" || $img['type']=="image/png" || $img['type']=="image/gif")) {
        $comprobacion=move_uploaded_file($img['tmp_name'], $ruta.$img['name'] );
        if ($comprobacion) {
            $destino=$img['name'];
            $connection = mysqli_connect('localhost', 'root', '', 'bd_actividades');
            $sql = "INSERT INTO `tbl_archivo` (`nom_arc`, `desc_arc`,`foto_arc`) VALUES ( '$nom', '$desc','$imagen')";
            $insert=mysqli_query($connection, $sql);
            echo  $sql;
            ?>
            <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
            <script>
                function aviso(url) {
                    Swal.fire({
                            title: 'Archivo Subido',
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
            
                aviso('./actividades.php');
            </script>
            <?php
            }
        else {
            ?>
            <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
            <script>
                function aviso(url) {
                    Swal.fire({
                            title: '¡El archivo es demasiado grande!',
                            icon: 'error',
                            confirmButtonColor: '#3085d6',
                            confirmButtonText: 'Volver'
                        })
                        .then((result) => {
                            if (result.isConfirmed) {
                                window.location.href = url;
                            }
                        })
                }
        
                aviso('./subiractividad.html');
            </script>
            <?php
        }
      }
    
      ?>
      </body>
      </html>

