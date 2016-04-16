<?php
include_once("../assets/lib/markdown.php");
include_once("../config.php");
$title = $menu_items[$dir];
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

	<title>Tobias &#x2764; Anika | <?php echo($title) ?></title>
</head>
<body>
	<?php include_once("../assets/lib/analyticstracking.php"); ?>
	<header>
		<nav id="menu">
			<div class="lang-link">
				<a href="<?php if($lang=="de") echo("?lang=en"); else echo("?lang=de") ?>">
					<?php if($lang=="de") echo("EN"); else echo("DE"); ?>
				</a>
			</div>
			<div class="mobile-menu">
				<a id="menu-button" href=""><?php if($lang=="de") echo("MENÜ"); else echo("MENU"); ?></a>
			</div>
		    <ul>
		    	<li><a href="../<?php echo("?lang=$lang"); ?>">Home</a></li>
				<?php foreach($menu_items as $item=>$name){
					if($item==$dir) echo("<li class='active'>"); else echo("<li>");
					echo("<a href='../$item?lang=$lang'>$name</a></li>");
				} ?>
		    </ul>
		</nav>
	</header>
    <main id="main">
		<h1>
			<img src="<?php echo("title_$lang.svg"); ?>" alt="<?php echo($title) ?>" />
		</h1>
		<?php echo(markdownify("$lang.md")); ?>
    </main>
</body>

<script type="text/javascript">
// Menu Script
var menu_button = document.getElementById('menu-button');
var menu = document.getElementById('menu');
var main = document.getElementById('main');
menu_button.onclick = function(e){
	e.preventDefault();
	if (menu.classList.contains('active')) {
		menu.classList.remove('active');
		main.classList.remove('active-menu');
	} else {
		menu.classList.add('active');
		main.classList.add('active-menu');
	}
}
main.onclick = function(){
	if (menu.classList.contains('active')) {
		menu.classList.remove('active');
		main.classList.remove('active-menu');
	}
}
</script>

</html>
