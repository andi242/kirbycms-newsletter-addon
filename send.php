<?php
define('DS', DIRECTORY_SEPARATOR);

// load the cms bootstrapper
include(__DIR__ . DS . 'kirby' . DS . 'bootstrap.php');

if(empty(site()->user())){
    echo "please log in!";
    } else {
    	// change <local path> to your settings
    	// check path to php binary as well!
	shell_exec('/usr/bin/php55 <local path>/background.php >> <local path>/background.log &');
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
