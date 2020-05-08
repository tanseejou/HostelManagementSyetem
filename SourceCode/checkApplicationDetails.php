<?php
  session_start();
  $con = mysql_connect("localhost", "tsx","971110017631");
  mysql_select_db("db_tsx",$con);

  $cookie_name = "user";
  $cookie_value = $_SESSION['USER'];
  setcookie($cookie_name, $cookie_value, time() + 300, "/");

  if(!isset($_COOKIE[$cookie_name])) {
    echo "EXPIRED";
    header("location:loginPage.php");
  }
  else {

  }
  $roomtype = $_GET["var"];
  $_SESSION["ROOMTYPE"] = $roomtype;
  $_SESSION["DATEAPPLIED"] = date("Y/m/d");
  $_SESSION["TIMEAPPLIED"] = date("h:i:sa");
//  mysql_query("INSERT INTO Application (block)
//              VALUES ('$block')");
?>


<html>
<head>
  <title>Room Type</title>
  <link rel="stylesheet" href="studentStyle.css">
  <link href='https://fonts.googleapis.com/css?family=Allan' rel='stylesheet'>
  <link href='https://fonts.googleapis.com/css?family=Maiden Orange' rel='stylesheet'>
  <link href='https://fonts.googleapis.com/css?family=Engagement' rel='stylesheet'>
  <link href='https://fonts.googleapis.com/css?family=Arima Madurai' rel='stylesheet'>
</head>

<body>
  <form action = "confirm.php" method="post">
    <div class="header">
      <img src = "hostel.png" id="img1">
      <div id="word1">College of Hope</div>
      <div id="word2">Where we LIVE is home</div>
    </div>
    <div class="break"></div>


    <p align="center"><b>STEP 3: Please check the details.</b></p>
    <table style="width:40%" align="center">
      <tr>
        <td>NAME</td>
        <td> <?php echo $_SESSION["NAME"];?> </td>
      </tr>
      <tr>
        <td>MATRIC NO.</td>
        <td> <?php echo $_SESSION["ID"];?> </td>
      </tr>
      <tr>
        <td>IC</td>
        <td> <?php echo $_SESSION["ICNO"];?> </td>
      </tr>
      <tr>
        <td>GENDER</td>
        <td> <?php echo $_SESSION["GENDER"];?> </td>
      </tr>
      <tr>
        <td>BLOCK APPLIED</td>
        <td> <?php echo $_SESSION["BLOCK"];?> </td>
      </tr>
      <tr>
        <td>ROOM TYPE APPLIED</td>
        <td> <?php echo $_SESSION["ROOMTYPE"];?> </td>
      </tr>
      <tr>
        <td>DATE APPLIED</td>
        <td> <?php echo $_SESSION["DATEAPPLIED"];?> </td>
      </tr>
      <tr>
        <td>DATE APPLIED</td>
        <td> <?php echo $_SESSION["TIMEAPPLIED"];?> </td>
      </tr>
    </table>

    <div class="content">
    <button type="submit" value="confirm" class="buttonStyle">CONFIRM</button>
    </form>

    <form action = "student.php" method="post">
      <button type="submit" value="backToHomePage" class="buttonStyle">BACK TO HOME PAGE</button>
    </form>

  </div>

  <div class="footer"></div>

</body>
</html>
