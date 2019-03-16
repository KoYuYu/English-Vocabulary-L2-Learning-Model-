<?php session_start(); ?>

<?php
	include("mysql_connect.inc.php");
	$sql="SELECT `meaning` FROM  `TOEFL_IS_600` WHERE  `english` =  'delete'";
	$result = $conn -> query($sql) ;
	$row=$result->fetch_row();
	$corans = "$row[0]";
	echo "$corans";
?>