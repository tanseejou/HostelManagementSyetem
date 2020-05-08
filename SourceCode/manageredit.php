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

  if(isset($_POST['update'])){
    $name = $_POST['name'];
    $email = $_POST['email'];
    $ph = $_POST['phone'];
    $gender = $_POST['gender'];
    $ic = $_POST['ic'];
    $add = $_POST['add'];
    $id = $_SESSION['ID'];
    $password = $_POST['password'];
    $confirmPassword = $_POST['confirmPassword'];

    if(($password == "") && ($confirmPassword == "")){
      $password = $_SESSION['PASSWORD'];

      $sql = "UPDATE User SET name = '$name', email = '$email', phoneNo = '$ph', gender = '$gender',
              address = '$add',icno = '$ic', password = '$password' WHERE id = '$id'";

      mysql_query($sql);

      $_SESSION['NAME'] = $name;
      $_SESSION['EMAIL'] = $email;
      $_SESSION['PHONE'] = $ph;
      $_SESSION['GENDER'] = $gender;
      $_SESSION['ICNO'] = $ic;
      $_SESSION['ADDRESS'] = $add;
      $_SESSION['PASSWORD'] = $password;
    }
    else if($password != $confirmPassword){
      $message = "Password mismatch. Please reenter";
    }
    else{
      $sql = "UPDATE User SET name = '$name', email = '$email', phoneNo = '$ph', gender = '$gender',
              address = '$add',icno = '$ic', password = '$password' WHERE id = '$id'";

      mysql_query($sql);

      $_SESSION['NAME'] = $name;
      $_SESSION['EMAIL'] = $email;
      $_SESSION['PHONE'] = $ph;
      $_SESSION['GENDER'] = $gender;
      $_SESSION['ICNO'] = $ic;
      $_SESSION['ADDRESS'] = $add;
      $_SESSION['PASSWORD'] = $password;
    }
  }

 ?>
<html>
  <head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href='https://fonts.googleapis.com/css?family=Allan' rel='stylesheet'>
    <link href='https://fonts.googleapis.com/css?family=Maiden Orange' rel='stylesheet'>
    <link href="https://fonts.googleapis.com/css?family=Arima+Madurai" rel="stylesheet">
    <link rel='stylesheet' href='staffStyle.css'/>
    <style>
    #t1,td,th{
      border:1px solid black;
      border-collapse: collapse;
      padding:8px;
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
  <h1> Edit Profile</h1>
  <form method="post" action="manageredit.php">
  <table id = "t1">
    <tr>
      <th>STAFF ID:</th>
      <td><?php echo $_SESSION['ID'];?></td>
      <th>NAME:</th>
      <td><input type = "text" name = "name" size = "30" value = "<?php echo $_SESSION['NAME'];?>"></td>
    </tr>
    <tr>
      <th>IC NO.:</th>
      <td><input type = "text" name = "ic" size = "30" value = "<?php echo $_SESSION['ICNO'];?>"></td>
      <th>GENDER:</th>
      <td><input type = "radio" name = "gender" value = "Male" checked>Male
          <input type = "radio" name = "gender" value = "Female">Female</td>
    </tr>
    <tr>
      <th>Password:</th>
      <td><input type = "password" name = "password" size = "30" value = ""></td>
      <th>Confirm Password:</th>
      <td><input type = "password" name = "confirmPassword" size = "30" value = ""></td>
    </tr>
    <tr>
      <th>Phone No:</th>
      <td colspan="3"><input type = "text" name = "phone" size = "30" value = "<?php echo $_SESSION['PHONE'];?>"></td>
    </tr>
    <tr>
      <th>Email:</th>
      <td colspan="3"><input type = "text" name = "email" size = "30" value = "<?php echo $_SESSION['EMAIL'];?>"></td>
    </tr>

    <tr>
      <td>Address</td>
      <td colspan="3"><textarea name = "add" rows = "4" cols = "70" ><?php echo $_SESSION['ADDRESS'];?></textarea></td>
    </tr>
  </table>
  <?php echo
  $message."<br>"; ?>

  <button type = "submit" name = "update">Update</button>
</form>

<form action = "manager.php" method = "post">
  <button type = "submit" value = "">BACK TO HOME PAGE</button>
</form>
</div>
<div class = "footer"></div>
</body>
</html>
