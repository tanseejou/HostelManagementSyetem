<?php
  session_start();
  include('connect.php');

  $cookie_name = "user";
  $cookie_value = $_SESSION['USER'];
  setcookie($cookie_name, $cookie_value, time() + 300, "/");

  if(!isset($_COOKIE[$cookie_name])) {
    echo "EXPIRED";
    header("location:loginPage.php");
  }
  else {

  }

  if(isset($_GET['del'])){
    $id = $_GET['del'];echo "cch".$id;
    mysql_query("DELETE FROM Application WHERE applicationID = '$id'");
  }


?>
<html>
<head>
  <link href='https://fonts.googleapis.com/css?family=Allan' rel='stylesheet'>
  <link href='https://fonts.googleapis.com/css?family=Maiden Orange' rel='stylesheet'>
  <link href="https://fonts.googleapis.com/css?family=Arima+Madurai" rel="stylesheet">
  <link rel='stylesheet' href='staffStyle.css'/>
  <style>
    .del{
      width: 80px;
      height: 40px;
    }
  </style>
</head>
  <body>
    <div class = "header">
      <img src = "hostel.png" id = "img1">
      <div id = "word1">College of HOPE</div>
      <div id = "word2">Where we LIVE is home</div>
    </div>
    <div class = "break"></div>
    <div class = "content">
      <h1>Delete application data</h1>
  <?php $results = mysql_query('SELECT * FROM Application');?>
  <form action = "delList.php" method="post">
  <table>
    <thead>
      <tr>
      <th> ApplicationID </th>
      <th> Matric NO </th>
      <th> Block </th>
      <th> Room Type </th>
      <th> Room No </th>
      <th> Date </th>
      <th> Time </th>
      <th> Status </th>
      <th> Action </th>
      </tr>
    </thead>

    <?php while ($row = mysql_fetch_array($results)){?>
      <tr>
      <td><?php echo $row['applicationID'];?></td>
      <td><?php echo $row['matricNo'];?></td>
      <td><?php echo $row['block'];?></td>
      <td><?php echo $row['roomType'];?></td>
      <td><?php echo $row['roomNo'];?></td>
      <td><?php echo $row['dateApplied'];?></td>
      <td><?php echo $row['timeApplied'];?></td>
      <td><?php echo $row['status'];?></td>
      <td>
        <a href = "delList.php?del=<?php echo $row ['applicationID'];?>">Delete</a>
      </td>
      </tr>
    </form>
    <?php }?>
  </table>

  <form action = "manager.php" method = "post">
    <button type = "submit" value = "">BACK TO HOME PAGE</button>
  </form>
</div>
<div class = "footer"></div>
</body>
</html>
