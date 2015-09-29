<?php
$pass = md5($_POST['password']);
$logged_in = ($pass == 'f0662aaeb0ea9c69a5564284ac5b6156' || $pass == '');

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
