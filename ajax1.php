
<?php session_start(); ?>
<?php

include("mysql_connect.inc.php");
$id = $_SESSION['email'];
$score = "0";
$user_ans = "";
$score = $_SESSION['score'];
$cor = $_SESSION['cor'];
$word = $_SESSION['cor'];
$incor = $_SESSION['incor'];
$a = $_SESSION['a'];
$b = $_SESSION['b'];
$c = $_SESSION['c'];
$d = $_SESSION['d'];
$user_num = $_POST['user_num'];
if($user_num == '100px')
{
	$user_ans=$a;
}
else if($user_num == '250px')
{
	$user_ans=$b;
}
else if($user_num == '400px')
{
	$user_ans=$c;
}
else if($user_num == '550px')
{
	$user_ans=$d;
}

if($user_ans != null)
{
if($user_ans == $cor)
{
    $score+=10;
	$sql="INSERT INTO `game`(`word`,`cor`,`time`,`member` ) VALUES ('".$cor."','1',now(),'".$id."')";
	$result = $conn -> query($sql) ;
	
}
else if($user_ans != $cor)
{
	$score-=5;
	$sql="INSERT INTO `game`(`word`,`cor`,`time`,`member` ) VALUES ('".$cor."','0',now(),'".$id."')";
	$result = $conn -> query($sql) ;	
	//$sql="SELECT `meaning` FROM  `TOEFL_IS_600` WHERE  `english` =  '".$cor."'";
	//$result = $conn -> query($sql) ;
	//$row=$result->fetch_array();	
	$cor = " $cor";
	$incor = $cor.$_SESSION['incor'] ;	
}
}
$_SESSION['score'] = $score;
$_SESSION['incor'] = $incor;
echo "$score,$incor";
?>

