<?php
  session_start();

  include('connect.php');

  if(!isset($_COOKIE[$cookie_name])) {
    echo "EXPIRED";
    //header("location:managertest.php");
  }

  $myuserid=$_POST['staffID'];
  $mypassword=$_POST['password'];


  $sql="SELECT * FROM User WHERE id='$myuserid' and password='$mypassword'";

  $result=mysql_query($sql);
  $rows=mysql_fetch_array($result); //fetch record row
  $staff_name=$rows['name'];
  $staff_email = $rows['email'];
  $staff_ph = $rows['phoneNo'];
  $staff_gender = $rows['gender'];
  $staff_ic = $rows['icno'];
  $staff_add = $rows['address'];
  $staff_id = $rows['id'];

  // mysql_num_row is counting table row
  $count=mysql_num_rows($result);

  // If result matched $myusername and $mypassword, table row must be 1 row
  if($count==1){

  $_SESSION["Login"] = "YES";

  // Add user information to the session (global session variables)
  $_SESSION['USER'] = $staff_name;
  $_SESSION['EMAIL'] = $staff_email;
  $_SESSION['PH'] =$staff_ph;
  $_SESSION['Gender'] = $staff_gender;
  $_SESSION['IC'] = $staff_ic;
  $_SESSION['ADD'] =$staff_add;
  $_SESSION['ID'] =$staff_id;

  $cookie_name = "user";
  $cookie_value = $_SESSION['USER'];
  setcookie($cookie_name, $cookie_value, time() + 5, "/");
  header("location:manager.php");

  }

  //if wrong username and password
  else {

  $_SESSION["Login"] = "NO";
  //echo "<h1>You are NOT correctly logged in </h1>";
  }
 ?>
<html>
<head>
</head>
<body>
<form method="post" action="managertest.php">
<p>Username: <input type="text" name="staffID" /></p>
<p>Password: <input type="password" name="password"/></p>
<p><input type="submit" value="Login" /></p>
</form>
</body>
</html>
