<?php
session_start();
include("mysql_connect.inc.php");
//include("captcha.php");
$id=$_SESSION["email"];
$topic=$_POST["topic"];
$content=$_POST["content"];
//echo $hash;
// Captcha verification is Correct. Do something here!
   
$sql="SELECT * FROM `member` WHERE `email`='$id';";
$result = $conn -> query($sql) ;
$row=$result -> fetch_array();
$teacher=$row[12];
$name=$row[1];
$identity=$row[9];

        if($id != null && $topic != null && $content != null )
		{
			$sql = "INSERT INTO lynn.announce(name, topic, identity, content, classroom, time) VALUES ('$name','$topic','$identity', '$content', '$teacher' ,now() )";
			$result = $conn->query($sql);
			
			echo "<script>alert('已發佈成功！將跳轉回公告頁面'); location.href = 'student_group.php';</script>";
		}
		else
		{
			echo "<script>alert('請確認資料是否填妥！將跳轉回公告頁面'); location.href = 'student_group.php';</script>";
		}
?>

