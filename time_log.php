<?php session_start(); error_reporting(0);?>
<?php

include("mysql_connect.inc.php");

$type = ( isset($_POST['type']) ) ? $_POST['type'] : $_GET['type'];
 


if(isset($_GET['time']) != null)
{
    $sql = "INSERT INTO `endtime` (endtime) VALUES ('$time')";
    $result = $conn -> query($sql) ;
}
else
{
    $sql = "INSERT INTO `endtime` (endtime) VALUES ('0')";
    $result = $conn -> query($sql) ;
}
?>