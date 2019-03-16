
<?php session_start(); error_reporting(0);?>
<?php

include("mysql_connect.inc.php");
$cor = $_SESSION['cor'];

$sql="SELECT * FROM `TOEFL_IS_600` ORDER BY RAND() LIMIT 4";
$res = $conn -> query($sql); 
for($i=0;$row=$res->fetch_row();$i++)
{
	$rane[$i]=$row[2];
	$rana[$i]=$row[6];
}

$word = $rane[0];
$corans = $rana[0];
$aa = $rana[0];
$bb = $rana[1];
$cc = $rana[2];
$dd = $rana[3];
$_SESSION['cor'] = $word;
shuffle($rane);
$a = $rane[0];
$b = $rane[1];
$c = $rane[2];
$d = $rane[3];
$_SESSION['a'] = $a;
$_SESSION['b'] = $b;
$_SESSION['c'] = $c;
$_SESSION['d'] = $d;
echo "$word,$aa,$bb,$cc,$dd";


?>

