<?php
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

if(isset($_POST['add'])){
  $name=$_POST["name"];
  $email=$_POST["email"];
  $phone=$_POST["phone"];
  $gender=$_POST["gender"];
  $password=$_POST["password"];
  $icNo=$_POST["icNo"];
  $address=$_POST["address"];
  $id=$_POST["id"];

  $result = mysql_query("SELECT id FROM User WHERE id = '$id'");
  $count = mysql_num_rows($result);

  if($count == 0){
    mysql_query("INSERT INTO User (id,password,name,email,phoneNo,gender,icno,address,userType)
    VALUES ('$id','$password','$name','$email','$phone','$gender','$icNo','$address','Admin')");
  }
  else if($id ="" || $password =""){
    $_SESSION["ALERTMESSAGE"] = "Please fill in your ID and password";
  }
  else{
    $_SESSION["ALERTMESSAGE"] = "ID already taken. Please try again.";
  }


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
<form method="post" action="adminCreate.php">
  <h1> Create New Admin Account </h1>
<table>
  <tr>
    <td>ID</td>
    <td><input type = "text" size = "40" name = "id" value = ""></td>
  </tr>
  <tr>
    <td> Password : </td>
    <td><input type="text" size = "40" name="password" value=""></td>
  </tr>
  <tr>
    <td>Name: </td>
    <td><input type="text" size = "40" name="name" value=""></td>
  </tr>
  <tr>
    <td>Email :</td>
    <td> <input type="text" size = "40" name="email" value=""></td>
  </tr>
  <tr>
    <td>Phone : </td>
    <td><input type="text" size = "40" name="phone" value=""></td>
  </tr>
  <tr>
    <td>Gender :</td>
    <td> <input type="text" size = "40" name="gender" value=""></td>
  </tr>
  <tr>
    <td>  IcNo : </td>
    <td><input type="text" size = "40" name="icNo" value=""></td>
  </tr>
  <tr>
    <td>Address : </td>
    <td><textarea cols="40" rows="4" name="address" value=""></textarea></td>
  </tr>
  <tr>
    <td>Block:</td>
    <td> <input type="text" size = "40" name="roomNo" value=""></td>
  </tr>
  <tr>
    <td>Room No: </td>
    <td><input type="text" size = "40" name="roomNo" value=""></td>
  </tr>
</table>
<span> <?php $_SESSION["ALERTMESSAGE"]; ?> </span>
<button type = "submit" name = "add">Add</button>
<a href="admin.php"><button name="back" type="button" value="BACK TO HOMEPAGE">BACK TO HOMEPAGE </button></a>
</form>
</div>
<div class ="footer">
</div>
</html>

<?php $_SESSION["ALERTMESSAGE"] = ""; ?>
