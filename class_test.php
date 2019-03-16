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

<body onload="doTimer()">
<!--Header Start Here-->
<div id="header">
  <div id="top_header">
    <div class="center_frame">
      <div class="top">
        <form name="search" method="post" action="">
          <div class="search">
 <?php
session_start(); 
include("mysql_connect.inc.php");

$id = $_SESSION['email'];

$sql="SELECT name FROM `member` WHERE `email`='$id';";
$result = $conn -> query($sql) ;
$row=$result -> fetch_array();
echo "<font color='white'>$row[0] ,您好!</font>" ;
?>
		 </div></form>
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
$sql="INSERT INTO `lynn`.`action_record` (`name`, `act_time`, `action`, `identity`) VALUES ( '" . $id. "',now(), 'Toefl_test', '" . $identity. "' );";
$result2 = $conn->query($sql);
//insert into login_record end


if($row[0] == null)
{
    echo "<script>alert('必須為正式會員才能使用此功能'); location.href = 'member_index.php';</script>";?>
<?php } else{ ?>

  <div id="logo_nav">
      <div class="center_frame"> 
        <!--Logo And Navigation Start Here-->
        <div class="logo"> <a href="index.php"><img src="images/quiz.png" alt=""  /></a> </div>
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
          <?php } ?>
        <!--Logo And Navigation End Here--> 
        <!--slider here--> 
        <div class="copyrights">Collect from <a href="http://www.cssmoban.com/"  title="网站模板">网站模板</a></div>
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
  </div>
</div>
<!--Header End Here--> 
<!--slider start here--> 

<!--Wrapper Start Here-->
<onload="doTimer()">
    
<script language="javascript">
document.onkeypress=function(e){
var e=window.event || e
 
//alert("CharCode value: "+e.charCode)
//alert("Character: "+String.fromCharCode(e.charCode))

if(e.charCode == 32)
{
     location.reload();
}
}
</script>
<script type="text/javascript" src="http://code.jquery.com/jquery-1.10.1.min.js"></script>
<script>
var c = 1;
var t;
var timer_is_on = 0;

function timedCount() {
    document.getElementById('txt').value = c;
    c = c+1;
    t = setTimeout(function(){timedCount()}, 1000);
}

function doTimer() {
    if (!timer_is_on) {
        timer_is_on = 1;
        timedCount();
    }
}

function stopCount() {
    clearTimeout(t);
    timer_is_on = 0;
    
}
function showsec() {
    alert(t);
}
/*function messageGo(){
  //取得 "username" 欄位值
  var sec = $('#txt').val();                                             
    $.ajax({
        //告訴程式表單要傳送到哪裡                                         
        url:"time_record.php",                                                              
        //需要傳送的資料
        data:"&sec="+sec,  
         //使用POST方法     
        type : "POST",                                                                    
        //接收回傳資料的格式，在這個例子中，只要是接收true就可以了
        dataType:'json', 
         //傳送失敗則跳出失敗訊息      
        error:function(){                                                                 
        //資料傳送失敗後就會執行這個function內的程式，可以在這裡寫入要執行的程式  
        alert("失敗");
        },
        //傳送成功則跳出成功訊息
        success:function(){                                                           
        //資料傳送成功後就會執行這個function內的程式，可以在這裡寫入要執行的程式  
        alert("成功");
        }
    }); 
};*/
   /*$('#form2').onkeypress=function(e){
        var e=window.event || e
        if(e.charCode == 32) {
            $('#form2').submit();
        }
    }*/
    $(document).ready(function() {
	$('#form2').keypress(function(e) {
		var txt=$("#txt").val();
		var key = e.which;
		 if (key == 32) {		
			if (txt ==""){
				alert("no sec");
				}
			return false;
		}
	 });
});
    
</script>
  <div id="main_contant">
    <div class="center_frame">
      <div id="project_84_main_contant">
            <p align="center"><img src="images/TOEFL_test.png" width="170px"; height="50px">
<a href="toefllist1.php">單字清單</a><br>
<?php
$cor = $_SESSION['cor'];
$sql="SELECT `classroom` FROM `member` WHERE `email`='".$id."'";
$res = $conn->query($sql);
$row=$res->fetch_row();
$class = $row[0];
?>


<h2><p align="left">
<?php
$sql="SELECT * FROM `$class` ORDER BY RAND() LIMIT 4";
$res = $conn->query($sql); 
for($i=0;$row=$res->fetch_row();$i++)
{
	$rann[$i]=$row[0];
	$rane[$i]=$row[1]; 
}

$eca = $rane[0];
$core = $rane[0];
echo $core;
$_SESSION['cor'] = $rann[0];
shuffle($rann);
$a = $rann[0];
$b = $rann[1];
$c = $rann[2];
$d = $rann[3];
?>
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
</script>
<form id="reg" action="" method="post"> 
<input id="user_id" type="hidden" value="<?php echo $id; ?>"/> 
<input id="user_save" type="hidden" value="<?php echo $core; ?>"/> 
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
</p></h2><a href="javascript:saveword()"><div id="myDiv" ><img src="<?php echo $ischecked ?>" width="60" height="60" /></div></a>
<?php
echo '<br>';
?>
<?php

/*
$Rand = Array();
for ($i = 1; $i <= 4; $i++) 
{
    $randval = mt_rand(1,475); 
    if (in_array($randval, $Rand)) 
	{
        $i--;
    }
	else
	{
        $Rand[] = $randval;
    }
}
$a = $Rand[0];
$b = $Rand[1];
$c = $Rand[2];
$d = $Rand[3];


$db=mysql_connect('localhost','s10144101','s10144101') or die('無法連上資料庫伺服器');
  mysql_select_db('lynn',$db) or die('無法連上資料庫');

$query = "select * from TOEFL_IS_600 where id = '$a'" or die("Error in the consult.." . mysqli_error($conn)); 
//$sql="select * from pydict where master_id = '$a'";
$result = $conn->query($query); 
//$result = mysql_query($sql,$db) or die("無法執行：".mysql_error());

if($data=mysqli_fetch_assoc($result))
{
$core = $data['english'];
echo "Q: $core";
echo '<br>';
}
$_SESSION['cor'] = $a;

shuffle($Rand);
$a = $Rand[0];
$b = $Rand[1];
$c = $Rand[2];
$d = $Rand[3];
*/
$query="select * from `$class` where `classnumber` = '$a'" or die("Error in the consult.." . mysqli_error($conn)); 
$result = $conn->query($query);
if($data=mysqli_fetch_assoc($result))
{
$eca = $data['english'];
}
$query="select * from `$class` where `classnumber` = '$b'" or die("Error in the consult.." . mysqli_error($conn)); 
$result = $conn->query($query);
if($data=mysqli_fetch_assoc($result))
{
$ecb = $data['english'];
}
$query="select * from `$class` where `classnumber` = '$c'" or die("Error in the consult.." . mysqli_error($conn)); 
$result = $conn->query($query);
if($data=mysqli_fetch_assoc($result))
{
$ecc = $data['english'];
}
$query="select * from `$class` where `classnumber` = '$d'" or die("Error in the consult.." . mysqli_error($conn)); 
$result = $conn->query($query);
if($data=mysqli_fetch_assoc($result))
{
$ecd = $data['english'];
}

$query ="select * from `$class` where `classnumber` = '$a'" or die("Error in the consult.." . mysqli_error($conn)); 
$result = $conn->query($query);

if($data=mysqli_fetch_assoc($result))
{
$ca = $data['chinese'];
}
$query = "select * from `$class` where `classnumber` = '$b'" or die("Error in the consult.." . mysqli_error($conn)); 
$result = $conn->query($query);
if($data=mysqli_fetch_assoc($result))
{
$cb = $data['chinese'];
}
$query = "select * from `$class` where `classnumber` = '$c'" or die("Error in the consult.." . mysqli_error($conn)); 
$result = $conn->query($query);
if($data=mysqli_fetch_assoc($result))
{
$cc = $data['chinese'];
}
$query = "select * from `$class` where `classnumber` = '$d'" or die("Error in the consult.." . mysqli_error($conn)); 
$result = $conn->query($query);
if($data=mysqli_fetch_assoc($result))
{
$cd = $data['chinese'];
}

echo '<br>';
//TTS function started.
if (isset($core)&& isset($core))
{
	$text=htmlentities($core);
	$filename=$core.'.mp3';
	$filename="TOEFL".'.mp3';
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
//TTS function ended.
?>
<br>
<font>確定答案後，請按空白鍵確定</font>
<br>
<br>
<br>
<form id="form1" name="form1" method="get"> 
<input type="Radio" name="ans" value="<?php echo $a; ?>" > <?php echo $ca; ?>
<br>
<br>
<input type="Radio" name="ans" value="<?php echo $b; ?>" > <?php echo $cb; ?>
<br>
<br>
<input type="Radio" name="ans" value="<?php echo $c; ?>" > <?php echo $cc; ?>
<br>
<br>
<input type="Radio" name="ans" value="<?php echo $d; ?>" > <?php echo $cd; ?><p>
</form>

<script language="javascript">
document.onkeypress=function(e){
var e=window.event || e
 
//alert("CharCode value: "+e.charCode)
//alert("Character: "+String.fromCharCode(e.charCode))

if(e.charCode == 32)
{
    document.getElementById("form1").submit();
    $('#form2').submit();
}
}
</script>

<?php

if($_GET[ans] != null)
{
if($_GET[ans] == $cor)
{
    echo '<br>';
	echo '<br>';
	echo "正確";

	echo '<br>';
	$sql="select * from `$class` where `classnumber` = '$cor'" or die("Error in the consult.." . mysqli_error($conn)); 
	$result = $conn->query($sql);
	if($data=$result -> fetch_row())
	{
	$core = $data[2];
	}
	$sql = "insert into quiz_600_record (master_id, english, correct_time, error_time, time, member) values ( '".$cor."','".$core."', '1',  '', now(), '".$id."'  )"; 
	$result = $conn->query($sql);
    //$sql = "update quiz_600_record SET correct_time = correct_time +1 where english = '$core'";
    //$result = $conn->query($sql);
	echo "此單字累計正確";
	$sql="SELECT COUNT(*) AS C1 FROM quiz_600_record WHERE `master_id`=$cor AND `correct_time`= '1'" or die("Error in the consult.." . mysqli_error($conn));
	$result = $conn->query($sql);
	$row=$result -> fetch_array();
	echo $row[0];
	$ct=$row[0];
	echo "次，錯誤";
	$sql="SELECT COUNT(*) AS C2 FROM quiz_600_record WHERE `master_id`=$cor AND `correct_time`= '0'" or die("Error in the consult.." . mysqli_error($conn));
	$result = $conn->query($sql);
	$row=$result -> fetch_array();
	echo $row[0];
	$rt=$row[0];
	echo "次。";
    if(($ct-$rt)>1){	
	$sql="INSERT INTO `pass_$id` (`word`) VALUES ('$core')  ON DUPLICATE KEY UPDATE `word`='$core'";
	$result = $conn -> query($sql) or die("無法執行：".mysql_error());
	}

	$sql = "update member SET Correct = Correct +1 where email = '$id'"or die("Error in the consult.." . mysqli_error($conn));
	$result = $conn->query($sql);
    $sql="select * from member where email = '$id'" or die("Error in the consult.." . mysqli_error($conn));
    $result = $conn->query($sql);

    while($data=$result -> fetch_array()){
        if($data[7]<0){
            $sql="update member SET Correct = '0' where email = '$id'" or die("Error in the consult.." . mysqli_error($conn)); 
            $result = $conn->query($sql);
            break; 
        }
        else if($data[7]==0){
            $sql="update member SET Level = '0' where email = '$id'" or die("Error in the consult.." . mysqli_error($conn)); 
            $result = $conn->query($sql);
            break;
        }
        
        else if($data[7]>=1 && $data[7]<=5){
            $sql="update member SET Level = '1' where email = '$id'" or die("Error in the consult.." . mysqli_error($conn)); 
            $result = $conn->query($sql);
            break; 
        }
        
        else if($data[7]>=6 && $data[7]<=10){
            $sql="update member SET Level = '2' where email = '$id'" or die("Error in the consult.." . mysqli_error($conn)); 
            $result = $conn->query($sql);
            break;
        }
        
        else if($data[7]>=11 && $data[7]<=15){
            $sql="update `member` SET `Level` = '3' where email = '$id'" or die("Error in the consult.." . mysqli_error($conn)); 
            $result = $conn->query($sql);
            break;
        }
    end;
}
    //$sql = "Update TOEFL_IS_600 SET lala_correct = lala_correct +1 where english = '$core'";
    //$result = $conn->query($sql);
}
else if($_GET[ans] != $cor)
{
    echo '<br>';
	echo '<br>';
    echo "錯誤";

	echo '<br>';
	$sql="select * from `class` where `classnumber` = '$cor'" or die("Error in the consult.." . mysqli_error($conn));
	$result = $conn->query($sql);
	if($data=$result -> fetch_row())
	{
	$core = $data[2];
	}
	$sql = "insert into quiz_600_record (master_id, english, correct_time, error_time, time, member) values ( '".$cor."','".$core."', '',  '1', now(), '".$id."'  )"; 
	$result = $conn->query($sql);
    //$sql = "update quiz_600_record SET error_time = error_time +1 where english = '$core'";
    //$result = $conn->query($sql);
	echo "此單字累計正確";
	$sql="SELECT COUNT(*) AS C1 FROM quiz_600_record WHERE `master_id`=$cor AND `correct_time`= '1'" or die("Error in the consult.." . mysqli_error($conn));
	$result = $conn->query($sql);
	$row=$result -> fetch_array();
	echo $row[0];
	$ct=$row[0];
	echo "次，錯誤";
	$sql="SELECT COUNT(*) AS C2 FROM quiz_600_record WHERE `master_id`=$cor AND `correct_time`= '0'" or die("Error in the consult.." . mysqli_error($conn));
	$result = $conn->query($sql);
	$row=$result -> fetch_array();
	echo $row[0];
	$rt=$row[0];
	echo "次。";
    
	$sql = "update member SET Correct = Correct -1 where email = '$id'"or die("Error in the consult.." . mysqli_error($conn));
	$result = $conn->query($sql);
    $sql="select * from member where email = '$id'" or die("Error in the consult.." . mysqli_error($conn));
    $result = $conn->query($sql);

    while($data=$result -> fetch_array()){
        if($data[7]<0){
            $sql="update member SET Correct = '0' where email = '$id'" or die("Error in the consult.." . mysqli_error($conn)); 
            $result = $conn->query($sql);
            break; 
        }
        else if($data[7]==0){
            $sql="update member SET Level = '0' where email = '$id'" or die("Error in the consult.." . mysqli_error($conn)); 
            $result = $conn->query($sql);
            break;
        }
        
        else if($data[7]>=1 && $data[7]<=5){
            $sql="update member SET Level = '1' where email = '$id'" or die("Error in the consult.." . mysqli_error($conn)); 
            $result = $conn->query($sql);
            break; 
        }
        
        else if($data[7]>=6 && $data[7]<=10){
            $sql="update member SET Level = '2' where email = '$id'" or die("Error in the consult.." . mysqli_error($conn)); 
            $result = $conn->query($sql);
            break;
        }
        
        else if($data[7]>=11 && $data[7]<=15){
            $sql="update `member` SET `Level` = '3' where email = '$id'" or die("Error in the consult.." . mysqli_error($conn)); 
            $result = $conn->query($sql);
            break;
        }
    end;
} 
    //$sql = "Update TOEFL_IS_600 SET lala_incorrect = lala_incorrect +1 where english = '$core'";
    //$result = $conn->query($sql);
}

$sql="SELECT *  FROM `quiz_600_record`  WHERE member = '$id' and correct_time = 1 GROUP BY `english` " or die("Error in the consult.." . mysqli_error($conn));
$result = $conn -> query($sql);
if ($result -> fetch_row())
  {
  $rowcount=mysqli_num_rows($result);
  }
echo '已完成';
echo $rowcount;
echo '/475';
$sql="SELECT COUNT(*) FROM `pass_$id`";
$result = $conn -> query($sql) or die("無法執行：".mysql_error());
$row=$result -> fetch_array();
echo '已掌握';
echo $row[0];
echo '/475';

$sql="select * from `class` where `classnumber`  = '$cor'" or die("Error in the consult.." . mysqli_error($conn));
$result = $conn->query($sql);

while($data=$result -> fetch_array()){
echo "<br> - 英文單字： " . $data[1]. "<br> - 解釋： " . $data[2]. " ";
    
}

}


?>
        </div>
      </div>
        </div>
 
  <!--Top Wrapper End Here--> 
  <!--Main Contant Start Here-->
 
<!--Wrapper End Here-->
<

</body>
</html>
