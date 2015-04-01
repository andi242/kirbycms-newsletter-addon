<?PHP require './assets/phpinc/PHPMailerAutoload.php'; ?>

<?php snippet('header') ?>

<?PHP$user = site()->user() ?>

<article>
 <section>
 	<h2>Email Content:</h2>
<?php
if(empty($user)) { 
		echo "please log in";
		sleep(3);
		go('home');
} ?>
<small>
<?PHP $page = $_POST['selectpost']; ?>

<?PHP $subj = strip_tags(page($page)->title()); ?>
<?PHP $body = strip_tags(page($page)->text()->kirbytext()); ?>

<?PHP echo "<p>".$subj."</p>"; ?>
<?PHP echo "<p>".$body."</p>"; ?>
</small>


<?php
$header = '
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html lang="de">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width,initial-scale=1.0, user-scalable=no">
  <style type="text/css">
  /* Main
  -------------------------------------------------- */
  .main {
    padding-left: 5%;
    padding-right: 5%;
    padding-bottom: 1.5em;
    align-content: right;
    font-weight: 400;
    min-height: 10em;
    border-bottom: 2px solid #ff9300;
  }
  .ruler {
  	border-top: 3px solid #ff9300;
  	margin-bottom: 1.5em;
  	}
  .main hr {
    margin: 3em 0;
    height: 2px;
    background: #ddd;
  }
  .main p,
  .main figure,
  .main ul,
  .main ol {
    margin-bottom: 1.5em;
  }
  .main a:hover {
    border-color: #ff9300;
  }
  article, aside, details, figcaption, figure,
  footer, header, hgroup, main, nav, section, summary {
    display: block;
  }
  </style>
</head>
<body>
<h1>'.$subj.'</h1>
	<hr class="ruler" />
	<article>
';
// the footer
$footer = '
	</article>
</main>
</body>
</html>
';
	$content = $header;
	$content .= $body;
	$content .= $footer;
	
	$mail = new PHPMailer;
	$mail->isSMTP();
	$mail->Host = c::get('phpmailer_host');
	$mail->Username = c::get('phpmailer_user');
	$mail->Password = c::get('phpmailer_passwd');
	$mail->SMTPAuth = true;
	$mail->SMTPSecure = 'tls';
	$mail->Port = 587;
	$mail->ClearAllRecipients();
	$mail->CharSet = 'utf-8'; 
	$mail->From = c::get('phpmailer_from');
	$mail->FromName = c::get('phpmailer_fromName');
	$mail->addReplyTo(c::get('phpmailer_ReplyTo') , c::get('phpmailer_ReplyToName'));
	$mail->WordWrap = 75;
	$mail->Subject = 'Newsletter: '.$subj;
	$mail->Body = $content;
	$mail->AltBody = 'add some text for non-html mail';
	$mail->isHTML(true); // Set email format to HTML
	
 	$mail->addAddress(c::get('phpmailer_from')); // add yourself to avoid "undisclosed recipients

	foreach(kirby()->site()->users()->filterBy('role', 'newsletter') as $user) {
	        $mail->addBCC($user->email());
			echo $user->email()."<br>";
	    }

		
	if(!$mail->send()) {
	    echo ' Message could not be sent.' . PHP_EOL;
	    echo ' Mailer Error: ' . $mail->ErrorInfo . PHP_EOL;
	} else {
	    echo "<h2>Email sent to above recipients on ".date('Y-m-d H:i:s') . ".</h2>";
	}
	$mail->ClearAllRecipients();

?>
 </section>
</article>
<?php snippet('footer') ?>