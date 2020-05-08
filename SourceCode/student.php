

<?php
  session_start();
  $servername = "localhost";
  $username = "tsx";
  $password = "971110017631";
  $dbname = "db_tsx";
  $con = mysql_connect($servername, $username, $password);
  mysql_select_db("db_tsx",$con);
  // check connection
  if(!$con)
    {
      die('Could not connect: ' . mysql_connect_error());
    }

//mysql_close($con);
  $cookie_name = "user";
  $cookie_value = $_SESSION['NAME'];
  setcookie($cookie_name, $cookie_value, time() + 300, "/");

  if(!isset($_COOKIE[$cookie_name])) {
    echo "EXPIRED";
    header("location:loginPage.php");
  }
  else {

  }

?>

<html>
  <head>
    <title> Student Page</title>
    <link rel="stylesheet" href="studentStyle.css">
    <link href='https://fonts.googleapis.com/css?family=Allan' rel='stylesheet'>
    <link href='https://fonts.googleapis.com/css?family=Maiden Orange' rel='stylesheet'>
    <link href='https://fonts.googleapis.com/css?family=Engagement' rel='stylesheet'>
    <link href='https://fonts.googleapis.com/css?family=Arima Madurai' rel='stylesheet'>
  </head>

  <body>
    <div class="header">
      <img src = "hostel.png" id="img1">
      <div id="word1">College of Hope</div>
      <div id="word2">Where we LIVE is home</div>
    </div>
    <div class="break"></div>

    <h1 class="pageTitle">Welcome Student,<?php echo $_SESSION["NAME"]?> !</h1>
  <div class="content">
    <a href ="studentPersonalInfo.php" ><button class="buttonStyle" style="width:200px; height:40px;">Student Profile</button></a></br>
    <a href ="studentUpdateInfo.php" ><button class="buttonStyle" style="width:200px; height:40px;">Update Profile</button></a></br>
    <a href ="application.php" ><button class="buttonStyle" style="width:200px; height:40px;">Hostel Application</button></a></br>
    <a href ="checkRegisterStatus.php"><button class="buttonStyle" style="width:200px; height:40px;">Check Hostel Status</button></a></br>
    <a href ="loginPage.php"><button class="buttonStyle" style="width:200px; height:40px;">Log Out</button></a></br>
  </div>

    <div class="footer"></div>
  </body>
</html>
