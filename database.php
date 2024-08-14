<?php
    $host ="localhost";
    $dbname = "project";
    $username = "root";
    $password = "tatenda";

    $mysqli = mysqli_connect($host, $username, $password, $dbname);

    if ( ! $mysqli){
        die(mysqli_error($mysqli));
    }

    return $mysqli;

    

?>


