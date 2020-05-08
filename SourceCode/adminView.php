<?php
  session_start();
  include('connect.php');

  /*$cookie_name = "user";
  $cookie_value = $_SESSION['USER'];
  setcookie($cookie_name, $cookie_value, time() + 300, "/");

  if(!isset($_COOKIE[$cookie_name])) {
    echo "EXPIRED";
    header("location:loginPage.php");
  }
  else {

  }*/


  $id = $_SESSION["ID"];

  $result=mysql_fetch_array(mysql_query("SELECT * FROM User WHERE id='$id'"));

  $password = $result['password'];
  $name = $result['name'];
  $email = $result['email'];
  $phone = $result['phoneNo'];
  $gender = $result['gender'];
  $icno = $result['icno'];
  $address = $result['address'];

?>

<html>
<head>
  <link rel="stylesheet" type="text/css" href="adminStyle.css">
  <link href='https://fonts.googleapis.com/css?family=Allan' rel='stylesheet'>
  <link href='https://fonts.googleapis.com/css?family=Maiden Orange' rel='stylesheet'>
  <link href="https://fonts.googleapis.com/css?family=Arima+Madurai" rel="stylesheet">
</head>
<div class = "header">
  <img src = "hostel.png" id = "img1">
  <div id = "word1">College of HOPE</div>
  <div id = "word2">Where we LIVE is home</div>
</div>

<div class = "break"></div>
<div class = "content">
<body>
  <h1> Personal Information </h1>
  <table>
    <tr>
      <td>ID</td>
      <td><?php echo $id;?></td>
    </tr>
    <tr>
      <td>Password</td>
      <td><?php echo $password;?></td>
    </tr>
    <tr>
      <td>Name</td>
      <td><?php echo $name;?></td>
    </tr>
    <tr>
      <td>Email</td>
      <td><?php echo $email;?></td>
    </tr>
    <tr>
      <td>Phone No</td>
      <td><?php echo $phone;?></td>
    </tr>
    <tr>
      <td>Gender</td>
      <td><?php echo $gender;?></td>
    </tr>
    <tr>
      <td>IcNo</td>
      <td><?php echo $icno;?></td>
    </tr>
    <tr>
      <td>Address</td>
      <td><?php echo $address; ?></td>
    </tr>
  </table>
  <br>
  <a href="admin.php"><button name="back" type="button" value="BACK TO HOMEPAGE">BACK TO HOMEPAGE </button></a>
</div>
<div class ="footer">
</div>
</body>
</html>
