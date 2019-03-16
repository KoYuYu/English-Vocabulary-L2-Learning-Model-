<?php error_reporting(0)?>
<html>
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
    </script>-->
<script type="text/javascript" src="js/pie.js" language="javascript"></script>
<style type="text/css">
ul.bjqs h1, ol.bjqs-markers li a {
	behavior: url("js/PIE.htc") !important;
}
</style>
</head>

<body>
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

//insert into login_record begin
$myTime = date("Y/m/d-H:i:s");
$sql="INSERT INTO `login_record` (name,log_time) VALUES ('$id','$myTime')";
$result = $conn -> query($sql) ;
//insert into login_record end

$sql="SELECT name FROM `member` WHERE `email`='$id'";
$result = $conn -> query($sql) ;
$row=$result -> fetch_array();
$sql="SELECT * FROM `member` WHERE `email`='$id'";
$result = $conn -> query($sql) ;
$row=$result -> fetch_array();
/*if($row[0]!=null) {
echo "<font color='white'>$row[0] ,您好! </font>" ;
}*/
if($row[9]=='student'){
echo "<font color='white'>學生$row[1],您好! </font>";
}
else if($row[9]=='teacher'){
echo "<font color='white'>老師$row[1],您好! </font>";
}
else
{
    echo "<font color='white'>FaceBook使用者 ,您好! </font>" ;
}
 ?>
            </div>
		</form>
      </div>
    </div>
  </div>
 
  <div id="logo_nav">
 
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
          <li><a href="about.php"><span>About</span></a></li>
          <li><a href="logout.php"><span>logout</span></a></li>
        </ul>
        <!--Logo And Navigation End Here--> 
        <!--slider here--> 
        <div class="copyrights">Collect from <a href="http://www.cssmoban.com/"  title="L2 Learning">L2 Learning</a></div>
        <!--  Outer wrapper for presentation only, this can be anything you like -->
       
          <!-- start Basic Jquery Slider -->
          <!-- end Basic jQuery Slider --> 
      
        <!-- End outer wrapper --> 
        
        <!--slider end here--> 
        
      </div>
     <!--</div>-->
  </div>
</div>
<!--Header End Here--> 
<!--slider start here--> 

<div id="main_contant"> 
    <div class="center_frame">
        <div id="project_84_main_contant">
<?php if($row[9] == 'teacher') { ?>
        <form name="form1" method="GET" action="">
		<select name="act" onchange="javascript:submit()">
        <!--<option selected="selected">請選擇</option>-->
        <option value="">請選擇</option>
		<option value="stu1">范睿均</option>
		<option value="stu2">柯昱宇</option>
		</select>
		</form>
<br><br>
		<div class="CSSTableGenerator1" >
	
<?php
//record_table begin
if($_GET['act'] == null)
{ }
else if($_GET['act'] == "stu1")
{       $sql="SELECT * from `member` where `email`='joe060683@gmail.com'";
		$result = $conn->query($sql);
        $row=$result -> fetch_array();
        echo "<table border=2 align='center' width='20px', height='20px'>";
		echo "<tr><th colspan='3'>$row[1]</th></tr>";
		$sql="SELECT * from quiz_600_record";
		$res = $conn->query($sql);
		$sql="SELECT `english` as 單字,  SUM(if(quiz_600_record.correct_time = '1', 1, 0)) as 正確次數, SUM(if(quiz_600_record.error_time = '1', 1, 0)) as 錯誤次數 FROM `quiz_600_record` WHERE `member`='joe060683@gmail.com' GROUP BY `english` order by `quiznum` DESC limit 0, 20;";
		$result = $conn -> query($sql) ;
		
		while($field=$result->fetch_field())
		{
		echo "<th>{$field->name}</th>";
		}
		echo "</tr>";
		while($row=$result->fetch_row()){
		echo "<tr>";
		foreach($row as $value){
		echo "<td style=text-align:center>$value</td>";
		}
		echo "</tr>";
		}
		echo "</table>"; 
}
else if($_GET['act'] == "stu2")
{
        $sql="SELECT * from `member` where `email`='jasonko12033@gmail.com'";
		$result = $conn->query($sql);
        $row=$result -> fetch_array();
        echo "<table border=2 align='center' width='20px', height='20px'>";
		echo "<tr><th colspan='3'>$row[1]</th></tr>";
		$sql="SELECT * from quiz_600_record";
		$res = $conn->query($sql);
		$sql="SELECT `english` as 單字,  SUM(if(quiz_600_record.correct_time = '1', 1, 0)) as 正確次數, SUM(if(quiz_600_record.error_time = '1', 1, 0)) as 錯誤次數 FROM `quiz_600_record` WHERE `member`='jasonko12033@gmail.com' GROUP BY `english` order by `quiznum` DESC limit 0, 20;";
		$result = $conn -> query($sql) ;
		
		while($field=$result->fetch_field())
		{
		echo "<th>{$field->name}</th>";
		}
		echo "</tr>";
		while($row=$result->fetch_row()){
		echo "<tr>";
		foreach($row as $value){
		echo "<td style=text-align:center>$value</td>";
		}
		echo "</tr>";
		}
		echo "</table>"; 
} 
}?> 


    </div>
	</div>
	</div>
    </div>
    </div>
</body>
</html>