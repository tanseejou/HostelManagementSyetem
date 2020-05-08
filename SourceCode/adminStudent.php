<?php include("adminModifyStudent.php");

/*$cookie_name = "user";
$cookie_value = $_SESSION['USER'];
setcookie($cookie_name, $cookie_value, time() + 300, "/");

if(!isset($_COOKIE[$cookie_name])) {
  echo "EXPIRED";
  header("location:loginPage.php");
}
else {

}*/

  $result = mysql_query("SELECT * FROM User WHERE userType='Student' ");
  if(!$con){
    echo mysql_error();
  }
  if(isset($_GET['edit'])){
    $id=$_GET['edit'];
    $update = true;
    $record = mysql_query("SELECT * FROM User WHERE id='$id' AND userType='Student'");

    if(count($record)==1){
      $n = mysql_fetch_array($record);
      $name=$n["name"];
      $email=$n["email"];
      $phone=$n["phoneNo"];
      $gender=$n["gender"];
      $password=$n["password"];
      $icNo=$n["icno"];
      $address=$n["address"];
      $id=$n["id"];
      $roomNo=$n["roomNo"];
      $block=$n["block"];
    }
  }
?>

<html>
<style>
table, th, tr, td{
  border: 1px solid;
}

</style>
<head>
  <link rel="stylesheet" type="text/css" href="adminStyle.css">
  <link href='https://fonts.googleapis.com/css?family=Allan' rel='stylesheet'>
  <link href='https://fonts.googleapis.com/css?family=Maiden Orange' rel='stylesheet'>
  <link href="https://fonts.googleapis.com/css?family=Arima+Madurai" rel="stylesheet">
</head>
<div class = "header">
  <img src = "hostel.png" id = "img1">
  <div id = "word1">College of HOPE</div>
  <div id = "word2">Where we LIVE is home</div>
</div>

<div class = "break"></div>
<div class = "content">
<h1> Student Account Management </h1>
<body>
  <form method="post" action="adminModifyStudent.php">
    <table>
      <tr>
        <?php if($update == false){ ?>

          <td> Matric No (ID): </td>
          <td><input type="text" size ="40" name="id" value=""></td>

        <?php } else{ ?>
          <td> Matric No (ID): </td>
          <input type="hidden" size ="40" name="id" value="<?php echo $id;?>">
          <td><?php echo $id;?> </td>
        <?php }?>
      </tr>
      <tr>
        <td> Password : </td>
        <td><input type="text" size ="40" name="password" value="<?php echo $password;?>"></td>
      </tr>
      <tr>
        <td>Name: </td>
        <td><input type="text" size ="40" name="name" value="<?php echo $name;?>"></td>
      </tr>
      <tr>
        <td>Email :</td>
        <td> <input type="text" size ="40" name="email" value="<?php echo $email;?>"></td>
      </tr>
      <tr>
        <td>Phone : </td>
        <td><input type="text" size ="40" name="phone" value="<?php echo $phone;?>"></td>
      </tr>
      <tr>
        <td>Gender :</td>
        <td> <input type="text" size ="40" name="gender" value="<?php echo $gender;?>"></td>
      </tr>
      <tr>
        <td>  IcNo : </td>
        <td><input type="text" size ="40" name="icNo" value="<?php echo $icNo;?>"></td>
      </tr>
      <tr>
        <td>Address : </td>
        <td><textarea cols="40" rows="4" name="address" value=""><?php echo $address; ?></textarea></td>
      </tr>
      <tr>
        <td>Block:</td>
        <td> <input type="text" size ="40" name="roomNo" value="<?php echo $roomNo; ?>"></td>
      </tr>
      <tr>
        <td>Room No: </td>
        <td><input type="text" size ="40"  name="roomNo" value="<?php echo $roomNo; ?>"></td>
      </tr>
      <table>
        <br>
      <?php if ($update == true): ?>
        <button class="btn" type ="submit" name ="update"> Update </button>
      <?php else: ?>
      <button class="btn" type="submit" name="add"> Add </button>
    <?php endif ?>
    <a href="admin.php"><button type="button" name="back"> BACK TO HOMEPAGE</button> </a>
    </div>
  </form>
<br><br>
<table>
  <tr>
    <th> Matric No (ID)</th>
    <th> Password </th>
    <th> Name </th>
    <th> Email </th>
    <th> Phono No </th>
    <th> Gender </th>
    <th> Ic No </th>
    <th> Address </th>
    <th> Block </th>
    <th> Room No </th>
    <th colspan="2">Action</th>
  </tr>


<?php while ($row = mysql_fetch_array($result)){?>
  <tr>
    <td><?php echo $row['id']; ?></td>
    <td><?php echo $row['password']; ?></td>
    <td><?php echo $row['name']; ?></td>
    <td><?php echo $row['email']; ?></td>
    <td><?php echo $row['phoneNo']; ?></td>
    <td><?php echo $row['gender']; ?></td>
    <td><?php echo $row['icno']; ?></td>
    <td><?php echo $row['address']; ?></td>
    <td><?php echo $row['block'];?></td>
    <td><?php echo $row['roomNo'];?></td>
    <td>
      <a href="adminStudent.php?edit=<?php echo $row['id'];?>" class="edit_btn"> Edit</a>
    </td>
    <td>
      <a href="adminModifyStudent.php?del=<?php echo $row['id'];?>" class="del_btn"> Delete</a>
    </td>
  </tr>

<?php } ?>

</table>
</div>
<div class ="footer">
</div>
</body>
</html>
