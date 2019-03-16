<?php
session_start();
include("mysql_connect.inc.php");
//include("captcha.php");
$id=$_SESSION["email"];
$gender=$_POST["gender"];
   
//$sql="SELECT * FROM `member` WHERE `email`='$id';";
//$result = $conn -> query($sql) ;
		if(isset($_POST['submit1']))
	{	
    /*other variables*/
    $gender = $_POST["gender"];
	$sql = "INSERT INTO lynn.flash_record(`self_check`) VALUES ('$gender') where `name`=$id";
			$result = $conn->query($sql);
			
			echo "<script>alert('已確認！'); location.href = 'flashcard.php';</script>";
	
	}


		else
		{
			echo "<script>alert('請確認資料是否填妥！將跳轉回公告頁面'); location.href = 'student_group.php';</script>";
		}
?>

