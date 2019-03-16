<?php session_start(); error_reporting(0);?>
<?php

include("mysql_connect.inc.php");

$type = ( isset($_POST['type']) ) ? $_POST['type'] : $_GET['type'];
 
$pw = $_GET['id'];
$pw2 = $_GET['pid'];

if($pw2 == $pw)
{
$ret = "";
    
}
else
{
$ret = "<font color=\"red\">兩次密碼輸入不同，請重新輸入</font>";
}

echo $ret;
?>