<?php
require __DIR__ . '/../config/db.php';
require __DIR__ . '/../vendor/autoload.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

function logInvalidEmail($name, $email, $reason)
{
    $log = date('Y-m-d H:i:s') . " | $name | $email | $reason\n";
    file_put_contents(__DIR__ . '/invalid_emails.log', $log, FILE_APPEND);
}

$today = date('m-d');
$tomorrow = date('m-d', strtotime('+1 day'));

$birthdayUser = $conn->query("
    SELECT * FROM users 
    WHERE DATE_FORMAT(dob,'%m-%d') IN ('$today','$tomorrow')
");

while ($b = $birthdayUser->fetch_assoc()) {

    $members = $conn->query("
        SELECT * FROM users 
        WHERE id != {$b['id']} AND status=1
    ");

    while ($m = $members->fetch_assoc()) {

        if (!filter_var($m['email'], FILTER_VALIDATE_EMAIL)) {
            logInvalidEmail($m['name'], $m['email'], 'Invalid format');
            continue;
        }

        $mail = new PHPMailer(true);

        try {
            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com';
            $mail->SMTPAuth = true;
            $mail->Username = 'kalim8669993@gmail.com';
            $mail->Password = 'tzilncqmfhahdkbt';
            $mail->SMTPSecure = 'tls';
            $mail->Port = 587;

            $mail->setFrom('kalim8669993@gmail.com', 'Birthday Reminder');
            $mail->addAddress($m['email'], $m['name']);

            $mail->isHTML(true);
            $mail->Subject = "Birthday Reminder";
            $mail->Body = "
                <h2>{$b['name']}'s Birthday</h2>
                <img src='http://localhost:81/remider/birthday-reminder/uploads/members/{$b['image']}' width='120'>
                <p>Don't forget to wish!</p>
            ";

            $mail->send();
        } catch (Exception $e) {
            logInvalidEmail($m['name'], $m['email'], $mail->ErrorInfo);
            continue;
        }
    }
}
