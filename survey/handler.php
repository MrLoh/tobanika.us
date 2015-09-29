<?php
// get parameters
function get($n){
	return $_POST[$n];
}
$name = get('name');
$coming = get('coming');
$email = get('email');
$count = get('count');

// validate
$name_valid = strlen($name) > 2;
$coming_valid = in_array($coming,  ['yes', 'maybe', 'no']);
$email_valid = strlen($email) > 2 && preg_match('/[@]+/', $email);
$count_valid = preg_match('/[0-9]+/', $count);
$valid = $name_valid && $coming_valid && ( $coming == "no" || ($email_valid && $count_valid) );

// write to csv
$saved = false;
if ( $valid ) {
	$fp = fopen('responses.csv', 'a');
	if ( $fp && fputcsv($fp, [htmlspecialchars_decode($name),htmlspecialchars_decode($email),htmlspecialchars_decode($coming),htmlspecialchars_decode($count)]) > 0 ){
		$saved = true;
		fclose($fp);
	}
}

// compose confirmation text
$email_text = "Hallo $name, \n\n";
if ( $count == '1' ){
	if ( $coming == "yes" ){
		$subject = "Schön dass du planst zu kommen";
		$email_text .= "super dass du planst zu kommen. Wir freuen uns auf dich! ";
	}
	if ( $coming == "maybe" ){
		$subject = "Schön dass du versuchst zu kommen";
		$email_text .= "super dass du gerne kommen willst. Wir würden uns sehr freuen, wenn du es einrichten kannst. ";
	}
	$send_confirmation_text = "An deine Kontaktemail '$email' haben wir eine Bestätigungsemail geschickt. ";
} else {
	if ( $coming == "yes" ){
		$subject = "Schön dass ihr plant zu kommen";
		$email_text .= "super dass ihr plant mit $count Personen zu kommen. Wir freuen uns auf euch! ";
	}
	if ( $coming == "maybe" ){
		$subject = "Schön dass ihr versucht zu kommen";
		$email_text .= "super dass ihr gerne mit $count Personen kommen wollt. Wir würden uns sehr freuen, wenn ihr es einrichten könnt. ";
	}
	$send_confirmation_text = "An eure Kontaktemail '$email' haben wir eine Bestätigungsemail geschickt. ";
}

// send confirmation email
if ( $valid && $saved && $coming != 'no' ){
	$from = "=?UTF-8?B?".base64_encode("Tobias & Anika")."?="." <us@tobanika.us>";
	$headers = "From: $from"."\r\n"."MIME-Version: 1.0"."\r\n"."Content-type: text/html; charset=UTF-8"."\r\n";
	$body = htmlspecialchars_decode(nl2br($email_text)."<br><br>Liebe Grüße <br>Tobias & Anika");
	$subject = "=?UTF-8?B?".base64_encode($subject)."?=";
	"=?UTF-8?B?".base64_encode($from)."?=";
	$mail_success = mail($email, $subject, $body, $headers);
	if ( $mail_success ){
		$text = $email_text . $send_confirmation_text . "\n\nLiebe Grüße \nTobias & Anika";
	} else {
		$text = $email_text . "\n\nLiebe Grüße \nTobias & Anika";
	}
	mail('us@tobanika.us', 'New Wedding Survey Input', "name: $name \r\nemail: $email \r\ncoming: $coming \r\ncount: $count \r\nconfirmation mail sent? ".var_export($mail_success, true));
}
// redirect to repsonse page
header('HTTP/1.1 303 See Other');
$redirect_params = ['name' => "$name",'coming' => "$coming",'email' => "$email",'count' => "$count",'name_valid' => "$name_valid",'coming_valid' => "$coming_valid",'email_valid' => "$email_valid",'count_valid' => "$count_valid",'valid' => "$valid",'saved' => "$saved",'text' => "$text"];

$redirect_url = "danke.php?" . http_build_query($redirect_params);
header("Location: $redirect_url");
echo $redirect_url;
