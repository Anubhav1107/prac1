<!DOCTYPE HTML>
<html>
<head>
</head>
<body>
  <center>
    <style>
    .butt1{
    background-color:#008080  ;
    border-color: black;
    border-style:inherit;
    color: black;
    padding: 15px 32px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 15px;
    margin: 4px 2px;
    cursor: pointer;
    font-family: sans-serif;
    }
    </style>
<?php
session_start();
    include("connection.php");
    include("functions.php");
    $subcode = $_SESSION['subcode'];
    $query = "SELECT at.usn , s.Name , at.attended from attends as at , student as s where at.usn = s.usn AND at.subcode = '$subcode'";
    $result = mysqli_query($con,$query);
    $rowcount = mysqli_num_rows($result);


?>
<form method="post">
<table border="1" align="center" class="butt1">
    <tr>
      <br><br><br>
        <td style="background-color:tomato;"><b>usn <br><br></b></td>
        <br><br><br>
        <td style="background-color:tomato;" ><b>name<br><br></b></td>
        <br><br><br>
        <td style="background-color:tomato; "><b>attended <br><br></b></td>

    </tr>
<?php
    for($i=1;$i<=$rowcount;$i++){
        $row = mysqli_fetch_array($result);
?>
    <tr>
        <td><?php echo $row["usn"] ?></td>
        <td><?php echo $row["Name"] ?></td>
        <td><?php echo $row["attended"] ?></td>

    </tr>
<?php
    }
 ?>
</table><br>
<a href="home.php">Go to home</a>

</form>
</center>
</body>
</html>
