
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
<script  type="text/javascript" language="javascript">
      $(document).ready(function() {
        
        $('#banner').bjqs({
          'animation' : 'slide',
          'width' : 960,
          'height' : 450
        });
        
      });
    </script>
<script type="text/javascript" src="js/pie.js" language="javascript"></script>
<style type="text/css">
ul.bjqs h1, ol.bjqs-markers li a {
	behavior: url("js/PIE.htc") !important;
}
</style>
</head>

<body>
<script>
//document.write("User-agent header sent: " + navigator.userAgent);

if(navigator.userAgent.match("Mobile")!=null)
	{
		//alert("this is Mobile browser!!");
        //location.replace('http://polochen.com/fan/index.php');
	}

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
    <div class="bg1">
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
			  <!--<ul>
			  <<li> <a href="classRoom.php" class="life_2">classroom</a> <span class="nav_line"></span></li>
              <li> <a href="student_group.php" class="life_2">student</a> <span class="nav_line"></span></li>
			  <li> <a href="cc.php" class="life_2">create class</a> <span class="nav_line"></span></li>
			  <li> <a href="class_delete.php" class="life_2">delete class</a> <span class="nav_line"></span></li>
			  </ul>--></li>
            <li><a href=""><span>Member Center</span></a>
		    <ul>
              <li> <a href="update.php" class="life_2">Update</a> <span class="nav_line"></span></li>
			  <li> <a href="searchlist.php" class="life_2">Searched words</a> <span class="nav_line"></span></li>
			  <li> <a href="toefllist.php" class="life_2">tested words</a> <span class="nav_line"></span></li>
			  <li> <a href="login_record.php" class="life_2">activity</a><span class="nav_line"></span></li>
            </ul>
		  </li>
		  <!--
		   <li1><a href=""><span>class</span></a>
			  <ul1>
			  <li1> <a href="classRoom.php" class="life_2">classroom</a> <span1 class="nav_line"></span1></li1>
              <li1> <a href="student_group.php" class="life_2">student</a> <span1 class="nav_line"></span1></li1>
			  <li1> <a href="cc.php" class="life_2">create class</a> <span1 class="nav_line"></span1></li1>
			  <li1> <a href="class_delete.php" class="life_2">delete class</a> <span1 class="nav_line"></span1></li1>
			  </ul1></li1>
          <li><a href="logout.php"><span>logout</span></a></li>
		  -->
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
<?php } 
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
            
              

		 
        <!--slider here--> 
        <div class="copyrights">Collect from <a href="http://www.cssmoban.com/"  title="L2 Learning">L2 Learning</a></div>
        <!--  Outer wrapper for presentation only, this can be anything you like -->
        <div id="banner"> 
          <!-- start Basic Jquery Slider -->
          <ul class="bjqs">
            <li>
              <h1>Homepage</h1>
              <p>It's a website for L2 English Learners. Hope you enjoy it!</p>
            </li>
            
          </ul>
          <!-- end Basic jQuery Slider --> 
        </div>
        <!-- End outer wrapper --> 
        
        <!--slider end here--> 
        
      </div>
    </div>
  </div>
</div>
<!--Header End Here--> 
<!--slider start here--> 

<!--Wrapper Start Here-->
<div id="wrapper">
  <!--<div id="wrapper_top">
    <div class="center_frame">
      <div class="section_left">
               <h5><img src="images/our_teach.png" alt=""  />We design for you.</h5>
        <p>Developing a platform for all English Learners.</p>
      </div>
      <div class="section_middle">
        <h5><img src="images/fast_reliable.png" alt=""  />Website &amp; Application</h5>
        <p>We design both Computer web page and mobile app. Learners could learn anywhere !</p>
      </div>
      <div class="section_right">
        <h5><img src="images/stay_forever.png" alt=""  />Interactive platform</h5>
        <p>Providing Teachers & Students an E-Learning interactive tool. Connecting all learners to learn together.</p>
      </div>
    </div>
  </div>-->
  <!--Top Wrapper End Here--> 
  <!--Main Contant Start Here-->
  <div id="main_contant">
    <div class="center_frame">
      <h2>3 kinds of L2 learning Tools.</h2>
      <div class="box_1"> <img src="images/1_img.png" class="img_1" alt=""  />
        <div class="text">
          <h6>Parser &amp; Search words</h6>
          <h5>We take all the necessary functions.</h5>
          <p>We try to catch the vocabulary from the article , therefore you can search the meaning of words which you don't know the mearnings. By the way we also have dictionary which you can search any word before reading!  </p>
          <a href="#"></a> </div>
        <img src="images/basic-search-icon.png" alt="" class="main_img_1" /> </div>
      <div class="box_2"> <img src="images/exam.png" alt=""  class="main_img_2" /> <img src="images/2_img.png" alt="" class="img_2" />
        <div class="text_2">
          <h6>Quick toefl test</h6>
          <h5>It just takes few minutes to know your english level.</h5>
          <p>Don't know how to improve English ability? Don't worry! Come have some tests that let we know your level. Furthermore, We'll provide the appropriate words for you!</p><p>Go ahead to sign in and enjoy!</p>
          <a href="#"></a> </div>
      </div>
      <div class="box_3"> <img src="images/3_img.png" class="img_1" alt=""  />
        <div class="text">
          <h6>Keyboard game</h6>
          <h5>Wish you can learn with enthusiasm and efficiency.</h5>
          <p>We design the interesting game for those who want to get more different experience in learning English.
              </p>
          <a href="#"></a> </div>
        <img src="images/game.png" alt="" class="main_img_3" /> </div>
    </div>
  </div>
  <!-- Main Contant End Here --> 
</div>
<!--Wrapper End Here-->
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
    <div id="fbox3"><iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d904.3177382706032!2d121.24302682372927!3d24.9568944073782!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3468221447a0f021%3A0x2b86d2650bb8bcff!2z5Lit5Y6f5aSn5a24!5e0!3m2!1sen!2stw!4v1431677106568" width="292" height="214" frameborder="0" style="border:0"></iframe>
	<span>Chung Yuan Christian University<br />
      200 Chung Pei Road, Chung Li District, Taoyuan City, Taiwan 32023, R.O.C. </span> </div>
  </div>-->
  <div id="copyrights">
  <div><a href="http://responsivevoice.org">ResponsiveVoice-NonCommercial</a> licensed under <a href="http://creativecommons.org/licenses/by-nc-nd/4.0/"><img title="ResponsiveVoice Text To Speech" src="http://responsivevoice.org/wp-content/uploads/2014/08/95x15.png" alt="95x15" width="95" height="15" /></div>
    <div>&copy; Copyright 2015 cycuim <a href="https://www.cycu.edu.tw/" target="_blank" title="中原">L2 Learning</a>  </div>
  </div>
<!--</div>-->

</body>
</html>
