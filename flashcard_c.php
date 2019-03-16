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

    .button {
        width: 80px;
        height: 30px;
        font-size: 14px;
        background-image:url(../images/sign_up_reg.png);
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
if($row[0]!=null) {
echo "<font color='white'>$row[0] ,您好! </font>" ; ?>
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
        <div class="logo"> <a href="index.html"><img src="images/search.png" alt=""  /></a> </div>
       <ul id="navigation">
          <li><a href="member_index.php"><span>Home</span></a></li>
          <li><a href="flashcard.php"><span>Flash Card</span></a>
            <ul>
              <li> <a href="flashcard.php" class="life_2">7000vocabulary</a> <span class="nav_line"></span></li>
			  <li> <a href="flashcard_s.php" class="life_2">Searched words</a> <span class="nav_line"></span></li>
			  <li> <a href="flashcard_f.php" class="life_2">favorate words</a> <span class="nav_line"></span></li>
			  <li> <a href="flashcard_c.php" class="life_2">class words</a><span class="nav_line"></span></li>
            </ul>
           </li>
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
        <!--Logo And Navigation End Here--> 
              
<?php } else {
    echo "<font color='white'>FaceBook使用者 ,您好! </font>" ; ?>
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
        <div class="logo"> <a href="index.html"><img src="images/search.png" alt=""  /></a> </div>
       <ul id="navigation">
          <li><a href="member_index.php"><span>Home</span></a></li>
          <li><a href="search.php"><span>Search</span></a></li>
		  <li><a href="flashcard.php"><span>Flash Card</span></a></li>
          <li><a href="Toefl_test.php"><span>Toefl Test</span></a></li>
          <li><a href="parser3.php"><span>Parser</span></a>
          <li><a href="drop.php"><span>Game</span></a>
          <li><a href="about.php"><span>About</span></a></li>
          <li><a href="logout.php"><span>logout</span></a></li>
        </ul>
        <!--Logo And Navigation End Here--> 
<?php } ?>

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
        <!-- End outer wrapper --> 
        
        <!--slider end here--> 
        
      </div>
     <!--</div>-->
  </div>
</div>
 
<!--Header End Here--> 
	<!-- Load jQuery from Google's CDN -->
    <script src="http://code.jquery.com/jquery-1.11.0.min.js"></script>
    <!-- Source our javascript file with the jQUERY code -->
    <script src="script.js"></script>
    <link rel="stylesheet" href="runnable.css" />
  </head>
  <body>
   <center>
    <h1>
      <p align="center"><img src="images/flashcard.png" width="170px"; height="50px">
    </h1>
	<?php
			$id = $_SESSION['email'];
			$sql= "SELECT * FROM `MIS` ORDER BY RAND() LIMIT 1";
			$result = $conn -> query($sql) ;
			$row=$result -> fetch_array();
			$word=$row[1];
			$meaning=$row[2];
			$sql="INSERT INTO `flashcard_record_$id` (`english`, `meaning`, `time` , `source`) VALUES ('$word', '$meaning', now() , 'class')";
			$result = $conn -> query($sql) ;
			//while($a=mysql_fetch_array($result)){
     //echo "id=".$a[0].", password=".$a[1].", name=".$a[2]."<br>";}
			/*for($i=0;$row=$result->fetch_row();$i++)
			{
				$word[$i]=$row[1];
				$meaning[$i]=$row[5]; 
			} */
			
			//$sql="SELECT * FROM `TOEFL_IS_600` WHERE `english`='$row[1]' AND `member`='$id'";
			//$res = $conn -> query($sql) ;
			//$row=$res -> fetch_row();
			//cardsHandle.cardAdd("Hello or Good bye","Salut");
		?>		
<div id="f1_container">
    <div id="f1_card">
        <div class="face">
            <br><br><br>
            <br><br><br>
            <h2><?php echo "$word";?></h2>
        
		<?php
			//TTS function started.
if (isset($word)&& isset($word))
{
	$text=htmlentities($word);
	$filename=$word.'.mp3';
	$filename="flashcard".'.mp3';
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
      </div>
        <div class="back face">
		<br><br><br>
        <br><br><br>    
            <h2><?php echo "$word";?></h2>
			<h2><?php echo "$meaning";?></h2>
            <!--<p></p> -->
		
        </div>
    </div>
</div>
<script src="http://code.jquery.com/jquery-1.11.0.min.js"></script>
	<script type="text/javascript">
$.ajax({
url: 'msg.php',
data: {gender: $('#gender').val()},
error: function(xhr) { .... },
success: function(response) { ... }
});
    </script>
    <br>
<form id="gender" action="" method="post">
請選擇你會的程度<br>
<input type="radio" name="location" value="know"> know
<input type="radio" name="location" value="don't know"> don't know
<input type="radio" name="location" value="guess"> guess<br>
</form>


<button id="answer" class="button">Reveal</button>
<button id="question" class="button">Word</button><br><br>
<!--<form action='' method='POST'>
		prev<input type="submit" value="prev" id="prev" /><br/>
 </form>-->
<?php 
 if(isset($_POST['prev'])){
$query="select `English` from flashcard_record WHERE `source`='class' order by time desc limit 1";
$sql= "SELECT * FROM `flashcard_record` WHERE `source`='class' order by time desc limit 1";
$result = $conn -> query($sql) ;
$row=$result -> fetch_array();
$word=$row[1];
}

?>
<input type="button" value="prev" align="right" class="button" onclick="javascript:history.go(-1)">
<input type="button" value="next" align="right" class="button" onclick="location.reload()"> 
</center>

