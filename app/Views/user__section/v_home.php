<?= $this->extend('user__section/components/layout') ?>
<?= $this->section('contents') ?>

<style>
    .star-rating .star-colored {
        color: #ffd700;
    }

    .testimonial-item {
        max-height: 400px;
        overflow: hidden;
    }

    .clamp-text {
        display: -webkit-box;
        -webkit-line-clamp: 3;
        /* jumlah baris yang diinginkan */
        -webkit-box-orient: vertical;
        overflow: hidden;
    }
</style>


<!-- Header Start -->
<div class="container-fluid header d-flex align-items-center justify-content-center animated fadeIn" style="background-image: url(<?= base_url() ?>/img/cover.png); background-size: cover; background-position: center; width: 100%; height: 100vh;">
    <div class=" p-5 mt-lg-5 animated fadeIn d-flex flex-column align-items-center justify-content-center ">
        <div class="d-flex flex-column align-items-center justify-content-center animated fadeIn  text-center mb-4">
            <h1 class="display-4 text-white">Lupakan Masalahmu, Waktunya Untuk </h1>
            <h1 class="text-primary display-4  ">Berwisata</h1>
        </div>
        <div class="d-flex flex-column align-items-center justify-content-center animated fadeIn">
            <p class="mb-4 pb-2 text-white text-center">Temukan destinasi wisata yang sesuai dengan keinginanmu <br> bersama DolanKuy kita jelajahi Wonogiri
            <p>
        </div>
        <a href="<?= base_url("/rekomendasi") ?>" class="btn btn-primary py-3 px-5 me-3 animated fadeIn">Temukan Destinasi Impianmu</a>
    </div>
</div>
<!-- Header End -->

<!-- destinasi list -->
<div class="py-5">
    <div class="container">
        <div class="row g-0 gx-5 align-items-end">
            <div class="col-lg-6">
                <div class="text-start mx-auto mb-5 wow slideInLeft" data-wow-delay="0.1s">
                    <h1 class="mb-3">Destinasi Wisata</h1>
                    <p>Rekomendasi wisata terpopuler untuk Anda.</p>
                </div>
            </div>
        </div>
        <div class="tab-content">
            <div class="tab-pane fade show p-0 active">
                <div class="row g-4">
                    <?php if (!empty($wisata)) : ?>
                        <?php foreach ($wisata as $destinasi) : ?>
                            <?php
                            $gambar_array = json_decode($destinasi['gambar'], true);
                            $kategori = implode(", ", json_decode($destinasi['kategori'], true));
                            $rating = $destinasi['avg_rating'];
                            if ($gambar_array === null || !is_array($gambar_array) || empty($gambar_array)) {
                                $gambar_array = [];
                            }
                            $sampul = !empty($gambar_array) ? $gambar_array[0] : '';
                            ?>
                            <div class="col-lg-4 col-md-4 wow fadeIn mb-3" data-wow-delay="0.1s">
                                <div class="card property-item rounded overflow-hidden">
                                    <div class="position-relative overflow-hidden">
                                        <a href="<?= base_url("/rekomendasi/detail_wisata/$destinasi[nama_wisata]") ?>"><img class="img-fluid" src="<?= base_url("img/$sampul"); ?>" alt="<?= $destinasi['nama_wisata'] ?>"></a>
                                        <div class="position-absolute start-0 bottom-5">
                                            <?php if ($rating != null) { ?>
                                                <div class="d-flex gap-2 flex-row align-items-center">
                                                    <div class="bg-primary text-white rounded ms-4 p-2"><?= $rating ?></div>
                                                    <div class="d-flex flex-column gap-1 justify-content-start">
                                                        <div class="d-flex">
                                                            <?php
                                                            $fullStars = floor($rating);
                                                            $halfStar = ($rating - $fullStars >= 0.5) ? 1 : 0;
                                                            $emptyStars = 5 - $fullStars - $halfStar;
                                                            for ($i = 0; $i < $fullStars; $i++) {
                                                            ?>
                                                                <i class="mdi mdi-star" style="color: gold; font-size: 12px;"></i>
                                                            <?php }
                                                            if ($halfStar) { ?>
                                                                <i class="mdi mdi-star-half" style="color: gold; font-size: 12px;"></i>
                                                            <?php }
                                                            for ($i = 0; $i < $emptyStars; $i++) { ?>
                                                                <!--<i class="far fa-star" style="font-size: 12px;"></i>-->
                                                            <?php } ?>
                                                        </div>

                                                        <p class="mb-0 fw-bold text-white" style="font-size: 12px;"><?= $jumlahReviews[$destinasi['id_wisata']] ?> reviews</p>
                                                    </div>
                                                </div>
                                            <?php } else { ?>
                                                <div class="d-flex gap-2 flex-row align-items-center">
                                                    <div class="bg-primary text-white rounded ms-4 p-2">0.0</div>
                                                    <div class="d-flex flex-column gap-1 justify-content-start">
                                                        <div class="d-flex">
                                                            <?php for ($i = 0; $i < 5; $i++) { ?>
                                                                <!--<i class="mdi mdi-star" style="font-size: 12px;"></i>-->
                                                            <?php } ?>
                                                        </div>
                                                        <p class=" mb-0 fw-bold text-white" style="font-size: 12px; ">0 reviews</p>
                                                    </div>
                                                </div>
                                            <?php } ?>
                                        </div>
                                    </div>
                                    <div class="p-4 pb-0">
                                        <a class="d-block h5 mb-2" href="<?= base_url("/rekomendasi/detail_wisata/$destinasi[nama_wisata]") ?>"><?= $destinasi['nama_wisata'] ?></a>
                                        <p><i class="mdi mdi-google-maps text-primary me-2"></i><?= $destinasi['lokasi_kec'] ?></p>
                                    </div>
                                    <div class="d-flex border-top">
                                        <div class="d-flex border-top">
                                            <small class="flex-fill mx-4 py-2"><i class="mdi mdi-home-assistant text-primary me-2"></i><?= $kategori ?></small>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    <?php else : ?>
                        <p>Tidak ada destinasi wisata yang ditemukan.</p>
                    <?php endif; ?>
                    <div class="col-12 text-center wow fadeInUp" data-wow-delay="0.1s">
                        <a class="btn btn-primary py-3 px-5" href="<?= base_url("/rekomendasi") ?>">Destinasi Wisata Lainnya</a>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
<!-- end setinasi list -->

<!-- Testimonial Start -->
<div class="container-fluid py-5">
    <div class="container">
        <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 600px;">
            <h1 class="mb-3">Review Teman - Teman Sekalian Pada Kami</h1>
            <p>Kami sangat beterimakasih atas semua saran dan kritik yang teman-teman berikan, karena akan membuat kami terus berkembang. Terimakasih dan Selamat mencari destinasi wisata.</p>
        </div>
        <div class="owl-carousel testimonial-carousel wow fadeInUp" data-wow-delay="0.1s">
            <?php foreach ($review as $key => $q) { ?>
                <div class="testimonial-item  rounded">
                    <div class="testimonial-card bg-white rounded p-4">
                        <div class="testimonial-text" style="height: 80px;">
                            <p class="clamp-text">
                                <?= $q['review'] ?>
                            </p>
                        </div>
                        <div class="giver-testimonial">
                            <div class="d-flex align-items-center">
                                 <?php 
                                                if($q['profile_pic']  != 'default.png'){ ?>
                                                    <img class="img-fluid flex-shrink-0 rounded" src="<?= $q['profile_pic'] ?>" style="width: 45px; height: 45px;">
                                                <?php }else{ ?>
                                                    <img class="img-fluid flex-shrink-0 rounded" src="<?= base_url('img/' . $q['profile_pic']) ?>" style="width: 45px; height: 45px;">
                                                <?php } ?>
                                
                                <div class="ps-3">
                                    <h6 class="fw-bold mb-1"><?= $q['username'] ?></h6>
                                    <small>
                                        <div class="d-flex">
                                            <?php
                                            $rating = $q["rating"];
                                            $fullStars = floor($rating);
                                            $halfStar = ($rating - $fullStars >= 0.5) ? 1 : 0;
                                            $emptyStars = 5 - $fullStars - $halfStar;
                                            for ($i = 0; $i < $fullStars; $i++) {
                                            ?>
                                                <i class="fas fa-star" style="color: gold; font-size: 12px;"></i>
                                            <?php }
                                            if ($halfStar) { ?>
                                                <i class="fas fa-star-half-alt" style="color: gold; font-size: 12px;"></i>
                                            <?php } ?>
                                        </div>
                                    </small>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
</div>
<script>
$(document).ready(function() {
    <?php if (session()->getFlashdata('login_success')): ?>
        Swal.fire({
            icon: 'success',
            title: 'Success',
            text: '<?= session()->getFlashdata('login_success') ?>',
            timer: 2000,
            showConfirmButton: false
        });
    <?php endif; ?>
});
</script>


<?= $this->endsection(); ?>