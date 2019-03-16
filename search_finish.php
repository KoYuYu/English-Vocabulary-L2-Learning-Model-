
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
<script type="text/javascript" src="responsivevoice.js" language="javascript"></script>
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
        <!--Logo And Navigation End Here--> 
<?php } 
/*else if($row[9]=='teacher'){
echo "<font color='white'>老師$row[1],您好! </font>";
}*/
else
{ ?>
   <?php echo "<font color='white'>FaceBook使用者 ,您好! </font>" ; ?>
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
         <!-- <div id="banner"> -->
          <!-- start Basic Jquery Slider -->
          <!-- end Basic jQuery Slider --> 
        <!-- </div> -->
<?php } 
/*else if($row[9]=='teacher'){
echo "<font color='white'>老師$row[1],您好! </font>";
}*/ ?>

	</div>
		</form>
      </div>
    </div>
</div>
<!--Header End Here--> 

<!--slider start here--> 
<div id="main_contant"> 
    <div class="center_frame">
	<div id="project_84_main_contant">
<p align="center">

<img src="images/search_finish.png" width="170px"; height="50px">
<br><br>

<?php
$id = $_SESSION['email'];
$keyword = $_POST['keyword'];

//$keyword = mysql_real_escape_string($keyword);

$query = "SELECT * from lynn.pydict WHERE english = '$keyword'" or die("Error in the consult.." . mysqli_error($conn)); 

//execute the query. 

$result = $conn->query($query); 

//display information: 
if(!empty($result)){
while($row = $result->fetch_array()) {
    
echo "$row[0] - 英文單字：$row[1] <br><br> 中文解釋：$row[2]<br>";
		$m=$row["0"];
		$e=$row["1"];
		$c=$row["2"];
		echo "曾查詢此單字:";
		$sql="SELECT COUNT(*) as c FROM `search_record` WHERE `english`= '$keyword' && `member`='$id'" or die("Error in the consult.." . mysqli_error($conn)); 
        
       $result1 = $conn->query($sql); 
       //echo $sql;
		//$result = mysql_query($sql) or die("無法執行：".mysql_error());
		//$row=mysqli_fetch_array($result);
       if(!empty($result1)){
        while($rrow = $result1->fetch_array()){
		echo $rrow['c'];
        //var_dump($rrow);
		echo "次";
		$sql="INSERT INTO `lynn`.`search_record` (`master_id`, `english`, `chinese`, `time`, `member`) VALUES ( '" . $m. "','" . $e. "', '" . $c. "',now(), '".$id."' );";
		//$result = mysql_query($sql) or die("無法執行：".mysql_error());
        $result2 = $conn->query($sql);
		echo '<br>';
        
        $sql = "update search_record SET times = ".$rrow['c']." where english = '$keyword'";
    $result3 = $conn->query($sql);
	
       }
       }
  
} 
}
else
{
 echo "查無此單字!";
}

?>
<body onload="myFunction()">
<script>
function myFunction(){
	responsiveVoice.speak('<?php echo $keyword;?>');
}
</script>
<input type="image" src="images/volume_icon.png" width="3%" height="5%"  class="butt js--triggerAnimation" onclick="responsiveVoice.speak('<?php echo $keyword;?>');" ></input>

<script src="http://code.jquery.com/jquery-latest.min.js" type="text/javascript"></script>
<script language="javascript">
function saveword(){
    $.ajax({                                    
        url:"ajax2.php",
		data:{user_save:$('#user_save').val(),user_id: $('#user_id').val()},
        type : "POST", 
		success: function(ret){
		$("#myDiv").html(ret);
		}	
    });
};
<?php

$query = "SELECT * from lynn.pydict WHERE english = '$keyword'" or die("Error in the consult.." . mysqli_error($conn)); 
$result = $conn->query($query); 
$row = $result->fetch_array()
?>


</script>
<form id="reg" action="" method="post"> 
<input id="user_id" type="hidden" value="<?php echo $id; ?>"/> 
<input id="user_save" type="hidden" value="<?php echo $row[1]; ?>"/> 
</form> 
<?php
$sql="SELECT COUNT(*) FROM `save_600_record` WHERE `english`='$row[1]' AND `member`='$id'";
$res = $conn -> query($sql) ;
$row=$res -> fetch_row();
if ($row[0] == 0)
{
	$ischecked = 'images/astar.png';
}
else
{
	$ischecked = 'images/fstar.png';
}	
?>

</p>
<br>
<br>
<form name="form" method="post" action="search.php">
 <p align="center">
<input type="submit" name="word" value="繼續查詢" />
</form>
<a href="javascript:saveword()"><div id="myDiv" ><img src="<?php echo $ischecked ?>" width="60" height="60" /></div></a></p>
<br>
<p align="center">
<?php
/*
if (isset($_POST['keyword']) && isset($_POST['keyword']))
{
	$text=htmlentities($_POST['keyword']);
	$filename=$_POST['keyword'].'.mp3';
	$filename="Search".'.mp3';
	
	$querystring = http_build_query(array(
		//you can try other language codes here like en-english,hi-hindi,es-spanish etc
		"tl" => "en",
		"q" => $text
	));
	
	if ($soundfile = file_get_contents("http://translate.google.com/translate_tts?".$querystring))
	{
		file_put_contents($filename,$soundfile);
		echo ('
			<audio autoplay="autoplay" controls="controls">
			<source src="'.$filename.'" type="audio/mp3" />
			</audio>
			<br />
			'
		);
	}
	else echo("<br />Audio could not be saved");
}
*/
?>


</p>
</div> 
</div>
</div>
<!-- 
<div id="footer">
  <div id="footer1">
    <div id="fbox1">
      <h2>Browse</h2>
      <ul>
        <li><a href="index.html">Home</a></li>
        <li><a href="about.html">About</a></li>
        <li><a href="">Project 84</a>
          <ul class="fsub-menu">
            <li><a href="project.html">Life with P84</a></li>
            <li><a href="#">Always full power</a></li>
            <li><a href="#">Media access</a></li>
            <li><a href="#">Infinite creativity4</a></li>
            <li><a href="#">How to install P84</a></li>
          </ul>
        </li>
        <li><a href="services.html">Services</a></li>
        <li><a href="contact.html">Contact</a></li>
      </ul>
      <ul>
        <li><a href="#">Frequently Asked Questions</a>
          <ul class="fsub-menu">
            <li><a href="#">Top 10 Questions</a></li>
            <li><a href="#">Is it safe?</a></li>
            <li><a href="#">What's the procedure like?</a></li>
            <li><a href="#">How much does it cost?</a></li>
            <li><a href="#">What if I die?</a></li>
          </ul>
        </li>
        <li><a href="#">Privacy Policy</a></li>
        <li><a href="#">Sitemap</a> </li>
        <li><a href="#">Job Opportunities</a></li>
        <li><a href="#">Advertisement</a></li>
      </ul>
    </div>
    <div id="fbox2">
      <h2>Connect with us</h2>
      <div class="share"> <a href="http://www.cssmoban.com" class="facebook">&nbsp;</a> <a href="http://www.cssmoban.com" class="twitter">&nbsp;</a> <a href="#" class="skype">&nbsp;</a> <a href="#" class="in">&nbsp;</a> <a href="#" class="email">&nbsp;</a> </div>
      <form name="signup" method="post" action="">
        <div class="newsletter">
          <h2>Join our newsletter</h2>
          <input name="" type="text" value="Enter you Emails" />
          <input name="" type="submit" />
          <a href="#">Click here to unsubscribe</a> </div>
      </form>
    </div>
    <div id="fbox3"> <img src="images/footer-pic.png" width="92" height="214" alt="" /> <span>PowerHouse Corporation<br />
      1534 Hi Street, Santa Felicia, CA 90563</span> </div>
  </div>
  <div id="copyrights">
    <div>&copy; Copyright 2012 PowerHouse Corporation, All Rights Reserved.More Templates <a href="http://www.cssmoban.com/" target="_blank" title="模板之家">L2 Learning</a> - Collect from <a href="http://www.cssmoban.com/" title="网页模板" target="_blank">.</a></div>
  </div>
</div>
-->
</body>
</html>
