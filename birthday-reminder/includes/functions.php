<?php
function calculateAge($dob) {
    return date_diff(date_create($dob), date_create('today'))->y;
}

function todayBirthdays($conn) {
    $today = date('m-d');
    return $conn->query("SELECT * FROM users 
        WHERE DATE_FORMAT(dob,'%m-%d')='$today' AND status=1");
}

function upcomingBirthdays($conn, $days = 7) {

    return $conn->query("
        SELECT *,
        DATE_ADD(
            dob,
            INTERVAL 
            CASE 
                WHEN DATE_ADD(dob, INTERVAL YEAR(CURDATE()) - YEAR(dob) YEAR) < CURDATE()
                THEN YEAR(CURDATE()) - YEAR(dob) + 1
                ELSE YEAR(CURDATE()) - YEAR(dob)
            END YEAR
        ) AS next_birthday
        FROM users
        WHERE status = 1
        AND DATE_ADD(
            dob,
            INTERVAL 
            CASE 
                WHEN DATE_ADD(dob, INTERVAL YEAR(CURDATE()) - YEAR(dob) YEAR) < CURDATE()
                THEN YEAR(CURDATE()) - YEAR(dob) + 1
                ELSE YEAR(CURDATE()) - YEAR(dob)
            END YEAR
        ) > CURDATE()  
        AND DATE_ADD(
            dob,
            INTERVAL 
            CASE 
                WHEN DATE_ADD(dob, INTERVAL YEAR(CURDATE()) - YEAR(dob) YEAR) < CURDATE()
                THEN YEAR(CURDATE()) - YEAR(dob) + 1
                ELSE YEAR(CURDATE()) - YEAR(dob)
            END YEAR
        ) <= DATE_ADD(CURDATE(), INTERVAL $days DAY)
        ORDER BY next_birthday ASC
    ");
}


function recentBirthdays($conn) {
    return $conn->query("
        SELECT * FROM users
        WHERE DATE_FORMAT(dob,'%m-%d')
        BETWEEN DATE_FORMAT(DATE_SUB(CURDATE(), INTERVAL 7 DAY),'%m-%d')
        AND DATE_FORMAT(CURDATE(),'%m-%d')
        AND status=1
    ");
}

function userImage($image = null) {
    if (!empty($image) && file_exists("uploads/members/" . $image)) {
        return "uploads/members/" . $image;
    }

    return "https://i.pravatar.cc/300?img=" . rand(1, 70);
}


?>
