<?php
require '../config/db.php';
require '../vendor/autoload.php';

use PHPMailer\PHPMailer\PHPMailer;

$today = date('m-d');
$tomorrow = date('m-d', strtotime('+1 day'));

$birthdayUser = $conn->query("
 SELECT * FROM users 
 WHERE DATE_FORMAT(dob,'%m-%d') IN ('$today','$tomorrow')
");

while($b = $birthdayUser->fetch_assoc()) {

$members = $conn->query("
 SELECT * FROM users 
 WHERE id != {$b['id']} AND status=1
");

while($m = $members->fetch_assoc()) {

$mail = new PHPMailer();
$mail->isSMTP();
$mail->Host = 'smtp.gmail.com';
$mail->SMTPAuth = true;
$mail->Username = 'your@gmail.com';
$mail->Password = 'app-password';
$mail->SMTPSecure = 'tls';
$mail->Port = 587;

$mail->setFrom('your@gmail.com', 'Birthday Reminder');
$mail->addAddress($m['email']);

$mail->isHTML(true);
$mail->Subject = "🎂 Birthday Reminder";
$mail->Body = "
<h2>{$b['name']}'s Birthday</h2>
<img src='https://yourdomain/uploads/members/{$b['image']}' width='120'>
<p>Don't forget to wish!</p>
";

$mail->send();
}
}
