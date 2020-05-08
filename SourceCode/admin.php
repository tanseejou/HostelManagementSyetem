<?php
  session_start();
  include('connect.php');

  /*$cookie_name = "user";
  $cookie_value = $_SESSION['USER'];
  setcookie($cookie_name, $cookie_value, time() + 300, "/");

  if(!isset($_COOKIE[$cookie_name])) {
    echo "EXPIRED";
    header("location:loginPage.php");
  }*/

  if($_SESSION["LEVEL"] != "Admin"){
    echo "This is an admin page<br>You are not allow to view this page. Please login again<br>";
    echo "<a href='index.php'>RE-LOGIN</a>";
  }
  else{

?>

<html>
<head>
<link rel="stylesheet" type="text/css" href="adminStyle.css">
<link href='https://fonts.googleapis.com/css?family=Allan' rel='stylesheet'>
<link href='https://fonts.googleapis.com/css?family=Maiden Orange' rel='stylesheet'>
<link href="https://fonts.googleapis.com/css?family=Arima+Madurai" rel="stylesheet">

<style>
.logout{
  background-color: #5b3c1e;
  color:white;
}
</style>
</head>

<body>
<div class = "header">
  <img src = "hostel.png" id = "img1">
  <div id = "word1">College of HOPE</div>
  <div id = "word2">Where we LIVE is home</div>
</div>

<div class = "break"></div>


<div class = "content">
<h1> Welcome Admin, <?php echo $_SESSION["NAME"] ?></h1>

<h3> Menu </h3>

<a href="adminView.php"><button> View Personal Information </button> </a> <br>
<a href="adminUpdate.php"><button> Update Personal Information</button> </a> <br>
<a href="adminBlock.php"><button> Modify Block Detail</button> </a> <br>
<a href="adminStudent.php"><button> Modify/Create New Student Details</button> </a> <br>
<a href="adminStaff.php"><button> Modify/Create New Staff Details</button> </a> <br>
<a href="adminCreate.php"><button> Create new admin account</button></a> <br>
<a href="index.php"><button class="logout"> Log Out </button></a> <br>
</div>

<div class ="footer">
</div>
</body>

</html>

<?php } ?>
