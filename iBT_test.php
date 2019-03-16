<?php error_reporting(0); ?>
 <?php include_once('css/style.php');?>
<script language="text/javascript">
document.onkeypress=function(e){


var sec=0; var min=0; var hou=0; flag=0;
function timer(){sec++;
if(sec==60){sec=0;min+=1;}
if(min==60){min=0;hou+=1;}
if((min>0)&&(flag==0)){flag=1;}
document.getElementById("runtime").innerHTML= ""+hou+" hrs "+min+" mins "+sec+" secs";
setTimeout("timer();",1000);}
timer();
</script>
<script type="text/javascript" src="http://code.jquery.com/jquery-1.10.1.min.js"></script>
<script>

   
/*var c = 1;
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
}*/
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
    <a href="classRoom.php"><img src="images/back_icon.png" title="回到此課程頁面" border="0" width="70px" height="50px" ></a>
		<div class="center_frame">
			<div id="project_84_main_contant">
<?php
//include("mysql_connect.inc.php");
//$id = $_SESSION['email'];
$cor = $_SESSION['cor'];
//echo $id, '，您好';
//echo '<br>';
//echo '<a href="logout.php">登出</a>  <br><br>';
//echo '<a href="member_index.php">會員中心</a> <br><br>';
/*
SELECT * FROM `iBT_TOEFL` 
WHERE `English` in
(SELECT `english` FROM `quiz_voc_record`
 WHERE `member`='duncan119511@gmail.com')
ORDER BY RAND() LIMIT 1
*/
?>
<?php
if($_SESSION['count'] >5){
	$_SESSION['count'] = 0;
	//$sql="SELECT `english`FROM `quiz_voc_record` WHERE `member`='$id' AND `quiz_voc_record`.`english` NOT IN (SELECT `pass_$id`.`word` FROM `pass_$id` WHERE Length(`pass_$id`.`word`)= Length(`quiz_voc_record`.`english`) ) AND `classname` LIKE  'IBT_%' ORDER BY RAND() LIMIT 1";
	$sql="SELECT  `english` 
	FROM  `quiz_voc_record` 
	LEFT OUTER JOIN  `pass_$id` ON  `quiz_voc_record`.`english` =  `pass_$id`.`word` 
	WHERE `pass_$id`.`word` is null
	and `quiz_voc_record`.`member` =  '$id'
	AND  `quiz_voc_record`.`classname` LIKE  'IBT_%'
	ORDER BY RAND() 
	LIMIT 1";
	//echo $sql;	
	$res = $conn->query($sql) or die(mysqli_error($conn)); 
	$row=$res->fetch_row();
	$eng=$row[0];
	//echo $eng;
	$eng = preg_replace('/\'/', "'", $eng);
	//echo $eng;
	$sql="SELECT * FROM `iBT_TOEFL` where `english` like '$eng' LIMIT 1 ";
	//$sql="SELECT * FROM `iBT_TOEFL` GROUP BY `English` NOT IN (SELECT `pass_$id`.`word` FROM `pass_$id`) ORDER BY RAND() LIMIT 4";
	$res = $conn->query($sql) or die(mysqli_error($conn)); 
	$row=$res->fetch_row();
	$rann[0]=$row[0];
	$eng=$row[1];
	$core = $eng;
	$eng = preg_replace('/\'/', "\'", $eng);
	$eca = $eng;	
	$speech=$row[2];	
	$_SESSION['count']++;
}
else{
	$rrr=rand(0,99);
	$sql="SELECT  * 
	FROM  `iBT_TOEFL` 
	LEFT OUTER JOIN  `pass_$id` ON  `iBT_TOEFL`.`english` =  `pass_$id`.`word` 
	WHERE `pass_$id`.`word` is null	
	and `iBT_TOEFL`.`wordID` LIKE '%$rrr'
	ORDER BY RAND()
	LIMIT 1";
	//echo $sql;
	//$sql="SELECT * FROM `iBT_TOEFL` GROUP BY `English` NOT IN (SELECT `pass_$id`.`word` FROM `pass_$id`) ORDER BY RAND() LIMIT 4";
	$res = $conn->query($sql) or die(mysqli_error($conn)); 
	$row=$res->fetch_row();
	$rann[0]=$row[0];
	$eng=$row[1];
	//echo $eng;
	$core = $eng;
	$eng = preg_replace('/\'/', "\'", $eng);
	$eca = $eng;	
	$speech=$row[2];	
	$_SESSION['count']++;
}
?>
<!--<form name="form2" method="post" action="time_record.php">
    秒數：<input type="text" id="txt" readonly="readonly" style="width:40px;"/>
    <input type="button" value="Continue" onclick="doTimer()">
    <input type="button" value="Pause" onclick="stopCount()">-->
    <!--<input type="hidden" name="sec" id="sec" value="" onclick="messageGo()">-->
    <!--<input type="button" name="sec1" value="showsec" onclick="showsec()" >-->
<!--</form>-->

<h2><p align="left">

<?php
if($speech == "n"){
	$rrr=rand(0,99);
	$sql="SELECT * FROM `iBT_TOEFL` WHERE `English`!='$eca' AND `iBT_TOEFL`.`wordID` LIKE '%$rrr' and `Speech`='$speech' ORDER BY RAND() LIMIT 3";
	$res = $conn->query($sql) or die(mysqli_error($conn)); 

	$rhh=explode(",",$speech);
	for($i=1;$row=$res->fetch_row();$i++)
	{
		$rann[$i]=$row[0];
	}
	echo $core;
	$_SESSION['cor'] = $rann[0];
	shuffle($rann);
	$a = $rann[0];
	$b = $rann[1];
	$c = $rann[2];
	$d = $rann[3];
}
else{
  	$sql="SELECT * FROM `iBT_TOEFL` WHERE `English`!='$eca' AND `Speech`='$speech' ORDER BY RAND() LIMIT 3";
	$res = $conn->query($sql) or die(mysqli_error($conn)); 

	$rhh=explode(",",$speech);
	for($i=1;$row=$res->fetch_row();$i++)
	{
		$rann[$i]=$row[0];
	}
	echo $core;
	$_SESSION['cor'] = $rann[0];
	shuffle($rann);
	$a = $rann[0];
	$b = $rann[1];
	$c = $rann[2];
	$d = $rann[3];
}
/*
$rrr=rand(0,99);
$sql="SELECT * FROM `iBT_TOEFL` WHERE `English`!='$core' AND `iBT_TOEFL`.`wordID` LIKE '%$rrr' and `Speech`='$speech' ORDER BY RAND() LIMIT 3";
$res = $conn->query($sql) or die(mysqli_error($conn)); 

$rhh=explode(",",$speech);
for($i=1;$row=$res->fetch_row();$i++)
{
	$rann[$i]=$row[0];
	$rane[$i]=$row[1]; 
}
echo $core;
$_SESSION['cor'] = $rann[0];
shuffle($rann);
$a = $rann[0];
$b = $rann[1];
$c = $rann[2];
$d = $rann[3];
*/
?>
<script src="http://code.jquery.com/jquery-latest.min.js" type="text/javascript"></script>
<script language="javascript">
function saveword(){
    $.ajax({                                    
        url:"ajax4.php",
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

$sql="SELECT COUNT(*) FROM `save_voc_record` WHERE `english`='$row[1]' AND `member`='$id'";
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
$db=mysql_connect('localhost','s10144101','s10144101') or die('無法連上資料庫伺服器');
  mysql_select_db('lynn',$db) or die('無法連上資料庫');
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

$query="select * from `iBT_TOEFL` where `wordID` = '$a' " or die("Error in the consult.." . mysqli_error($conn)); 
$result = $conn->query($query);
if($data=mysqli_fetch_assoc($result))
{
$eca = $data['English'];
}
$query="select * from `iBT_TOEFL` where `wordID` = '$b' " or die("Error in the consult.." . mysqli_error($conn)); 
$result = $conn->query($query);
if($data=mysqli_fetch_assoc($result))
{
$ecb = $data['English'];
}
$query="select * from from `iBT_TOEFL` where `wordID` = '$c' " or die("Error in the consult.." . mysqli_error($conn)); 
$result = $conn->query($query);
if($data=mysqli_fetch_assoc($result))
{
$ecc = $data['English'];
}
$query="select * from from `iBT_TOEFL` where `wordID` = '$d' " or die("Error in the consult.." . mysqli_error($conn)); 
$result = $conn->query($query);
if($data=mysqli_fetch_assoc($result))
{
$ecd = $data['English'];
}

$query = "select * from `iBT_TOEFL` where `wordID` = '$a' " or die("Error in the consult.." . mysqli_error($conn)); 
$result = $conn->query($query);
//$sql="select * from pydict where master_id = '$a'";
//$result = mysql_query($sql) or die("無法執行：".mysql_error());
if($data=mysqli_fetch_assoc($result))
{
$sca = 	$data['speech'];
$ca = $data['Chinese'];
}

/*
$query = "select * from pydict where english = '$eca'" or die("Error in the consult.." . mysqli_error($conn)); 
$result = $conn->query($query);
if($data=mysqli_fetch_assoc($result))
{
$cca = "&nbsp".$data['chinese'];
}
*/

$query = "select * from `iBT_TOEFL` where `wordID` = '$b' " or die("Error in the consult.." . mysqli_error($conn)); 
$result = $conn->query($query);
//$sql="select * from pydict where master_id = '$b'";
//$result = mysql_query($sql) or die("無法執行：".mysql_error());
if($data=mysqli_fetch_assoc($result))
{
$scb = 	$data['speech'];
$cb = $data['Chinese'];
}
/*
$query = "select * from pydict where english = '$ecb'" or die("Error in the consult.." . mysqli_error($conn)); 
$result = $conn->query($query);
if($data=mysqli_fetch_assoc($result))
{
$ccb = "&nbsp".$data['chinese'];
}
*/

$query = "select * from `iBT_TOEFL` where `wordID` = '$c' " or die("Error in the consult.." . mysqli_error($conn)); 
$result = $conn->query($query);
//$sql="select * from pydict where master_id = '$c'";
//$result = mysql_query($sql) or die("無法執行：".mysql_error());
if($data=mysqli_fetch_assoc($result))
{
$scc = 	$data['speech'];
$cc = $data['Chinese'];
}
/*
$query = "select * from pydict where english = '$ecc'" or die("Error in the consult.." . mysqli_error($conn)); 
$result = $conn->query($query);
if($data=mysqli_fetch_assoc($result))
{
$ccc = "&nbsp".$data['chinese'];
}
*/

$query = "select * from `iBT_TOEFL` where `wordID` = '$d' " or die("Error in the consult.." . mysqli_error($conn)); 
$result = $conn->query($query);
//$sql="select * from pydict where master_id = '$d'";
//$result = mysql_query($sql) or die("無法執行：".mysql_error());

if($data=mysqli_fetch_assoc($result))
{
$scd = 	$data['speech'];
$cd = $data['Chinese'];
}
/*
$query = "select * from pydict where english = '$ecd'" or die("Error in the consult.." . mysqli_error($conn)); 
$result = $conn->query($query);
if($data=mysqli_fetch_assoc($result))
{
$ccd = "&nbsp".$data['chinese'];
}
*/
echo '<br>';
/*
//TTS function started.
if (isset($core)&& isset($core))
{
	$text=htmlentities($core);
	$filename=$core.'.mp3';
	$filename="voctested_$id".'.mp3';
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
*/
?>
 <body onload="myFunction()">
<script>
function myFunction(){
	responsiveVoice.speak('<?php echo $core;?>');
}
</script>
<!--<button class="butt js--triggerAnimation" onclick="responsiveVoice.speak('<?php echo $core;?>');" type="audio" value="Play">Play</button>-->
<input type="image" src="images/volume_icon.png" width="3%" height="5%"  class="butt js--triggerAnimation" onclick="responsiveVoice.speak('<?php echo $core;?>');" ></input>

<style>
label {
    cursor: default;
}
.bg {
    background:#84C1FF;
           }
.hvr:hover {
    background:#C4E1FF;
    width: 300px;

}
</style>
<br>
<font>確定答案後，點擊選項即可送出，或者利用鍵盤數字1~4選擇答案</font>
<br>
<br>
<br>
<form id="form1" name="form1" method="get"> 
<input type="Radio" name="ans" id="<?php echo $a; ?>" value="<?php echo $a; ?>" onclick="mouseclick1()"> <?php //echo $sca; echo $ca; //echo $cca;?>
<label for="<?php echo $a; ?>" class=hvr><?php echo "($sca)"; echo $ca; ?></label>
<br>
<br>
<input type="Radio" name="ans" id="<?php echo $b; ?>" value="<?php echo $b; ?>" onclick="mouseclick2()"> <?php //echo $scb; echo $cb; //echo $ccb;?>
<label for="<?php echo $b; ?>" class=hvr><?php echo "($scb)"; echo $cb; ?></label>
<br>
<br>
<input type="Radio" name="ans" id="<?php echo $c; ?>" value="<?php echo $c; ?>" onclick="mouseclick3()"> <?php //echo $scc; echo $cc; //echo $ccc;?>
<label for="<?php echo $c; ?>" class=hvr><?php echo "($scc)"; echo $cc; ?></label>
<br>
<br>
<input type="Radio" name="ans" id="<?php echo $d; ?>" value="<?php echo $d; ?>" onclick="mouseclick4()"> <?php //echo $scd; echo $cd;  //echo $ccd;?>
<label for="<?php echo $d; ?>" class=hvr><?php echo "($scd)"; echo $cd; ?></label>
<p>
</form>

<script language="javascript">
function mouseclick1()
{
    document.getElementById("<?php echo $a; ?>").checked = true;
    if((document.getElementById("<?php echo $a; ?>").checked)==true)
    {   
        document.getElementById("form1").submit();
    }
}
function mouseclick2()
{
    document.getElementById("<?php echo $b; ?>").checked = true;
    if((document.getElementById("<?php echo $b; ?>").checked)==true)
    {   
        document.getElementById("form1").submit();
    }
}
function mouseclick3()
{
    document.getElementById("<?php echo $c; ?>").checked = true;
    if((document.getElementById("<?php echo $c; ?>").checked)==true)
    {   
        document.getElementById("form1").submit();
    }
}
function mouseclick4()
{
    document.getElementById("<?php echo $d; ?>").checked = true;
    if((document.getElementById("<?php echo $d; ?>").checked)==true)
    {   
        document.getElementById("form1").submit();
    }
}
    
document.onkeypress=function(e){
var e=window.event || e
 
//alert("CharCode value: "+e.charCode)
//alert("Character: "+String.fromCharCode(e.charCode))

if(e.charCode == 65 || e.charCode == 49)
{
    document.getElementById("<?php echo $a; ?>").checked=true;
    document.getElementById("form1").submit();
}
else if(e.charCode == 66 || e.charCode == 50)
{
    document.getElementById("<?php echo $b; ?>").checked=true;
    document.getElementById("form1").submit();
}
else if(e.charCode == 67 || e.charCode == 51)
{
    document.getElementById("<?php echo $c; ?>").checked=true;
    document.getElementById("form1").submit();
}
else if(e.charCode == 68 || e.charCode == 52)
{
    document.getElementById("<?php echo $d; ?>").checked=true;
    document.getElementById("form1").submit();
}
}
</script>

<?php

$sql="select * from `iBT_TOEFL` where `wordID` = '$cor' " or die("Error in the consult.." . mysqli_error($conn)); 

	$result = $conn->query($sql);
	if($data=$result -> fetch_row())
	{
		$classvocab = $data[1];
		$classified = $data[4];
	}
	$classvocab = preg_replace('/\'/', "\'", $classvocab);
//echo "<br> - 分類： " . $classified ."";


if($_GET[ans] != null)
{
if($_GET[ans] == $cor)
{
	echo '<br>';
	echo '<img src="images/correct_icon.png" border="0" width=3% height=4%></a>' ;
	echo "正確 ";
	echo '<br>';
	$sql="select * from `iBT_TOEFL` where `wordID` = '$cor' " or die("Error in the consult.." . mysqli_error($conn));
	
	$result = $conn->query($sql);
	if($data=$result -> fetch_row())
	{
	$core = $data[1];
	}
	$core = preg_replace('/\'/', "\'", $core);
	$sql = "insert into quiz_voc_record (master_id, english, correct_time, error_time, time, member, classname) values ( '".$cor."','".$core."', '1',  '', now(), '".$id."' ,'iBT_".$classified."' )"; 
	$result = $conn->query($sql);
    //$sql = "update quiz_600_record SET correct_time = correct_time +1 where english = '$core'";
    //$result = $conn->query($sql);
	echo "此單字累計正確";
	$sql="SELECT COUNT(*) FROM `quiz_voc_record` WHERE `master_id`= '$cor' AND `English`= '$classvocab' AND `correct_time`= '1' AND `member` = '$id'  "or die("Error in the consult.." . mysqli_error($conn));
	$result = $conn->query($sql);
	$row=$result -> fetch_array();
	echo $row[0];
	$ct=$row[0];
	echo "次，";
	echo "錯誤";
	$sql="SELECT COUNT(*) FROM quiz_voc_record WHERE `master_id`= '$cor' AND `English`= '$classvocab' AND `correct_time`= '0' AND `member` = '$id'   " or die("Error in the consult.." . mysqli_error($conn));
	$result = $conn->query($sql);
	$row=$result -> fetch_array();
	echo $row[0];
	$rt=$row[0];
	echo "次。";
	echo '<br>';

	//echo '<br>';	
	
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
	echo '<img src="images/incorrect_icon.png" border="0" width=3% height=4%></a>' ;
	echo "錯誤";
	echo '<br>';
	$sql="select * from `iBT_TOEFL` where `wordID` = '$cor' " or die("Error in the consult.." . mysqli_error($conn));
	$result = $conn->query($sql);
	if($data=$result -> fetch_row())
	{
	$core = $data[1];
	}
	$core = preg_replace('/\'/', "\'", $core);
	$sql = "insert into quiz_voc_record (master_id, english, correct_time, error_time, time, member,classname) values ( '".$cor."','".$core."', '',  '1', now(), '".$id."', 'iBT_".$classified."')"; 
	$result = $conn->query($sql);
    //$sql = "update quiz_600_record SET error_time = error_time +1 where english = '$core'";
    //$result = $conn->query($sql);
	
	echo "此單字累計正確";
	$sql="SELECT COUNT(*) FROM quiz_voc_record WHERE `master_id`=$cor AND `English`= '$classvocab' AND `correct_time`= '1' AND `member` = '$id' " or die("Error in the consult.." . mysqli_error($conn));
	$result = $conn->query($sql);
	$row=$result -> fetch_array();
	echo $row[0];
	$ct=$row[0];
	echo "次，";
	echo "錯誤";
	$sql="SELECT COUNT(*) FROM quiz_voc_record WHERE `master_id`=$cor AND `English`= '$classvocab' AND `correct_time`= '0' AND `member` = '$id' " or die("Error in the consult.." . mysqli_error($conn));
	$result = $conn->query($sql);
	$row=$result -> fetch_array();
	echo $row[0];
	$rt=$row[0];
	echo "次。";
	echo '<br>';
	//echo $sql;	
    
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
/*
$sql="SELECT *  FROM `quiz_voc_record`  WHERE member = '$id' and correct_time = 1 AND  `classname` =  '$class' GROUP BY `english` " or die("Error in the consult.." . mysqli_error($conn));
$result = $conn -> query($sql);
if ($result -> fetch_row())
  {
  $rowcount=mysqli_num_rows($result);
  }
echo '已完成';
echo $rowcount;
echo '/';
$sql="SELECT COUNT(`classwordID`) FROM  `classword_$id` WHERE  `classname` =  '$class'";
$result = $conn -> query($sql);
$row=$result -> fetch_array();
echo $row[0];
*/
//$sql="SELECT COUNT(*) FROM `pass_$id`";

$sql="SELECT count(`iBT_TOEFL`.`English` )
	FROM  `iBT_TOEFL` 
	WHERE `iBT_TOEFL`.`English` 
	IN (SELECT  `pass_$id`.`word` FROM  `pass_$id`)";
$result = $conn -> query($sql) or die("無法執行：".mysql_error());
$row=$result -> fetch_array();
echo '已掌握';
echo $row[0];
echo '/';
$sql="SELECT COUNT(`wordID`) FROM  `iBT_TOEFL`";
$result = $conn -> query($sql);
$row=$result -> fetch_array();
echo $row[0];

$sql="select * from `iBT_TOEFL` where `wordID` = '$cor'  " or die("Error in the consult.." . mysqli_error($conn));
$result = $conn->query($sql);

while($data=$result -> fetch_array()){
echo "<br> - 英文單字： " . $data[1]. "<br>- 中文解釋：(" . $data[2] .") " . $data[3] ."";
    
echo "<br> - 單字分類： $classified";
}
//$sql="select * from pydict where english = '$core'" or die("Error in the consult.." . mysqli_error($conn));
//$result = $conn->query($sql);
//    
//while($data=$result -> fetch_array()){
//echo "<br> - 中文解釋： " . $data[2]. " ";
//}
}



?>
        </div>
      </div>
        </div>
 
  <!--Top Wrapper End Here--> 
  <!--Main Contant Start Here-->
 
<!--Wrapper End Here-->

    </head>
</body>
</html>
