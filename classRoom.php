<?php session_start(); error_reporting(0); ?>
 <?php include_once('css/style.php');?>
 <div id="main_contant">
 <div class="center_frame">
			<div id="project_84_main_contant">
			
		<head>
		<!---------------------- 動態視窗 -------------------------->
			<meta charset="utf-8" />
		<title>Reveal Demo</title>
		
		<!-- Attach our CSS -->
	  	<link rel="stylesheet" href="reveal.css">	
	  	
		<!-- Attach necessary scripts -->
		<!-- <script type="text/javascript" src="jquery-1.4.4.min.js"></script> -->
		<script type="text/javascript" src="http://code.jquery.com/jquery-1.6.min.js"></script>
		<script type="text/javascript" src="jquery.reveal.js"></script>
		
		<style type="text/css">
			body { font-family: "HelveticaNeue","Helvetica-Neue", "Helvetica", "Arial", sans-serif; }
			.big-link { display:block; margin-top: 100px; text-align: center; font-size: 70px; color: #06f; }
		</style>
		</head>
		<body>
		<!--<a href="#" class="big-link" data-reveal-id="myModal" data-animation="none">
			None
		</a>-->
		

			<!--About Affiliates Start Here-->
  <!--<div id="affiliates">
    <div class="center_frame">
      <h1>Affiliates &#38; Contributers</h1>
      <ul class="affiliates_contributers">
      	<li><img src="images/affiliates_sprit_01.png" alt=""  /></li>
        <li><img src="images/affiliates_sprit_03.png" alt=""  /></li>
        <li><img src="images/affiliates_sprit_05.png" alt=""  /></li>
        <li><img src="images/affiliates_sprit_07.png" alt=""  /></li>
        <li><img src="images/affiliates_sprit_09.png" alt=""  /></li>
        <li><img src="images/affiliates_sprit_11.png" alt=""  /></li>
      </ul>
    </div>
  </div>
  <!--About Affiliates End Here--> 
<?php
/*echo'	<form action="" name="sort1" method="get">
選擇排列方式:
 <Select name="ord" onchange="javascript:submit()">
 <Option Value=""></Option>
 <Option Value="eng">字首字母</Option>
 <Option Value="time">查詢時間</Option>
 <Option Value="count">查詢次數</Option>
 </Select>
 </form>';*/
 ?>
<?php
$_SESSION['class'] = $_GET['ord'];
if(($_GET['ord'])!=null){
echo '<div id="about_us">';
echo '<td><a href="classRoom.php"><img src="images/back_icon.png" title="回到課程總覽" border="0" width="70px" height="50px" ></a><br></td>';	
echo "<h2><center> 歡迎來到";
echo $_GET['ord'];
echo "教室! </center></h2>";
echo '<table width=400 height=200 border=0 >';
echo '<tr>';
//echo '<td><a href=""><img src="images/classmate_button.png" border="0"  ></a><br></td>' ;
echo '<td><a href="ucp.php"><img src="images/vocparse_button.png" border="0"  ></a><br></td>';
echo '<td><a href="classRead.php"><img src="images/vocread_button.png" border="0" title="" ></a></td><br>';
echo '<td><a href="classUpdate.php"><img src="images/vocupdate_button.png" border="0"  ></a><br></td>' ;
echo '<tr>';
echo '<td><a href="classPersonalword.php"><img src="images/Personalvoc_button.png" border="0" ></a></td><br>';
echo '<td><a href="voc_test.php"><img src="images/voctest_button.png" border="0" ></a></td><br>';
echo '<td><a href="voc_flashcard.php"><img src="images/vocflashcard_button.png" border="0"></a></td><br> ';
//echo '<td><a href="classRoom.php">back</a></td><br> ';

//echo '<td><a href="userword_update.php">新增單字字表</td>';
}
else{

		echo '<div id="myModal" class="reveal-modal">';
		echo "<h1>$row[1] ,您好! </h1>";
		/*
		$sql="SELECT COUNT('word') FROM  `pass_jasonko12033@gmail.com`";
		$result3 = $conn -> query($sql) or die("無法執行：".mysql_error());
	    $row1=$result3 -> fetch_array();
		$totalcount=$row1[0];
		*/
        $sql="SELECT `act_time` FROM  `action_record` WHERE `action` = 'login' AND name ='".$id."' ORDER BY `id` DESC LIMIT 1 ";
		$result3 = $conn -> query($sql) or die("無法執行：".mysql_error());
	    $row1=$result3 -> fetch_array();
		$current_time=$row1[0];
    $current_time = date("Y-m-d",strtotime($current_time."+0 day"));
    $preday_time = date("Y-m-d",strtotime($current_time."-7 day"));
    //echo $preday_time;
    
     $sql1="SELECT COUNT( * ) ,DAY(`act_time`) as c FROM  `action_record` WHERE `action` = 'login' AND name ='".$id."' AND `act_time` BETWEEN '".$preday_time."' AND '".$current_time."%' GROUP BY DAY(`act_time`) ORDER BY `id` DESC   ";
        $result3 = $conn -> query($sql1) or die("無法執行：".mysql_error());
	    //$row2=$result3 -> fetch_array();
   // echo "<br>";
    $i=0;
    while($row2=$result3->fetch_row()){
      if($row2[0] != null )
    {
        $i++;
    }
    else 
    {
        //echo '<h3>"您已經有超過一天未登入,請加油！！"<h3>';
    } 
  
 }
    /*
     echo $i;
    echo $sql1;
    echo "<br>";
    echo 'abc';
    echo $row2[0];
       */
      
		
        
        echo '<center><h2>"';
        echo "您一週內共學習了";
        echo $i;
        echo "天";
        echo '"</h2>';
		echo '<h2>"Keep Working!"</h2></center>';
		echo '<a class="close-reveal-modal">&#215;</a>';
		echo '</div>';


	echo "<table border=0 align='center' width=80%><tr>";
	 /*
	$sql="select `classroom` from `member` where `email` = '$id' ";
	$result = $conn -> query($sql) ;
	$row = $result -> fetch_array();
	$class = explode(",",$row[0]);

	echo "<td>";
	echo'	<form action="" name="sort1" method="get"  >
	選擇課程:
	 <Select name="ord" onchange="javascript:submit()">
	 <Option Value=""></Option>';
	for ($i=0;$i<(count($class));$i++)
	{
	echo $class[$i];
	echo "<br>";
	echo "<Option Value=$class[$i]>$class[$i]</Option>" ;

	}
	echo "</td>";

	echo'
	 </Select>
	 </form>'; */
	echo '<td><a href="classRoom.php"><img src="images/classindex_button.png" border="0" width="150px" height="40px"></a><br></td>' ;
	echo '<td><br></td>';
	echo '<td><a href="cc.php"><img src="images/newclass_button.png" border="0" width="150px" height="40px"></a><br></td>' ;
	echo '<td><a href="class_delete.php"><img src="images/deleteclass_button.png" border="0" width="150px" height="40px"></a><br></td>' ;
	echo '<td><a href="voc_tested.php"><img src="images/review_icon.png" border="0" width="150px" height="40px"></a><br></td>' ;
	echo '<td><br></td>';
	echo '<td><br></td>';
	echo '<td><a href="iBT_test.php"><img src="images/iBT_button.png" border="0" width="150px" height="40px"></a><br></td>' ;
	echo "</table>"; 

	echo "<br>";
	echo '<div class="CSSTableGenerator" >'; 
	$sql="select `classroom` from `member` where `email` = '$id' ";
	$result = $conn -> query($sql) ;
	$row = $result -> fetch_array();
	$class = explode(",",$row[0]);

	echo "<table border=0 align='center' width=50%>";
	echo "<tr><td>class</td>";
	echo "<td>已掌握數/全部單字</td>";
	echo "<td>學習狀況</td></tr>";
	for ($i=0;$i<(count($class));$i++)
	{
	echo "<tr><td>";
	echo "<a href=\"classRoom.php?ord=".$class[$i]."\">".$class[$i]."<a>";
	echo "</td>";
	echo "<td>";
	$sql="SELECT count(`classword_$id`.`english` )
		FROM  `classword_$id` 
		WHERE  `classname` =  '".$class[$i]."' &&  `classword_$id`.`english` 
		IN (SELECT  `pass_$id`.`word` FROM  `pass_$id`)";
	$result2 = $conn -> query($sql) or die("無法執行：".mysql_error());
	$arow=$result2 -> fetch_array();

	$sql="SELECT COUNT(`classwordID`) FROM  `classword_$id` WHERE  `classname` =  '".$class[$i]."' ";
	$result1 = $conn -> query($sql) or die("無法執行：".mysql_error());
	$brow=$result1 -> fetch_array();

	echo $arow[0];
	echo ' / ';
	echo $brow[0];
	echo "</td>";
	if($arow[0]==$brow[0]){
		if($arow[0]==0 && $brow[0]==0){
			echo "<td><font color='green'>未加入單字";
		}
		else{
		echo "<td>已完成";
		}
	}
	else{
		echo "<td><font color='red'>未完成";
	}
	//echo "<Option Value=$class[$i]>$class[$i]</Option>" ;
	}
	echo "</td>";
	echo "</tr>";
	echo'
	 </Select>
	 </form>';
	 
}
?>
<script type="text/javascript">
  $(document).ready(function() {
      $('#myModal').reveal();
   });
</script>
<!---------------------- 動態視窗 -------------------------->
         </div>
	</div>
</div>
</body>
</html>