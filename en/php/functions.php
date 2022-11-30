<?php 
include 'err.php';
function html($obj){
	$obj = htmlspecialchars($obj);
	$obj = strip_tags($obj);
	$obj = htmlentities($obj);
	return $obj;
}




$htm = "
<html>
<head>
<link rel='stylesheet' href='../bingoo/res/css/vic.css' />
<meta name='viewport' content='width=device-width' />
</head>
<body>
<script>
function copy(id){
var obj = document.getElementById(id);
obj.select();
document.execCommand('copy');
document.getElementById('copiedId').style.display = 'block';
setTimeout(closeit, 2000);
}

function closeit(){
	document.getElementById('copiedId').style.display = 'none';
}
</script>
<center>
<div id='copiedId' style='	position:fixed;
    width:100%;
	top:0;
	left:0;
	padding:20px;
	background:rgba(250,250,250,0.7);
	color:black;
	font-family:courier;
	display:none;'>
Copied !
</div>
<div class='all'>
<table>
<h3>XATHENA V6 :)</h3>";






?>