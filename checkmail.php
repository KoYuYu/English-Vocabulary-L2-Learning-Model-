<?php session_start(); error_reporting(0);?>
<?php

include("mysql_connect.inc.php");

$type = ( isset($_POST['type']) ) ? $_POST['type'] : $_GET['type'];
 
$sql = "SELECT email FROM member WHERE email = '" . str_replace("\'", "''", $_GET['id']) . "'";
$result = $conn->query($sql);
$row=$result -> fetch_array();

if($row[0]=='')
{
$ret = "<font color=\"green\">此帳號可以使用</font>";
    
}
else
{
$ret = "<font color=\"red\">此帳號已經被使用</font>";
}
echo $ret;
?>