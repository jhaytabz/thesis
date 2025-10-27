<?php

function connection(){

    $host = "localhost";
    $user = "root";
    $pass = "";
    $database = "thesis_archive";

$conn = mysqli_connect($host, $user, $pass, $database);

if(!$conn){
    die("connection failed" . mysqli_connect_error());
}else {
    return $conn;
}

}





?>