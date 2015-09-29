<?php
$logged_in = password_verify($_POST['password'], '$2y$10$RXuRTSAcKmcKPokJXySjnuQqQQjXmm7jjGSYQQEPn9Ts.WIxoOZDO');

if ( $logged_in ){
    header("Content-type: text/csv");
    header("Pragma: no-cache");
    header("Expires: 0");
    echo file_get_contents('responses.csv');
}
?>

<?php if ( !$logged_in ): ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
    <meta name="robots" content="noindex">
	<title>Responses</title>
</head>
<body>
    <form action="responses.php" method="post">
        <input type="password" name="password">
        <input type="submit" value="LOG IN">
    </form>
</body>
</html>
<?php endif; ?>
