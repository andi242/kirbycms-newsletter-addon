<?php 

/* 

---------------------------------------
Kirby Newsletter settings
---------------------------------------
 set Newsletter configuration vars
 		phpmailer_path,  
		phpmailer_host, 
		phpmailer_user, 
		phpmailer_passwd, 
		phpmailer_log
		phpmailer_page
		phpmailer_blog
		phpmailer_from
		phpmailer_fromName
		phpmailer_ReplyTo
		phpmailer_ReplyToName
 in kirbys ./site/config/config.php

*/

/*
// this is to set the path to PHPMailer files
// not used at this time
$phpmailerpath = c::get('phpmailer_path');

*/
require './assets/phpinc/PHPMailerAutoload.php';

// load the cms bootstrapper
include('./kirby/bootstrap.php');

// script logging starts
// log is located in same directory as script resides if not set to different location
echo "---------------" . date('Y-m-d H:i:s') . " new email-batch ---------------".PHP_EOL;

// grab mail adresses from newsletter page
$body_eml = page('newsletter')->text();
$recip = explode(',',$body_eml);
$content = "null";

// filter all news and grab the latest child-entry
// please change 'news' to your kirby page where your blog posts reside
foreach(page('news')->children()->visible()->sortBy('date', 'desc')->filterBy('newsletter', '==', '1')->limit(1) as $subpage):
	// this is the child-entry content
	$mailcontent = kirbytext($subpage->text());
	$online_link = $subpage->uri();
	$texttitle = $subpage->title();
endforeach;

// build the content!

// the header
// customize the styles, please!
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
<h1>'.$texttitle.'</h1>
	<hr class="ruler" />
	<article>
';

// the footer
$footer = '
	</article>
	<br />'.$online_link.' // $online_link eq. the etry slug
	
</main>
</body>
</html>
';
// append all vars
$content = $header;
$content .= $mailcontent;
$content .= $footer;
// content is ready to go.

// now for some PHPMailer stuff...
// grabbing config.php defined variables
$mail = new PHPMailer;
// uncomment if debugging is necessary
// $mail->SMTPDebug = 3; // Enable verbose debug output (loglevel 0-3 possible)

// SMTP mailing is used, because php mailing might be marked as spam.
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
$mail->Subject = 'Newsletter '.$texttitle;
$mail->Body = $content;
$mail->AltBody = 'add some text for non-html mail';
$mail->isHTML(true); // Set email format to HTML

foreach( $recip as $mailing):
	$mail->addAddress($mailing);
	echo $mailing;
	if(!$mail->send()) {
	    echo ' Message could not be sent.' . PHP_EOL;
	    echo ' Mailer Error: ' . $mail->ErrorInfo . PHP_EOL;
	} else {
	    echo " ".date('Y-m-d H:i:s') . " sent.".PHP_EOL;
	}
	sleep(10);
	// important to clear all recipients after 1 mail, for not sending duplicate mails
	$mail->ClearAllRecipients();
endforeach
?>
