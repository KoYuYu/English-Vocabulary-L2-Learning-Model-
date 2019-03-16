<?php session_start(); error_reporting(0); ?>
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
$sql="SELECT * FROM `member` WHERE `email`='$id'";
$result = $conn -> query($sql) ;
$row=$result -> fetch_array();
$identity=$row[9];
$sql="INSERT INTO `lynn`.`action_record` (`name`, `act_time`, `action`, `identity`) VALUES ( '" . $id. "',now(), 'login', '" . $identity. "' );";
$result2 = $conn->query($sql);
//insert into login_record end

$sql="SELECT * FROM `member` WHERE `email`='$id';";
$result = $conn -> query($sql);
$row=$result -> fetch_array();

if($row[9]=='student'){
echo "<font color='white'>學生$row[1],您好! </font>"; ?>
</div>
		</form>
      </div>
    </div>
  </div>
 </div>
  <div id="logo_nav">
    <!--<div class="bg1">-->
      <div class="center_frame"> 
        <!--Logo And Navigation Start Here-->
        <div class="logo"> <a href="index.html"><img src="images/logo.png" alt=""  /></a> </div>
        <ul id="navigation">
          <li><a href="member_index.php"><span>Home</span></a></li>
          <li><a href="flashcard.php"><span>Flash Card</span></a></li>
          <li><a href="search.php"><span>Search</span></a></li>
		  <li><a href="parser3.php"><span>Parser</span></a></li>
          <li><a href="Toefl_test.php"><span>Toefl Test</span></a></li>
          <li><a href="drop.php"><span>Game</span></a></li>
          <li><a href=""><span>Member Center</span></a>
		    <ul>
              <li> <a href="update.php" class="life_2">Update</a> <span class="nav_line"></span></li>
			  <li> <a href="searchlist.php" class="life_2">Searched words</a> <span class="nav_line"></span></li>
			  <li> <a href="toefllist.php" class="life_2">tested words</a> <span class="nav_line"></span></li>
			  <li> <a href="login_record.php" class="life_2">activity</a><span class="nav_line"></span></li>
            </ul>
		  </li>
          <li><a href=""><span>class</span></a>
			  <ul>
			  <li> <a href="classRoom.php" class="life_2">classroom</a> <span class="nav_line"></span></li>
              <li> <a href="student_group.php" class="life_2">student</a> <span class="nav_line"></span></li>
			  <li> <a href="cc.php" class="life_2">create class</a> <span class="nav_line"></span></li>
			  <li> <a href="class_delete.php" class="life_2">delete class</a> <span class="nav_line"></span></li>
			  </ul></li>
          <li><a href="logout.php"><span>logout</span></a></li>
        </ul>

        <!--Logo And Navigation End Here--> 
		<?php } 
else if($row[9]=='teacher'){
echo "<font color='white'>老師$row[1],您好! </font>"; ?>
    </div>
		</form>
      </div>
    </div>
  </div>
 </div>
  <div id="logo_nav">
    <div class="bg1">
      <div class="center_frame"> 
        <!--Logo And Navigation Start Here-->
        <div class="logo"> <a href="index.html"><img src="images/logo.png" alt=""  /></a> </div>
        <ul id="navigation">
          <li><a href="member_index.php"><span>Home</span></a></li>
          <li><a href="flashcard.php"><span>Flash Card</span></a></li>
          <li><a href="search.php"><span>Search</span></a></li>
		  <li><a href="parser3.php"><span>Parser</span></a></li>
          <li><a href="Toefl_test.php"><span>Toefl Test</span></a></li>
          <li><a href="drop.php"><span>Game</span></a></li>
          <li><a href=""><span>Member Center</span></a>
		    <ul>
              <li> <a href="update.php" class="life_2">Update</a> <span class="nav_line"></span></li>
			  <li> <a href="searchlist.php" class="life_2">Searched words</a> <span class="nav_line"></span></li>
			  <li> <a href="toefllist.php" class="life_2">tested words</a> <span class="nav_line"></span></li>
			  <li> <a href="login_record.php" class="life_2">activity</a><span class="nav_line"></span></li>
            </ul>
		  </li>
          <li><a href=""><span>class</span></a>
		   <ul>
			  <li> <a href="classRoom.php" class="life_2">classroom</a> <span class="nav_line"></span></li>
              <li> <a href="student_group.php" class="life_2">student</a> <span class="nav_line"></span></li>
			  <li> <a href="cc.php" class="life_2">create class</a> <span class="nav_line"></span></li>
			  <li> <a href="class_delete.php" class="life_2">delete class</a> <span class="nav_line"></span></li>
			   </ul>
		 <li><a href="logout.php"><span>logout</span></a></li>
        </ul>
        <!--Logo And Navigation End Here--> 
<?php } ?>
              
            </div>
		</form>
      </div>
    </div>
  </div>
  <!--Top Header End Here-->


<?php 
//insert into login_record begin
$sql="SELECT * FROM `member` WHERE `email`='$id'";
$result = $conn -> query($sql) ;
$row=$result -> fetch_array();
$identity=$row[9];
$sql="INSERT INTO `lynn`.`action_record` (`name`, `act_time`, `action`, `identity`) VALUES ( '" . $id. "',now(), 'search', '" . $identity. "' );";
$result2 = $conn->query($sql);
//insert into login_record end


?>


<?PHP
if($_SESSION['email'] != null)
{}  else {
        echo '您尚未登入，請登入';
        echo '<meta http-equiv=REFRESH CONTENT=2;url=index.php>';
}

?>

        <!--slider here--> 
        <div class="copyrights">Collect from <a href="http://www.cssmoban.com/"  title="L2 Learning">L2 Learning</a></div>
        <!--  Outer wrapper for presentation only, this can be anything you like -->
       
          <!-- start Basic Jquery Slider -->
          <ul class="bjqs">
            <li>
              <h1>Search</h1>
              <p>It's a website for L2 English Learners. Hope you enjoy it !</p>
            </li>
            
          </ul>
          <!-- end Basic jQuery Slider --> 
      
        <!-- End outer wrapper --> 
        
        <!--slider end here--> 
        
      </div>
     <!--</div>-->
  </div>
</div>
<div id="main_contant">
    <div class="center_frame">
      <div id="project_84_main_contant">
<!--Header End Here--> 
<!--slider start here--> 


<?php



/*echo'	<form action="" name="sort1" method="get">
選擇排列方式:
 <Select name="ord" onchange="javascript:submit()">
 <Option Value=""></Option>
 <Option Value="eng">字首字母</Option>
 <Option Value="time">查詢時間</Option>
 <Option Value="count">查詢次數</Option>

 </Select>
 </form>';*/



 
 
$_SESSION['classEng'] = $_GET['ord'];




if(($_GET['ord'])!=null){
echo "<h2><center> 歡迎來到";
echo $_GET['ord'];
echo "教室! </center></h2>";
$classEng = $_SESSION['classEng'];
$sql="select `class_id` from `class` where `classname` = '$classEng' ";
$result = $conn -> query($sql) ;
$row = $result -> fetch_array();
$_SESSION['class'] = $row[0];
$_SESSION['classEng'] = $_GET['ord'];

echo '<table width=400 height=200 border=0 >';
echo '<tr>';

echo '<td><a href=""><img src="images/classmate_button.png" border="0"  ></a><br></td>' ;
echo '<td><a href=""><img src="images/vocupdate_button.png" border="0"  ></a><br></td>' ;
echo '<td><a href="ucp.php"><img src="images/vocparse_button.png" border="0"  ></a><br></td>';
echo '<td><a href="classRead1.php"><img src="images/vocread_button.png" border="0" title="" ></a></td><br>';
echo '<tr>';
echo '<td><a href="classPersonalword1.php"><img src="images/Personalvoc_button.png" border="0" ></a></td><br>';
echo '<td><a href="voc_test1.php"><img src="images/voctest_button.png" border="0" ></a></td><br>';
echo '<td><a href="voc_flashcard1.php"><img src="images/vocflashcard_button.png" border="0"></a></td><br> ';
//echo '<td><a href="classRoom.php">back</a></td><br> ';
echo '<td><a href="classRoom1.php"><img src="images/back_icon.png" title="回到課程總覽" border="0" width="70px" height="50px" ></a><br></td>';

}

else{
echo "<table border=0 align='center' width=80%><tr>";
 
$sql="select `classroom` from `member1` where `email` = '$id' ";
$result = $conn -> query($sql) ;
$row = $result -> fetch_array();
$classrow = $row[0];
$class = explode(",",$classrow);

echo "<td>";
echo'	<form action="" name="sort1" method="get"  >
選擇課程:
 <Select name="ord" onchange="javascript:submit()">
 <Option Value=""></Option>';
for ($i=0;$i<(count($class));$i++)
{
	$sql="select `classname` from `class` where `class_id` = '$class[$i]' ";
	$result = $conn -> query($sql) ;
	$row = $result -> fetch_array();			
	$classrow1[$i] = $row[0];	
echo $classrow1[$i];

echo "<br>";
echo "<Option Value=$classrow1[$i]>$classrow1[$i]</Option>" ;

}
echo "</td>";

echo'
 </Select>
 </form>';
echo '<td><a href="create_class.php"><img src="images/newclass_button.png" border="0" width="150px" height="40px"></a><br></td>' ;
echo '<td><a href="class_delete.php"><img src="images/deleteclass_button.png" border="0" width="150px" height="40px"></a><br></td>' ;
echo "</table>"; 

echo "<br>";

//correct
echo '<div class="CSSTableGenerator" >'; 
$sql="select `classroom` from `member1` where `email` = '$id' ";
$result = $conn -> query($sql) ;
$row = $result -> fetch_array();
$classrow = $row[0];
$class = explode(",",$classrow);
//echo "$class";
echo '<div class="CSSTableGenerator" >'; 
echo '<table width=400 height=200 border=0 >';
echo "<tr><td>class</td>";
echo "<td>已掌握數/全部單字</td>";
echo "<td>學習狀況</td></tr>";
for ($k=0; $k<count($class); $k++){
	//echo "$class[$k],";
	$sql="select `classname` from `class` where `class_id` = '$class[$k]' ";
	$result = $conn -> query($sql) ;
	$row = $result -> fetch_array();			
	$classrow1 = $row[0];	
	echo "<tr><td>";
	echo "<a href=\"classRoom1.php?ord=".$classrow1."\">".$classrow1."<a>";
	echo "</td>";
	echo "<td>";
	$sql="SELECT count(`classword1_$id`.`english` )
	FROM  `classword1_$id` 
	WHERE  `classname` =  '".$class[$k]."' &&  `classword1_$id`.`english` 
	IN (SELECT  `pass_$id`.`word` FROM  `pass_$id`)";
	$result2 = $conn -> query($sql) or die("無法執行：".mysql_error());
	$arow=$result2 -> fetch_array();
	$sql="SELECT COUNT(`classwordID`) FROM  `classword1_$id` WHERE  `classname` =  '".$class[$k]."' ";
	$result1 = $conn -> query($sql) or die("無法執行：".mysql_error());
	$brow=$result1 -> fetch_array();
	echo $arow[0];
	echo ' / ';
	echo $brow[0];
	echo "</td>";
	if($arow[0]==$brow[0]){
		if($arow[0]==0 && $brow[0]==0){
			echo "<td><font color='green'>未加入單字";
		}
	else{
		echo "<td>已完成";
	}
	}
	else{
		echo "<td><font color='red'>未完成";
	}
	//echo "<Option Value=$class[$i]>$class[$i]</Option>" ;			
	echo "</td>";
	//$array[i]=$class[$k];
	//echo "$array[i]";
	}
	echo "</tr>";
	//$newclass = implode(",", $newc_arr);
}
?>



         </div>
	</div>
</div>
</body>
</html>