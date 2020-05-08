
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
    }
    else{
      mysql_query("INSERT INTO User (id,password,name,email,phoneNo,gender,icno,address,userType)
      VALUES ('$id','$password','$name','$email','$phone','$gender','$icNo','$address','Staff')");
      $_SESSION["EXISTEDMESSAGE"] = "New Staff Added";

    }
    header("location: adminStaff.php");
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
    mysql_query("UPDATE User SET id = '$id',password = '$password', name ='$name', email ='$email', phoneNo ='$phone' ,
    gender = '$gender', icno = '$icNo', address='$address' WHERE id='$id'");
    header("location: adminStaff.php");
  }

  if(isset($_GET['del'])){
    $id = $_GET['del'];
    mysql_query("DELETE FROM User WHERE id='$id'");
    header("location: adminStaff.php");
  }

?>
