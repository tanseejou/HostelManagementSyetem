<?php
  session_start();
  $con = mysql_connect("localhost", "tsx","971110017631");
  mysql_select_db("db_tsx",$con);




  ?>

<html>
<head>
  <title>Student Sign Up Page</title>
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


    <h1 class="pageTitle">You had Successfully Signed Up !</h1>
    <h3 style="text-align: center;">Click OK to proceed.</h3>
    <p style="text-align: center;"><a href ="index.php"><button class="buttonStyle" style="width:90px; height:40px;">OK </button></a></p>


    <div class="footer"></div>

  </body>
</html>
