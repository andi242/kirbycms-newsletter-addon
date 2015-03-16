# kirby newsletter-addon
this will add a newsletter functionality to kirby.

>I developed this because I did not want to rely on 'professional newsletter providers'. 
>Basically due to privacy reasons and protecting customers email addresses from being 'sold'.

### Warning:<br>this plugin has a widged added, which is Kirby 2.0.7/nightly build only

#changelog
v2 has been completely rewritten.<br>
What's new:

- no more background processing with shell_exec()
- all recipients are native Kirby users now
- subscribe and unsubscribe form added
- all recipients will be added to bcc: in the email (this should be ok for smaller recipients-lists)
- added a widget (min. req. Kirby 2.0.7) to list the latest 5 `children` of page `blog` (please adapt if necessary)
 
If you need to rely on professional providers, better use Kirbys built-in Amazon SES, Mailgun, etc.

# documentation
## installation
copy the files from the corresponding folders to your installation of Kirby.
Be aware that you might rather edit files than overwriting existing ones.

## config
set Newsletter configuration vars in Kirbys ./site/config/config.php

## requirements/credits

PHPMailer Plugin: https://github.com/PHPMailer/PHPMailer is already built in.

Thanks for all the help in the [Kirby forum](http://forum.getkirby.com)! :)

