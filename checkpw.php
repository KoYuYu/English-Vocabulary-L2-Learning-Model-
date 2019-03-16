<?php session_start(); error_reporting(0);?>
<?php

include("mysql_connect.inc.php");

$type = ( isset($_POST['type']) ) ? $_POST['type'] : $_GET['type'];
 
$pw = $_GET['id'];
if(mb_strlen($pw,'utf-8') >= 8)
{
$ret = "";
    
}
else
{
$ret = "<font color=\"red\">密碼必須為8~16碼</font>";
}

echo $ret;
?>