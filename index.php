<?php
if(!isset($_SESSION)){
    session_start();
}
include_once("db.php");
$conn = connection();

$sql = "SELECT * FROM archive";
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
    <style>
        body {
        
            box-sizing: border-box;
            text-transform: uppercase;
            letter-spacing: 2px;
        }
     tr,td {
        padding-left: 50px;
     }
     a {
      text-decoration: none;
      color: black;
     }
     a:hover {
       letter-spacing: 2px;
       font-size: 8px;
     }
    </style>
    <center><br><br>
        <h2>Thesis Archive</h2><br><br>
   <table>
      <tr>
        <th>Action</th>
         <th>Action</th>
         <th>title</th>
         <th>year</th>
         <th>batch</th>
         <th>date upload</th>
      </tr>

      <?php  do {     ?>
      <tr>
         <td><a href="edit.php?id=<?php echo $row['id']; ?>">edit</a></td>
         
          <td><a href="delete.php?id=<?php echo $row['id']; ?>">delete</a></td>

         <td> <?php echo $row['title']; ?> </td>
         <td> <?php echo $row['year']; ?> </td>
         <td> <?php echo $row['batch']; ?> </td>
         <td> <?php echo $row['date_added']; ?> </td>
      </tr>
      <?php }while($row = mysqli_fetch_assoc($result)); ?>
   </table>
   </center>
   <a href="add.php">ADD TITLE</a>
</body>
</html>

