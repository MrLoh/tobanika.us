<?php
include_once("config.php");

if($lang=="de"){
	$menu_blobs = array(
		"program"=>"Program",
		"hotel"=>"Hotel",
		"travel"=>"Locations",
		"registry"=>"Wunschliste",
	);
} else {
	$menu_blobs = array(
		"program"=>"Learn about events happening during the Wedding Weekend:",
		"hotel"=>"If you need accommodations for the Wedding Weekend:",
		"travel"=>"For out-of-town guests planning a longer stay in Chicago:",
		"registry"=>"See what our home could look like someday:",
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

	<title>Tobias &#x2661; Anika</title>
</head>
<body>
	<div class="home-frame">
		<img src="assets/svg/leaf_diamond.svg" alt="" class="leaf left"/>
		<img src="assets/svg/leaf_diamond.svg" alt="" class="leaf right"/>
		<img src="assets/svg/triangle_le.svg" alt="" class="triangle top left"/>
		<img src="assets/svg/triangle_ri.svg" alt="" class="triangle top right"/>
		<img src="assets/svg/triangle_bottom_le.svg" alt="" class="triangle bottom left"/>
		<img src="assets/svg/triangle_bottom_ri.svg" alt="" class="triangle bottom right"/>
		<?php include_once("assets/lib/analyticstracking.php"); ?>
		<div class="lang-link">
			<a class="home" href="<?php if($lang=="de") echo("?lang=en"); else echo("?lang=de") ?>">
				<?php if($lang=="de") echo("EN"); else echo("DE"); ?>
			</a>
		</div>
	    <main id="main" class="home">
			<div class="title">
				<div class="container">
					<img src="assets/svg/tobias_anika.svg" alt="" />
				</div>
			</div>
			<div class="wedding-date">
				<img src="<?php echo("assets/svg/date_$lang.svg"); ?>" alt="" />
				<p>
					<!-- <?php if($lang=="de") echo("9. September 2016"); else echo("September 9, 2016"); ?> -->
				</p>
			</div>
			<?php foreach($menu_items as $item=>$name){
				$blob = $menu_blobs[$item];
				echo("<p class='description'>$blob</p>");
				echo("<h1><a href='$item?lang=$lang'><img src='$item/title_$lang.svg' alt='$name' /></a></h1>");
				// echo("<h1><a href='$item?lang=$lang'>$name</a></h1>");
			} ?>
	    </main>
		<img src="assets/svg/us.svg" alt="" class="us-image"/>
	</div>
</body>
</html>
