<div class="modal fade" id="userDetailModal" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content user-modal">

            <div class="modal-header border-0">
                <h5 class="modal-title">🎉 Member Details</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>

            <div class="modal-body text-center">
                <img id="modalUserImage" class="rounded-circle mb-3" width="160">

                <h3 id="modalUserName"></h3>
                <p class="text-muted" id="modalUserGender"></p>

                <div class="row mt-4">
                    <div class="col-md-6">
                        <strong>🎂 DOB</strong>
                        <p id="modalUserDob"></p>
                    </div>
                    <div class="col-md-6">
                        <strong>📞 Mobile</strong>
                        <p id="modalUserMobile"></p>
                    </div>
                </div>

                <div class="mt-3">
                    <strong>📧 Email</strong>
                    <p id="modalUserEmail"></p>
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