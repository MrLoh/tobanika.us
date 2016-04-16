<?php
include_once("config.php");

if($lang=="de"){
	$menu_blobs = array(
		"program"=>"Programm",
		"hotel"=>"Hotel",
		"locations"=>"Locations",
		"registry"=>"Wunschliste",
	);
} else {
	$menu_blobs = array(
		"program"=>"For more information about the shedule on the wedding day and the activities on Saturday, Sunday, and Monday, go to:",
		"hotel"=>"We have reserved rooms in a Courtyard Marriot Hotel and recommend you stay there for the wedding weekend, to learn more go to:",
		"locations"=>"Locations",
		"registry"=>"Registry",
	);
}

?>

<!DOCTYPE html>
<html lang=<?php echo($lang) ?>>
<head>
	<meta charset="UTF-8">
	<meta name="robots" content="noindex">

	<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=0">
	<link rel="stylesheet" href="assets/css/main.min.css">
	<link rel="icon" type="image/png" href="favicon.png" />

	<script src="https://use.typekit.net/tho7pee.js"></script>
	<script>try{Typekit.load({ async: true });}catch(e){}</script>

	<title>Tobias &#x2764; Anika</title>
</head>
<body>
	<?php include_once("assets/lib/analyticstracking.php"); ?>
	<div class="lang-link">
		<a class="home" href="<?php if($lang=="de") echo("?lang=en"); else echo("?lang=de") ?>">
			<?php if($lang=="de") echo("EN"); else echo("DE"); ?>
		</a>
	</div>
    <main id="main" class="home">
		<div class="title">
			<div class="container">
				<img src="tobias_anika.svg" alt="" />
			</div>
		</div>
		<div class="wedding-date">
			<p>
				<?php if($lang=="de") echo("9. September 2016"); else echo("September 9, 2016"); ?>
			</p>
		</div>
		<?php foreach($menu_items as $item=>$name){
			$blob = $menu_blobs[$item];
			echo("<p class='description'>$blob</p>");
			echo("<h1><a href='$item?lang=$lang'><img src='$item/title_$lang.svg' alt='$name' /></a></h1>");
		} ?>
    </main>
</body>
</html>
