<!DOCTYPE html>
<html lang="de">
<head>
	<meta charset="UTF-8">
	<title>Vacation for Tobanika</title>

	<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=0">
	<link rel="stylesheet" href="assets/css/vacation.min.css">
	<link rel="icon" type="image/png" href="assets/favicon.png" />
	<script src="https://use.typekit.net/qtl2ghn.js"></script>
	<script>try{Typekit.load({ async: true });}catch(e){}</script>
</head>
<body>
	<?php include_once("assets/lib/analyticstracking.php") ?>
	<main>
		<section class="cards">
			<h1>Our Favorite Activities around Chicago</h1>
			<div id="chicago-activities"></div>
			<iframe class="map" frameBorder="0" src='https://a.tiles.mapbox.com/v4/mrloh.nkglep4k/zoompan.html?access_token=pk.eyJ1IjoibXJsb2giLCJhIjoibDFUSFFvcyJ9.mi-8FmeKqmdDCrBhZqGsmw'></iframe>
		</section>

		<section class="cards">
			<h1>Inspiration for Midwest and East Coast Trips</h1>
			<div id="midwest-trips"></div>
			<iframe class="map" frameBorder="0" src='https://a.tiles.mapbox.com/v4/mrloh.nkfek87e/zoompan.html?access_token=pk.eyJ1IjoibXJsb2giLCJhIjoibDFUSFFvcyJ9.mi-8FmeKqmdDCrBhZqGsmw'></iframe>
		</section>
	</main>
	<script src="chicago-activities.json"></script>
	<script src="midwest-trips.json"></script>
	<script src="assets/js/vacation.min.js" charset="utf-8"></script>
</body>
</html>
