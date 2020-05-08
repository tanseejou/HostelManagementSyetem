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

  $name="";
  $email="";
  $phone="";
  $gender="";
  $password="";
  $icno="";
  $address="";
  $matricno="";

  if(isset($_POST['add'])){
    $name=$_POST["name"];
    $email=$_POST["email"];
    $phone=$_POST["phone"];
    $gender=$_POST["gender"];
    $password=$_POST["password"];
    $icNo=$_POST["icNo"];
    $address=$_POST["address"];
    $id=$_POST["id"];
    $roomNo=$_POST["roomNo"];
    $block=$_POST["block"];


    $result = mysql_query("SELECT id FROM User WHERE id = '$id'");
    $count = mysql_num_rows($result);

    if($id==""){
      $_SESSION["EXISTEDMESSAGE"] = "Please fill in ID";
    }
    else if($password==""){
      $_SESSION["EXISTEDMESSAGE"] = "Please fill in password";
    }
    else if($name==""){
      $_SESSION["EXISTEDMESSAGE"] = "Please fill in name";
    }
    else if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
      $_SESSION["EXISTEDMESSAGE"] = "Invalid Email";
    }
    else if($count == 1){
      $_SESSION["EXISTEDMESSAGE"] = "ID had already existed";
      header('location: adminStudent.php');
    }
    else{
      mysql_query("INSERT INTO User (id,password,name,email,phoneNo,gender,icno,address,userType)
      VALUES ('$id','$password','$name','$email','$phone','$gender','$icNo','$address','Student')");
      $_SESSION["EXISTEDMESSAGE"] = "New Student Added";
      header('location: adminStudent.php');
    }
  }

  if(isset($_POST['update'])){
    $name=$_POST["name"];
    $email=$_POST["email"];
    $phone=$_POST["phone"];
    $gender=$_POST["gender"];
    $password=$_POST["password"];
    $icNo=$_POST["icNo"];
    $address=$_POST["address"];
    $id=$_POST["id"];
    $roomNo=$_POST["roomNo"];
    $block=$_POST["block"];

    mysql_query("UPDATE User SET name ='$name', email ='$email', phoneNo ='$phone' ,
    gender = '$gender', password = '$password', icno = '$icNo', address='$address', id = '$id', roomNo = '$roomNo', block = '$block' WHERE id='$id'");
    header('location: adminStudent.php');
  }

  if(isset($_GET['del'])){
    $id = $_GET['del'];
    mysql_query("DELETE FROM User WHERE id='$id'");
    header('location: adminStudent.php');
  }

?>
