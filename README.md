# kirby-newsletter-addon
this will add a newsletter functionality to kirby

## note
I am by no means a developer in PHP or web stuff.
I post the code and files I created since I have no idea on how to move on with this. I believe I won't even get along with bugs, and issue fixing. Count this as an initial online store for further development.

Perhaps you can grab the code and develop it to a decent newsletter addon for kirby :)

# stuff to be done (which I cant personally ;))
- make a better monitoring of sending emails
- add some kind of 'abort' funcitonality to the system process (shell_exec) 
- make a better kirby app and use kirbys full potential with plugin/controllers, etc.

# documentation
## config
set Newsletter configuration vars
<pre><code>c::set('phpmailer_path', '');
c::set('phpmailer_host', 'smtp.mail.com');
c::set('phpmailer_user', 'mailstuff@mail.com');
c::set('phpmailer_passwd', 'SECRET!');
c::set('phpmailer_phpbin', '');
c::set('phpmailer_localpath', '');
c::set('phpmailer_logfile', '');
c::set('phpmailer_page', '');
c::set('phpmailer_blog', '');
c::set('phpmailer_from', 'mailstuff@mail.com');
c::set('phpmailer_fromName', 'Your Name');
c::set('phpmailer_ReplyTo', 'mailstuff@mail.com');
c::set('phpmailer_ReplyToName', 'Your Name');
c::set('phpmailer_', '');
c::set('phpmailer_', '');</pre></code>

in kirbys ./site/config/config.php

## files
#### background.log
- resides in server/kirby root and holds log messages of every email sent

#### background.php
- resides in server/kirby root
- called if 'send emails' is started
- grabs latest 'newsletter' category entry and loops through all email recipents and to send a mail via PHPMailer
- customizable html email content

#### send.php
used to trigger the shell_exec for sending the php process to the operating system
logged in user is required

#### Kirby blueprints
- blogarticle.php, needs to be updated for adding a "newsletter" blogpost type which will be grabbed for emailing
- newsletter.php, blueprint for maintaining recipients and start sending emails

## requirements
PHPMailer Plugin: https://github.com/PHPMailer/PHPMailer
