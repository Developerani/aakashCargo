<?php
if(isset( $_POST['name']))
  $name = $_POST['name'];
if(isset( $_POST['contact']))
  $contact = $_POST['contact'];
if(isset( $_POST['email']))
  $email = $_POST['email'];
if(isset( $_POST['from']))
  $from = $_POST['from'];
if(isset( $_POST['select']))
  $select = $_POST['select'];
if(isset( $_POST['to']))
  $to = $_POST['to'];
if(isset( $_POST['msg']))
  $msg = $_POST['msg'];
header('Content-Type: application/json');

if ($email === ''){
  print json_encode(array('message' => 'Email cannot be empty', 'code' => 0));
  exit();
} else {
  if (!filter_var($email, FILTER_VALIDATE_EMAIL)){
  print json_encode(array('message' => 'Email format invalid.', 'code' => 0));
  exit();
  }
}
$content="From: $name \n Phone No: $contact \n Email: $email \n From: $from \n Transportation-Type: $select \n To: $to \n Message: $msg ";
$recipient = "aakashcargopackers@gmail.com";
$mailheader = "From: $email \r\n";
$subject = "New Form Enquery";
mail($recipient, $subject, $content, $mailheader) or die("Error!");
print json_encode(array('message' => 'Email successfully sent!', 'code' => 1));
exit();
?>