<?= $this->extend('auth__section/components/layout') ?>
<?= $this->section('auth_contents') ?>


<div class="auth-fluid" style="background: url(<?= base_url() ?>/img/auth-bg.png) right; background-repeat: no-repeat; ">
    <!--Auth fluid left content -->
    <div class="auth-fluid-form-box">
        <div class="align-items-center d-flex h-100">
            <div class="card-body">

                <!-- Logo -->
                <div class="auth-brand text-center text-lg-start">
                    <a href="<?= base_url("/") ?>" class="logo-dark">
                        <span><img src="<?= base_url("img/$setting[logo_utama]") ?>" alt="" height="70"></span>
                    </a>
                </div>

                <!-- title-->
                <h4 class="mt-0">Masuk</h4>
                <p class="text-muted mb-4">Masukkan email dan password Kamu dan temukan destinasi wisata yang sesuai dengan keinginan Anda.</p>

                <!-- form -->
                <form id="formLogin">
                    <?= csrf_field() ?>
                    <div class="mb-3">
                        <label for="emailaddress" class="form-label">Alamat Email</label>
                        <input name="email" class="form-control" type="email" id="emailaddress" required="" placeholder="Enter your email">
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input name="password" class="form-control" type="password" required="" id="password" placeholder="Enter your password">
                    </div>
                    <div class="d-grid mb-0 text-center">
                        <button class="btn btn-primary" type="submit"><i class="mdi mdi-login"></i> Masuk </button>
                    </div>
                </form>
                <!-- social-->
                <div class="text-center mt-4">
                    <p class="text-muted font-16">Masuk dengan</p>
                    <ul class="social-list list-inline mt-3">
                        <li class="list-inline-item">
                            <a href="<?= $link ?>" class="social-list-item border-danger text-danger"><i class="mdi mdi-google"></i></a>
                        </li>
                    </ul>
                </div>
                <!-- end form-->

                <!-- Footer-->
                <footer class="footer footer-alt">
                    <p class="text-muted">Kamu belum punya akun? <a href="<?= base_url("register") ?>" class="text-muted ms-1"><b>Mari buat di sini</b></a></p>
                </footer>

            </div> <!-- end .card-body -->
        </div> <!-- end .align-items-center.d-flex.h-100-->
    </div>
    <!-- end auth-fluid-form-box-->

    <!-- Auth fluid right content -->
    <div class="auth-fluid-right text-center">
        <div class="auth-user-testimonial">
            <h2 class="mb-3">DOLANKUY!</h2>
            <p class="lead"><i class="mdi mdi-format-quote-open"></i>Nikmati Wisatamu Hilangkan Maslahmu!<i class="mdi mdi-format-quote-close"></i>
            </p>
            <p>
                - Admin Dolankuy
            </p>
        </div> <!-- end auth-user-testimonial-->
    </div>
    <!-- end Auth fluid right content -->
</div>
<!-- end auth-fluid-->
<script>
$(document).ready(function() {
    $('#formLogin').on('submit', function(e) {
        e.preventDefault();
        $.ajax({
            url: '/login/auth_process', // Adjust the URL if necessary
            type: 'POST',
            data: $(this).serialize(),
            dataType: 'json',
            success: function(response) {
                if (response.status === 'success') {
                        window.location.href = response.redirect;
                } else if (response.status === 'error') {
                    Swal.fire({
                        icon: 'error',
                        title: 'Error',
                        text: response.message,
                        timer: 2000,
                        showConfirmButton: false
                    });
                }
            },
            error: function(xhr, status, error) {
                Swal.fire({
                    title: 'Error!',
                    text: 'An error occurred. Please try again.',
                    icon: 'error',
                    confirmButtonText: 'OK'
                }).then(function() {
                    window.location.reload(); // Reload the page if there's an AJAX error
                });
            }
        });
    });
});
</script>

<?= $this->endsection(); ?>