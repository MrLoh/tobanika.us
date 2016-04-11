<?php
if($_SERVER['REMOTE_ADDR'] == '::1'){
	ini_set('display_errors', 'On');
	error_reporting(E_ALL | E_STRICT);
}

// INCLUDES
include_once("../assets/lib/markdown.php");

// FUNCTIONS
function get($var, $fallback=""){
	$val = htmlspecialchars($_GET[$var]);
	return ($val ? $val : $fallback);
}
function get_browser_language(){
	$lang = substr($_SERVER['HTTP_ACCEPT_LANGUAGE'], 0, 2);
	if($lang == "de") return "de";
	else return "en";
}

// PARAMS
$lang = get_browser_language();
$lang = get("lang", $lang);

if($lang=="de"){
	$menu_items = array(
		"hotel"=>"Hotel",
		"locations"=>"Locations",
		"program"=>"Programm",
		"registry"=>"Wunschliste",
	);
} else {
	$menu_items = array(
		"hotel"=>"Hotel",
		"locations"=>"Locations",
		"program"=>"Program",
		"registry"=>"Registry",
	);
}

// END PHP
?>

<!DOCTYPE html>
<html lang=<?php echo($lang) ?>>
<head>
	<meta charset="UTF-8">
	<meta name="robots" content="noindex">

	<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=0">
	<link rel="stylesheet" href="../assets/css/main.min.css">
	<link rel="icon" type="image/png" href="../favicon.png" />

	<script src="https://use.typekit.net/tho7pee.js"></script>
	<script>try{Typekit.load({ async: true });}catch(e){}</script>

	<title>Tobias &#x2764; Anika?></title>
</head>
<body>
	<?php include_once("../assets/lib/analyticstracking.php"); ?>
	<header>
		<nav>
			<div class="lang-link">
				<a href="<?php if($lang=="de") echo("?lang=en"); else echo("?lang=de") ?>">
					<?php if($lang=="de") echo("EN"); else echo("DE"); ?>
				</a>
			</div>
		    <ul>
		    	<li class="active"><a href="<?php echo("?lang=$lang"); ?>">Home</a></li>
				<?php foreach($menu_items as $item=>$name){
					echo("<li><a href='$item?lang=$lang'>$name</a></li>");
				} ?>
		    </ul>
		</nav>
	</header>
    <main>

    </main>
</body>
</html>
