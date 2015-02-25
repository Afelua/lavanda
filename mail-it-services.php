<?php

/* Code by David McKeown - craftedbydavid.com */
/* Editable entries are bellow */

$send_to = "e.semenova@serenity.spb.ru";
$send_subject = "Ajax form ";



/*Be careful when editing below this line */

$f_name = cleanupentries($_POST["name"]);
$f_phone = cleanupentries($_POST["phone"]);
$f_check = cleanupentries($_POST["check"]);
$from_ip = $_SERVER['REMOTE_ADDR'];
$from_browser = $_SERVER['HTTP_USER_AGENT'];

function cleanupentries($entry) {
	$entry = trim($entry);
	$entry = stripslashes($entry);
	$entry = htmlspecialchars($entry);

	return $entry;
}

$message = "Заявка отправлена " . date('m-d-Y') . 
"\n\nИмя: " . $f_name . 
"\n\nТелефон: " . $f_phone . 
"\n\nУслуга: " . $f_check . 
"\n\n\nTechnical Details:\n" . $from_ip . "\n" . $from_browser;

$send_subject .= " - {$f_name}";

$headers = "From: " . $f_phone . "\r\n" .
    "Reply-To: " . $f_phone . "\r\n" .
    "X-Mailer: PHP/" . phpversion();

if (!$f_phone) {
	echo "no email";
	exit;
}else if (!$f_name){
	echo "no name";
	exit;
}else{
	
		mail($send_to, $send_subject, $message, $headers);
		echo "true";
}

?>