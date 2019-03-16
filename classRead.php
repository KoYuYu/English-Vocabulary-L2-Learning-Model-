<?php error_reporting(0) ?>
<?php include_once('css/style.php');?>

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
<?php

$sql="SELECT COUNT(*) as c1 FROM `classword_$id` WHERE `classname`='$class' ";
$result = $conn -> query($sql) or die("無法執行：".mysqli_error($conn)) ;
$row=$result -> fetch_array();
//echo $row['c1'];
$countc1=$row['c1'];


$sql="SELECT COUNT(*) as c2 FROM `classword_$id` WHERE `classname`='$class' and marked ='1'";
$result = $conn -> query($sql) or die("無法執行：".mysqli_error($conn)) ;
$row=$result -> fetch_array();
//echo $row['c2'];
$countc2=$row['c2'];


if($countc1==$countc2){$checkedall="checked";}
else{$checkedall=null;}

?>
    
<!--<div class="CSSTableGenerator" >-->
     <a href="classRoom.php?ord=<?php echo $class; ?>"><img src="images/back_icon.png" title="回到此課程頁面" border="0" width="70px" height="50px" ></a><br>

<table border="1" style="margin-left:auto;margin-right:auto">
	<th colspan="3"><div><span style="margin:auto; display:table; border:1px solid black;"><?php echo "$class";?></span> </div></th>
	<tr>
		<td><input type="checkbox" id ="all" name="all" value="all" <?php echo $checkedall; ?>></td>
       <!-- <td><input type="button" id ="checkall" name="checkall" value="all" ></td>-->
		<td>英文</td>
        <td>解釋</td>
    </tr>

   <!-- <label>
    <input type="checkbox" name="chbox[]" value="">
    </label>-->

<form name="checkform" method="POST"> 
<p align="center">
    <input type="submit" name="submit" value="重點單字更新" class="button"> 
    <br>說明：重點單字可利用考試與閃字卡做練習。</p>
	   
<?php
	
	while($row=$res->fetch_row())
    {
	echo "<tr>";
    if($row[4]=='1'){$checked="checked";}
    else{$checked=null;}
    echo "<td><input type='checkbox' id='voc[]' name='voc[]' value='$row[1]' $checked></td>";
    
    echo "<td >" . $row[1] . "</td>";
    echo "<td >" . $row[2] . "</td>";
        
    echo "</tr>";
	}
	echo "";
	$res->free();


$checkvoc = $_POST['voc'];
if($_POST['submit']=="重點單字更新")
{
    $sql = "update `classword_$id` SET `marked` = 0 where `classname`='$class'";
    $result = $conn -> query($sql) or die("無法執行：".mysqli_error($conn)); 
	for($i=0; $i<sizeof($checkvoc); $i++)
    {
        $sql = "update `classword_$id` SET `marked` = 1 where `classname`='$class' and `english` = '".$checkvoc[$i]."'";
        $result = $conn -> query($sql) or die("無法執行：".mysqli_error($conn));          
    }
    
    echo '<script>alert("已更新個人單字！")</script>'; 
    echo "<script type='text/javascript'>";
    echo "window.location.href='classRead.php'";
	echo "</script>";   

}



?>

<script>
$(document).ready(function() {
    $("#all").click(function() {
    if($(this).prop("checked")){
        $("[name='voc[]']").each(function() {
            this.checked = true;
            $("#all").checked = true;
        });
    }
    else
    {
        $("[name='voc[]']").each(function() {
            this.checked = false;
            $("#all").checked = false;
        });
    }
    });
});


</script>
    </table>
    </form>






</body>
</html>