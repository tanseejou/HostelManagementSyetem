<?php include("adminModifyStaff.php");

include('connect.php');

/*$cookie_name = "user";
$cookie_value = $_SESSION['USER'];
setcookie($cookie_name, $cookie_value, time() + 300, "/");

if(!isset($_COOKIE[$cookie_name])) {
  echo "EXPIRED";
  header("location:loginPage.php");
}
else {

}*/

  $result = mysql_query("SELECT * FROM User WHERE userType='Staff' ");
  if(isset($_GET['edit'])){
    $id=$_GET['edit'];
    $update = true;
    $record = mysql_query("SELECT * FROM User WHERE id='$id' AND userType='Staff'");

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
    }
  }
?>

<html>
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
<h1> Staff Account Management </h1>
<body>
  <form method="post" action="adminModifyStaff.php">
    <table>
      <tr>
      <?php if($update == false){ ?>

        <td> ID: </td>
        <td><input type="text" size="40" name="id" value=""></td>

      <?php } else{ ?>
        <td> ID: </td>
        <input type="hidden"  size="40" name="id" value="<?php echo $id;?>">
        <td><?php echo $id;?> </td>
      <?php }?>

      </tr>
      <tr>
        <td> Password: </td>
        <td><input type="text" size="40" name="password" value="<?php echo $password;?>"></td>
      <tr>
        <td>Name: </td>
        <td><input type="text" size="40" name="name" value="<?php echo $name;?>"></td>
      </tr>
      <tr>
        <td>Email :</td>
        <td> <input type="text" size="40" name="email" value="<?php echo $email;?>"></td>
      </tr>
      <tr>
        <td>Phone : </td>
        <td><input type="text" size="40" name="phone" value="<?php echo $phone;?>"></td>
      </tr>
      <tr>
        <td>Gender :</td>
        <td> <input type="text" size="40" name="gender" value="<?php echo $gender;?>"></td>
      </tr>
      <tr>
        <td>  IcNo : </td>
        <td><input type="text" size="40" name="icNo" value="<?php echo $icNo;?>"></td>
      </tr>
      <tr>
        <td>Address : </td>
        <td><textarea cols="40" rows="4" name="address" value=""><?php echo $address; ?></textarea></td>
      </tr>
    </table>
      <?php if ($update == true): ?>
        <br>
        <button class="btn" type ="submit" name ="update"> Update </button>
        <a href="adminStaff.php"><button class="btn" type="button" name="cancel"> Cancel </button></a>
      <?php else: ?>
        <br>
      <button class="btn" type="submit" name="add"> Add </button>
      <button class="btn" type ="reset" name="reset"> Reset </button>
      <br><span> <?php echo $_SESSION["EXISTEDMESSAGE"]; ?> <span>
    <?php endif ?>
    <a href="admin.php"><button type="button" name="back"> BACK TO HOMEPAGE </button></a>
  </form>
<br><br>
<table>
  <tr>
    <th> ID </th>
    <th> Name </th>
    <th> Email </th>
    <th> Phono No </th>
    <th> Gender </th>
    <th> Ic No </th>
    <th> Address </th>
    <th> Password </th>

    <th colspan="2">Action</th>
  </tr>


<?php while ($row = mysql_fetch_array($result)){?>
  <tr>
    <td><?php echo $row['id']; ?></td>
    <td><?php echo $row['name']; ?></td>
    <td><?php echo $row['email']; ?></td>
    <td><?php echo $row['phoneNo']; ?></td>
    <td><?php echo $row['gender']; ?></td>
    <td><?php echo $row['icno']; ?></td>
    <td><?php echo $row['address']; ?></td>
    <td><?php echo $row['password']; ?></td>
    <td>
      <a href="adminStaff.php?edit=<?php echo $row['id'];?>" class="edit_btn"> Edit</a>
    </td>
    <td>
      <a href="adminModifyStaff.php?del=<?php echo $row['id'];?>" class="del_btn"> Delete</a>
    </td>
  </tr>

<?php } ?>

</table>
</div>
<div class ="footer">
</div>
</body>
</html>

<?php $_SESSION["EXISTEDMESSAGE"] = ""; ?>
