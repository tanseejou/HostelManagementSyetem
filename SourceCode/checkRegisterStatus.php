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

  $matricNo = $_SESSION["ID"];
  $sql = "SELECT * FROM Application WHERE matricNo='$matricNo'";
  $record=mysql_query($sql);

  $result=mysql_fetch_array($record);


?>

<html>
<head>
  <title>Check Application Result</title>
  <link rel="stylesheet" href="studentStyle.css">
  <link href='https://fonts.googleapis.com/css?family=Allan' rel='stylesheet'>
  <link href='https://fonts.googleapis.com/css?family=Maiden Orange' rel='stylesheet'>
  <link href='https://fonts.googleapis.com/css?family=Engagement' rel='stylesheet'>
  <link href='https://fonts.googleapis.com/css?family=Arima Madurai' rel='stylesheet'>
</head>

<body>
  <form action = "student.php" method="post">
  <div class="header">
    <img src = "hostel.png" id="img1">
    <div id="word1">College of Hope</div>
    <div id="word2">Where we LIVE is home</div>
  </div>
  <div class="break"></div>

  <h1 class="pageTitle"><u>HOSTEL APPLICATION RESULT, SESSION 2019/2020</u></h1>
  <div class="content">
    <table style="width:70%" align="center">
    <tr>
      <th>MATRIC NO (ID):</th>
      <td><?php echo $_SESSION["ID"];?></td>
      <th>NAME:</th>
      <td><?php echo $_SESSION["NAME"];?></td>
    </tr>
    <tr>
      <th>IC NO.:</th>
      <td><?php echo $_SESSION["ICNO"];?></td>
      <th>GENDER:</th>
      <td><?php echo $_SESSION["GENDER"];?></td>
    </tr>
    <tr>
      <th>BLOCK:</th>
      <td><?php echo $result["block"];?></td>
      <th>ROOM NO.:</th>
      <td><?php echo $result["roomNo"];?></td>
    </tr>
    <tr>
      <th>ROOM TYPE:</th>
      <td colspan="3"> <?php echo $result["roomType"];?> </br></td>
    </tr>
    <tr>
      <th>STATUS:</th>
      <td colspan="3"><b> <?php echo $result["status"];?> </b></td>
    </tr>
  </table>

  <br/>
    <button type="submit" value="backToHomePage" class="buttonStyle">BACK TO HOME PAGE</button>
  </form>
  </div>

  <div class="footer"></div>
</body>

</html>
