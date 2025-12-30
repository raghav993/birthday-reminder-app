<?php
$conn = new mysqli("localhost", "root", "", "birthday_reminder");
if ($conn->connect_error) {
    die("Database Connection Failed");
}
?>
