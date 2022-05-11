<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Actividades</title>
    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <!-- Font Awesome -->
    <script src="https://kit.fontawesome.com/e0b63cee0f.js" crossorigin="anonymous"></script>
    <!-- Hoja de estilos -->
    <link rel="stylesheet" href="../css/main.css">

</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="../index.html">#AppName</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarScroll" aria-controls="navbarScroll" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarScroll">
                <ul class="navbar-nav me-auto my-2 my-lg-0 navbar-nav-scroll" style="--bs-scroll-height: 50vh;">
                    <li class="nav-item">
                        <a class="nav-link" href="./nosotros.html">Sobre nosotros</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link active disabled" aria-current="page" href="./actividades.php">Actividades</a>
                    </li>
                </ul>
                <form class="d-flex">
                    <!-- <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search"> -->
                    <button class="btn btn-light form-control me-1" type="submit"><i
                            class="fa-solid fa-arrow-up-from-bracket"></i></button>
                    
                    <?php
                    session_start();
                           

                            if(isset($_SESSION["correo"])){
                                echo "<a href='../view/logout.php'><button class='btn btn-light form-control ms-1' type='button'>Logout</button></a>";
                            }else{
                                echo "<a href='../view/login.html'><button class='btn btn-light form-control ms-1' type='button'>Acceder</button></a>";
                            }

                 
                            ?>
                </form>
            </div>
        </div>
    </nav>
    <!-- Top -->
    <div class="row-c padding-m">
        <h4 class="column-1 padding-m">Top 5</h4>

        <div class="column-1 padding-s">
            <div class="column-5 padding-s">
                <img src="../img/keila-hotzel-lFmuWU0tv4M-unsplash.jpg" alt="" class="target-s">
            </div>
            <div class="column-5 padding-s">
                <img src="../img/susanna-marsiglia-Yjr6EafseQ8-unsplash.jpg" alt="" class="target-s">
            </div>
            <div class="column-5 padding-s">
                <img src="../img/dan-cristian-padure-QQkQcaz7qmY-unsplash.jpg" alt="" class="target-s">
            </div>
            <div class="column-5 padding-s">
                <img src="../img/nick-fewings-EkyuhD7uwSM-unsplash.jpg" alt="" class="target-s">
            </div>
            <div class="column-5 padding-s">
                <img src="../img/etienne-girardet-j2Soo4TfFMk-unsplash.jpg" alt="" class="target-s">
            </div>

        </div>

    </div>

    <!-- listado de actividades -->
  

    <?php
        $ruta="../img/";
           $connection = mysqli_connect('localhost', 'root', '', 'bd_actividades');
           $sql = "SELECT * FROM  `tbl_archivo`";
           $select=mysqli_query($connection, $sql);

           foreach ($select as $usuario) {
               $rutacompleta=$ruta.$usuario['foto_arc'];
               /* echo $rutacompleta;
               echo '<br>'; */
               echo "<div class='column-3 padding-mobile'>";
               echo "<div style='float: right;' class='padding-m'>";
               echo  "<img src='{$rutacompleta}' width=500vh, height=400vh>";
               echo "{$usuario['nom_arc']}";
               echo "<br>";
               echo "{$usuario['desc_arc']}";
               ?>
               <button class="btn btn-light m-1" type="submit"><i class="fa-solid fa-link"></i></button>
               <button class="btn btn-light m-1" type="submit"><i class="fa-solid fa-heart"></i></button>
               <?php
           echo "</div>";
       echo "</div>";
           }

  
        ?>
</body>

</html>