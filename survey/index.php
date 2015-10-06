<!DOCTYPE html>
<html lang="de">
<head>
	<meta charset="UTF-8">
	<meta name="robots" content="noindex">
	<title>Rückmeldung Hochzeit Tobias &amp; Anika</title>

	<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=0">
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
					<img class="top" src="assets/svg/wer-bist-du.svg" alt="Wer bist du" />
					<div class="bottom" >und wenn ja, wie viele?</div>
				</h1>
				<p>
					Es scheint, du hast eine Einladung zu unserer Hochzeit am 9. September in <a href="https://www.google.com/maps/place/The+Kenilworth+Club/@42.086695,-87.7153011,17z/data=!3m1!4b1!4m2!3m1!1s0x880fc522be26db83:0xd5d7eaea4f050e4c">Libertyville  bei Chicago</a> bekommen. Bitte hilf uns mit dem Ausfüllen dieses Formulars bei der Planung.
				</p>
				<p>
					Wenn du noch Inspiration für deinen USA Urlaub suchst, <a href="http://urlaub.für.tobanika.us">klicke hier</a>. Wir haben ein paar Ideen für dich zusammen gestellt. Außerdem empfehlen wir sobald wie möglich einen <a href="https://www.kayak.com/flights/BER,nearby-CHI,nearby/2016-09-03-flexible/2016-09-14-flexible">Flug</a> zu buchen.
				</p>
				<hr>
				<form action="handler.php" method="post" id="survey">
					<p class="formfield textfield">
						<input type="text" id="name" name="name" placeholder="Tobanika &amp; Anibias Lohiams" class="filled" required data-required>
						<label for="name">Name</label>
					</p>
					<p id="coming" class="formfield">
						<input type="radio" id="coming-yes" name="coming" value="yes">
						<label for="coming-yes">Ich/Wir planen zu kommen.</label>
						<br>
						<input type="radio" id="coming-maybe" name="coming" value="maybe">
						<label for="coming-maybe">Ich/Wir wollen kommen, können uns aber noch nicht festlegen.</label>
						<br>
						<input type="radio" id="coming-no" name="coming" value="no">
						<label for="coming-no">Ich/Wir werden vermutlich nicht kommen können.</label>
					</p>
					<div id="if-coming">
						<p class="formfield textfield">
							<input type="email" id="email" name="email" placeholder="us@tobanika.us" class="filled">
							<label for="email">Kontakt-Email</label>
						</p>
						<p class="formfield textfield">
							<input type="text" id="count" name="count" placeholder="2-3" class="filled">
							<label for="count">Anzahl Personen</label>
						</p>
					</div>
					<p class="submit">
						<input type="submit" id="submit" value="Abschicken">
					</p>
					<!-- verify that name and options are filled out and if one or two that also the other fields are filled out and that field 3 contains a number -->
				</form>
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
	<!-- <script src="assets/lib/jquery-validate-1.1.2.min.js"></script> -->
	<script src="assets/js/survey.min.js"></script>
</body>
</html>
