<?php

include_once("db.php");
$conn = connection();



if(isset($_POST['delete'])){
    $id = $_POST['id'];
$sql = "DELETE FROM archive WHERE id = '$id'";
if(mysqli_query($conn, $sql)){
    echo "delete successfully";
    header("Location: index.php");
   
}else {
    echo "sorry there an error";
}
}




?>