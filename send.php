<?php
define('DS', DIRECTORY_SEPARATOR);

// load the cms bootstrapper
include(__DIR__ . DS . 'kirby' . DS . 'bootstrap.php');
// include('./kirby/bootstrap.php');

if(empty(site()->user())){
    echo "Bitte einloggen!";
    } else {
	shell_exec('/usr/bin/php55 /usr/www/users/ddmmad/hairgang/background.php >> /usr/www/users/ddmmad/hairgang/background.log &');
	echo site()->user()->username();
?>
	<html>
	<head>
		<body>
			<center><h1>Versand gestartet!</h1></center>
		</body>
	</head>
	</html>
<?php } ?>
