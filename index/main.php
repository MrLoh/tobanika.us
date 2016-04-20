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

	<title>Tobias &#x2661; Anika | <?php echo($title) ?></title>
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
    <main id="main" class="<?php echo($dir); ?>">
		<h1>
			<img src="<?php echo("title_$lang.svg"); ?>" alt="<?php echo($title) ?>" />
		</h1>
		<?php echo(markdownify("$lang.md")); ?>
    </main>
	<footer>
		<div class="content">
			<ul class="nav left">
		    	<li><a href="../<?php echo("?lang=$lang"); ?>">Home</a></li>
				<?php foreach($menu_items as $item=>$name){
					if($item==$dir) echo("<li class='active'>"); else echo("<li>");
					echo("<a href='../$item?lang=$lang'>$name</a></li>");
				} ?>
		    </ul>
			<div class="right">
				<p class="contact">
					<?php if($lang="de") echo("Bei Fragen:"); else echo("ask us anything:") ?> <br>
					<a href="mailto:us@tobanika.us">us@tobanika.us</a>
				</p>
				<p>
					Design &amp; <a href="http://github.com/MrLoh/tobanika.us" style="text-decoration: none;">Code</a><br>
					&copy; Tobanika
				</p>
			</div>
		</div>
		<img class="skyline" src="../assets/svg/chicago.svg" alt="" />
	</footer>
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
