
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

echo "<font color='white'>$row[0] ,您好!</font>" ;
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
		  <li><a href="Toefl_test.php"><span>Toefl Test</span></a></li>
          <li><a href="parser3.php"><span>Parser</span></a></li>
          <li><a href="drop.php"><span>Game</span></a></li>
          <li><a href="member_center.php"><span>Member Center</span></a>
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
<!--Header End Here--> 
<!--slider start here--> 
<div id="main_contant"> 
    <div class="center_frame">
	<div id="project_84_main_contant">
<?php
$id = $_SESSION['email'];
$phone = $_POST['phone'];
$classroom = $_POST['classroom'];
$pw = $_POST['pw'];
$pw2 = $_POST['pw2'];
echo $id ,'<br>';
if($id != null && $pw != null && $pw2 != null && $pw == $pw2 && preg_match("/09[0-9]{2}[0-9]{6}/", $phone) == true && $classroom != null)
{
       	$sql = "update member SET  `password` = '".$pw."',`phone` = '".$phone."',`classroom` = '".$classroom."' where email = '$id' ";
        if(mysqli_query($conn, $sql))
        {
                echo '<br>更新成功!<br>請重新登入!';
				unset($_SESSION['id']);
                echo '<meta http-equiv=REFRESH CONTENT=2;url=index.php>';
        }
        else
        {
                echo '<br>更新失敗!';
                //echo '<meta http-equiv=REFRESH CONTENT=2;url=update.php>';
        }
}

else if($pw == null )
{
        echo '請輸入密碼';
        echo '<meta http-equiv=REFRESH CONTENT=2;url=update.php>';
}

else if($phone = null )
{
        echo '請輸入手機號碼';
        echo '<meta http-equiv=REFRESH CONTENT=2;url=update.php>';
}


else if($id != null && $pw != null && $pw2 != null && $pw != $pw2)
{
        echo '兩次密碼不同，請重新輸入';
        echo '<meta http-equiv=REFRESH CONTENT=2;url=update.php>';
}

else if (preg_match("/09[0-9]{2}[0-9]{6}/", $phone) != true) 
{
        echo '請輸入正確手機格式';
        echo '<meta http-equiv=REFRESH CONTENT=3;url=update.php>';
}

else if($classroom = null )
{
        echo '請輸入班級';
        echo '<meta http-equiv=REFRESH CONTENT=2;url=update.php>';
}

else
{
        echo '您無權限觀看此頁面!';
        echo '<meta http-equiv=REFRESH CONTENT=2;url=index.php>';
}
?>
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
