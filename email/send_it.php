<?php
$title = $_POST['title'];
$content = $_POST['content'];
$to = $_POST['to'];

include 'sendmail.class.php';

$mail = new sendmail();
$mail->postmail($to, $title, $content);