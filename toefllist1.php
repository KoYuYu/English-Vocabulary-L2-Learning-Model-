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
$sql="INSERT INTO `lynn`.`action_record` (`name`, `act_time`, `action`) VALUES ( '" . $id. "',now(), 'test' );";
$result2 = $conn->query($sql);
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
          <li><a href="search.php"><span>Search</span></a></li>
		  <li><a href="flashcard.php"><span>Flash Card</span></a></li>
          <li><a href="Toefl_test.php"><span>Toefl Test</span></a></li>
          <li><a href="parser3.php"><span>Parser</span></a></li>
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
    <div align=left style="width:125%">

<div style="width: 500px; margin: 0px auto 0 auto;">
<?php
 class SplitPage {
   var $records_per_page=100;  // 顯示筆數
   var $page=1;                      // 目前所在頁數  
   var $total_records=475;         // 資料總數
   var $total_pages=5;            // 總分頁數
   var $started_record;
   var $listPage;
   var $startPage;
   var $endPage;
   var $viewlist;
 
   function SplitPage($page, $total_records, $records_per_page, $listPage) { //物件建構
     $this->records_per_page = $records_per_page;
     $this->page                      = $page;
     $this->total_records         = $total_records;
     $this->listPage                 = $listPage;
     $this->setALL();
   }

   function setALL() {  //設定類別參數
     $this->total_pages      = ceil($this->total_records / $this->records_per_page);
     $this->started_record = $this->records_per_page * ($this->page-1);
     if($this->listPage < $this->total_pages) {
       if($this->page % $this->listPage == 0)
         $this->startPage = $this->page - $this->listPage + 1;
       else
         $this->startPage = $this->page - $this->page % $this->listPage + 1;
 
       if(($this->startPage + $this->listPage) > $this->total_pages)
         $this->endPage = $this->total_pages;
       else
         $this->endPage = ($this->startPage + $this->listPage - 1);
     }
     else {
       $this->startPage = 1;
       $this->endPage = $this->total_pages;
     }
   }
 
   function setViewList($url, $target = false) {  //產生導覽列
     if($target) $temp_target = " target='{$target}'";
     $this->viewlist = '';
     if($this->total_pages > 1) {
       if(($this->page - 1) != 0) {
         $this->viewlist .= "<a href='{$url}page=" . ($this->page - 1) ."'{$target}>prev</a> ";
         if($this->total_pages > $this->listPage)
           if(($this->startPage - $this->listPage) >= 1 and $this->page > $this->listPage) {
             $this->viewlist .= "<a href='{$url}page=1'{$target}>&lt;&lt;</a> ";
             $this->viewlist .= "<a href='{$url}page=" . ($this->startPage - $this->listPage) . "'{$target}>&lt;..</a> ";
           }
       }
 
       for($i = $this->startPage; $i <= $this->endPage; $i++)
         if($i != $this->page)
           $this->viewlist .= "<a href='{$url}page={$i}'{$target}>{$i}</a> ";
         else
           $this->viewlist .= "<b>{$i}</b> ";
 
       if(($this->page + 1) <= $this->total_pages) {
         if(($this->total_pages > $this->listPage) and ($this->endPage != $this->total_pages)){
           $this->viewlist .= "<a href='{$url}page=" . ($this->endPage + 1) . "'{$target}>..&gt;</a> ";
           $this->viewlist .= "<a href='{$url}page={$this->total_pages}'{$target}>&gt;&gt;</a> ";
         }
         $this->viewlist .= "<a href='{$url}page=" . ($this->page + 1) . "'{$target}>next</a>";
       }
     }
   }
 }
?>
<?php

include("mysql_connect.inc.php");
$sql = "select count(`english`) from `TOEFL_IS_600`";
$result = $conn -> query($sql) ;
$row=$result -> fetch_row();
 if(isset($_GET['page']) and $_GET['page'] != 0 and is_numeric($_GET['page']))  //設定目前頁數
   $nowPage = $_GET['page'];
 else
   $nowPage = 1;
 $page = new SplitPage($nowPage, $row[0], 15, 20);  //建構出 SplitPage 物件
 $page->setViewList("toefllist1.php?", 'toefllist1');  //設定導覽列資料,參數1為連結的頁面,參數2為連結的target(本參數可不設定)
 $showdata['viewlist'] = $page->viewlist; 
echo '<br>' ;
$sql = "select * from `TOEFL_IS_600` limit {$page->started_record}, {$page->records_per_page}";
$result = $conn -> query($sql) ;
//while($row=$result -> fetch_array())
//{    
//    echo $row[0]  ,'<br>' ;
//}
while($row=$result -> fetch_array())
{
    
    echo $row[2]  ," [";
    echo $row[3]  ,']<br>' ;
    
    echo '<br>';
};


foreach ($showdata as $value) 
{	
	echo "$value ";
}
