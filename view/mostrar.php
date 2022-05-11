<?php

if (isset($_POST['nom'])) {
    $usu=$_POST['nom'];
    $pwd=$_POST['password'];
  

    $conn=mysqli_connect($usu,$pwd);
    echo "<table>";

    if ($bd=="bd_actividades") {
        $qry_dades=mysqli_query($conn,"SHOW DATABASES");
    }
    else {
        $txt_dades="SHOW TABLES FROM ".$bd;
        $qry_dades=mysqli_query($conn,$txt_dades);
    }
    while ($fila=mysqli_fetch_array($qry_dades)) {
        echo "<tr><td>";
        echo $fila[0];
        echo "</tr></td>";
    }
    echo "</table>";
}
