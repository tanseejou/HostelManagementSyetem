<?php
$conn = mysql_connect("localhost","tsx","971110017631");
if (!$conn) die("Error! Cannot connect to server: ". mysql_error() );
$selected = mysql_select_db("db_tsx",$conn);
if (!$selected) die ("Cannot use database: " . mysql_error() );
?>
