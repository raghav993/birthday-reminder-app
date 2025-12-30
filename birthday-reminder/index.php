<?php include 'config/db.php';
include 'includes/functions.php';
include 'includes/header.php'; ?>
<div id="birthdaySlider" class="carousel slide birthday-slider" data-bs-ride="carousel">
    <div class="carousel-inner">
        <?php
        $today = todayBirthdays($conn);
        $active = 'active';
        if ($today->num_rows > 0):
            while ($row = $today->fetch_assoc()):
        ?>
                <div class="carousel-item <?= $active ?> text-center">
                    <div class="slider-content">
                        <div class="story-ring">
                            <img src="<?= userImage($row['image']) ?>" class="rounded-circle">
                        </div>
                        <h2 class="mt-4 text-white"><?= $row['name'] ?></h2>
                        <h5 class="animated-text">🎂 Happy Birthday 🎉</h5>
                    </div>
                </div>
            <?php
                $active = '';
            endwhile;
        else:
            ?>
            <div class="carousel-item active text-center">
                <div class="slider-content">
                    <div class="story-ring">
                        <img src="https://i.pravatar.cc/300?img=1" class="rounded-circle">
                    </div>
                    <h2 class="mt-4 text-white">Welcome 🎈</h2>
                    <h5 class="animated-text">Never miss a birthday</h5>
                </div>
            </div>
        <?php endif; ?>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#birthdaySlider" data-bs-slide="prev">
        <span class="carousel-control-prev-icon custom-arrow"></span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#birthdaySlider" data-bs-slide="next">
        <span class="carousel-control-next-icon custom-arrow"></span>
    </button>
</div>

<div class="container my-5">
    <div class="row">
        <!-- Today -->
        <div class="col-md-4">
            <h4 class="section-title">🎉 Today's Birthdays</h4>
            <?php foreach (todayBirthdays($conn) as $t): ?>
                <div class="birthday-card mb-4">
                    <!-- <img src="<?= userImage($t['image']) ?>" class="w-100"> -->
                    <img src="<?= userImage($t['image']) ?>"
                        class="rounded-circle user-click"
                        data-name="<?= $t['name'] ?>"
                        data-dob="<?= $t['dob'] ?>"
                        data-gender="<?= $t['gender'] ?>"
                        data-email="<?= $t['email'] ?>"
                        data-mobile="<?= $t['mobile'] ?>"
                        data-image="<?= userImage($t['image']) ?>">

                    <div class="p-3 text-center">
                        <div class="birthday-name"><?= $t['name'] ?></div>
                        <div class="birthday-meta">
                            🎂 Turning <?= calculateAge($t['dob']) ?>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
        <!-- Recent -->
        <div class="col-md-4">
            <h4 class="section-title">⏮ Recent Birthdays</h4>
            <?php foreach (recentBirthdays($conn) as $r): ?>
                <div class="d-flex align-items-center mb-3">
                    <!-- <img src="<?= userImage($r['image']) ?>" width="55" class="rounded-circle me-3"> -->
                    <img src="<?= userImage($r['image']) ?>" width="55"
                        class="rounded-circle user-click"
                        data-name="<?= $r['name'] ?>"
                        data-dob="<?= $r['dob'] ?>"
                        data-gender="<?= $r['gender'] ?>"
                        data-email="<?= $r['email'] ?>"
                        data-mobile="<?= $r['mobile'] ?>"
                        data-image="<?= userImage($r['image']) ?>">

                    <div>
                        <strong><?= $r['name'] ?></strong><br>
                        <small class="text-muted"><?= date('d M', strtotime($r['dob'])) ?></small>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
        <!-- Upcoming -->
        <div class="col-md-4">
            <h4 class="section-title">⏭ Upcoming Birthdays</h4>
            <?php foreach (upcomingBirthdays($conn, 15) as $u): ?>
                <div class="d-flex align-items-center mb-3">
                    <!-- <img src="<?= userImage($u['image']) ?>" width="55" class="rounded-circle me-3"> -->
                    <img src="<?= userImage($u['image']) ?>"
                        class="rounded-circle user-click" width="55"
                        data-name="<?= $u['name'] ?>"
                        data-dob="<?= $u['dob'] ?>"
                        data-gender="<?= $u['gender'] ?>"
                        data-email="<?= $u['email'] ?>"
                        data-mobile="<?= $u['mobile'] ?>"
                        data-image="<?= userImage($u['image']) ?>">

                    <div>
                        <strong><?= $u['name'] ?></strong><br>
                        <small class="text-muted">
                            🎈 <?= date('d M', strtotime($u['dob'])) ?>
                        </small>
                    </div>
                </div>
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
                <input type="email" class="form-control mb-2" name="email" placeholder="Enter your email">
                <input class="form-control mb-2" name="mobile" placeholder="Enter your mobile number">
                <input type="file" class="form-control" name="image">
            </div>
            <div class="modal-footer">
                <button class="btn btn-success">Save</button>
            </div>
        </form>
    </div>
</div>

<?php include 'includes/footer.php'; ?>