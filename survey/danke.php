<?php
function get($n){
	return htmlspecialchars($_GET[$n]);
}

$name = get('name');
$coming = get('coming');
$email = get('email');
$count = get('count');

function val_t($text){
	return strlen($text) > 2;
}

function val_r($coming){
	return in_array($coming,  ['yes', 'maybe', 'no']);
}

function val_e($email){
	return strlen($email) > 2 && preg_match('/[@]+/', $email);
}

function val_n($number){
	return preg_match('/[0-9]+/', $number);
}

$valid = false;
$saved = false;

// validate
if ( val_t($name) && val_r($coming) && ($coming == 'no' || (val_e($email) && val_n($count))) ) {
	$valid = true;

	// write to csv
	$fp = fopen('responses.csv', 'a');
	if ( $fp && fputcsv($fp, [$name,$email,$coming,$count]) > 0 ){
		$saved = true;
		fclose($fp);
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
				</h1>
				<p>
					Vielen dank für deine Rückmeldung.
				</p>
				<p>
					valid: <?php if($valid){echo "true";}else{echo "false";}; ?><br>
					saved: <?php if($saved){echo "true";}else{echo "false";}; ?><br>
					name: <?php echo $name; ?><br>
					coming: <?php echo $coming; ?><br>
					email: <?php echo $email; ?><br>
					count: <?php echo $count; ?><br>
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
