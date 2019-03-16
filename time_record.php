<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta name="GENERATOR" content="Microsoft FrontPage 4.0">
<meta name="ProgId" content="FrontPage.Editor.Document">
<script type="text/javascript" language="javascript" src="jquery.js"></script>
<body>
  <!--  <form name="form1" action="" method="GET">
    <input type="hidden" id="runtime" name="runtime" value="">
</form>-->
<span id="runtime" ></span>

<script type="text/javascript">
var sec=0; var min=0; var hou=0; flag=0;
function timer(){sec++;
if(sec==60){sec=0;min+=1;}
if(min==60){min=0;hou+=1;}
if((min>0)&&(flag==0)){flag=1;}
document.getElementById("runtime").innerHTML= ""+hou+" hrs "+min+" mins "+sec+" secs";
setTimeout("timer();",1000);}
timer();
    
//var timer = document.getElementById("runtime").innerHTML;
//alert(timer);
</script>
</head>

<?php
/*include("mysql_connect.inc.php");

$time=$("#runtime").html();

$sql="insert into `endtime`(endtime) values ('$time')";
$result = $conn -> query($sql) ;
*/
?>


<!--<form name="fm0" onSubmit="0">
<font size="-1"><I><FONT COLOR="#888888">您在本網頁的停留時間:</FONT></I></font><br>
<INPUT type="text" name="time_spent" id="time_spent" size=7 onFocus="this.blur()">
</form>-->
</body>
</html>
