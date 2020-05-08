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

  if(isset($_GET['status'])){
    $id = $_GET['status'];
    $_SESSION['roomno'] = $id;
    mysql_query("UPDATE Application SET status = 'APPROVED' WHERE applicationID = '$id'");

    $dd = mysql_query("SELECT * FROM Application WHERE applicationID = '$id'");
    $x = mysql_fetch_array($dd);
    $ss = $x['matricNo'];

    $qq = mysql_query("SELECT * FROM User WHERE id = '$ss'");
    $z = mysql_fetch_array($qq);
    $goaway = $z['roomNo'];

    if($goaway != "")
    {
      $_SESSION['room'] = "false";
    }
    else {
      $_SESSION['room'] = "true";
    }


    $results = mysql_query('SELECT Application.matricNo,
                                   Application.applicationID,
                                   Application.block,
                                   Application.roomNo,
                                   Application.roomType,
                                   Application.dateApplied,
                                   Application.timeApplied,
                                   Application.status,
                                   User.name,
                                   User.gender FROM Application inner join User On Application.matricNo = User.id');
  }
  else if(isset($_GET['status1'])){
    $id = $_GET['status1'];


    $del = mysql_query("SELECT * FROM Application WHERE applicationID = '$id'");
    $a = mysql_fetch_array($del);
    $ma = $a['matricNo'];echo "roro000".$ma;
    $rNo = $a['roomNo'];echo "roro".$rNo;


    $del2 = mysql_query("SELECT * FROM Block WHERE roomNo = '$rNo'");
    $delid = mysql_fetch_array($del2);
    $delr = $delid['roomNo'];
    $delrt = $delid['roomType'];
    $one = $delid['id1'];
    $two = $delid['id2'];

    mysql_query("UPDATE Application SET status = 'REJECTED', roomNo = '' WHERE applicationID = '$id'");
    mysql_query("UPDATE User SET block = '', roomNo = '' WHERE id = '$ma'");
    if($delrt == "single"){
      mysql_query("UPDATE Block SET id1 = '', id2 = '' WHERE roomNo = '$rNo'");

    }
    else if($delrt == "double"){
      if($one == $ma)
      {
        mysql_query("UPDATE Block SET id1 = '' WHERE roomNo = '$rNo'");
        //mysql_query("UPDATE Application SET status = 'REJECTED', roomNo = '' WHERE applicationID = '$id'");
        //mysql_query("UPDATE User SET block = '', roomNo = '' WHERE id1 = '$ma'");
      }
      else if($two == $ma)
      {
        mysql_query("UPDATE Block SET id2 = '' WHERE roomNo = '$rNo'");
        //mysql_query("UPDATE Application SET status = 'REJECTED', roomNo = '' WHERE applicationID = '$id'");
        //mysql_query("UPDATE User SET block = '', roomNo = '' WHERE id1 = '$ma'");
      }
    }



    $_SESSION['room'] = "false";
    $results = mysql_query('SELECT Application.matricNo,
                                   Application.applicationID,
                                   Application.block,
                                   Application.roomNo,
                                   Application.roomType,
                                   Application.dateApplied,
                                   Application.timeApplied,
                                   Application.status,
                                   User.name,
                                   User.gender FROM Application inner join User On Application.matricNo = User.id');
  }
  else if(isset($_POST['submit'])){
    $room = $_POST['room'];
    $idd = $_SESSION['roomno'];

    $put = mysql_query("SELECT * FROM Application WHERE applicationID = '$idd'");
    $r = mysql_fetch_array($put);
    $b = $r['block'];
    $m = $r['matricNo'];

    $putinblock = mysql_query("SELECT * FROM Block WHERE roomNo = '$room'");
    $rr = mysql_fetch_array($putinblock);
    $roomT = $rr['roomType'];
    $id1 = $rr['id1'];
    $id2 = $rr['id2'];


      if($roomT == "single"){
        if($id1 != ""){
          $mes = "Room is Occupied";
        }
        else{
          mysql_query("UPDATE Block SET id1 = '$m',id2 = '$m' WHERE roomNo = '$room'");
          mysql_query("UPDATE Application SET roomNo = '$room' WHERE applicationID = '$idd'");
          mysql_query("UPDATE User SET block = '$b', roomNo = '$room' WHERE id = '$m'");
          $_SESSION['room'] = "false";
        }
      }
      else if($roomT == "double"){
        if(($id1 != "") && ($id2 != "")){
          $mes = "Room is Occupied";
        }
        else if($id1 == ""){
          mysql_query("UPDATE Block SET id1 = '$m' WHERE roomNo = '$room'");
          mysql_query("UPDATE Application SET roomNo = '$room' WHERE applicationID = '$idd'");
          mysql_query("UPDATE User SET block = '$b', roomNo = '$room' WHERE id = '$m'");
          $_SESSION['room'] = "false";
        }
        else if($id2 == ""){
          mysql_query("UPDATE Block SET id2 = '$m' WHERE roomNo = '$room'");
          mysql_query("UPDATE Application SET roomNo = '$room' WHERE applicationID = '$idd'");
          mysql_query("UPDATE User SET block = '$b', roomNo = '$room' WHERE id = '$m'");
          $_SESSION['room'] = "false";
        }
    }



    $results = mysql_query('SELECT Application.matricNo,
                                   Application.applicationID,
                                   Application.block,
                                   Application.roomNo,
                                   Application.roomType,
                                   Application.dateApplied,
                                   Application.timeApplied,
                                   Application.status,
                                   User.name,
                                   User.gender FROM Application inner join User On Application.matricNo = User.id');
  }
  else if(isset($_GET['all'])){
    $results = mysql_query('SELECT Application.matricNo,
                                   Application.applicationID,
                                   Application.block,
                                   Application.roomNo,
                                   Application.roomType,
                                   Application.dateApplied,
                                   Application.timeApplied,
                                   Application.status,
                                   User.name,
                                   User.gender FROM Application inner join User On Application.matricNo = User.id');
  }
  else if(isset($_GET['approve'])){
    $results = mysql_query('SELECT Application.matricNo,
                                   Application.applicationID,
                                   Application.block,
                                   Application.roomNo,
                                   Application.roomType,
                                   Application.dateApplied,
                                   Application.timeApplied,
                                   Application.status,
                                   User.name,
                                   User.gender FROM Application inner join User On Application.matricNo = User.id WHERE status = "APPROVED"');
  }
  else if(isset($_GET['reject'])){
    $results = mysql_query('SELECT Application.matricNo,
                                   Application.applicationID,
                                   Application.block,
                                   Application.roomNo,
                                   Application.roomType,
                                   Application.dateApplied,
                                   Application.timeApplied,
                                   Application.status,
                                   User.name,
                                   User.gender FROM Application inner join User On Application.matricNo = User.id WHERE status = "REJECTED"');
  }
  else if(isset($_GET['byname'])){
    $results = mysql_query('SELECT Application.matricNo,
                                   Application.applicationID,
                                   Application.block,
                                   Application.roomNo,
                                   Application.roomType,
                                   Application.dateApplied,
                                   Application.timeApplied,
                                   Application.status,
                                   User.name,
                                   User.gender FROM Application inner join User On Application.matricNo = User.id order by name');
  }
  else if(isset($_GET['bydate'])){
    $results = mysql_query('SELECT Application.matricNo,
                                   Application.applicationID,
                                   Application.block,
                                   Application.roomNo,
                                   Application.roomType,
                                   Application.dateApplied,
                                   Application.timeApplied,
                                   Application.status,
                                   User.name,
                                   User.gender FROM Application inner join User On Application.matricNo = User.id order by dateApplied,timeApplied');
  }
  else if(isset($_GET['bygender'])){
    $results = mysql_query('SELECT Application.matricNo,
                                   Application.applicationID,
                                   Application.block,
                                   Application.roomNo,
                                   Application.roomType,
                                   Application.dateApplied,
                                   Application.timeApplied,
                                   Application.status,
                                   User.name,
                                   User.gender FROM Application inner join User On Application.matricNo = User.id order by gender');
  }
  else if(isset($_GET['byblock'])){
    $results = mysql_query('SELECT Application.matricNo,
                                   Application.applicationID,
                                   Application.block,
                                   Application.roomNo,
                                   Application.roomType,
                                   Application.dateApplied,
                                   Application.timeApplied,
                                   Application.status,
                                   User.name,
                                   User.gender FROM Application inner join User On Application.matricNo = User.id order by block');
  }
  else if(isset($_POST['cancel'])){
    $_SESSION['room'] = "false";
  }

?>
<html>
<head>
  <link href='https://fonts.googleapis.com/css?family=Allan' rel='stylesheet'>
  <link href='https://fonts.googleapis.com/css?family=Maiden Orange' rel='stylesheet'>
  <link href="https://fonts.googleapis.com/css?family=Arima+Madurai" rel="stylesheet">
  <link rel='stylesheet' href='staffStyle.css'/>
  <style>
    body,.choice{
      <?php if($_SESSION['room'] == "true"){?>
        color:white;
      <?php }else{?>
        color:black;
        <?php }?>
    }
  .app{
    <?php if($_SESSION['room'] == "true"){?>

    <?php }else{?>
      background-image: url("approve.png");
      background-position: bottom center;
      background: cover;
      background-repeat: no-repeat;
      width:20px;
      height:20px;
      <?php }?>
  }
  .rej{
    <?php if($_SESSION['room'] == "true"){?>

    <?php }else{?>
      background-image: url("cross.png");
      background-position: bottom center;
      background: cover;
      background-repeat: no-repeat;
      width:20px;
      height:20px;
      <?php }?>
  }

  div.sticky {
  position: -webkit-sticky;
  position: sticky;
  margin-top:-50px;
  right:460px;

  float:right;
  }
  input{
    font-size: 35px;
  }
  .c{
    width: 150px;
    height: 50px;
  }
  table,td,th{


    padding:5px;
    text-align: center;
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
  <a class = "choice" href = apprej.php?all><button class = "c">All</button></a>
  <a class = "choice" href = apprej.php?approve><button class = "c">Only Approve</button></a>
  <a class = "choice" href = apprej.php?reject><button class = "c">Only Reject</button></a>
  <a class = "choice" href = apprej.php?byname><button class = "c">Sort by Name</button></a>
  <a class = "choice" href = apprej.php?bydate><button class = "c">Sort by Date</button></a>
  <a class = "choice" href = apprej.php?bygender><button class = "c">Sort by Gender</button></a>
  <a class = "choice" href = apprej.php?byblock><button class = "c">Sort by Block</button></a>

  <form action = "apprej.php" method="post">
  <table>
    <thead>
      <tr>
      <th> ApplicationID </th>
      <th> Matric NO </th>
      <th> Name </th>
      <th> Gender </th>
      <th> Block </th>
      <th> Room Type </th>
      <th> Room No </th>
      <th> Date </th>
      <th> Time </th>
      <th> Status </th>
      <th colspan = "2"> Action </th>
      </tr>
    </thead>

    <?php while ($row = mysql_fetch_array($results)){?>
      <tr>
      <td><?php echo $row['applicationID'];?></td>
      <td><?php echo $row['matricNo'];?></td>
      <td><?php echo $row['name'];?></td>
      <td><?php echo $row['gender'];?></td>
      <td><?php echo $row['block'];?></td>
      <td><?php echo $row['roomType'];?></td>
      <td><?php echo $row['roomNo'];?></td>
      <td><?php echo $row['dateApplied'];?></td>
      <td><?php echo $row['timeApplied'];?></td>
      <td><?php echo $row['status'];?></td>
      <td>
        <a href = "apprej.php?status=<?php echo $row ['applicationID']?>"><div class = "app"></div></a>
      </td>
      <td>
        <a href = "apprej.php?status1=<?php echo $row ['applicationID'];?>"><div class = "rej"></div></a>
      </td>
      </tr>
    </form>
    <?php }?>
  </table>

  <div class = "sticky">
    <p><?php echo $mes;?></p>
    <form action = "apprej.php" method="post">
    <?php if($_SESSION['room'] == "true"){?>
      <input type = "text" name = "room" size = "5" placeholder="Room No"/>
      <input type = "submit" name = "submit">
      <input type = "submit" name = "cancel" value = "Cancel">
    <?php }?>
  </form>
</div>
<?php if($_SESSION['room'] == "true"){?>

<?php }else{?>
<form action = "manager.php" method = "post">
  <button type = "submit" value = "">BACK TO HOME PAGE</button>
</form>
<?php }?>
</div>
<div class = "footer"></div>
</body>
</html>
