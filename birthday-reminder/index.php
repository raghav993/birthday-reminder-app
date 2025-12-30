<?php include 'config/db.php';
include 'includes/functions.php';
include 'includes/header.php'; ?>
<div id="birthdaySlider" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-inner">
        <?php
        $today = todayBirthdays($conn);
        if ($today->num_rows > 0):
            while ($row = $today->fetch_assoc()):
        ?>
                <div class="carousel-item active text-center bg-light p-5">
                    <img src="uploads/members/<?= $row['image'] ?>" class="rounded-circle" width="150">
                    <h2 class="mt-3"><?= $row['name'] ?></h2>
                    <h4 class="text-success animated-text">🎂 Happy Birthday 🎉</h4>
                </div>
            <?php endwhile;
        else: ?>
            <div class="carousel-item active text-center p-5">
                <h2>🎈 Welcome to Birthday Reminder 🎈</h2>
            </div>
        <?php endif; ?>
    </div>
</div>
<div class="container my-5">
            <div class="row">
                <!-- Today -->
                <div class="col-md-4">
                    <h4>🎉 Today's Birthdays</h4>
                    <?php foreach (todayBirthdays($conn) as $t): ?>
                        <div class="card mb-2">
                            <img src="uploads/members/<?= $t['image'] ?>" class="card-img-top">
                            <div class="card-body">
                                <h5><?= $t['name'] ?></h5>
                                <p>Age: <?= calculateAge($t['dob']) ?></p>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>

                <!-- Recent -->
                <div class="col-md-4">
                    <h4>⏮ Recent Birthdays</h4>
                    <?php foreach (recentBirthdays($conn) as $r): ?>
                        <p><?= $r['name'] ?> (<?= date('d M', strtotime($r['dob'])) ?>)</p>
                    <?php endforeach; ?>
                </div>

                <!-- Upcoming -->
                <div class="col-md-4">
                    <h4>⏭ Upcoming Birthdays</h4>
                    <?php foreach (upcomingBirthdays($conn, 15) as $u): ?>
                        <p><?= $u['name'] ?> (<?= date('d M', strtotime($u['dob'])) ?>)</p>
                    <?php endforeach; ?>
                </div>

            </div>
        </div>
<div class="modal fade" id="addMemberModal">
    <div class="modal-dialog">
        <form method="POST" action="add-member.php" enctype="multipart/form-data" class="modal-content">
            <div class="modal-header">
                <h5>Add Member</h5>
            </div>
            <div class="modal-body">
                <input class="form-control mb-2" name="name" placeholder="Full Name" required>
                <input type="date" class="form-control mb-2" name="dob" required>
                <select class="form-control mb-2" name="gender">
                    <option>Male</option>
                    <option>Female</option>
                    <option>Other</option>
                </select>
                <input type="email" class="form-control mb-2" name="email">
                <input class="form-control mb-2" name="mobile">
                <input type="file" class="form-control" name="image">
            </div>
            <div class="modal-footer">
                <button class="btn btn-success">Save</button>
            </div>
        </form>
    </div>
</div>