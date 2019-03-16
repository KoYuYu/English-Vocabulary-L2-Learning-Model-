
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
<br><br>

<?php
$id = $_SESSION['email'];
$dom = $_POST['engtext'];
$lv = $_POST['lv'];
echo "$dom<br>";
$dom = ",$dom,";
$dom = strtolower($dom);
$dom = preg_replace("/[.,'~!@#$%^&*()_+1234567890]/",'',$dom);
$dom = preg_replace('/\s(?=)/', '<br>', $dom);
$dom = preg_replace("/s(w+s)1/i", "$1", $dom);
$dom = preg_replace('/(<br>)+/', "<br>", $dom);
$dom_arr = array_unique(explode("<br>", $dom)); 
$dom = implode(" ",$dom_arr);
if($lv == '2000'){
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
}
else if($lv == '3000'){
$sql="SELECT `word` FROM `word_2`";
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
/*
$checkvoc = $_GET['voc'];
if($_GET['submit']=="刪除單字")
{ 
    for ($i=0; $i<sizeof($checkvoc); $i++)
    {
        $sql = "update `classword_$id` SET `marked` = 1 where `english` = '".$checkvoc[$i]."'";
        $result = $conn -> query($sql) or die("無法執行：".mysqli_error($conn)); 
         
    }
    echo'<script>alert("已刪除單字！")</script>'; 
}
*/
/*
$engv = explode(",", $engtext);
$engtext = preg_replace("/[.,]/",'',$engtext);
$engtext = preg_replace('/\s(?=)/', ',', $engtext);
$engtext = preg_replace("/s(w+s)1/i", "$1", $engtext);
$engtext = preg_replace('/(<br>)+/', ",", $engtext);
*/
$engv = array_unique(explode(" ", $dom)); 
foreach ($engv as $val) {
$val = "'".$val."'";
$engv1[]=$val;
}
$abc = implode(",", $engv1);
//echo "<br>$abc<br>";
$_SESSION['classtext'] =  $dom;
$_SESSION['abc'] =  $abc;
echo "<br>以下為課程單字<br><br>";

$sql="SELECT `english`,`chinese`  FROM `pydict` WHERE `english` in (".$abc.")";
$res = $conn->query($sql);
 echo "<table border=2 align='center'><tr>";
 while($field=$res->fetch_field())
 {
   echo "<th>{$field->name}</th>";
 }
 echo "</tr>";


 while($row=$res->fetch_row()){
	echo "<tr>";
    echo "<td style=text-align:center>" . $row[0] . "</td>";
	$engv2[]="'".$row[0]."'";
    echo "<td style=text-align:center>" . $row[1] . "</td>";
	echo "<td><input type='checkbox' name='voc[]' value=$row[0] >";
	//echo ${"select.".$row[0]};
		//if(${"select.".$row[0]}==true){
		//$engv2[]="'".$row[0]."'";
		//}	
    echo "</tr>";
	}
 echo "</table>"; 
$v2 = implode(",", $engv2);
$_SESSION['v2'] =  $v2;		

?>

<p><input type="button" name="submit" value="刪除單字"></p>

<form name="search" method="post" action="uc_finish1.php">
<input id="classtext"  type="hidden"  value="<?php echo $abc; ?>"> 
<input type="submit" name="button" value="確定課程" /></p>
</form>
<form name="search" method="post" action="ucp.php">
<input type="submit" name="button" value="重新編輯" /></p>
</form>



</p>
</div> 
</div>
</div>

</body>
</html>
