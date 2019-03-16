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
echo "<font color='white'>$row[0] ,您好!</font>" ;
?>
<?PHP
if($_SESSION['email'] != null)
{}  else {
        echo '您尚未登入，請登入';
        echo '<meta http-equiv=REFRESH CONTENT=2;url=index.php>';
}

?>
		 </div>
		</form>
       
      </div>
    </div>
  </div>
  <!--Top Header End Here-->
  <div id="logo_nav">
    <!--<div class="bg1">-->
      <div class="center_frame"> 
        <!--Logo And Navigation Start Here-->
        <div class="logo"> <a href="parser3.php"><img src="images/search.png" alt=""  /></a> </div>
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
	 <p align="center"><img src="images/search_picture.png" width="170px"; height="50px">
	 <br>
	 <br>
<?php
include('simple_html_dom.php');
include("mysql_connect.inc.php");
$text = $_POST['text'];
$dom = str_get_html("<html><body> $text </body></html>");
echo $dom;
echo '<br>';
echo '<br>';
//$ret = $dom->find('meta');
//foreach($ret as $v) {$v->outertext = '';}
$dom = strtolower($dom);
$dom = preg_replace("/[.,'~!@#$%^&*()_+1234567890]/",'',$dom);
$dom = preg_replace('/\s(?=)/', '<br>', $dom);
$dom = preg_replace("/s(w+s)1/i", "$1", $dom);
$dom = preg_replace('/(<br>)+/', "<br>", $dom);
$dom_arr = array_unique(explode("<br>", $dom)); 
$dom = implode(" ",$dom_arr);
$sql="SELECT `word` FROM `word_1`";
$res = $conn -> query($sql) or die("無法執行：".mysql_error());
while($row=$res->fetch_row())
{
  foreach($row as $value)
  {
    $dom = preg_replace("/\s$value\s/",' ',$dom);
	$dom = preg_replace("/\s($value)s\s/",' ',$dom);
	$dom = preg_replace("/\s($value)ed\s/",' ',$dom);
	$dom = preg_replace("/\s($value)ing\s/",' ',$dom);
	$dom = preg_replace("/\s($value)er\s/",' ',$dom);
	$dom = preg_replace("/\s($value)est\s/",' ',$dom);
  }
}
$sql="SELECT `word` FROM `word_n`";
$res = $conn -> query($sql) or die("無法執行：".mysql_error());
while($row=$res->fetch_row())
{
  foreach($row as $value)
  {
    $dom = preg_replace("/\s$value\s/",' ',$dom);
	$dom = preg_replace("/\s($value)s\s/",' ',$dom);
  }
}
$sql="SELECT `word` FROM `word_c`";
$res = $conn -> query($sql) or die("無法執行：".mysql_error());
while($row=$res->fetch_row())
{
  foreach($row as $value)
  {
    $dom = preg_replace("/\s$value\s/",' ',$dom);
	$dom = preg_replace("/\s($value)s\s/",' ',$dom);
  }
}
//$dom_arr = array preg_split("/<br>/", $dom);
$dom = preg_replace('/\s(?=)/', '<br>', $dom);
$dom = preg_replace("/s(w+s)1/i", "$1", $dom);
$dom = preg_replace('/(<br>)+/', "<br>", $dom);
$dom_arr = explode("<br>", $dom);
$dom_arr = array_unique($dom_arr);
foreach ($dom_arr as $value) 
{	
	echo "$value<br>";
}
?>
