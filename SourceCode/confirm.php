<?php
  session_start();
  $con = mysql_connect("localhost", "tsx","971110017631");
  mysql_select_db("db_tsx",$con);

  /*$cookie_name = "user";
  $cookie_value = $_SESSION['USER'];
  setcookie($cookie_name, $cookie_value, time() + 300, "/");

  if(!isset($_COOKIE[$cookie_name])) {
    echo "EXPIRED";
    header("location:loginPage.php");
  }
  else {

  }*/
  $matricNo = $_SESSION["ID"];
  $block = $_SESSION["BLOCK"];
  $roomType = $_SESSION["ROOMTYPE"];
  $dateApplied = $_SESSION["DATEAPPLIED"];
  $timeApplied = $_SESSION["TIMEAPPLIED"];

  $result = mysql_query("SELECT * FROM Application WHERE matricNo='$matricNo' AND (status='processing' OR status='APPROVED')");
  $count = mysql_num_rows($result);

//mysql_query("INSERT INTO Application (block, roomType)VALUES ('$_SESSION["BLOCK"]', '$_SESSION["ROOMTYPE"]')");

//mysql_query("INSERT INTO BlockA (roomNo, roomType, gender)VALUES ('A10', 'double', 'male')");

?>


<html>
<head>
  <title>Application Confirmation</title>
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

  <div class="content">
  <?php if($count >= 1){?>
    <h2 class="pageTitle">You are NOT allow to make any application.</h2>
    <h3>You had already made an application that may be in process or approved.</h3>

  <?php }
  else{
    mysql_query("INSERT INTO Application (matricNo, block, roomType, dateApplied, timeApplied)
                VALUES ('$matricNo', '$block', '$roomType', '$dateApplied', '$timeApplied')");
                ?>

                <h2 class="pageTitle">Your Application has been Confirmed...</h2>
                <h3>and will be process shortly, please check after a few days.</h3>
              <?php } ?>

  <form action = "student.php" method="post">
    <button type="submit" value="backToHomePage" class="buttonStyle">BACK TO HOME PAGE</button>
  </form>

  </div>
    <div class="footer"></div>
</body>
</html>
