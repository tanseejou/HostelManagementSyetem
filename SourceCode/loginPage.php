<?php

$con = mysql_connect("localhost", "tsx","971110017631");
mysql_select_db("db_tsx",$con);

session_start();

$myUserID=$_POST['userID'];
$mypassword=$_POST['password'];

switch($_POST["user"])
{
  case 1:     $act = "admin.php";
              break;

  case 2:     $act = "manager.php";
              break;

  case 3:     $act = "student.php";
              break;
}
$sql="SELECT * FROM User WHERE id='$myUserID' and password='$mypassword'";
$result=mysql_query($sql);
$rows=mysql_fetch_array($result);
$user_id=$rows["id"];
$user_password=$rows["password"];
$user_name=$rows["name"];
$count=mysql_num_rows($result);


  $_SESSION["ID"] = $user_id;
  $_SESSION["NAME"] = $user_name;
  $_SESSION["PASSWORD"] = $user_password;
  $_SESSION["EMAIL"] = $rows['email'];
  $_SESSION["PHONE"] = $rows['phoneNo'];
  $_SESSION["GENDER"] = $rows['gender'];
  $_SESSION["ICNO"] = $rows['icno'];
  $_SESSION["ADDRESS"] = $rows['address'];
  $_SESSION["BLOCK"] = $rows['block'];
  $_SESSION["ROOMNO"] = $rows['roomNo'];
  $_SESSION["ROOMTYPE"] = $rows['roomType'];
  $_SESSION["LEVEL"] = $rows['userType'];

if(isset($_POST["login"])){
  if($count==1){
    $_SESSION["Login"] = "YES";
    $cookie_name = "user";
    $cookie_value = $_SESSION['NAME'];
    setcookie($cookie_name, $cookie_value, time() + 300, "/");
    header("location:" . $act);
  }
  else {
    $_SESSION["Login"] = "NO";
    $_SESSION["MESSAGE"] = "Wrong username or password. ";
  }
}



?>


<html>
  <head>
    <title>Login with session</title>
    <link rel="stylesheet" href="studentStyle.css">
    <link href='https://fonts.googleapis.com/css?family=Allan' rel='stylesheet'>
    <link href='https://fonts.googleapis.com/css?family=Maiden Orange' rel='stylesheet'>
    <link href='https://fonts.googleapis.com/css?family=Engagement' rel='stylesheet'>
    <link href='https://fonts.googleapis.com/css?family=Arima Madurai' rel='stylesheet'>
  </head>

<body>
  <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>"  >

    <div class="header">
      <img src = "hostel.png" id="img1">
      <div id="word1">College of Hope</div>
      <div id="word2">Where we LIVE is home</div>
    </div>

    <div class="break"></div>
    <h1 style="text-align: center;" class="pageTitle">Login</h1>

    <div class="content">
    Users :  <select name = "user" id="user" >
                  <option value = "1" >Admin
                  <option value = "2" >Staff
                  <option value = "3" selected>Student
                </select>
    <p>User ID: <input type="text" name="userID" /></p>
    <p>Password: <input type="password" name="password"/></p>
    <p><input type="submit" value="  LOGIN  " name="login" class="buttonStyle"/></p>

    <span class="errorStyle"> <?php echo $_SESSION["MESSAGE"]?> </span><br/>

    <a href ="signUp.php" style="color:red;">Does not has an account? Sign up now! </a></br>

  </div>
  </form>

  <div class="footer"></div>

</body>

</html>

<?php $_SESSION["MESSAGE"] = ""; ?>
