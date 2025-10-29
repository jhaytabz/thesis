<?php
if(isset($_SESSION)){
    session_start();
}
include_once("db.php");
$conn = connection();

$id = $_GET['id'];

$sql = "SELECT * FROM archive WHERE id = '$id'";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);



?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Thesis Archive</h1>

    <form action="<?php htmlspecialchars($_SERVER["PHP_SELF"]) ?> " 
    method="post">
    Edit Form:
    Title:
    <input type="text" name="title" id="" value="<?php echo $row['title']; ?>"><br><br>
    Year
     <select name="year" id="">
           <option value="SHS" <?php echo ($row['year'] == 'SHS')? 'selected' : ' '; ?>  >SHS</option>
           <option value="1ST YEAR" <?php echo ($row['year'] == '1ST YEAR')? 'selected' : ' '; ?>  >1ST YEAR</option>
           <option value="2ND YEAR" <?php echo ($row['year'] == '2ND YEAR')? 'selected' : ' '; ?>  >2ND YEAR</option>
           <option value="3RD YEAR" <?php echo ($row['year'] == '3RD YEAR')? 'selected' : ' '; ?>  >3RD YEAR</option>
           <option value="4TH YEAR" <?php echo ($row['year'] == '4TH YEAR')? 'selected' : ' '; ?>  >4TH YEAR</option>
     </select><br><br>
     Batch:
     <select name="batch" id="">
        <option value="ALPHA" <?php echo ($row['batch'] == 'ALPHA')? 'selected' : ' '; ?>  >ALPHA</option>
        <option value="BETA" <?php echo ($row['batch'] == 'BETA')? 'selected' : ' '; ?>  >BETA</option>
        <option value="CHARLIE" <?php echo ($row['batch'] == 'CHARLIE')? 'selected' : ' '; ?>  >CHARLIE</option>
        <option value="DELTA" <?php echo ($row['batch'] == 'DELTA')? 'selected' : ' '; ?>  >DELTA</option>
        <option value="FALCON" <?php echo ($row['batch'] == 'FALCON')? 'selected' : ' '; ?>  >FALCON</option>
        <option value="GAMMA" <?php echo ($row['batch'] == 'GAMMA')? 'selected' : ' '; ?>  >GAMMA</option>
     </select><br><br>
 
      <input type="submit" name="submit" value="Submit">
    </form>
</body>
</html>

<?php


if($_SERVER['REQUEST_METHOD'] == "POST"){
    if(isset($_POST['submit'])){
        $title = mysqli_real_escape_string($conn, $_POST['title']);
        $year = mysqli_real_escape_string($conn, $_POST['year']);
        $batch = mysqli_real_escape_string($conn, $_POST['batch']);

        $sql = "UPDATE archive SET title = '$title', year = '$year', batch = '$batch' WHERE id = '$id'";
       if(mysqli_query($conn, $sql)){
          echo "Successful inserted";
          header("Location: index.php");
       }else{
         echo "sorry there an error";
       }
    }
}



?>