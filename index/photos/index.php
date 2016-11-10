<?php
$dir = basename(__DIR__);

$extra_header = <<<DOC
<link rel="stylesheet" href="../assets/lib/lightgallery.min.css">

<script src="../assets/lib/jquery-2.1.4.min.js"></script>

<script src="../assets/lib/imagesloaded.min.js"></script>
<script src="../assets/lib/masonry.min.js"></script>

<script src="../assets/lib/lightgallery.min.js"></script>
<script src="../assets/lib/lg-zoom.min.js"></script>
<script src="../assets/lib/lg-hash.min.js"></script>
<script src="../assets/lib/lg-thumbnail.min.js"></script>
<script src="../assets/lib/lg-fullscreen.min.js"></script>

<script src="../assets/lib/md5.min.js"></script>

<script src="gallery.js"></script>
DOC;

include_once("../config.php");

$t1 = $lang == "de" ? "Passwort" : "Password";
$t2 = $lang == "de" ? "Photos anzeigen" : "See Pictures";

$extra_content = <<<DOC
<p>
    <form>
        <label for="password">{$t1}:</label>
        <input type="password", id="password"></input>
        <input type="submit" id="getpics" value="{$t2}">
    </form>
</p>
<div id="galleries"></div>
DOC;

include_once("../main.php");
