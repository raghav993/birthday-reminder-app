<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <link href="assets/css/style.css" rel="stylesheet">
    <link rel="icon" href="https://emojiapi.dev/api/v1/birthday_cake/32.png">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

    <title>Birthday Reminder App</title>
    <style>
        
    </style>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark birthday-navbar sticky-top">

        <div class="container">
            <a class="navbar-brand d-flex align-items-center" href="#">
                🎂 <span class="ms-2 fw-bold">Birthday Reminder</span>
            </a>

            <button class="navbar-toggler" type="button">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse justify-content-end pt-1" id="navMenu">
                <form class="d-flex my-2" role="search">
                    <input class="form-control mx-2" type="search" placeholder="Search" aria-label="Search" />
                    <button class="btn btn-primary" type="submit">Search</button>
                </form>
                <button class="btn btn-danger mx-2" data-bs-toggle="modal" data-bs-target="#addMemberModal">
                    <i class="bi bi-plus-circle me-1"></i> Add New
                </button>
            </div>
        </div>

    </nav>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const toggler = document.querySelector(".navbar-toggler");
            const menu = document.querySelector("#navMenu");

            toggler.addEventListener("click", function() {
                menu.classList.toggle("show");
            });
        });
    </script>