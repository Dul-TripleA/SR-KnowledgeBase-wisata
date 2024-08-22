<?= $this->extend('user__section/components/layout') ?>
<?= $this->section('contents') ?>

<style>
    .text-strike {
        text-decoration: line-through;
        text-decoration-color: #0e2e50;
        /* text-decoration-color: red; */
    }
</style>

<div class="container-fluid header d-flex align-items-center justify-content-center animated fadeIn" style="background-image: url(<?= base_url() ?>/img/cover.png); background-size: cover; background-position: center; width: 100%; height: 60vh;">
    <div class="d-flex align-items-center justify-content-center flex-column">
        <h1 class="display-5 animated fadeIn my-4 text-center ">Ini Semua Tentang <span class="text-strike text-primary">KITA</span> DolanKuy</h1>
        <nav aria-label="breadcrumb animated fadeIn">
            <ol class="breadcrumb">
                <li class="breadcrumb-item text-white fw-bold">Tentang Kami</li>
            </ol>
        </nav>
    </div>
</div>

<div class="container my-5">
    <div class="row my-5 pt-4">
        <div class="col-md-6 d-flex justify-content-center">
            <img class="rounded img-fluid my-3" src="<?= base_url() ?>/img/<?= $setting["logo_utama"] ?>" alt="">
        </div>
        <div class="col-md-6">
            <div class="desc d-flex flex-column ">
                <h1 class="animated text-primary fadeIn display-5 text-center text-md-start d-none d-md-block">DolanKuy</h1>
                <p style="text-align: justify;" class="fw-medium"><?= $setting["deskripsi"] ?></p>
                <p class="fw-medium text-muted" style="font-size: 14px;">--Admin DolanKuy</p>
            </div>
        </div>
    </div>
    <div class="row my-4 py-4">
        <div class="col-md-6 d-flex flex-column">
            <h1 class="display-5 animated fadeIn my-4 text-center text-md-start">Website Rekomendasi Wisata Kab. Wonogiri <span class="text-primary">DolanKuy</span></h1>
            <p class="fw-medium text-center text-md-start" style="font-size: 18px;">Berwisata sesuai dengan keinginan Anda? Temukan destinasi wisata keinginanmu bersama <a href="<?= base_url("/") ?>">Dolankuy</a></p>
        </div>
        <div class="col-md-3  d-flex flex-column gap-0 align-items-center justify-content-center">
            <h1 class="animated fadeIn display-5"><?= $jumlahWisata ?></h1>
            <p class="" style="font-size: 12px;">Destinasi Wisata</p>
        </div>
        <div class="col-md-3  d-flex flex-column gap-0 align-items-center justify-content-center">
            <h2 class="display-5 animated fadeIn "><?= $jumlahPencarianRekomendasi ?>+</h2>
            <p class="" style="font-size: 12px;">Jumlah Pencarian Rekomendasi</p>
        </div>
    </div>
</div>


<?= $this->endSection() ?>