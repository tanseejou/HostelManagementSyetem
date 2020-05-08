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



  if(isset($_POST['update'])){
    $password=$_POST["password"];
    $name=$_POST["name"];
    $email=$_POST["email"];
    $phone=$_POST["phone"];
    $gender=$_POST["gender"];
    $icno=$_POST["icno"];
    $address=$_POST["address"];


    $sql = "UPDATE User SET
    password = '$password',
    name ='$name',
    email ='$email',
    phoneNo ='$phone' ,
    gender = '$gender',
    icno = '$icNo',
    address='$address',

    WHERE id='$id'";

    mysql_query($sql);
  }
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
<form method="post" action="adminUpdate.php">
<h1> Update Account Information </h1>
<table>
  <tr>
    <td>ID</td>
    <td><?php echo $id;?></td>
  </tr>
  <tr>
    <td>Password</td>
    <td><input type = "password" name = "password" size ="40" value="<?php echo $password;?>"></td>
  </tr>
  <tr>
    <td>Name</td>
    <td><input type = "text" name = "name" size ="40" value = "<?php echo $name;?>"></td>
  </tr>
  <tr>
    <td>Email</td>
    <td><input type = "text" name = "email" size ="40" value = "<?php echo $email;?>"></td>
  </tr>
  <tr>
    <td>Phone No.</td>
    <td><input type = "text" name = "phone" size ="40" value = "<?php echo $phone;?>"></td>
  </tr>
  <tr>
    <td>Gender :</td>
    <td> <input type="text" name="gender" size ="40" value="<?php echo $gender;?>"></td>
  </tr>
  <tr>
    <td>  IcNo : </td>
    <td><input type="text" name="icno" size ="40" value="<?php echo $icno;?>"></td>
  </tr>
  <tr>
    <td>Address : </td>
    <td><textarea cols="40" rows="4" name="address" value=""><?php echo $address; ?></textarea></td>
  </tr>
</table>
<br>
<button type = "submit" name = "update">Update</button>
<a href="admin.php"><button name="back"  type="button" value="BACK TO HOMEPAGE">BACK TO HOMEPAGE </button></a>
</form>
</div>
<div class ="footer">
</div>
</html>
