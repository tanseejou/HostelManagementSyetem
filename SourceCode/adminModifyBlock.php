<?php
  session_start();
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

  $level = $_SESSION["LEVEL"];

    $block = "";
    $roomNo = "";
    $roomType = "";
    $gender = "";
    $id1 = "";
    $id2 = "";

    if(isset($_POST['add'])){
      $block = $_POST["block"];
      $roomNo = $_POST["roomNo"];
      $roomType = $_POST["roomType"];
      $gender = $_POST["gender"];
      $id1 = $_POST["id1"];
      $id2 = $_POST["id2"];

      $result = mysql_query("SELECT roomNo FROM Block WHERE roomNo = '$roomNo'");
      $count = mysql_num_rows($result);

      if($block==""){
        $_SESSION["EXISTEDMESSAGE"] = "Please fill in block";
      }
      else if($roomNo==""){
        $_SESSION["EXISTEDMESSAGE"] = "Please fill in room no.";
      }
      else if($roomType==""){
        $_SESSION["EXISTEDMESSAGE"] = "Please fill in room type";
      }
      else if($gender==""){
        $_SESSION["EXISTEDMESSAGE"] = "Please fill in room gender";
      }
      else if($count == 1){
        $_SESSION["EXISTEDMESSAGE"] = "Room No. had already existed";
        header('location: adminBlock.php');
      }
      else{
        mysql_query("INSERT INTO Block (block,roomNo,roomType,gender,id1,id2)
        VALUES ('$block','$roomNo','$roomType','$gender','$id1','$id2')");
        $_SESSION["EXISTEDMESSAGE"] = "New Block Added";
        header('location: adminBlock.php');
      }
    }

    if(isset($_POST['update'])){
      $block = $_POST["block"];
      $roomNo = $_POST["roomNo"];
      $roomType = $_POST["roomType"];
      $gender = $_POST["gender"];
      $id1 = $_POST["id1"];
      $id2 = $_POST["id2"];

      mysql_query("INSERT INTO Block (block,roomNo,roomType,gender,id1,id2)
      VALUES ('$block','$roomNo','$roomType','$gender','$id1','$id2')");
      $_SESSION["EXISTEDMESSAGE"] = "Info Updated";
      header('location: adminBlock.php');
    }

    if(isset($_GET['del'])){
      $id = $_GET['del'];
      mysql_query("DELETE FROM Block WHERE roomNo='$roomNo'");
      header('location: adminBlock.php');
    }

?>
