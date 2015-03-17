<?php

/*

---------------------------------------
License Setup
---------------------------------------

Please add your license key, which you've received
via email after purchasing Kirby on http://getkirby.com/buy

It is not permitted to run a public website without a
valid license key. Please read the End User License Agreement
for more information: http://getkirby.com/license

*/

c::set('license', 'K2-xxxxxx');

/*

---------------------------------------
Kirby Configuration
---------------------------------------

By default you don't have to configure anything to
make Kirby work. For more fine-grained configuration
of the system, please check out http://getkirby.com/docs/advanced/options


/* -----------------  newsletter  config ---------------------- */
//c::set('phpmailer_path', '');
c::set('phpmailer_host', '');
c::set('phpmailer_user', '');
c::set('phpmailer_passwd', '');
//c::set('phpmailer_phpbin', '');
//c::set('phpmailer_localpath', '');
//c::set('phpmailer_logfile', '');
//c::set('phpmailer_page', '');
c::set('phpmailer_blog', ''); // set your blog root here for post selection
c::set('phpmailer_from', '');
c::set('phpmailer_fromName', '');
c::set('phpmailer_ReplyTo', '');
c::set('phpmailer_ReplyToName', '');
//c::set('phpmailer_', '');
//c::set('phpmailer_', '');


// important for user (a.k.a. recipient) creation!
c::set('roles', array(
  array(
    'id'      => 'admin',
    'name'    => 'Admin',
    'default' => true,
    'panel'   => true
  ),
  array(
    'id'      => 'editor',
    'name'    => 'Editor',
    'panel'   => true
  ),
  array(
    'id'      => 'newsletter',
    'name'    => 'Newsletter',
    'panel'   => false
  )
));
/* -----------------  end newsletter config  ---------------------- */
