<?php
define('DS', DIRECTORY_SEPARATOR);

// load the cms bootstrapper
include(__DIR__ . DS . 'kirby' . DS . 'bootstrap.php');

if(empty(site()->user())){
    echo "please log in!";
    } else {
	shell_exec('/usr/bin/php55 /usr/www/users/ddmmad/hairgang/background.php >> /usr/www/users/ddmmad/hairgang/background.log &');
	echo site()->user()->username();
?>
	<html>
	<head>
		<body>
			<center><h1>batch started!</h1></center>
		</body>
	</head>
	</html>
<?php } ?>
