<?php
require_once "config/db.php";

$names = [
    "Amit Sharma","Neha Verma","Rahul Singh","Pooja Mehta","Rohit Kumar",
    "Anjali Gupta","Sandeep Yadav","Kiran Patel","Vikas Jain","Sneha Kapoor",
    "Arjun Malhotra","Priya Nair","Manish Pandey","Ritu Saxena","Deepak Joshi",
    "Simran Kaur","Nitin Bansal","Kavita Rao","Mohit Aggarwal","Shilpa Das"
];

$genders = ["Male", "Female", "Other"];

function randomDate($type) {
    $year = rand(1985, 2005);

    if ($type === 'today') {
        return date("$year-m-d");
    }

    if ($type === 'upcoming') {
        return date("$year-m-d", strtotime("+" . rand(1,15) . " days"));
    }

    // recent / old
    return date("$year-m-d", strtotime("-" . rand(1,20) . " days"));
}

$conn->query("TRUNCATE TABLE users"); // optional: clear table first

for ($i = 0; $i < 20; $i++) {

    if ($i < 5) {
        $dob = randomDate('today');
    } elseif ($i < 12) {
        $dob = randomDate('upcoming');
    } else {
        $dob = randomDate('old');
    }

    $name   = $names[$i];
    $gender = $genders[array_rand($genders)];
    $email  = strtolower(str_replace(" ", "", $name)) . "@example.com";
    $mobile = "9" . rand(100000000, 999999999);
    $image  = "default.png";

    $sql = "INSERT INTO users 
        (name, dob, gender, email, mobile, image, status) 
        VALUES 
        ('$name', '$dob', '$gender', '$email', '$mobile', '$image', 1)";

    $conn->query($sql);
}

echo "✅ 20 Dummy Users Seeded Successfully!";
