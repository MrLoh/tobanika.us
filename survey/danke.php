<?php
// get parameters
function get($n){
	return htmlspecialchars($_GET[$n]);
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
$email_text = "Hallo $name, <br><br>";
if ( $count == '1' ){
	$subject = "Schön dass du versucht zu kommen";
	if ( $coming == "yes" ){
		$email_text .= "super dass du planst zu kommen. Wir freuen uns auf dich! ";
	}
	if ( $coming == "maybe" ){
		$email_text .= "super dass du gerne kommen willst. Wir würden uns sehr freuen, wenn du es einrichten kannst. ";
	}
	$send_confirmation_text = "An deine Kontaktemail '$email' haben wir eine Bestätigungsemail geschickt. ";
} else {
	$subject = "Schön dass ihr versucht zu kommen";
	if ( $coming == "yes" ){
		$email_text .= "super dass ihr plant mit $count Personen zu kommen. Wir freuen uns auf euch! ";
	}
	if ( $coming == "maybe" ){
		$email_text .= "super dass ihr gerne mit $count Personen kommen wollt. Wir würden uns sehr freuen, wenn ihr es einrichten könnt. ";
	}
	$send_confirmation_text = "An eure Kontaktemail '$email' haben wir eine Bestätigungsemail geschickt. ";
}

// send confirmation email
if ( $valid && $saved && $coming != 'no' ){
	$from = "=?UTF-8?B?".base64_encode("Tobias & Anika")."?="." <us@tobanika.us>";
	$headers = "From: $from"."\r\n"."Bcc: $from"."\r\n"."MIME-Version: 1.0"."\r\n"."Content-type: text/html; charset=UTF-8"."\r\n";
	$body = htmlspecialchars_decode($email_text."<br><br>Liebe Grüße <br>Tobias & Anika");
	$subject = "=?UTF-8?B?".base64_encode($subject)."?=";
	"=?UTF-8?B?".base64_encode($from)."?=";
	if ( mail($email, $subject, $body, $headers) ){
		$text = $email_text . $send_confirmation_text . "\n\nLiebe Grüße \nTobias & Anika";
	} else {
		$text = $email_text . "<br><br>Liebe Grüße <br>Tobias & Anika";
	}
}
?>

<!DOCTYPE html>
<html lang="de">
<head>
	<meta charset="UTF-8">
	<meta name="robots" content="noindex">
	<title>Rückmeldung Hochzeit Tobias &amp; Anika</title>

	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="assets/css/survey.min.css">
	<link rel="icon" type="image/png" href="assets/favicon.png" />
	<script src="https://use.typekit.net/qtl2ghn.js"></script>
	<script>try{Typekit.load({ async: true });}catch(e){}</script>
</head>
<body>
	<main>
		<img id="flowers-top-left" src="assets/svg/flowers-top-left.svg" alt="" />
		<div class="frame">
			<div class="container">
				<h1>
					<img class="top" src="assets/svg/danke.svg" alt="danke" />
					<div class="bottom">
						<?php
						if ( !$valid ){
							echo 'aber das verstehen wir nicht';
						} elseif ( !$saved ){
							echo 'aber unser Server hatte ein Problem';
						} else {
							echo 'für deine Angaben';
						}
						?>
					</div>
				</h1>
				<p>
					<?php
					// invalid notifications
					if ( !$name_valid ){
						echo "Dein Name ist doch nicht wirklich '$name', oder? ";
					}
					if ( !$coming_valid ){
						echo 'Du hast uns garnicht gesagt, ob du kommst — aber darum geht es uns eigentlich. ';
					}
					if ( $coming != "no" ){
						if ( !$email_valid ){
							echo "Die angegebene Email '$email' sieht aber nicht wie eine normale Emailadddresse aus.";
						}
						if ( !$count_valid ){
							echo "Wir haben keine Angabe zur Personsnzahl finden können, deine Angabe '$count' sollte zumindest eine Zahl enthalten.";
						}
					}
					if ( !$valid ){
						echo "</p>Bitte gehe <a href='index.php'>zurück</a> und korrigiere deine Angaben. Wenn du Fragen hast, schreibe uns an <a href='mailto:us@tobanika.us'>us@tobanika.us</a>.<p>";
					} else {
						if ( !$saved ){
							echo "Leider haben wir irgendwo Mist gebaut und deine Angaben konnten nicht gespeichert werden. Schreibe uns doch bitte eine Email an <a href='mailto:us@tobanika.us'>us@tobanika.us</a> und lass uns wissen, dass etwas schief gegangen ist.";
							mail("tobias.lohse@me.com", "Fehler in Tobanika Rückmeldung", "Speicherung fehlgeschlagen. Daten name: $name, email: $email, coming: $coming, count: $count");
						} else {
							if ( $coming == "no" ){
								echo "Schade, dass du/ihr vermutlich nicht kommen könnt.";
							} else {
								echo $text;
							}
						}
					}
					?>
				</p>
			</div>
		</div>
		<img id="flowers-bottom-right" src="assets/svg/flowers-bottom-right.svg" alt="" />
	</main>
	<footer>
		<p>
			Fragen? Schreib uns: <a href="mailto:us@tobanika.us">us@tobanika.us</a>
		</p>
	</footer>
	<script src="assets/lib/jquery-2.1.4.min.js"></script>
	<script src="assets/js/survey.min.js"></script>
</body>
</html>
