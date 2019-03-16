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
if($row[0] != null) {
    echo "<font color='white'>$row[0] ,您好!</font>" ; ?>
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
        <div class="logo"> <a href="drop.php"><img src="images/search.png" alt=""  /></a> </div>
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
<?php } else{ 
    echo "<script>alert('必須為正式會員才能使用此功能'); location.href = 'member_index.php';</script>";
}
?>    



<?php 
//insert into login_record begin
$sql="SELECT * FROM `member` WHERE `email`='$id'";
$result = $conn -> query($sql) ;
$row=$result -> fetch_array();
$identity=$row[9];
$sql="INSERT INTO `lynn`.`action_record` (`name`, `act_time`, `action`, `identity`) VALUES ( '" . $id. "',now(), 'game', '" . $identity. "' );";
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
<?php 
$_SESSION['score'] = 0;
$_SESSION['incor'] = "";
?>

      
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
	<br>
	<br>

<div style="position:absolute;  top:200px; left:10px;">
<a href="javascript:redo()" align="center">start</a>
</div>
<div id="dropin" style="position:absolute;visibility:hidden;left:100;top:100;width:100;height:100">
<table border="0" cellspacing="0" cellpadding="2" >
  <tbody>
  <tr>
  <td width="100%">
    <table border="0" width="100%" cellspacing="0" cellpadding="2" align="center">
        <tbody>
		<tr>
        <td width="100%" bgcolor="#F3F3F3">
		<b><div id="div_name">方向鍵左右移動控制 方向鍵下確定</div>
		</b>
		</td>
        </tr>
      </tbody></table>
    </td>
  </tr>
</tbody></table>
</div>
<script src="http://code.jquery.com/jquery-latest.min.js" type="text/javascript"></script>
<script language="JavaScript" src="json.js"> </script>

<script language="javascript">

$(document).ready(function(){
	$(window).keydown(function(event){
		switch(event.keyCode) {
		case 40:
		dropfast();
		break;
		case 37:
		moveleft();
		break;
		case 39:
		moveright();
		break;
		}
	});
});

</script>

<script language="JavaScript1.2">
var ie=document.all
var dom=document.getElementById
var ns4=document.layers
var bouncelimit1=32 //(must be divisible by 8)
var curtop
var direction="up"
var boxheight=''

function initbox(){
if (!dom&&!ie&&!ns4)
return
crossobj=(dom)?document.getElementById("dropin").style : ie? document.all.dropin : document.dropin
scroll_top=(ie)? document.body.scrollTop : window.pageYOffset
scroll_left=(ie)? document.body.scrollLeft : window.pageYOffset
crossobj.top=scroll_top+125
crossobj.visibility=(dom||ie)? "visible" : "show"
dropstart=setInterval("dropin()",50)
}

function redo(){
clearInterval(dropstart)
	$.ajax({
		url: "ajax3.php",
		type: "GET", 
		success: function(html){
		var divs = html.split(',');
		$( '#div_name' ).html( divs[0] );
		$( '#div_name1' ).html( divs[1] );
		$( '#div_name2' ).html( divs[2] );
		$( '#div_name3' ).html( divs[3] );
		$( '#div_name4' ).html( divs[4] );
		}
	});
bouncelimit1=32
direction="up"
initbox()
}

function moveright(){
scroll_left=(ie)? document.body.scrollLeft : window.pageYOffset
if (parseInt(crossobj.left)<101)
crossobj.left=250
else if (parseInt(crossobj.left)<251)
crossobj.left=400
else if (parseInt(crossobj.left)<401)
crossobj.left=550
}

function moveleft(){
scroll_left=(ie)? document.body.scrollLeft : window.pageYOffset
if (parseInt(crossobj.left)>549)
crossobj.left=400
else if (parseInt(crossobj.left)>399)
crossobj.left=250
else if (parseInt(crossobj.left)>249)
crossobj.left=100
}


function dropin(){
scroll_top=(ie)? document.body.scrollTop : window.pageYOffset
if (parseInt(crossobj.top)<450+scroll_top)
crossobj.top=parseInt(crossobj.top)+3
else{
clearInterval(dropstart)
bouncestart1=setInterval("bouncein()",50)
}
}

function dropfast(){
scroll_top=(ie)? document.body.scrollTop : window.pageYOffset
if (parseInt(crossobj.top)<450+scroll_top)
crossobj.top=450
else{
clearInterval(dropstart)
bouncestart1=setInterval("bouncein()",50)
}
}

function bouncein(){
crossobj.top=parseInt(crossobj.top)-bouncelimit1
if (bouncelimit1<0)
bouncelimit1+=8
bouncelimit1=bouncelimit1*-1
if (bouncelimit1==0){
if (window.bouncestart1) clearInterval(bouncestart1)
crossobj.visibility="hidden"
clearInterval(bouncestart1)
bouncelimit1=32
direction="up"
	$.ajax({                                    
        url:"ajax1.php",
		data:{user_num: crossobj.left},
        type : "POST", 
		success: function(html){
		var divs = html.split(',');
		$( '#div_score' ).html( divs[0] );
		$( '#div_incor' ).html( divs[1] );
		}		
    });
redo()
}
}

function dismissbox(){
if (window.bouncestart1) clearInterval(bouncestart1)
crossobj.visibility="hidden"
}


function messageG(){
	$.ajax({
		url: "ajax3.php",
		type: "GET", 
		success: function(html){
		var divs = html.split(',');
		$( '#div_name' ).html( divs[0] );
		$( '#div_name1' ).html( divs[1] );
		$( '#div_name2' ).html( divs[2] );
		$( '#div_name3' ).html( divs[3] );
		$( '#div_name4' ).html( divs[4] );
		}
	});
}; 

function message1(){
    $.ajax({                                    
        url:"ajax1.php",
		data:{user_ans:$('#user_ans').val(),user_num: crossobj.left},
        type : "POST", 
		success: function(html){
		var divs = html.split(',');
		$( '#div_score' ).html( divs[0] );
		$( '#div_incor' ).html( divs[1] );
		}	
    });
};

window.onload=initbox

</script>

<div style='position:absolute;  top:500px; left:100px; width:125;' id="div_name1"></div>
<div style='position:absolute;  top:500px; left:250px; width:125;' id="div_name2"></div>
<div style='position:absolute;  top:500px; left:400px; width:125;' id="div_name3"></div>
<div style='position:absolute;  top:500px; left:550px; width:125;' id="div_name4"></div>

<div style='position:absolute;  top:225px; left:10px;' >分數</div>
<div style='position:absolute;  top:250px; left:10px;' id="div_score"></div>

<div style='position:absolute; top:225px; left:750px; height:300px;width:1px;'> 
  <p style='position:absolute;  bottom:0px; left:10px; width:1px;' id="div_incor"> </p>
</div>
    </p>
	</div>
    </div>
    </div>
    </div>



</body>
</html>