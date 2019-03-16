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
            <li><a href=""><span>Learning Tools</span></a>
		    <ul>
              <li> <a href="parser3.php" class="life_2">Parser</a> <span class="nav_line"></span></li>
			  <li> <a href="Toefl_test.php" class="life_2">TOEFL Test</a> <span class="nav_line"></span></li>
			  <li> <a href="flashcard.php" class="life_2">Flashcard</a> <span class="nav_line"></span></li>
			  <li> <a href="drop.php" class="life_2">Game</a><span class="nav_line"></span></li>
            </ul>
		  </li>
		
          
          <li><a href="classRoom.php"><span>ClassRoom</span></a>
			 </li>
            <li><a href=""><span>Member Center</span></a>
		    <ul>
              <li> <a href="update.php" class="life_2">Update</a> <span class="nav_line"></span></li>
			  <li> <a href="searchlist.php" class="life_2">Searched words</a> <span class="nav_line"></span></li>
			  <li> <a href="toefllist.php" class="life_2">tested words</a> <span class="nav_line"></span></li>
			  <li> <a href="login_record.php" class="life_2">activity</a><span class="nav_line"></span></li>
            </ul>
		  </li>
		
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
		<option value="teacher">查閱老師記錄</option>
		<option value="student">查閱學生記錄</option>
		</select>
		</form>
<br><br>
		<div class="CSSTableGenerator1" >
	
<?php
//record_table begin
if($_GET['act'] == null)
{
        echo "<table border=2 align='center' width='20px', height='20px'>";
		echo "<tr><th colspan='2'>$row[1]</th></tr>";
		$sql="SELECT * from action_record";
		$res = $conn->query($sql);
		$sql="SELECT `act_time` as 活動時間,`action` as 活動 FROM `action_record` WHERE `name`='$id' and `identity`= 'teacher' ORDER BY `act_time` DESC limit 0, 10;";
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

else if($_GET['act'] == "teacher")
{    
		echo "<table border=2 align='center' width='20px', height='20px'>";
		echo "<tr><th colspan='2'>$row[1]</th></tr>";
		$sql="SELECT * from action_record";
		$res = $conn->query($sql);
		$sql="SELECT `act_time` as 活動時間,`action` as 活動 FROM `action_record` WHERE `name`='$id' and `identity`= 'teacher' ORDER BY `act_time` DESC limit 0, 10;";
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
else if($_GET['act'] == "student")
{
        echo "<table border=2 align='center' width='20px', height='20px'>";
		$sql="SELECT * from action_record";
		$res = $conn->query($sql);
        
		$sql="SELECT `act_time` as 活動時間,`name` as 會員,`action` as 活動 FROM `action_record` WHERE `identity`= 'student' ORDER BY `act_time` DESC limit 0, 10;";
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
} ?>
<?php } 
else if ($row[9] == 'student') { ?>
<div class="CSSTableGenerator1" >         
<?php   
        echo "<table border=2 align='center' width='20px', height='20px'>";       
		echo "<tr><th colspan='2'>$row[1]</th></tr>";
		$sql="SELECT * from action_record";
		$res = $conn->query($sql);
		$sql="SELECT `act_time` as 活動時間,`action` as 活動 FROM `action_record` WHERE `name`='$id' ORDER BY `act_time` DESC limit 0, 10;";
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
//record_table end
?>

    </div>
	</div>
	</div>
    </div>
    </div>
</body>
</html>