 <?php include_once('css/style.php');?>
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
			$sql= "SELECT * FROM `moe_7000` ORDER BY RAND() LIMIT 1";
			$result = $conn -> query($sql) ;
			$row=$result -> fetch_array();
			$word=$row[1];
			$meaning=$row[2];
			$sql="INSERT INTO `flashcard_record` (`name`, `english`, `meaning`, `time`) VALUES ('" . $id. "', '$word', '$meaning', now())";
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
	   <!--
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
-->
	<body onload="myFunction()">
	<script>
	function myFunction(){
		responsiveVoice.speak('<?php echo $word;?>');
	}
	</script>
	<!--<button class="butt js--triggerAnimation" onclick="responsiveVoice.speak('<?php echo $word;?>');" type="audio" value="Play">Play</button>-->
	<input type="image" src="images/volume_icon.png" width="15%" height="15%"  class="butt js--triggerAnimation" onclick="responsiveVoice.speak('<?php echo $word;?>');" ></input>

      </div>
        <div class="back face">
		<br><br><br>
        <br><br><br>    
            <h2><?php echo "$word";?></h2>
			<h2><?php echo "$meaning";?></h2>
			<!--<script src="http://code.jquery.com/jquery-1.11.0.min.js"></script>
			<script type="text/javascript">
			$.ajax({
			url: 'msg.php',
			data: {gender: $('#gender').val()},
			success: function(ret){
					$("#myDiv").html(ret);
					}	
			});</script>-->
			<form id="gender" action="flashcard_check.php" method="post">
			<br><br>
			請選擇你會的程度<br>
			<input type="radio" name="gender" value="0"> know
			<input type="radio" name="gender" value="1"> guess
			<input type="radio" name="gender" value="2"> don't know
			<button id="submit" name="submit1" >確認送出!</button>
			</form>
            <!--<p></p> -->
		
        </div>
    </div>
</div>



<button id="answer" class="button">Reveal</button>
<button id="question" class="button">Word</button><br><br>
<!--<form action='' method='POST'>
		prev<input type="submit" value="prev" id="prev" /><br/>
 </form>-->
<?php 
 if(isset($_POST['prev'])){
$query="select `English` from flashcard_record order by time desc limit 1";
$sql= "SELECT * FROM `flashcard_record` order by time desc limit 1";
$result = $conn -> query($sql) ;
$row=$result -> fetch_array();
$word=$row[2];
}

?>
<input type="button" value="prev" align="right" class="button" onclick="javascript:history.go(-1)">
<input type="button" value="next" align="right" class="button" onclick="location.reload()"> 
</center>

