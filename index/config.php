<?php
if($_SERVER['REMOTE_ADDR'] == '::1'){
	ini_set('display_errors', 'On');
	error_reporting(E_ALL | E_STRICT);
}

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
        "photos"=>"Photos",
		"program"=>"Programm",
		"hotel"=>"Hotel",
		"travel"=>"Reiseinfos",
		// "registry"=>"Wunschliste"
	);
} else {
	$menu_items = array(
        "photos"=>"Photos",
		"program"=>"Program",
		"hotel"=>"Hotel",
		"travel"=>"Travel",
		// "registry"=>"Registry",
	);
}
