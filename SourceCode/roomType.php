<?php
  session_start();
  $con = mysql_connect("localhost", "tsx","971110017631");
  mysql_select_db("db_tsx",$con);
  $block = $_GET["var"];
  $_SESSION["BLOCK"] = $block;
//  mysql_query("INSERT INTO Application (block)
//              VALUES ('$block')");

/*$cookie_name = "user";
$cookie_value = $_SESSION['USER'];
setcookie($cookie_name, $cookie_value, time() + 300, "/");

if(!isset($_COOKIE[$cookie_name])) {
  echo "EXPIRED";
  header("location:index.php");
}
else {

}*/
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
  <div class="header">
    <img src = "hostel.png" id="img1">
    <div id="word1">College of Hope</div>
    <div id="word2">Where we LIVE is home</div>
  </div>
  <div class="break"></div>

  <div class="content">
    <b>STEP 2: Please choose the room type.</b></p><br/>

    <table style="width:50%" align="center" >
      <tr>
        <td><a href ="checkApplicationDetails.php?var=Single"><div class="bedStyle">
              <img src="singlebed.png" alt="single room" style="width:165; height:350;"></div></a></td>
        <td><a href ="checkApplicationDetails.php?var=Double"><div class="bedStyle">
              <img src="twinbed.png" alt="double room" style="width:350; height:350;"></div></a></td>
      </tr>
      <tr>
        <td class="room">SINGLE ROOM</td>
        <td class="room">DOUBLE ROOM</td>
      </tr>
    </table>

    <br/><br/>
  </div>

    <div class="footer"></div>

</body>
</html>
