
<?php

/*$cookie_name = "user";
$cookie_value = $_SESSION['USER'];
setcookie($cookie_name, $cookie_value, time() + 300, "/");

if(!isset($_COOKIE[$cookie_name])) {
  echo "EXPIRED";
  header("location:loginPage.php");
}
else {

}*/

  $con = mysql_connect("localhost", "tsx","971110017631");
  mysql_select_db("db_tsx",$con);
  session_start();

  $ad="SELECT * FROM Block WHERE roomType='double' and id2 IS NULL and block='Block A'";
  $as="SELECT * FROM Block WHERE id1 IS NULL and block='Block A'";
  $ADresult=mysql_query($ad);   // ad = Block A double Room
  $ASresult=mysql_query($as);   // as = Block A single Room
  $Acount=mysql_num_rows($ADresult)+mysql_num_rows($ASresult);    // Acount is total empty room in block A

  $bd="SELECT * FROM Block WHERE roomType='double' and id2 IS NULL and block='Block B'";
  $bs="SELECT * FROM Block WHERE id1 IS NULL and block='Block B'";
  $BDresult=mysql_query($bd);   // bd = Block B double Room
  $BSresult=mysql_query($bs);   // bs = Block B single Room
  $Bcount=mysql_num_rows($BDresult)+mysql_num_rows($BSresult);    // Bcount is total empty room in block B

  $cd="SELECT * FROM Block WHERE roomType='double' and id2 IS NULL and block='Block C'";
  $cs="SELECT * FROM Block WHERE id1 IS NULL and block='Block C'";
  $CDresult=mysql_query($cd);   // cd = Block C double Room
  $CSresult=mysql_query($cs);   // cs = Block C single Room
  $Ccount=mysql_num_rows($CDresult)+mysql_num_rows($CSresult);    // Ccount is total empty room in block C

  $dd="SELECT * FROM Block WHERE roomType='double' and id2 IS NULL and block='Block D'";
  $ds="SELECT * FROM Block WHERE id1 IS NULL and block='Block D'";
  $DDresult=mysql_query($dd);   // dd = Block D double Room
  $DSresult=mysql_query($ds);   // ds = Block D single Room
  $Dcount=mysql_num_rows($DDresult)+mysql_num_rows($DSresult);    // Dcount is total empty room in block D

  $ed="SELECT * FROM Block WHERE roomType='double' and id2 IS NULL and block='Block E'";
  $es="SELECT * FROM Block WHERE id1 IS NULL and block='Block E'";
  $EDresult=mysql_query($ed);   // ed = Block E double Room
  $ESresult=mysql_query($es);   // es = Block E single Room
  $Ecount=mysql_num_rows($EDresult)+mysql_num_rows($ESresult);    // Ecount is total empty room in block E

?>

<html>
<head>
  <title>Student Personal Infomation</title>
  <link rel="stylesheet" href="studentStyle.css">
  <link href='https://fonts.googleapis.com/css?family=Allan' rel='stylesheet'>
  <link href='https://fonts.googleapis.com/css?family=Maiden Orange' rel='stylesheet'>
  <link href='https://fonts.googleapis.com/css?family=Engagement' rel='stylesheet'>
  <link href='https://fonts.googleapis.com/css?family=Arima Madurai' rel='stylesheet'>
  <style>

  .mapPos{
    text-align: center;
  }
  .avai
  {
    color: white;
    opacity: 0.1;
  }
  .blockButton
  {
    font-family: Arima Madurai;
    opacity: 0.6;
    border-radius: 20px;
    padding: 5px 15px 5px 15px;
  }
  .blockButton:hover
  {
    box-shadow: 0 12px 16px 0 rgba(0,1,1,1), 0 17px 50px 0 rgba(0,0,0,0.19);
    font-size: 17px;
    opacity: 1.0;
  }
  .blockButton:hover .avai
  {
    color: black;
    opacity:1;
  }

  .facultyEngineering
  {
    font-size: 20px;
    font-family: Arima Madurai;
    color: black;
    position: relative;
    left: -290px;
    top: -640px;
    font-weight: bold;
  }

  .facultyScience
  {
    font-size: 20px;
    font-family: Arima Madurai;
    color: black;
    position: relative;
    left: -170px;
    top: -550px;
    font-weight: bold;
  }
  </style>

</head>

<body>
  <div class="header">
    <img src = "hostel.png" id="img1">
    <div id="word1">College of Hope</div>
    <div id="word2">Where we LIVE is home</div>
  </div>
  <div class="break"></div>

  <div class="content">
  <h1 class="pageTitle">HOSTEL APPLICATION</h1>

    <h3>Please follow the followiwng instructions : </h3>
    <b>STEP 1: Please choose which block to register.</b><br/>
  </div>

    <div class="mapPos">
      <img src="map.png" alt="map" style="border: 2px solid black;">
      <!--block A-->
      <div class="blockA">
        <a href ="roomType.php?var=Block A"><button class="blockButton">Block A<br/><span class="avai"><?php echo $Acount. " available"; ?></span></button></a>
      </div>

      <!--block B-->
      <div class="blockB">
        <a href ="roomType.php?var=Block B" ><button class="blockButton">Block B<br/><span class="avai"><?php echo $Bcount. " available"; ?></span></button></a>
      </div>

      <!--block C-->
      <div class="blockC">
        <a href ="roomType.php?var=Block C" ><button class="blockButton">Block C<br/><span class="avai"><?php echo $Ccount. " available"; ?></span></button></a>
      </div>

      <!--block D-->
      <div class="blockD">
        <a href ="roomType.php?var=Block D" ><button class="blockButton">Block D<br/><span class="avai"><?php echo $Dcount. " available"; ?></span></button></a>
      </div>

      <!--block E-->
      <div class="blockE">
        <a href ="roomType.php?var=Block E" ><button class="blockButton">Block E<br/><span class="avai"><?php echo $Ecount. " available"; ?></span></button></a>
      </div>

      <div class="facultyEngineering">
        <p>Faculty Engineering</p>
      </div>
      <div class="facultyScience">
        <p>Faculty Science</p>
      </div>

    </div>


    </br>
  <div class="footer"></div>
</body>
</html>
