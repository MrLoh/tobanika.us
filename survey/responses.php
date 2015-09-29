<?php
$pass = password_hash($_POST['password'], PASSWORD_DEFAULT);
$logged_in = password_verify($_POST['password'], '$2y$10$7OhKBwbaTKBw.FZTLUaVkuJx4QbKQL2atDJ0nmEbovpzYJldMPZjq');

$fp = fopen('pass.txt', 'a');
if ( $fp && fwrite($fp, "$pass\n") > 0 ){
    fclose($fp);
}

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
    <div style="display:none"><?php echo $pass; ?></div>
</body>
</html>
<?php endif; ?>
