<?php include("mysql_connect.inc.php"); ?>
<html>
<head>

 
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
       Flash card
    </h1>
    <br>
	<?php
			$sql= "SELECT * FROM `TOEFL_IS_600` ORDER BY RAND() LIMIT 1";
			$result = $conn -> query($sql) ;
			$row=$result -> fetch_array();
			$word=$row[2];
			$meaning=$row[6];
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
            <h2><?php echo "$meaning";?></h2>
            <!--<p></p> -->
		
        </div>
    </div>
</div>
<script type="text/javascript">
	for ($x = 1; $x <= $mysqli->affected_rows; $x++) {
    $rows[] = $result->fetch_assoc();
	}
	//var x = document.getElementById("mainbox");
	//var stuff = new Array()
	//var which = 0;

	//stuff[0] = "one";
	//stuff[1] = "two";
	//stuff[2] = "three";

	function prevcard() {
		if (which>0) {
			which --;
			x.innerHTML = stuff[which];
		}
	}

	function nextcard() {
		if (which<stuff.length-1) {
			which ++;
			x.innerHTML = stuff[which];
		}
	}
	</script>
 </head>
<body>


 <input type="button" name="back" value="Previous card" onClick="prevcard()" />&nbsp;&nbsp;&nbsp;&nbsp;
	<input type="button" name="next" value="Next card" onClick="nextcard()" />&nbsp;&nbsp;&nbsp;&nbsp;

<button id="answer">Reveal</button>
<input type="button" value="next one" align="right" onclick="location.reload()"> 

<button id="question">Question</button>
<input type="button" value="next one" align="right" onclick="location.reload()"> 
</center>

