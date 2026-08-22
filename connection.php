<?php

function connection(){
    $host = "localhost";
    $user = "root";
    $pass = "Luis3097*";

    $bd = "bdinvcontax";

    $connect=mysqli_connect($host, $user, $pass,$bd);

    mysqli_select_db($connect, $bd);

    return $connect;

}


?>