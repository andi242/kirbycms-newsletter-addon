# kirby-newsletter-addon
this will add a newsletter functionality to kirby

## note
I am by no means a developer in PHP or web stuff.
I post the code and files I created since I have no idea on how to move on with this. I believe I won't even get along with bugs, and issue fixing. Count this as an initial online store for further development.

Perhaps you can grab the code and develop it to a decent newsletter addon for kirby :)

## config
set Newsletter configuration vars
- phpmailer_path,  
- phpmailer_host, 
- phpmailer_user,
- phpmailer_passwd,
- phpmailer_log
- phpmailer_page
- phpmailer_blog
- phpmailer_from
- phpmailer_fromName
- phpmailer_ReplyTo
- phpmailer_ReplyToName
in kirbys ./site/config/config.php

## files
### background.log
- resides in server/kirby root and holds log messages of every email sent

### background.php
- resides in server/kirby root
- called if 'send emails' is started
- grabs latest 'newsletter' category entry and loops through all email recipents and to send a mail via PHPMailer
- customizable html email content
- 

## customize

## requirements
