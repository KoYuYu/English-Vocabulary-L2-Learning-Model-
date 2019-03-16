<?php error_reporting(0); ?>
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

$sql="SELECT name FROM `member` WHERE `email`='$id';";
$result = $conn -> query($sql) ;
$row=$result -> fetch_array();

if($row[0]!=null){
echo "<font color='white'>$row[0],您好! </font>"; ?>
</div>
		</form>
      </div>
    </div>
  </div>
 </div>
  <div id="logo_nav">
     <!--<div class="bg1"> -->
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
          <li><a href="about.php"><span>About</span></a></li>
          <li><a href="logout.php"><span>logout</span></a></li>
        </ul>
         <!-- <div id="banner"> -->
          <!-- start Basic Jquery Slider -->
          <!-- end Basic jQuery Slider --> 
        <!-- </div> -->
<?php } 
/*else if($row[9]=='teacher'){
echo "<font color='white'>老師$row[1],您好! </font>";
}*/
else
{ ?>
   <?php echo "<font color='white'>FaceBook使用者 ,您好! </font>" ; ?>
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
          <li><a href="search.php"><span>Search</span></a></li>
		  <li><a href="flashcard.php"><span>Flash Card</span></a></li>
          <li><a href="Toefl_test.php"><span>Toefl Test</span></a></li>
          <li><a href="parser3.php"><span>Parser</span></a></li>
          <li><a href="drop.php"><span>Game</span></a></li>
          <li><a href="about.php"><span>About</span></a></li>
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
 
<!--Header End Here--> 
<!--slider start here--> 


<?php
$id = $_SESSION['email'];
$class = $_SESSION['class'];
//echo $_POST["1_1"];

?>   
<?php


for($i=0;$i<200;$i++){
	$newID = $_POST["ID_$i"];
	$neweng = $_POST["eng_$i"];
	$newchi = $_POST["chi_$i"];
	//echo $_POST["ID_$i"];	
	//echo $_POST["eng_$i"];	
	//echo $_POST["chi_$i"];
	//echo '<br>';
	$sql = "update `classword_$id` SET `english`='$neweng',`chinese`='$newchi'  where `classwordID`='$newID'  ";
    $result = $conn -> query($sql) or die("無法執行：".mysqli_error($conn)); 	
}
	echo '<script>alert("已更新個人單字！")</script>'; 
    echo "<script type='text/javascript'>";
    echo "window.location.href='classUpdate.php'";
    echo "</script>";
?>

<?php
/*
	$r=0;
	while($row=$res->fetch_row()){
	
	echo "<tr>";
	foreach($row as $value){
	$c=0;
	echo "<td><input type=\"text\" name=$r$c value = $value onBlur=\"this.value='changed'\"></td>";
	$c++;
	}
	echo "</tr>";
	$r++;
	}
	echo "</table>";
	$res->free();
*/
?>
    



</body>
</html>