<?php

$con = mysql_connect("localhost", "tsx","971110017631");
mysql_select_db("db_tsx",$con);


$sql = "CREATE TABLE Block
(
  block varchar(10),
  roomNo varchar(10),
  roomType varchar(20),
  gender varchar(10),
  id1 varchar(9),
  id2 varchar(9)
)";
mysql_query($sql);

// A
mysql_query("INSERT INTO Block (block, roomNo, roomType, gender)VALUES ('Block A', 'A01', 'single', 'male')");
mysql_query("INSERT INTO Block (block, roomNo, roomType, gender)VALUES ('Block A','A02', 'single', 'male')");
mysql_query("INSERT INTO Block (block, roomNo, roomType, gender)VALUES ('Block A','A03', 'single', 'male')");
mysql_query("INSERT INTO Block (block, roomNo, roomType, gender)VALUES ('Block A','A04', 'single', 'male')");
mysql_query("INSERT INTO Block (block, roomNo, roomType, gender)VALUES ('Block A','A05', 'single', 'male')");
mysql_query("INSERT INTO Block (block, roomNo, roomType, gender)VALUES ('Block A','A06', 'double', 'male')");
mysql_query("INSERT INTO Block (block, roomNo, roomType, gender)VALUES ('Block A','A07', 'double', 'male')");
mysql_query("INSERT INTO Block (block, roomNo, roomType, gender)VALUES ('Block A','A08', 'double', 'male')");
mysql_query("INSERT INTO Block (block, roomNo, roomType, gender)VALUES ('Block A','A09', 'double', 'male')");
mysql_query("INSERT INTO Block (block, roomNo, roomType, gender)VALUES ('Block A','A10', 'double', 'male')");

// B
mysql_query("INSERT INTO Block (roomNo, roomType, gender)VALUES ('Block B', 'B01', 'single', 'male')");
mysql_query("INSERT INTO Block (roomNo, roomType, gender)VALUES ('Block B', 'B02', 'single', 'male')");
mysql_query("INSERT INTO Block (roomNo, roomType, gender)VALUES ('Block B', 'B03', 'single', 'male')");
mysql_query("INSERT INTO Block (roomNo, roomType, gender)VALUES ('Block B', 'B04', 'single', 'male')");
mysql_query("INSERT INTO Block (roomNo, roomType, gender)VALUES ('Block B', 'B05', 'single', 'male')");
mysql_query("INSERT INTO Block (roomNo, roomType, gender)VALUES ('Block B', 'B06', 'double', 'male')");
mysql_query("INSERT INTO Block (roomNo, roomType, gender)VALUES ('Block B', 'B07', 'double', 'male')");
mysql_query("INSERT INTO Block (roomNo, roomType, gender)VALUES ('Block B', 'B08', 'double', 'male')");
mysql_query("INSERT INTO Block (roomNo, roomType, gender)VALUES ('Block B', 'B09', 'double', 'male')");
mysql_query("INSERT INTO Block (roomNo, roomType, gender)VALUES ('Block B', 'B10', 'double', 'male')");

//C
mysql_query("INSERT INTO Block (roomNo, roomType, gender)VALUES ('Block C', 'C01', 'single', 'male')");
mysql_query("INSERT INTO Block (roomNo, roomType, gender)VALUES ('Block C', 'C02', 'single', 'male')");
mysql_query("INSERT INTO Block (roomNo, roomType, gender)VALUES ('Block C', 'C03', 'single', 'male')");
mysql_query("INSERT INTO Block (roomNo, roomType, gender)VALUES ('Block C', 'C04', 'single', 'male')");
mysql_query("INSERT INTO Block (roomNo, roomType, gender)VALUES ('Block C', 'C05', 'single', 'male')");
mysql_query("INSERT INTO Block (roomNo, roomType, gender)VALUES ('Block C', 'C06', 'double', 'male')");
mysql_query("INSERT INTO Block (roomNo, roomType, gender)VALUES ('Block C', 'C07', 'double', 'male')");
mysql_query("INSERT INTO Block (roomNo, roomType, gender)VALUES ('Block C', 'C08', 'double', 'male')");
mysql_query("INSERT INTO Block (roomNo, roomType, gender)VALUES ('Block C', 'C09', 'double', 'male')");
mysql_query("INSERT INTO Block (roomNo, roomType, gender)VALUES ('Block C', 'C10', 'double', 'male')");

// D
mysql_query("INSERT INTO Block (roomNo, roomType, gender)VALUES ('Block D', 'D01', 'single', 'female')");
mysql_query("INSERT INTO Block (roomNo, roomType, gender)VALUES ('Block D', 'D02', 'single', 'female')");
mysql_query("INSERT INTO Block (roomNo, roomType, gender)VALUES ('Block D', 'D03', 'single', 'female')");
mysql_query("INSERT INTO Block (roomNo, roomType, gender)VALUES ('Block D', 'D04', 'single', 'female')");
mysql_query("INSERT INTO Block (roomNo, roomType, gender)VALUES ('Block D', 'D05', 'single', 'female')");
mysql_query("INSERT INTO Block (roomNo, roomType, gender)VALUES ('Block D', 'D06', 'double', 'female')");
mysql_query("INSERT INTO Block (roomNo, roomType, gender)VALUES ('Block D', 'D07', 'double', 'female')");
mysql_query("INSERT INTO Block (roomNo, roomType, gender)VALUES ('Block D', 'D08', 'double', 'female')");
mysql_query("INSERT INTO Block (roomNo, roomType, gender)VALUES ('Block D', 'D09', 'double', 'female')");
mysql_query("INSERT INTO Block (roomNo, roomType, gender)VALUES ('Block D', 'D10', 'double', 'female')");

// E
mysql_query("INSERT INTO Block (roomNo, roomType, gender)VALUES ('Block E', 'E01', 'single', 'female')");
mysql_query("INSERT INTO Block (roomNo, roomType, gender)VALUES ('Block E', 'E02', 'single', 'female')");
mysql_query("INSERT INTO Block (roomNo, roomType, gender)VALUES ('Block E', 'E03', 'single', 'female')");
mysql_query("INSERT INTO Block (roomNo, roomType, gender)VALUES ('Block E', 'E04', 'single', 'female')");
mysql_query("INSERT INTO Block (roomNo, roomType, gender)VALUES ('Block E', 'E05', 'single', 'female')");
mysql_query("INSERT INTO Block (roomNo, roomType, gender)VALUES ('Block E', 'E06', 'double', 'female')");
mysql_query("INSERT INTO Block (roomNo, roomType, gender)VALUES ('Block E', 'E07', 'double', 'female')");
mysql_query("INSERT INTO Block (roomNo, roomType, gender)VALUES ('Block E', 'E08', 'double', 'female')");
mysql_query("INSERT INTO Block (roomNo, roomType, gender)VALUES ('Block E', 'E09', 'double', 'female')");
mysql_query("INSERT INTO Block (roomNo, roomType, gender)VALUES ('Block E', 'E10', 'double', 'female')");

mysql_close($con);
?>
