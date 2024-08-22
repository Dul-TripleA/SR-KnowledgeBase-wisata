<div class="container-fluid bg-dark text-white-50 footer pt-5 mt-5 wow fadeIn" data-wow-delay="0.1s">
    <div class="container py-5">
        <div class="row g-5">
            <div class="col-md-3">
                <h5 class="text-white mb-4">Kontak kami</h5>
                <p class="mb-2"><i class="mdi mdi-google-maps me-3"></i><?= $setting['alamat'] ?></p>
                <p class="mb-2"><i class="mdi mdi-phone me-3"></i><?= $setting['telp'] ?></p>
                <p class="mb-2"><i class="mdi mdi-email"></i><?= $setting['email'] ?></p>
                <div class="d-flex pt-2">
                    <a class="btn btn-outline-light btn-social" href="<?= $setting['ig'] ?>"><i class="mdi mdi-instagram"></i></a>
                    <a class="btn btn-outline-light btn-social" href="<?= $setting['fb'] ?>"><i class="mdi mdi-facebook"></i></a>
                    <a class="btn btn-outline-light btn-social" href="<?= $setting['yt'] ?>"><i class="mdi mdi-youtube"></i></a>
                </div>
            </div>
            <div class="col-md-9 d-none d-md-block">
                <h5 class="text-white mb-4">Photo Gallery</h5>
                <div class=" row">
                    <?php foreach ($gallery as $key => $value) { ?>
                        <div class="col-4 gap-2">
                            <img src="<?= base_url("img/$value[gambar]") ?>" alt="" class="img-fluid">
                        </div>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="copyright">
            <div class="row">
                <div class="col-md-6 text-center text-md-start mb-3 mb-md-0">
                    &copy; <a class="border-bottom" href="#">DolanKuy</a>, All Right Reserved.
                </div>
                <div class="col-md-6 text-center text-md-end">
                    <div class="footer-menu">
                        <a href="">Home</a>
                        <a href="">Rekomendasi Wisata</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Footer End -->


<!-- Back to Top -->
<a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>
</div>

<!-- JavaScript Libraries -->
<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="<?= base_url() ?>/user__styles/lib/wow/wow.min.js"></script>
<script src="<?= base_url() ?>/user__styles/lib/easing/easing.min.js"></script>
<script src="<?= base_url() ?>/user__styles/lib/waypoints/waypoints.min.js"></script>
<script src="<?= base_url() ?>/user__styles/lib/owlcarousel/owl.carousel.min.js"></script>

<!-- Template Javascript -->
<script src="<?= base_url() ?>/user__styles/js/main.js"></script>

</body>

</html>