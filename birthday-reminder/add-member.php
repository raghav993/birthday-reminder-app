<?php
require_once "config/db.php";

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header("Location: index.php");
    exit;
}

// ---------- Sanitize Inputs ----------
$name   = trim($_POST['name']);
$dob    = $_POST['dob'];
$gender = $_POST['gender'] ?? null;
$email  = trim($_POST['email']);
$mobile = trim($_POST['mobile']);

if (empty($name) || empty($dob)) {
    die("Name and DOB are required");
}

// ---------- Image Upload ----------
$imageName = null;

if (!empty($_FILES['image']['name'])) {

    $uploadDir = "uploads/members/";
    if (!is_dir($uploadDir)) {
        mkdir($uploadDir, 0777, true);
    }

    $allowedTypes = ['image/jpeg', 'image/png', 'image/jpg', 'image/webp'];
    $fileType = $_FILES['image']['type'];

    if (!in_array($fileType, $allowedTypes)) {
        die("Only JPG, PNG, WEBP images allowed");
    }

    if ($_FILES['image']['size'] > 2 * 1024 * 1024) {
        die("Image size should be less than 2MB");
    }

    $ext = pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION);
    $imageName = uniqid("user_") . "." . $ext;

    move_uploaded_file($_FILES['image']['tmp_name'], $uploadDir . $imageName);
}

// ---------- Insert Data ----------
$stmt = $conn->prepare("
    INSERT INTO users (name, dob, gender, email, mobile, image, status)
    VALUES (?, ?, ?, ?, ?, ?, 1)
");

$stmt->bind_param(
    "ssssss",
    $name,
    $dob,
    $gender,
    $email,
    $mobile,
    $imageName
);

if ($stmt->execute()) {
    header("Location: index.php?success=1");
} else {
    echo "Error: " . $stmt->error;
}

$stmt->close();
$conn->close();
