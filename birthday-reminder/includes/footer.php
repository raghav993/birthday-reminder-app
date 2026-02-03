<div class="modal fade" id="userDetailModal" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content user-modal">

            <div class="modal-header border-0">
                <h5 class="modal-title">🎉 Member Details</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>

            <div class="modal-body text-center px-5">

                <!-- Profile Image -->
                <img id="modalUserImage"
                     class="rounded-circle mb-3 user-modal-img">

                <!-- Name -->
                <h3 id="modalUserName" class="fw-bold mb-1"></h3>
                <p class="text-muted mb-4" id="modalUserGender"></p>

                <!-- Info Grid -->
                <div class="row text-center gy-4">

                    <div class="col-md-4">
                        <div class="">
                            <div class="">🎂 DOB</div>
                            <div class="" id="modalUserDob"></div>
                        </div>
                    </div>

                    <div class="col-md-4">📞 Mobile
                            <div class="" id="modalUserMobile"></div>
                        
                    </div>

                    <div class="col-md-4">
                        <div class="">
                            <div class="">📩 Email</div>
                            <div class="" id="modalUserEmail"></div>
                        </div>
                    </div>

                </div>

            </div>
        </div>
    </div>
</div>


<footer class="birthday-footer mt-5">
    <div class="container py-4">
        <div class="row align-items-center">

            <div class="col-md-6 text-center text-md-start mb-3 mb-md-0">
                <h5 class="fw-bold mb-1">🎉 Birthday Reminder</h5>
                <p class="mb-0 small">
                    Never miss a team member’s special day 🎂
                </p>
            </div>

            <div class="col-md-6 text-center text-md-end">
                <a href="#" class="footer-icon"><i class="bi bi-instagram"></i></a>
                <a href="#" class="footer-icon"><i class="bi bi-facebook"></i></a>
                <a href="#" class="footer-icon"><i class="bi bi-envelope"></i></a>
            </div>

        </div>

        <hr class="footer-divider">

        <div class="text-center small">
            © <?= date('Y') ?> Birthday Reminder. All Rights Reserved.
        </div>
    </div>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
<script>
    document.querySelectorAll('.user-click').forEach(img => {
        img.addEventListener('click', function() {

            document.getElementById('modalUserImage').src = this.dataset.image;
            document.getElementById('modalUserName').innerText = this.dataset.name;
            document.getElementById('modalUserDob').innerText = this.dataset.dob;
            document.getElementById('modalUserGender').innerText = this.dataset.gender;
            document.getElementById('modalUserEmail').innerText = this.dataset.email || 'N/A';
            document.getElementById('modalUserMobile').innerText = this.dataset.mobile || 'N/A';

            new bootstrap.Modal(document.getElementById('userDetailModal')).show();
        });
    });
</script>

</body>

</html>