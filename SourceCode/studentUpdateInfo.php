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

  $id = $_SESSION['ID'];

  $result=mysql_fetch_array(mysql_query("SELECT * FROM User WHERE id='$id'"));
  $password = $result['password'];
  $name = $result['name'];
  $email = $result['email'];
  $ph = $result['phoneNo'];
  $gender = $result['gender'];
  $icno = $result['icno'];
  $address = $result['address'];

  if(isset($_POST['update'])){
    $id = $_SESSION['ID'];
    $password = $_POST['password'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $ph = $_POST['phoneNo'];
    $gender = $_POST['gender'];
    $ic = $_POST['ic'];
    $address = $_POST['address'];


  $sql = "UPDATE User SET  password = '$password',
                            name = '$name',
                            email = '$email',
                            phoneNo = '$ph',
                            gender = '$gender',
                            address = '$address',
                            icno = '$ic' WHERE id = '$id'";
  mysql_query($sql);

  $_SESSION["NAME"] = $name;
  $_SESSION["PASSWORD"] = $password;
  $_SESSION["EMAIL"] = $email;
  $_SESSION["PHONE"] = $ph;
  $_SESSION["GENDER"] = $gender;
  $_SESSION["ICNO"] = $ic;
  $_SESSION["ADDRESS"] = $address;

  }
    echo $_SESSION['USER'];

?>


<html>
<head>
  <title>Student Personal Infomation</title>
  <link rel="stylesheet" href="studentStyle.css">
  <link href='https://fonts.googleapis.com/css?family=Allan' rel='stylesheet'>
  <link href='https://fonts.googleapis.com/css?family=Maiden Orange' rel='stylesheet'>
  <link href='https://fonts.googleapis.com/css?family=Engagement' rel='stylesheet'>
  <link href='https://fonts.googleapis.com/css?family=Arima Madurai' rel='stylesheet'>
</head>

<body>
  <form method="post" action = "studentUpdateInfo.php" >
    <div class="header">
      <img src = "hostel.png" id="img1">
      <div id="word1">College of Hope</div>
      <div id="word2">Where we LIVE is home</div>
    </div>
    <div class="break"></div>

    <h1 class="pageTitle">UPDATE INFORMATION </h1>
    <table style="width:50%" align="center">
      <tr>
        <td>NAME</td>
        <td><input type = "text" name = "name" size = "30" value = "<?php echo $name ;?>"></td>
      </tr>
      <tr>
        <td>PASSWORD</td>
        <td><input type = "text" name = "password" size = "30" value = "<?php echo $password ;?>"></td>
      </tr>
      <tr>
        <td>IC</td>
        <td><input type = "text" name = "ic" size = "30" value = " <?php echo $icno ;?>"></td>
      </tr>
      <tr>
        <td>GENDER</td>
        <td><input type = "text" name = "gender" size = "30" value = "<?php echo $gender;?>"></td>
      </tr>
      <tr>
        <td>PHONE NO.</td>
        <td><input type = "text" name = "phoneNo" size = "30" value = "<?php echo $ph;?>"></td>
      </tr>
      <tr>
        <td>EMAIL</td>
        <td><input type = "text" name = "email" size = "30" value = "<?php echo $email;?>"></td>
      </tr>
      <tr>
        <td>ADDRESS</td>
        <td><input type = "text" name = "address" size = "30" value = "<?php echo $address;?>"></td>
      </tr>
    </table>

    <div class="content">
     <button type = "submit" name = "update" class="buttonStyle">CONFIRM UPDATE</button>
  </form>
    <form action = "student.php" method="post">
      <button type="submit" value="backToHomePage" class="buttonStyle">BACK TO HOME PAGE</button>
    </form>
  </div>

  <div class="footer"></div>
</body>

</html>
