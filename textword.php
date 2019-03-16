<?php error_reporting(0); ?>
<title></title>
 <?php include_once('css/style.php');?>
<body>
<script type="text/javascript" src="http://code.jquery.com/jquery-1.10.1.min.js"></script>
<form id="message_form" method="POST">
<?
 function showMsg(e) {
$(e.target).attr('disabled', true);
$.ajax({
url: 'msg.php',
error: function(xhr) {
alert('Ajax request 發生錯誤');
$(e.target).attr('disabled', false);
},
success: function(response) {
$('#msg').html(response);
$('#msg').fadeIn();
setTimeout(function(){
$('#msg').fadeOut();
$(e.target).attr('disabled', false);
}, 3000);
}
});
}?>