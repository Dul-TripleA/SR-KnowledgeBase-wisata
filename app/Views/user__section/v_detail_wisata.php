<?= $this->extend('user__section/components/layout') ?>
<?= $this->section('contents') ?>

<style>
    .star-rating input[type="radio"] {
        display: none;
    }

    .star-rating label {
        color: #ddd;
        cursor: pointer;
    }

    .star-rating input[type="radio"]:checked~label {
        color: #ffc107;
    }

    .star-rating label:hover,
    .star-rating label:hover~label {
        color: #ffc107;
    }

    .star-rating {
        direction: rtl;
        display: inline-flex;
        font-size: 1.5rem;
    }

    .custom-dropzone {
        border: 2px dashed #ccc;
        text-align: center;
        padding: 20px;
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        min-height: 200px;
    }

    .custom-dropzone .dz-message {
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        margin: 0;
    }
</style>

<div class="container-fluid header d-flex align-items-center justify-content-center animated fadeIn" style="background-image: url(<?= base_url("/img/$gambar[0]") ?>); background-size: cover; background-position: center; width: 100%; height: 60vh;">
    <div class="">
        <div class="d-flex align-items-center justify-content-center flex-column">
            <h1 class="display-5 animated fadeIn my-4 text-center" style="width: 70%;">Selamat Datang di Detail Wisata <span class="text-primary"><?= $wisata->nama_wisata ?></span></h1>
            <nav aria-label="breadcrumb animated fadeIn">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item fw-bold"><a href="#">Home</a></li>
                    <li class="breadcrumb-item text-white fw-bold">Destinasi Wisata</li>
                </ol>
            </nav>
        </div>
    </div>
</div>

<div class="container-fluid card">
    <div class="container d-flex align-items-center justify-content-between my-3">
        <h3 class="fw-[800] animated fadeIn "><?= $wisata->nama_wisata ?></h3>
        <div class="rating d-flex flex-row align-items-center gap-2">
            <div class="rating-poin bg-primary rounded-circle d-flex align-items-center  justify-content-center" style="width:40px; height:40px;"><span class="text-white fw-bolder"><?= $wisata->avg_rating ?></span>
            </div>
            <div>
                <?php
                $fullStars = floor($wisata->avg_rating);
                $halfStar = ($wisata->avg_rating - $fullStars >= 0.5) ? 1 : 0;
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
                <p class="mb-0 fw-bold" style="font-size: 12px;"><?= $jumlahReviews ?> reviews</p>
            </div>
        </div>
    </div>
</div>
<div class="container">
    <div class="row">
        <div class="col-md-8 my-4">
            <div class="gambar card rounded">
                <?php if (is_array($gambar) && !empty($gambar)) { ?>
                    <div class="owl-carousel gambar-carousel wow fadeInUp" data-wow-delay="0.1s">
                        <?php foreach ($gambar as $image) : ?>
                            <img class=" rounded w-100 h-auto" src="<?= base_url('img/' . esc($image)) ?>" alt="Image of <?= esc($wisata->nama_wisata) ?>">
                        <?php endforeach; ?>
                    </div>
                <?php } ?>
            </div>
            <div class="deskripsi card rounded my-4">
                <div class="harga d-flex flex-column justify-content-between">
                    <div class="title border-bottom">
                        <h5 class="m-3">Deskripsi</h5>
                    </div>
                    <div class="harga-tiket">
                        <p class="m-3 text-justify"><?= $wisata->deskripsi ?></p>
                    </div>
                </div>
            </div>
            <div class="harga-tiket card rounded">
                <div class="d-flex flex-column justify-content-between">
                    <div class="title border-bottom">
                        <h5 class="m-3">Harga Tiket</h5>
                    </div>
                    <div class="harga">
                        <h6 class="m-3">Price: <span class="text-primary">Rp. <?= number_format($wisata->harga_tiket, 0, ',', '.') ?></span></h6>
                    </div>
                </div>
            </div>
            <div class="detail-wisata card rounded mt-4">
                <div class="d-flex flex-column justify-content-between">
                    <div class="title border-bottom">
                        <h5 class="m-3">Detail Wisata <?= $wisata->nama_wisata ?></h5>
                    </div>
                    <div class="detail border-bottom">
                        <div class="m-3">
                            <p>Lokasi: Kecamatan <?= $wisata->lokasi_kec ?></p>
                            <p>Alamat : <?= $wisata->alamat ?></p>
                        </div>
                    </div>
                    <div class="fasilitas">
                        <h6 class="m-3">Fasilitas</h6>
                        <p class="m-3"><?= implode(", ", json_decode($wisata->fasilitas, true)) ?></p>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4 my-4">
            <?php if (isset($session)) { ?>
                <div class="container-form-review card mb-4">
                    <div class="d-flex flex-column">
                        <div class="title border-bottom">
                            <h5 class="m-3">Beri Review Wisata <?= $wisata->nama_wisata ?></h5>
                        </div>
                        <div class="form-review">
                            <form class="m-3" action="<?= base_url("/rekomendasi/detail_wisata/reviewWisata") ?>" method="post" enctype="multipart/form-data" id="reviewForm">
                                <input type="text" name="id_wisata" id="id_wisata" value="<?= $wisata->id_wisata ?>" hidden>
                                <input type="text" name="id_user" id="id_user" value="<?= $session['id_user'] ?>" hidden>
                                <div class="form-group">
                                    <label for="review" class="mb-2 fw-bold">Review Wisata</label>
                                    <textarea class="form-control" id="review" name="komentar" rows="3"></textarea>
                                </div>
                                <div class="form-group my-2 d-flex flex-row align-items-center gap-2">
                                    <label for="" class="fw-bold">Rating</label>
                                    <div class="star-rating">
                                        <input type="radio" id="star5" name="rating" value="5"><label for="star5" title="5 stars">★</label>
                                        <input type="radio" id="star4" name="rating" value="4"><label for="star4" title="4 stars">★</label>
                                        <input type="radio" id="star3" name="rating" value="3"><label for="star3" title="3 stars">★</label>
                                        <input type="radio" id="star2" name="rating" value="2"><label for="star2" title="2 stars">★</label>
                                        <input type="radio" id="star1" name="rating" value="1"><label for="star1" title="1 star">★</label>
                                    </div>
                                </div>

                                <!-- File Upload Section -->
                                <div class="tab-pane show active" id="file-upload-preview">
                                    <div class="dropzone dz-clickable custom-dropzone" id="myAwesomeDropzone" data-plugin="dropzone" data-previews-container="#file-previews" data-upload-preview-template="#uploadPreviewTemplate">
                                        <div class="dz-message needsclick">
                                            <i class="h1 text-muted dripicons-cloud-upload"></i>
                                            <p class="fw-bolder">Upload gambar Anda di sini.</p>
                                            <span class="text-muted" style="font-size: small;">(Tambahkan <strong>1</strong> gambar yang berkesan <strong>Maks. 2MB</strong>)</span>
                                        </div>
                                        <div class="dropzone-previews mt-3" id="file-previews"></div>
                                    </div>

                                    <!-- Preview -->
                                    <div class="d-none" id="uploadPreviewTemplate">
                                        <div class="card bg-primary mb-0 shadow">
                                            <a href="javascript:void(0);" class="m-1 text-white fw-bold" data-dz-name style="font-size: small;"></a>
                                        </div>
                                    </div>
                                </div>
                                <input type="file" name="gambar" id="fileGambarReview" hidden>
                                <div class="d-grid mt-2 gap-2">
                                    <button type="submit" class="btn btn-primary btn-block" id="submitButton">Kirim Review</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            <?php } ?>
            <div class="reviews card">
                <div class="d-flex flex-column">
                    <div class="title border-bottom">
                        <h5 class="m-3">Review Wisata <?= $wisata->nama_wisata ?></h5>
                    </div>
                    <div class="review m-3">
                        <?php if (!empty($review)) { ?>
                            <div class="owl-carousel gambar-carousel wow fadeInUp" data-wow-delay="0.1s">
                                <?php foreach ($review as $key => $v) { ?>
                                    <div class="d-flex flex-column gap-4">
                                        <img src="<?= base_url('img/' . $v['gambar']) ?>" alt="">
                                        <div class="review-item">
                                            <div class="d-flex flex-row align-items-center justify-content-between gap-2">
                                                <h6 class="my-auto" style="font-size:18px;"><?= $v['username'] ?></h6>
                                                <p class="fw-medium my-auto" style="font-size: 10px;"><?= date('d F Y', strtotime($v['created_at'])) ?></p>
                                            </div>
                                            <?php
                                            $fullStars = floor($v['rating']);
                                            $halfStar = ($v['rating'] - $fullStars >= 0.5) ? 1 : 0;
                                            $emptyStars = 5 - $fullStars - $halfStar;
                                            for ($i = 0; $i < $fullStars; $i++) {
                                            ?>
                                                <i class="mdi mdi-star m-0" style="color: gold; font-size: 12px;"></i>
                                            <?php }
                                            if ($halfStar) { ?>
                                                <i class="mdi mdi-star-half m-0" style="color: gold; font-size: 12px;"></i>
                                            <?php }
                                            for ($i = 0; $i < $emptyStars; $i++) { ?>
                                                <!--<i class="far fa-star m-0" style="font-size: 12px;"></i>-->
                                            <?php } ?>
                                            <div class="komentar my-2">
                                                <p class="text-justify" style="font-size: smaller;"><?= $v['komen'] ?></p>
                                            </div>
                                        </div>
                                    </div>
                                <?php } ?>
                            </div>
                        <?php } else { ?>
                            <p>Belum ada review</p>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>

<script>
    Dropzone.autoDiscover = false;
    $(document).ready(function() {
        var myDropzone = new Dropzone("#myAwesomeDropzone", {
            url: "/",
            previewsContainer: "#file-previews",
            previewTemplate: document.querySelector('#uploadPreviewTemplate').innerHTML,
            autoProcessQueue: false,
            maxFiles: 1,
            maxFilesize: 2, // MB
            init: function() {
                this.on("addedfile", function(file) {
                    console.log("File added:", file);
                    if (this.files.length > 1) {
                        this.removeFile(this.files[0]);
                    }
                    let dataTransfer = new DataTransfer();
                    dataTransfer.items.add(file);
                    document.getElementById('fileGambarReview').files = dataTransfer.files;
                });
                this.on("thumbnail", function(file, dataUrl) {
                    console.log("Thumbnail created:", file);
                });
                this.on("error", function(file, message) {
                    if (file.size > this.options.maxFilesize * 1024 * 1024) {
                        Swal.fire({
                            title: 'Error!',
                            text: 'Ukuran Gambar Terlalu Besar.',
                            icon: 'error',
                            confirmButtonText: 'OK'
                        }).then(() => {
                            $('#fileGambarReview').val('');
                            this.removeFile(file);
                        });
                    } else {
                        console.log("Error:", message);
                    }
                });
            }
        });

        $('#reviewForm').on('submit', function(event) {
            event.preventDefault();
            var formData = new FormData(this);
            $.ajax({
                url: '/rekomendasi/detail_wisata/reviewWisata',
                type: 'POST',
                data: formData,
                contentType: false,
                processData: false,
                dataType: 'json',
                success: function(response) {
                    Swal.fire({
                        title: 'Success!',
                        text: "Anda berhasi menambahkan review",
                        icon: 'success',
                        confirmButtonText: 'OK'
                    }).then(() => {
                        windows.location.reload();
                    });
                },
                error: function(xhr, status, error) {
                    let errorMessage = 'Anda harus mengisi semu data!!.';
                    if (xhr.responseJSON && xhr.responseJSON.message) {
                        errorMessage = xhr.responseJSON.message;
                    }
                    Swal.fire({
                        title: 'Error!',
                        text: errorMessage,
                        icon: 'error',
                        confirmButtonText: 'OK'
                    });
                }
            });
        });
    });
</script>




<?= $this->endSection() ?>