<?php
$request = \Config\Services::request();
$uri = $request->getURI();
$cek = $uri->getSegment(1);



?>


<div class=" m-0 p-0">
    <!-- Navbar Start -->
    <div class="container-fluid nav-bar bg-transparent">
        <nav class="navbar navbar-expand-lg bg-white navbar-light py-0 px-4">
            <!-- logo -->
            <a href="index.html" class="navbar-brand d-flex align-items-center justify-content-center">
                <div class="icon p-2 me-2">
                    <img class="img-fluid" src="<?= base_url("img/$setting[icon_logo]") ?>" alt="Icon" style="width: 30px; height: 30px;">
                </div>
                <h3 class="m-0]" style="color: #145E7B;">Dolan<span class="text-primary">Kuy</span></h3>
            </a>
            <button type="button" class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse mb-lg-0 mb-4" id="navbarCollapse">
                <div class="navbar-nav ms-auto">
                    <a href="<?= base_url("/") ?>" class="nav-item nav-link <?= $cek == "" ? 'active' : ''; ?>">Home</a>
                    <a href="<?= base_url("/rekomendasi") ?>" class="nav-item nav-link <?= $cek == "rekomendasi" ? 'active' : ''; ?>">Destinasi Wisata</a>
                    <a href="<?= base_url("/tentang_kami") ?>" class="nav-item nav-link <?= $cek == "tentang_kami" ? 'active' : ''; ?>">Tentang Kami</a>
                    <a href="<?= base_url("/beri_review_pada_DolanKuy") ?>" class="nav-item nav-link <?= $cek == "beri_review_pada_DolanKuy" ? 'active' : ''; ?>">Beri Kami Saran</a>
                </div>
                <?php if (isset($session) && $session['level'] == "1") { ?>
                    <a href="<?= base_url("/dashboard") ?>" class="btn btn-primary px-3 d-flex">Back to Dashboard</a>
                <?php } elseif (isset($session) && $session['level'] ==  "2") {  ?>
                    <a href="<?= base_url("/logout") ?>" class="btn btn-primary px-3 d-flex">Logout</a>
                <?php } else { ?>
                    <a href="<?= base_url("login") ?>" class="btn btn-primary px-3 d-flex">Masuk</a>
                <?php } ?>
            </div>
        </nav>
    </div>
    <!-- Navbar End -->