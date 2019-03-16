<?php error_reporting(0) ?>
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
           <li><a href=""><span>class</span></a>
			  <ul>
			  <li> <a href="classRoom.php" class="life_2">classroom</a> <span class="nav_line"></span></li>
              <li> <a href="student_group.php" class="life_2">student</a> <span class="nav_line"></span></li>
			  <li> <a href="cc.php" class="life_2">create class</a> <span class="nav_line"></span></li>
			  <li> <a href="class_delete.php" class="life_2">delete class</a> <span class="nav_line"></span></li>
			  </ul></li>
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
<!--
 <div id="main_contant"> 
    <div class="center_frame">
	<div id="project_84_main_contant">
<p align="center"></p>
<br><br>
-->
<!--Header End Here--> 
<!--slider start here--> 

<?php
$id = $_SESSION['email'];
$class = $_SESSION['class'];
$sql="select * from `classword_$id` where `classname` = '$class'  order by `classwordID` asc ";
$res = $conn -> query($sql) or die("無法執行：".mysql_error());




?>  
<style type="text/css">
.button {
    width: 20%;  
    height: 5%;
    font-size: 20px;
}
</style>

<div id="main_contant"> 
    <div class="center_frame">
        <div id="project_84_main_contant">    
<div class="CSSTableGenerator" >

<form name="newword" method="GET" action="">
<table id="mytable" width="580" border="2" align="center" cellpadding="1" cellspacing="1" >
  <tr>
    <td width="150" class="td01">英文</td>
    <td width="200" class="td01">解釋</td>
  </tr>
  <tr>
    <td>
    <input name="name[]" type="text" size="12">
    </td>
    <td>
    <input name="content[]" type="text" size="12">
    </td>
  </tr>
  <tr>
    <td>
    <input name="name[]" type="text" size="12">
    </td>
    <td>
    <input name="content[]" type="text" size="12">
    </td>
  </tr>
      <tr>
    <td>
    <input name="name[]" type="text" size="12">
    </td>
    <td>
    <input name="content[]" type="text" size="12">
    </td>
  </tr>
      <tr>
    <td>
    <input name="name[]" type="text" size="12">
    </td>
    <td>
    <input name="content[]" type="text" size="12">
    </td>
  </tr>
    <tr>
    <td>
    <input name="name[]" type="text" size="12">
    </td>
    <td>
    <input name="content[]" type="text" size="12">
    </td>
  </tr>
</table>
            
    
    <p align="center"><input type="button" value="增加" onclick="add_new_data()">&nbsp;&nbsp;&nbsp;<input type="button" value="減少" onclick="remove_data()">&nbsp;&nbsp;&nbsp;
    <input type="submit" name="submit" value="確認"></p>
    </form>
        </div>
    </div>
</div>
</div>
<?php

$engword = $_GET['name'];
$engexpl = $_GET['content'];

if($_GET['submit']=="確認")
{   
    for($i=0; $i<sizeof($engword); $i++)
    {
        //echo $engword[$i];
        //echo $engexpl[$i];
        $sql = "insert into `classword_$id` (`english`, `chinese`, `classname`, `marked`) VALUES ('".$engword[$i]."', '".$engexpl[$i]."', '$class', '0')";
        $result = $conn -> query($sql) or die("無法執行：".mysqli_error($conn)) ;
    } 
    echo '<script>alert("已新增單字！")</script>'; 
    echo "<script type='text/javascript'>";
    echo "window.location.href='userword_update.php'";
    echo "</script>";   
}
?>

    </table>
    </form>
<script>
function add_new_data() {
 //先取得目前的row數
 var num = document.getElementById("mytable").rows.length;
 //建立新的tr 因為是從0開始算 所以目前的row數剛好為目前要增加的第幾個tr
 var Tr = document.getElementById("mytable").insertRow(num);
 //建立新的td 而Tr.cells.length就是這個tr目前的td數
 Td = Tr.insertCell(Tr.cells.length);
 //而這個就是要填入td中的innerHTML
 Td.innerHTML='<input name="name[]" type="text" size="12">';
 //這裡也可以用不同的變數來辨別不同的td (我是用同一個比較省事XD)
 Td = Tr.insertCell(Tr.cells.length);
 Td.innerHTML='<input name="content[]" type="text" size="12">';
 //這樣就好囉 記得td數目要一樣 不然會亂掉~
}
    
function remove_data() {
 //先取得目前的row數
 var num = document.getElementById("mytable").rows.length;
 //防止把標題跟原本的第一個刪除XD
 if(num >2)
 {
  //刪除最後一個
  document.getElementById("mytable").deleteRow(-1);
 }
}
</script>




</body>
</html>