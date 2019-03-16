<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link rel="shortcut icon" href="images/title.png">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>L2 English Learning</title>
<link href="css/style.css" rel="stylesheet" type="text/css" />
<!--[if IE 7]><link rel="stylesheet" media="all" type="text/css" href="css/ie7.css" />
<![endif]-->
<!--[if IE 8]><link rel="stylesheet" media="all" type="text/css" href="css/ie8.css" />
<![endif]-->
<link href="fonts/stylesheet.css" rel="stylesheet" type="text/css" />
<!--slidercss-->
<link rel="stylesheet" href="css/basic-jquery-slider.css" />
<script src="js/jquery-1.6.2.min.js" type="text/javascript" language="javascript"></script>
<script src="js/basic-jquery-slider.js"  type="text/javascript" language="javascript"></script>
<script type="text/javascript" src="js/custom.js" language="javascript"></script>
<script type="text/javascript" src="js/input.js" language="javascript"></script>

<!--  Attach the plug-in to the slider parent element and adjust the settings as required -->
<!--<script  type="text/javascript" language="javascript">
      $(document).ready(function() {
        
        $('#banner').bjqs({
          'animation' : 'slide',
          'width' : 960,
          'height' : 450
        });
        
      });
    </script> -->
<script type="text/javascript" src="js/pie.js" language="javascript"></script>
<style type="text/css">
ul.bjqs h1, ol.bjqs-markers li a {
	behavior: url("js/PIE.htc") !important;
}
</style>
</head>

<body>

</script>
<!--Header Start Here-->
<div id="header">
  <div id="top_header">
    <div class="center_frame">
      <div class="top">
        <form name="search" method="post" action="connect.php">
          <div class="search ; color:#FF0000" >
		  <?php
         session_start(); 
include("mysql_connect.inc.php");

$id = $_SESSION['email'];
$sql="SELECT * FROM `member` WHERE `email`='$id';";
$result = $conn -> query($sql) ;
$row=$result -> fetch_array();
if($row[9]=='teacher'){
echo "<font color='white'>$row[9] $row[1] ,您好!</font>" ;
$name=$row[1];
$classroom = $row[12];
?>
    		 </div>
		</form>
      </div>
    </div>
  </div>
  <!--Top Header End Here-->
 <div id="logo_nav">
    <!--<div class="bg1"> -->
      <div class="center_frame"> 
        <!--Logo And Navigation Start Here-->
        <div class="logo"> <a href="index.html"><img src="images/logo.png" alt=""  /></a> </div>
        <ul id="navigation">
          <li><a href="member_index.php"><span>Home</span></a></li>
          <li><a href="search.php"><span>Search</span></a></li>
		  <li><a href="flashcard.php"><span>Flash Card</span></a></li>
          <li><a href="Toefl_test.php"><span>Toefl Test</span></a></li>
          <li><a href="parser3.php"><span>Parser</span></a></li>
          <li><a href="drop.php"><span>Game</span></a></li>
          <li><a href=""><span>Member Center</span></a>
		    <ul>
			  <li> <a href="update.php" class="life_2">Update</a> <span class="nav_line"></span></li>
			  <li> <a href="searchlist.php" class="life_2">Searched words</a> <span class="nav_line"></span></li>
			  <li> <a href="toefllist.php" class="life_2">tested words</a> <span class="nav_line"></span></li>
			  <li> <a href="login_record.php" class="life_2">activity</a><span class="nav_line"></span></li>
            </ul>
		  </li>
          <li><a href="student_group.php"><span>Class</span></a></li>
          <li><a href="logout.php"><span>logout</span></a></li>
        </ul>
        <!--Logo And Navigation End Here--> 
        <!--slider here--> 
        <div class="copyrights">Collect from <a href="http://www.cssmoban.com/"  title="L2 Learning">L2 Learning</a></div>
        <!--  Outer wrapper for presentation only, this can be anything you like -->
        <!-- <div id="banner"> -->
          <!-- start Basic Jquery Slider -->
          <!-- end Basic jQuery Slider --> 
        <!-- </div> -->
        <!-- End outer wrapper --> 
        
        <!--slider end here--> 
        
      </div>
    <!--</div> -->
  </div>
</div>
    <?php
$sql="SELECT * FROM `member` WHERE `email`='$id';";
	$result = $conn -> query($sql) ;
	$row=$result -> fetch_array();
	
	?>
<div id="main_contant"> 
    <div class="center_frame">
	<div id="project_84_main_contant">
<p align="center">目前開課班級：<?php echo "$row[12]"?>
        <br>
    班級人數：
	<?php 
	$sql="SELECT * FROM `class` WHERE classname='$classroom';";
	$result = $conn -> query($sql) ;
	$row=$result -> fetch_array();
    $total =$row[3];
    echo $total;
	$student=$row[4]; 
	?>
    <br>
	教室裡共有<?php echo "$student"?>位學生已加入
        </p>
<br><br>
  <div style="width: 700px; margin: 0px auto 0 auto;"> 
<?php

?>

<p align="center">
<div class="CSSTableGenerator" >        
<?php

 $sql="SELECT `classnumber` AS 編號, `english` AS 英文, `chinese` AS 中文 FROM `$classroom`  ";
$res = $conn->query($sql);
 echo "<table border=2 align='center'><tr>";
 while($field=$res->fetch_field())
 {

   echo "<th>{$field->name}</th>";
 }
 echo "</tr>";
 while($row=$res->fetch_row()){
  echo "<tr>";
  foreach($row as $value){
   echo "<td style=text-align:center>$value</td>";
  }
  echo "</tr>";
 }
 echo "</table>"; 

 $res->free();
?> 

         </div>
<?php }
if($row[9]=='student'){
echo "<font color='white'>$row[9] $row[1] ,您好!</font>" ;
$name=$row[1];
$classroom=$row[12];?>
    		 </div>
		</form>
      </div>
    </div>
  </div>
  <!--Top Header End Here-->
 <div id="logo_nav">
    <!--<div class="bg1"> -->
      <div class="center_frame"> 
        <!--Logo And Navigation Start Here-->
        <div class="logo"> <a href="index.html"><img src="images/logo.png" alt=""  /></a> </div>
        <ul id="navigation">
          <li><a href="member_index.php"><span>Home</span></a></li>
          <li><a href="search.php"><span>Search</span></a></li>
		  <li><a href="flashcard.php"><span>Flash Card</span></a></li>
          <li><a href="Toefl_test.php"><span>Toefl Test</span></a></li>
          <li><a href="parser3.php"><span>Parser</span></a></li>
          <li><a href="drop.php"><span>Game</span></a></li>
          <li><a href=""><span>Member Center</span></a>
		    <ul>
			  <li> <a href="update.php" class="life_2">Update</a> <span class="nav_line"></span></li>
			  <li> <a href="searchlist.php" class="life_2">Searched words</a> <span class="nav_line"></span></li>
			  <li> <a href="toefllist.php" class="life_2">tested words</a> <span class="nav_line"></span></li>
			  <li> <a href="login_record.php" class="life_2">activity</a><span class="nav_line"></span></li>
            </ul>
		  </li>
          <li><a href="student_group.php"><span>Class</span></a></li>
          <li><a href="logout.php"><span>logout</span></a></li>
        </ul>
        <!--Logo And Navigation End Here--> 
        <!--slider here--> 
        <div class="copyrights">Collect from <a href="http://www.cssmoban.com/"  title="L2 Learning">L2 Learning</a></div>
        <!--  Outer wrapper for presentation only, this can be anything you like -->
        <!-- <div id="banner"> -->
          <!-- start Basic Jquery Slider -->
          <!-- end Basic jQuery Slider --> 
        <!-- </div> -->
        <!-- End outer wrapper --> 
        
        <!--slider end here--> 
        
      </div>
    <!--</div> -->
  </div>
</div>
<?php
$sql="SELECT * FROM `member` WHERE `email`='$id';";
	$result = $conn -> query($sql) ;
	$row=$result -> fetch_array();
	
	?>
<div id="main_contant"> 
    <div class="center_frame">
	<div id="project_84_main_contant">
<p align="center">目前開課班級：<?php echo "$row[12]"?>
        <br>
    班級人數：
	<?php 
	$sql="SELECT * FROM `class` WHERE classname='$classroom';";
	$result = $conn -> query($sql) ;
	$row=$result -> fetch_array();
    $total =$row[3];
    $teacher = $row[2];
    
    echo $total;
	$student=$row[4]; 
	?>
    <br>
	授課老師：<?php echo "$teacher"?>
        </p>
<br><br>
  <div style="width: 700px; margin: 0px auto 0 auto;"> 
<?php

?>

<p align="center">
<div class="CSSTableGenerator" >        
<?php

 $sql="SELECT `classnumber` AS 編號, `english` AS 英文, `chinese` AS 中文 FROM `$classroom`  ";
$res = $conn->query($sql);
 echo "<table border=2 align='center'><tr>";
 while($field=$res->fetch_field())
 {

   echo "<th>{$field->name}</th>";
 }
 echo "</tr>";
 while($row=$res->fetch_row()){
  echo "<tr>";
  foreach($row as $value){
   echo "<td style=text-align:center>$value</td>";
  }
  echo "</tr>";
 }
 echo "</table>"; 

 $res->free();
?>  
         </div>
<?php } ?>

</div>
</div>
</html>
    
    
    


