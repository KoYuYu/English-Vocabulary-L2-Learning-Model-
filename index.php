<?php include("mysql_connect.inc.php"); ?>
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
<!--  facebook login begin -->
<script>
  window.fbAsyncInit = function() {
    FB.init({
      appId      : '873360186067584',
      xfbml      : true,
      version    : 'v2.3'
    });
  };

  (function(d, s, id){
     var js, fjs = d.getElementsByTagName(s)[0];
     if (d.getElementById(id)) {return;}
     js = d.createElement(s); js.id = id;
     js.src = "//connect.facebook.net/en_US/sdk.js";
     fjs.parentNode.insertBefore(js, fjs);
   }(document, 'script', 'facebook-jssdk'));
</script>


<!--  facebook login end -->
<script>
//document.write("User-agent header sent: " + navigator.userAgent);

if(navigator.userAgent.match("MSIE")!=null)
	{
		//alert("this is IE browser!!");
	}
else if(navigator.userAgent.match("Mobile")!=null)
	{
		//alert("this is Mobile browser!!");
        location.replace('http://polochen.com/fan/index.php');
	}
else if(navigator.userAgent.match("Chrome")!=null)
	{
		//alert("this is Chrome browser!!");
	}
else if(navigator.userAgent.match("Firefox")!=null)
	{
		//alert("this is Firefox browser!!");
	}
else if(navigator.userAgent.match("Safari")!=null)
	{
		//alert("this is Safari browser!!");
	}
else if(navigator.userAgent.match("Opera")!=null)
	{
		//alert("this is Opera browser!!");
	}
else
	{
		//alert ("others!");
	}
</script>
<!--Header Start Here-->
<div id="header">
  <div id="top_header">
    <div class="center_frame">
      <div class="top">
        <form name="search" method="post" action="connect.php">
          <div class="search">
            <input type="text" value="" name="id" class="name" placeholder="帳號 username"/>
            <input type="password" value="" name="pw"  class="password" placeholder="密碼 password"/>
			<input type="submit" value=""  class="login_img"/>
            <input type="button" value=""  class="register" onclick="location.href='register.php'"/> 
            <!--<input type="button" value="FB Login"  onclick="location.href="' . $login_url . '""/> -->
			<?php
require_once("src/facebook.php");

   $config = array(
      'appId' => '873360186067584',
      'secret' => '656d341cb2d975fcde4daa83a0ddff85',
      'fileUpload' => false, // optional
      'allowSignedRequest' => false, // optional, but should be set to false for non-canvas apps
  );

  $facebook = new Facebook($config);
  $id = $facebook->getUser();
  if($id) {
		
          // We have a user ID, so probably a logged in user.
          // If not, we'll get an exception, which we handle below.
          try {
    
            $user_profile = $facebook->api('/me','GET');
            //echo "<pre>";	
            //print_r($user_profile['id']);
			//print_r($user_profile['name']);
            //echo "</pre>";
			$name=$user_profile['name'];
			$id=$user_profile['id'];
			$active='1';
			$pw=$name;
			$username=$name;
			//insert into lynn.member
			$sql = "INSERT INTO lynn.member(name, email, password, active, facebook_id) VALUES ('".$username."','".$name."','".$pw."','".$active."','".$id."') ON DUPLICATE KEY UPDATE active = 1";
			$result = $conn->query($sql);
			$sql = mysqli_query ($conn, "SELECT * FROM lynn.member WHERE email = '$id' ");
			$row = mysqli_fetch_array ($sql);
				if($id != null) {
                   
					$_SESSION['email'] = $id;
                    echo "<script>alert('登入成功！ 若要使用完整功能，請使用者註冊帳號！'); location.href = 'member_index.php';</script>";

					}
				else {
					echo "<script>alert('登入失敗！'); location.href = 'index.php';</script>";
				}
          } catch(FacebookApiException $e) {
            // If the user is logged out, you can have a 
            // user ID even though the access token is invalid.
            // In this case, we'll get an exception, so we'll
            // just ask the user to login again here.
            $login_url = $facebook->getLoginUrl(); 
            echo '<a href="' . $login_url . '"><img src="images/facebook_button.png" width="99"; height="32";></a>';
            error_log($e->getType());
            error_log($e->getMessage());
          }   
    } else {
          // No user, print a link for the user to login
          $login_url = $facebook->getLoginUrl();
          echo '<a href="' . $login_url . '"><img src="images/facebook_button.png"></a>';
    }
?>
		</div>
		</form>
       
      </div>
    </div>
  </div>
  <!--Top Header End Here-->
  <div id="logo_nav">
    <div class="bg1">
      <div class="center_frame"> 
        <!--Logo And Navigation Start Here-->
        <div class="logo"> <a href="index.html"><img src="images/logo.png" alt=""  /></a> </div>
        <ul id="navigation">
          <li><a href="index.php"><span>Please Login First</span></a></li>
        </ul>
        <!--Logo And Navigation End Here--> 
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
  </div>
  -->
  <div id="copyrights">
    <div>&copy; Copyright 2015 cycuim <a href="https://www.cycu.edu.tw/" target="_blank" title="中原">L2 Learning</a>  </div>
  </div>
<!--</div>-->

</body>
</html>
