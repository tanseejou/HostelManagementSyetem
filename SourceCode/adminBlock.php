<?php include("adminModifyBlock.php");

  $result = mysql_query("SELECT * FROM Block");
  if(!$con){
    echo mysql_error();
  }
  if(isset($_GET['edit'])){
    $roomNo = $_GET['edit'];
    $update = true;
    $record = mysql_query("SELECT * FROM Block WHERE roomNo='$roomNo'");

    if(count($record)==1){
      $n = mysql_fetch_array($record);

      $block = $n["block"];
      $roomNo = $n["roomNo"];
      $roomType = $n["roomType"];
      $gender = $n["gender"];
      $id1 = $n["id1"];
      $id2 = $n["id2"];
    }
  }
?>

<html>

<style>


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
<h1> Block Database Management </h1>
<body>
  <form method="post" action="adminModifyBlock.php">
    <table>
      <tr>
        <td> Block </td>
        <td><input type="text" name="block" value="<?php echo $block;?>"></td>
      </tr>
      <tr>
        <td> Room No. </td>
        <td><input type="text" name="roomNo" value="<?php echo $roomNo;?>"></td>
      <tr>
        <td>Room Type </td>
        <td><input type="text" name="roomType" value="<?php echo $roomType;?>"></td>
      </tr>
      <tr>
        <td>Gender</td>
        <td> <input type="text" name="gender" value="<?php echo $gender;?>"></td>
      </tr>
      <tr>
        <td>Id 1 </td>
        <td><input type="text" name="id1" value="<?php echo $id1;?>"></td>
      </tr>
      <tr>
        <td>Id 2</td>
        <td> <input type="text" name="id2" value="<?php echo $id2;?>"></td>
      </tr>
    </table>
      <?php if ($update == true): ?>
        <br>
        <button type ="submit" name ="update"> Update </button>
        <a href="adminBlock.php"><button type="button" name="cancel"> Cancel </button></a>
      <?php else: ?>
        <br>
      <button type="submit" name="add"> Add </button>
      <button type ="reset" name="reset"> Reset </button>
      <br><span> <?php echo $_SESSION["EXISTEDMESSAGE"]; ?> <span>
    <?php endif ?>
      <a href="admin.php"><button name="back" type="button" value="BACK TO HOMEPAGE">BACK TO HOMEPAGE </button></a>
  </form>
<br><br>
<table>
  <tr>
    <th> Block </th>
    <th> Room No </th>
    <th> Room Type </th>
    <th> Gender </th>
    <th> Id 1 </th>
    <th> Id 2 </th>
    <th colspan="2">Action</th>
  </tr>


<?php while ($row = mysql_fetch_array($result)){?>
  <tr>
    <td><?php echo $row['block']; ?></td>
    <td><?php echo $row['roomNo']; ?></td>
    <td><?php echo $row['roomType']; ?></td>
    <td><?php echo $row['gender']; ?></td>
    <td><?php echo $row['id1']; ?></td>
    <td><?php echo $row['id2']; ?></td>
    <td>
      <a href="adminBlock.php?edit=<?php echo $row['roomNo'];?>" class="edit_btn"> Edit</a>
    </td>
    <td>
      <a href="adminModifyBlock.php?del=<?php echo $row['roomNo'];?>" class="del_btn" >Delete</a>
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
