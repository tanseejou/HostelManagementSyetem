<?php

$con = mysql_connect("localhost", "tsx","971110017631");
mysql_select_db("db_tsx",$con);

session_start();



if(isset($_POST['confirm'])){
  $id = $_POST['userID'];
  $password = $_POST['password'];
  $confirmPassword = $_POST['confirmPassword'];
  $name = $_POST['name'];
  $email = $_POST['email'];
  $ph = $_POST['phone'];
  $gender = $_POST['gender'];
  $ic = $_POST['ic'];
  $address = $_POST['address'];

/////////////////////ID checking///////////////////////////////////////////////////////////////////
  $checkID = "SELECT id FROM User WHERE id='$id'";
  $result = mysql_query($checkID);
  $count=mysql_num_rows($result);

  if($count==1){
    $errorID = "ID already exists. Please re-insert your ID.";

  }
  else {
/////////////////////Password checking///////////////////////////////////////////////////////////////////
    if($password!=$confirmPassword)
    {
      $mismatchPass = "Passwords mismatch. Please re-insert your password.";

    }
    else
    {
      $sql = "INSERT INTO User (id, password, name, email, phoneNo, gender, icno, address, userType)
              VALUES ('$id', '$password', '$name', '$email', '$ph', '$gender', '$ic', '$address', 'Student')";
      mysql_query($sql);

      header("location: signUpSuccess.php" );
    }

  }
}
?>
<!-- JS------------------------------>
<script type="text/javascript">
function IdentificationValidator()
{ var id        = document.getElementById("userID");
  var name      = document.getElementById("userName");
  var password  = document.getElementById("userPassword");
  var ic        = document.getElementById("userIC");
  var email     = document.getElementById("userEmail");
  var phone     = document.getElementById("userPhone");
  var address   = document.getElementById("userAddress");

  if(isEmpty(id, "Please enter your matric number (ID).\nThank You~"))
  {
    if(isAlphabet(name, "Please enter only letters for your name.\nThank You~"))
    {
      if(isEmpty(password, "Please enter your password.\nThank You~"))
      {
        if(isEmpty(ic, "Please enter your IC No..\nThank You~"))
        {
          if(isNumeric(phone, "Please enter only numbers for your phone.\nThank You~"))
          {
            if(emailValidator(email, "Please enter a valid email address.\nThank You~"))
            {
              if(isEmpty(address, "Please enter your current address.\nThank You~"))
              {
                return true;
              }
            }
          }
        }
      }
    }
  }
  return false;

};

function isEmpty(elem, helperMsg)
{
  if(elem.value.length==0)
    {
      alert(helperMsg);
      elem.focus();
      return false;
    }
  return true;
}

function isNumeric(elem, helperMsg)
{
  var numExp = /^[0-9]+$/;
  if(elem.value.length==0)
  {
    alert("Please enter value for phone number.");
    elem.focus();
    return false;
  }
  else if(elem.value.match(numExp))
    {return true;}
  else
    { alert(helperMsg);
      elem.focus();
      return false;
    }
}

function emailValidator(elem, helperMsg)
{
  var emailExp= /^[\w\-\.\+]+\@[a-zA-Z0-9\.\-]+\.[a-zA-z0-9]{2,4}$/;
  if(elem.value.length==0)
  {
    alert("Please enter value for email address.");
    elem.focus();
    return false;
  }
  else if(elem.value.match(emailExp))
    {return true;}
  else
    { alert(helperMsg);
      elem.focus();
      return false;}
}

function isAlphabet(elem, helperMsg)
{ var alphaExp=/^[a-zA-Z, ]+$/;
  if(elem.value.length==0)
  { alert("Please enter value for name.");
    elem.focus();
    return false;
  }
  else if(elem.value.match(alphaExp))
    { return true;}
  else
    { alert(helperMsg);
      elem.focus();
      return false;}
}

</script>
<!-- JS-->


<html>
<head>
  <title>Student Sign Up Page</title>
  <link rel="stylesheet" href="studentStyle.css">
  <link href='https://fonts.googleapis.com/css?family=Allan' rel='stylesheet'>
  <link href='https://fonts.googleapis.com/css?family=Maiden Orange' rel='stylesheet'>
  <link href='https://fonts.googleapis.com/css?family=Engagement' rel='stylesheet'>
  <link href='https://fonts.googleapis.com/css?family=Arima Madurai' rel='stylesheet'>

</head>

<body>
  <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>" onsubmit="return IdentificationValidator()" >
    <div class="header">
      <img src = "hostel.png" id="img1">
      <div id="word1">College of Hope</div>
      <div id="word2">Where we LIVE is home</div>
    </div>

    <div class="break"></div>

    <h1 style="text-align: center;" class="pageTitle">Sign Up</h1>

    <table style="width:70%" align="center">
      <tr>
        <th>MATRIC NO (ID):</th>
        <td><input type="text" name="userID" id="userID" size="30"/></td>
        <th>NAME:</th>
        <td><input type="text" name="name" id="userName" size="30"/></td>
      </tr>
      <tr>
        <th>IC NO.:</th>
        <td><input type="text" name="ic" id="userIC" size="30"/></td>
        <th>GENDER:</th>
        <td><input type="radio" name="gender" value="Male" checked />Male
            <input type="radio" name="gender" value="Female"/>Female</td>
      </tr>
      <tr>
        <th>PASSWORD:</th>
        <td><input type="password" name="password" id="userPassword" size="30"/></td>
        <th>CONFIRM PASSWORD:</th>
        <td><input type="password" name="confirmPassword" size="30"/></td>
      </tr>
      <tr>
        <th>PHONE NO:</th>
        <td colspan="3"><input type="text" name="phone" id="userPhone" size="60"/></td>
      </tr>
      <tr>
        <th>EMAIL:</th>
        <td colspan="3"><input type="text" name="email" id="userEmail" size="60"/></br></td>
      </tr>
      <tr>
        <th>ADDRESS:</th>
        <td colspan="3"><textarea rows="3" cols="100" name="address" id="userAddress" /></textarea></td>
      </tr>
    </table>

    <div class="errorStyle">
      <span ><?php echo $mismatchPass ?></span></br>
      <span ><?php echo $errorID ?></span>
    </div>

    <p style="text-align: center;">
       <input type="submit" value="CONFIRM" name="confirm" class="buttonStyle"/>
       <input type="reset" value="RESET" class="buttonStyle"/>
       <a href="index.php" value="back"/><button type="button" class="buttonStyle">BACK TO LOGIN</button></a>
    </p>
    <br/><br/><br/><br/>
  </form>

  <div class="footer"></div>
</body>
</html>
