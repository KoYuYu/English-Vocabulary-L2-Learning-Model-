<?php session_start(); ?>
<?php 
$_SESSION['score'] = 0;
$_SESSION['incor'] = "";
?>
<head>
<title></title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

</head>
<body >

<a href="javascript:redo()">start</a>
<div id="dropin" style="position:absolute;visibility:hidden;left:100;top:100;width:100;height:100">
<table border="0" cellspacing="0" cellpadding="2" >
  <tbody>
  <tr>
  <td width="100%">
    <table border="0" width="100%" cellspacing="0" cellpadding="2">
        <tbody>
		<tr>
        <td width="100%" bgcolor="#F3F3F3">
		<b><div id="div_name">左右下控制</div>
		</b>
		</td>
        </tr>
      </tbody></table>
    </td>
  </tr>
</tbody></table>
</div>
<script src="http://code.jquery.com/jquery-latest.min.js" type="text/javascript"></script>
<script language="JavaScript" src="json.js"> </script>

<script language="javascript">

$(document).ready(function(){
	$(window).keydown(function(event){
		switch(event.keyCode) {
		case 40:
		dropfast();
		break;
		case 37:
		moveleft();
		break;
		case 39:
		moveright();
		break;
		}
	});
});

</script>

<script language="JavaScript1.2">
var ie=document.all
var dom=document.getElementById
var ns4=document.layers
var bouncelimit=32 //(must be divisible by 8)
var curtop
var direction="up"
var boxheight=''

function initbox(){
if (!dom&&!ie&&!ns4)
return
crossobj=(dom)?document.getElementById("dropin").style : ie? document.all.dropin : document.dropin
scroll_top=(ie)? document.body.scrollTop : window.pageYOffset
scroll_left=(ie)? document.body.scrollLeft : window.pageYOffset
crossobj.top=scroll_top-150
crossobj.visibility=(dom||ie)? "visible" : "show"
dropstart=setInterval("dropin()",150)
}

function redo(){
clearInterval(dropstart)
	$.ajax({
		url: "ajax3.php",
		type: "GET", 
		success: function(html){
		var divs = html.split(',');
		$( '#div_name' ).html( divs[0] );
		$( '#div_name1' ).html( divs[1] );
		$( '#div_name2' ).html( divs[2] );
		$( '#div_name3' ).html( divs[3] );
		$( '#div_name4' ).html( divs[4] );
		}
	});
bouncelimit=32
direction="up"
initbox()
}

function moveright(){
scroll_left=(ie)? document.body.scrollLeft : window.pageYOffset
if (parseInt(crossobj.left)<101)
crossobj.left=250
else if (parseInt(crossobj.left)<251)
crossobj.left=400
else if (parseInt(crossobj.left)<401)
crossobj.left=550
}

function moveleft(){
scroll_left=(ie)? document.body.scrollLeft : window.pageYOffset
if (parseInt(crossobj.left)>549)
crossobj.left=400
else if (parseInt(crossobj.left)>399)
crossobj.left=250
else if (parseInt(crossobj.left)>249)
crossobj.left=100
}


function dropin(){
scroll_top=(ie)? document.body.scrollTop : window.pageYOffset
if (parseInt(crossobj.top)<500+scroll_top)
crossobj.top=parseInt(crossobj.top)+3
else{
clearInterval(dropstart)
bouncestart=setInterval("bouncein()",50)
}
}

function dropfast(){
scroll_top=(ie)? document.body.scrollTop : window.pageYOffset
if (parseInt(crossobj.top)<500+scroll_top)
crossobj.top=500
else{
clearInterval(dropstart)
bouncestart=setInterval("bouncein()",50)
}
}

function bouncein(){
crossobj.top=parseInt(crossobj.top)-bouncelimit
if (bouncelimit<0)
bouncelimit+=8
bouncelimit=bouncelimit*-1
if (bouncelimit==0){
if (window.bouncestart) clearInterval(bouncestart)
crossobj.visibility="hidden"
clearInterval(bouncestart)
bouncelimit=32
direction="up"
	$.ajax({                                    
        url:"ajax1.php",
		data:{user_num: crossobj.left},
        type : "POST", 
		success: function(html){
		var divs = html.split(',');
		$( '#div_score' ).html( divs[0] );
		$( '#div_incor' ).html( divs[1] );
		}		
    });
redo()
}
}

function dismissbox(){
if (window.bouncestart) clearInterval(bouncestart)
crossobj.visibility="hidden"
}


function messageG(){
	$.ajax({
		url: "ajax3.php",
		type: "GET", 
		success: function(html){
		var divs = html.split(',');
		$( '#div_name' ).html( divs[0] );
		$( '#div_name1' ).html( divs[1] );
		$( '#div_name2' ).html( divs[2] );
		$( '#div_name3' ).html( divs[3] );
		$( '#div_name4' ).html( divs[4] );
		}
	});
}; 

function message1(){
    $.ajax({                                    
        url:"ajax1.php",
		data:{user_ans:$('#user_ans').val(),user_num: crossobj.left},
        type : "POST", 
		success: function(html){
		var divs = html.split(',');
		$( '#div_score' ).html( divs[0] );
		$( '#div_incor' ).html( divs[1] );
		}	
    });
};

window.onload=initbox

</script>

<div style='position:absolute;  top:650px; left:100px; width:125;' id="div_name1"></div>
<div style='position:absolute;  top:650px; left:250px; width:125;' id="div_name2"></div>
<div style='position:absolute;  top:650px; left:400px; width:125;' id="div_name3"></div>
<div style='position:absolute;  top:650px; left:550px; width:125;' id="div_name4"></div>

<div style='position:absolute;  top:100px; left:10px;' >分數</div>
<div style='position:absolute;  top:125px; left:10px;' id="div_score"></div>

<div style='position:absolute; top:125px; left:750px; height:500px;width:1px;'> 
  <p style='position:absolute;  bottom:0px; left:10px; width:1px;' id="div_incor"> </p>
</div>

</body>
</html>
