<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <link href="assets/css/style.css" rel="stylesheet">
    <link rel="icon" href="https://emojiapi.dev/api/v1/birthday_cake/32.png">

    <title>Birthday Reminder App</title>
</head>

<body>
    <nav class="navbar navbar-expand-lg birthday-navbar sticky-top">
        <div class="container">
            <a class="navbar-brand d-flex align-items-center" href="#">
                🎂 <span class="ms-2 fw-bold">Birthday Reminder</span>
            </a>

            <button class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navMenu">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse justify-content-end" id="navMenu">
                <button class="btn add-btn" data-bs-toggle="modal" data-bs-target="#addMemberModal">
                    <i class="bi bi-plus-circle me-1"></i> Add New
                </button>
            </div>
        </div>
    </nav>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>