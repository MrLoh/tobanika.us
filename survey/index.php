<!DOCTYPE html>
<html lang="en">
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
			<form action="form.php" method="post">
				<h1>
					<img class="top" src="assets/svg/wer-bist-du.svg" alt="Wer bist du" />
					<div class="bottom" >und wenn ja, wie viele?</div>
				</h1>
				<p>
					Es scheint, du hast eine Einladung zu unserer Hochzeit bekommen. Bitte hilf uns mit dem Ausfüllen des unten stehendem Formulars bei der Planung.
				</p>
				<p>
					Wenn du noch Inspiration für deinen USA Urlaub suchst, <a href="http://urlaub.für.tobanika.us">klicke hier</a>, wir haben ein Paar Ideen für dich zusammen gestellt.
				</p>
				<p>
					<label for="name">Name:</label>
					<input type="text" id="name" name="name">
				</p>
				<p>
					<input type="radio" id="coming-yes" name="coming" value="yes">
					<label for="coming-yes">Wir planen zu kommen.</label>
					<br>
					<input type="radio" id="coming-maybe" name="coming" value="maybe">
					<label for="coming-maybe">Wir wollen kommen, können uns aber noch nicht festlegen.</label>
					<br>
					<input type="radio" id="coming-no" name="coming" value="no">
					<label for="coming-no">Wir werden vermutlich nicht kommen können.</label>
				</p>
				<p class="if">
					<label for="email">Unsere Kontakt-Email ist</label>:
					<input type="email" id="email" name="email">
					<br>
					<label for="count">Wir sind insgesamt <input type="text" id="count" name="count"> Personen</label>
					<br>
			        <span class="instructions">Wenn du noch nicht genau weißt, zu wievielt ihr kommt, kannst du auch so etwas wie ‘1-2’ angeben.</span>
				</p>
				<p>
					<input type="submit" value="Abschicken">
				</p>
				<!-- verify that name and options are filled out and if one or two that also the other fields are filled out and that field 3 contains a number -->
			</form>
		</div>
		<img id="flowers-bottom-right" src="assets/svg/flowers-bottom-right.svg" alt="" />
	</main>
	<script src="assets/js/survey.min.js"></script>
</body>
</html>
