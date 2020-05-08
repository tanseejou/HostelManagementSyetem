<?php
  session_start();

  include('connect.php');

  $cookie_name = "user";
  $cookie_value = $_SESSION['USER'];
  setcookie($cookie_name, $cookie_value, time() + 300, "/");

  if(!isset($_COOKIE[$cookie_name])) {
    echo "EXPIRED";
    header("location:loginPage.php");
  }
  else {

  }

  if($_SESSION["LEVEL"] == "Student"){
    echo "This is a Staff page<br>You are not allow to view this page. Please login again<br>";
    echo "<a href='loginPage.php'>RE-LOGIN</a>";
  }


  else {?>
  <html>
  <body>
  <head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href='https://fonts.googleapis.com/css?family=Allan' rel='stylesheet'>
    <link href='https://fonts.googleapis.com/css?family=Maiden Orange' rel='stylesheet'>
    <link href="https://fonts.googleapis.com/css?family=Arima+Madurai" rel="stylesheet">
    <link rel='stylesheet' href='staffStyle.css'/>
    <style>
    #logout{
      background-color: #5E1E31;
    }
    #logout:hover{
      background-color: white;
      color: #0A7C92;
    }
    </style>
  </head>
  <div class = "header">
    <img src = "hostel.png" id = "img1">
    <div id = "word1">College of HOPE</div>
    <div id = "word2">Where we LIVE is home</div>
  </div>
  <div class = "break"></div>
  <div class = "content">
   <?php echo "<h1>Hello Staff ".$_SESSION['NAME']."</h1>";?>
   <?php echo "<h3>Menu</h3>";?>
   <a href = "managerview.php"><button>View your profile</button></a><br>
   <a href = "manageredit.php"><button>Edit your profile</button></a><br>
   <a href = "apprej.php"><button>Manage student application</button></a><br>
   <a href = "delList.php"><button>Manage application list</button></a><br>
   <a href = "loginPage.php"><button id = "logout">Logout</button></a><br>
 </div>
 </div>

 <div class= "footer"></div>
</body>
  </html>

<?php } ?>
