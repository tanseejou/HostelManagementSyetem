<?php
  session_start();
  include("connect.php");

  $cookie_name = "user";
  $cookie_value = $_SESSION['USER'];
  setcookie($cookie_name, $cookie_value, time() + 300, "/");

  if(!isset($_COOKIE[$cookie_name])) {
    echo "EXPIRED";
    header("location:loginPage.php");
  }
  else {

  }

  /*echo "ID :" .$_SESSION['ID']."<br>";
  echo "Name :" .$_SESSION['NAME']."<br>";
  echo "Email :" .$_SESSION['EMAIL']."<br>" ;
  echo "PhoneNo :" .$_SESSION['PHONE']."<br>" ;
  echo "Gender :" .$_SESSION['GENDER']."<br>";
  echo "ICNo :" .$_SESSION['ICNO']."<br>";
  echo "Address :" .$_SESSION['ADDRESS']."<br>";*/
?>
<html>
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href='https://fonts.googleapis.com/css?family=Allan' rel='stylesheet'>
  <link href='https://fonts.googleapis.com/css?family=Maiden Orange' rel='stylesheet'>
  <link href="https://fonts.googleapis.com/css?family=Arima+Madurai" rel="stylesheet">
  <link rel='stylesheet' href='staffStyle.css'/>
</head>
<div class = "header">
  <img src = "hostel.png" id = "img1">
  <div id = "word1">College of HOPE</div>
  <div id = "word2">Where we LIVE is home</div>
</div>
<div class = "break"></div>
<div class = "content">
  <h1>View Profile</h1>
  <table>
    <tr>
      <th>Staff ID</th>
      <td><?php echo $_SESSION['ID'];?></td>
    </tr>
    <tr>
      <th> Name</th>
      <td><?php echo $_SESSION['NAME'];?></td>
    </tr>
    <tr>
      <th>Email</th>
      <td><?php echo $_SESSION['EMAIL'];?></td>
    </tr>
    <tr>
      <th>Phone No</th>
      <td><?php echo $_SESSION['PHONE'];?></td>
    </tr>
    <tr>
      <th>Gender</th>
      <td><?php echo $_SESSION['GENDER'];?></td>
    </tr>
    <tr>
      <th>IC No.</th>
      <td><?php echo $_SESSION['ICNO'];?></td>
    </tr>
    <tr>
      <th>Address</th>
      <td><?php echo $_SESSION['ADDRESS'];?></td>
    </tr>
  </table>
<form action = "manager.php" method = "post">
  <button type = "submit" value = "">BACK TO HOME PAGE</button>
</form>
</div>
<div class= "footer"></div>
</html>
