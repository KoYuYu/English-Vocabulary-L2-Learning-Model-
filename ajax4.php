
<?php session_start(); error_reporting(0);?>
<?php
$class = $_SESSION['class'];
include("mysql_connect.inc.php");
$user_id = $_POST['user_id'];
$user_save = $_POST['user_save'];

$sql="SELECT COUNT(*) FROM `save_voc_record` WHERE `english`='$user_save' AND `member`='$user_id'";
$res = $conn -> query($sql) ;
$row=$res -> fetch_row();
if ($row[0] == 0)
{
	$sql="INSERT INTO `save_voc_record`(`english`, `time`, `member`,`classname`) VALUES ('".$user_save."',now(),'".$user_id."','".$class."')";
	$result = $conn -> query($sql) ;
	echo '<img src="images/fstar.png" width="60" height="60" />';
}
else
{
	$sql="DELETE FROM `save_voc_record` WHERE `english`='".$user_save."' and `member`='".$user_id."'";
	$result = $conn -> query($sql) ;
	echo '<img src="images/astar.png" width="60" height="60" />';
}	

?>

