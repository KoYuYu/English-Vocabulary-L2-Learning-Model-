<?php
         session_start(); 
include("mysql_connect.inc.php");
$amount = 0;
$id = $_SESSION['email'];
//$i = 0;
$sql="SELECT name FROM `member` WHERE `email`='$id';";
$result = $conn -> query($sql) ;

$row=$result -> fetch_array();

if($row[0]!=null){
echo "<font color='white'>$row[0],您好! </font>"; 
}

$sql = "SELECT `classroom` FROM `member` WHERE `email`='$id';";
$result = $conn -> query($sql) ;
$classes=$result -> fetch_array();
if($classes[0]!=null){
//echo $classes;
    
    echo $classes[0];
    
}
$classes_arr = array_unique(explode(",", $classes[0])); 
echo "<br>";
    //$classes = implode(" ",$classes_arr);
for($i=0; $i<sizeof($classes_arr); $i++)
{
    
echo $classes_arr[$i], "<br>";
////$sql = "SELECT * FROM `member` WHERE `classname` LIKE '%$classes[$i]%';";
////$result = $conn -> query($sql);
////if(mysqli_query($conn, $sql))
////   {
//       $amount++;
//       echo $amount;
////   }
}
?>