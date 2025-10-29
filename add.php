<?php
if(isset($_SESSION)){
    session_start();
}
include_once("db.php");
$conn = connection();



?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>ADD Thesis Archive</h1>

    <form action="<?php htmlspecialchars($_SERVER["PHP_SELF"]) ?> " 
    method="post">
    Edit Form:
    Title:
    <input type="text" name="title" id="" ><br><br>
    Year
     <select name="year" id="">
          <option value=></option>
           <option value="SHS">SHS</option>
           <option value="1ST YEAR">1ST YEAR</option>
           <option value="2ND YEAR">2ND YEAR</option>
           <option value="3RD YEAR">3RD YEAR</option>
           <option value="4TH YEAR">4TH YEAR</option>
     </select><br><br>
     Batch:
     <select name="batch" id="">
        <option value=></option>
        <option value="ALPHA">ALPHA</option>
        <option value="BETA">BETA</option>
        <option value="CHARLIE">CHARLIE</option>
        <option value="DELTA">DELTA</option>
        <option value="FALCON">FALCON</option>
        <option value="GAMMA">GAMMA</option>
     </select><br><br>
 
      <input type="submit" name="submit" value="Submit">
    </form>
</body>
</html>

<?php

if($_SERVER["REQUEST_METHOD"] == "POST"){
    if(isset($_POST['submit'])){
        $title = mysqli_real_escape_string($conn, $_POST['title']);
        $year = mysqli_real_escape_string($conn, $_POST['year']);
        $batch = mysqli_real_escape_string($conn, $_POST['batch']);

        $sql = "INSERT INTO archive (title, year, batch) VALUES ('$title','$year','$batch')";
        if(mysqli_query($conn, $sql)){
            echo "Succefully inserted";
            header("Location: index.php");
            exit();
        }else {
            echo "sorry theres an error PANGET CC";
        }

    }else {
        echo "Please try again later";
    }


}




?>