<?php if(!defined('KIRBY')) exit ?>

title: Newsletter Config
pages: false
files: false
fields:
  pageSettings:
    label: Info
    type: headline
  info:
    label: Newsletter Konfiguration
    type: info
    icon: exclamation-triangle
    text: >
      This is where the settings and email recipients for the newsletter will be set.
  title:
    label: Configuration
    type:  info
    required: false
    text: Newsletter
    help: do not change this.
  mailsect:
  	label: Emails
  	type: headline
  text:
    label: Reciepients
    type: textarea
    icon: file-text-o
    width: 1/2
    help: last email adress must not have a comma at the end
  info-1:
    label: Mail config
    type: info
    width: 1/2
    text: >
      <b><font color=red>one email adress per line, comma at the end of the line.</b></font><br />
      <b>e.g.:</b><br />
      blafasel@fasel.de,<br />
      schnipp@schnapp.com<br />
      usw.<br /><em>last email adress must not have a comma at the end.</em>
  sendsect:
    label: send
    type: headline
  info-2:
    label: Please double check!
    type: info
    icon: exclamation-triangle
    text: >
      <center><font color=red>Attention! Save first, if new adresses have been added!</font><br />
      Only the latest newsletter post will be sent - press only once for sending!<br /><br />
      <input class="btn btn-rounded btn-submit" data-saved="!sent!" value="!Abschicken!" onclick="window.open('/send.php','Text Titelbar','toolbar=0,location=0,directories=0,menubar=0,scrollbars=1,resizable=0,width=500,height=470');" ><br><a href="/background.log" target="_blank">logfile</a> </center>
