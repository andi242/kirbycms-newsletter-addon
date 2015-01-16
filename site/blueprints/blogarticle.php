<?php if(!defined('KIRBY')) exit ?>

title: Blog Post
pages: false
files: true
fields:
  title:
    label: Title
    type:  text
    width: 1/2
  date:
    label: Datum
    type: date
    width: 1/2
    default: today
  newsletter:
    label: Newsletter
    type: checkbox
    width: 1/2
    text: check if it should be marked as newsletter (for sending via email).
  text:
    label: Text
    type:  textarea
