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
                <h4 class="mt-5">Gass Daftar!!</h4>
                <p class="text-muted mb-4">Kamu belum punya akun? daftar disini tidak sampai 5 menit</p>

                <!-- form -->
                <form id="formRegister">
                    <div class="mb-3">
                        <label for="fullname" class="form-label">Username</label>
                        <input class="form-control" name="username" type="text" id="fullname" placeholder="Enter your name" required>
                    </div>
                    <div class="mb-3">
                        <label for="emailaddress" class="form-label">Alamat Email</label>
                        <input class="form-control" name="email" type="email" id="emailaddress" required placeholder="Enter your email">
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input class="form-control" name="password" type="password" required id="password" placeholder="Enter your password">
                    </div>
                    <div class="mb-0 d-grid text-center">
                        <button class="btn btn-primary" type="submit"><i class="mdi mdi-account-circle"></i> Daftar </button>
                    </div>
                    <!-- social-->
                    <div class="text-center mt-4">
                        <p class="text-muted font-16">Daftar menggunakan</p>
                        <ul class="social-list list-inline mt-3">
                            <li class="list-inline-item">
                                <a href="<?= $link ?>" class="social-list-item border-danger text-danger"><i class="mdi mdi-google"></i></a>
                            </li>
                        </ul>
                    </div>
                </form>



                <!-- end form-->

                <!-- Footer-->
                <footer class="footer footer-alt">
                    <p class="text-muted">Kamu sudah punya akun ya? <a href="<?= base_url("login") ?>" class="text-muted ms-1"><b>Langsung masuk aja</b></a></p>
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
        $('#formRegister').on('submit', function(e) {
            e.preventDefault();
            $.ajax({
                url: '/register_process',
                type: 'POST',
                data: $(this).serialize(),
                dataType: 'json',
                success: function(response) {
                    let title = 'Error!';
                    let icon = 'error';

                    if (response.type === 'success') {
                        title = 'Success!';
                        icon = 'success';
                    }

                    Swal.fire({
                        title: title,
                        text: response.message  ,
                        icon: icon,
                        confirmButtonText: 'OK'
                    }).then((result) => {
                        if (response.type === 'success') {
                            window.location.href = '/login';
                        } else if (response.type === 'error_duplicate_email') {
                            window.location.reload();
                        }
                    });
                },
                error: function() {
                    Swal.fire({
                        title: 'Error!',
                        text: 'There was an error processing your request.',
                        icon: 'error',
                        confirmButtonText: 'OK'
                    });
                }
            });
        });
    });
</script>
<?= $this->endsection(); ?>