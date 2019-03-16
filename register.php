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
<script type="text/javascript" src="js/pie.js" language="javascript"></script>
<script type="text/javascript" src="http://code.jquery.com/jquery-latest.min.js"></script>
<script type="text/javascript" language="javascript" src="jquery.js"></script>
<style type="text/css">
	.txtview {
		width: 200px;
		height: 30px;
		font-size: 24px;
		line-height: 24px;
		bordeR: 1px solid #ccc;
	}
    .button {
        width: 80px;
        height: 30px;
        font-size: 14px;
        background-image:url(../images/sign_up_reg.png);
    }

</style>
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

<script type="text/javascript">
$(document).ready(function(){
  $("#show").click(function(){
    if($(this).prop("checked")){
      $("#pw").prop("type","text");
    }
    else{
      $("#pw").prop("type","password");
    }
  })
})
    
$(document).ready(function(){
  $("#show2").click(function(){
    if($(this).prop("checked")){
      $("#pw2").prop("type","text");
    }
    else{
      $("#pw2").prop("type","password");
    }
  })
})
</script> 
<script type="text/javascript">
//檢驗密碼長度
pwlength = function (){
if ($('#pw').val().length >=0) {
$.ajax( {
url: 'checkpw.php',
type: 'GET',
data: {
id: $('#pw').val()
},
error: function(xhr) {
alert('Ajax request 發生錯誤');
},
success: function(response) {
$('#pw_length').html(response);
$('#pw_length').fadeIn();
}
} );
}else{
$('#pw_length').html('');
}
};
//檢驗兩次密碼是否相同    
checkpw = function (){
if ($('#pw2').val().length >=0) {
$.ajax( {
url: 'checkpw2.php',
type: 'GET',
data: {
id: $('#pw').val(),
pid: $('#pw2').val()
},
error: function(xhr) {
alert('Ajax request 發生錯誤');
},
success: function(response) {
$('#pw_notice').html(response);
$('#pw_notice').fadeIn();
}
} );
}else{
$('#pw_notice').html('');
}
};
//檢驗信箱是已被使用
checkmail = function (){
if ($('#id').val().length >=0) {
$.ajax( {
url: 'checkmail.php',
type: 'GET',
data: {
id: $('#id').val()
},
error: function(xhr) {
alert('Ajax request 發生錯誤');
},
success: function(response) {
$('#msg_user_name').html(response);
$('#msg_user_name').fadeIn();
}
} );
}else{
$('#msg_user_name').html('');
}
};


</script>
</head>

<body>

<!--Header Start Here-->
<div id="header">
  <div id="top_header">
    <div class="center_frame">
      <div class="top">
       
       
      </div>
    </div>
  </div>
  <!--Top Header End Here-->
  <div id="logo_nav">
    <!--<div class="bg1">-->
      <div class="center_frame"> 
        <!--Logo And Navigation Start Here-->
        <div class="logo"> <a href="index.html"><img src="images/logo.png" alt=""  /></a> </div>
         <ul id="navigation">
          <li><a href="index.php"><span>Home</span></a></li>
          
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
<div id="main_contant"> 
    <div class="center_frame">
        <div id="project_84_main_contant">
	 
        <div align="center">
          <form name="form1" method="post" action="register_finish.php"  font="8">
            <h2><font color="black">Register</font></h2>
              <h3>Real Name</h3><input type="text" name="name"value="" class="txtview" placeholder="真實姓名" /><br><br>
              <h3>Email</h3><input type="text" name="id" id="id" value="" class="txtview" onchange="checkmail()"; placeholder="電子信箱"/><br><span id="msg_user_name"></span><br>
              
              <h3>Password</h3><input type="password" name="pw" id="pw" value="" onchange="pwlength()" class="txtview" maxlength="16" placeholder="密碼"/><br><input type="checkbox" id="show"/>show password<br><span id="pw_length"></span><br>        
              <h3>Confirm Password</h3><input type="password" name="pw2" id="pw2" value="" onchange="checkpw();" class="txtview" placeholder="請再輸入一次密碼"/><br><input type="checkbox" id="show2" maxlength="16"/>show password<br><span id="pw_notice"></span><br>
              <h3>identity( 老師或者學生 )</h3><input type="text" name="identity" id="identity" value="" class="txtview" placeholder="身份"/><br><br>
			  <!--<h3>Class( 如果非學生可跳過 )</h3><input type="text" name="classroom" id="classroom" value="" class="txtview" placeholder="班級"/><br><br>-->
			  <h3>Phone number</h3><input type="text" name="phone" value="" class="txtview" maxlength="10" placeholder="電話號碼"/><br><br>
			  <input type="text" name="captcha" id="captcha" value="請輸入驗證碼(點圖可更換)" /><br><br>
<img onclick="this.src='captcha.php?rand='+Math.random()" src="captcha.php" title="點擊更換驗證碼" /><br><br>
			  
			<input type="submit" name="submit" value="Sign up" class="button" />
            <input type="button"  value="Cancel" onclick="location.href='index.php'" class="button"/>
          </form>
        </div>
            
                </div>
    </div>
    </div>



</body>
</html>