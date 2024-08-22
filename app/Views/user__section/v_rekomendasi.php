<?= $this->extend('user__section/components/layout') ?>
<?= $this->section('contents') ?>


<div class="container-fluid header d-flex align-items-center justify-content-center animated fadeIn" style="background-image: url(<?= base_url() ?>/img/cover.png); background-size: cover; background-position: center; width: 100%; height: 60vh;">
    <div class="">
        <div class="d-flex align-items-center justify-content-center flex-column">
            <h1 class="display-5 animated fadeIn my-4 text-center text-md-start">Rekomendasi Destinasi Wisata</h1>
            <nav aria-label="breadcrumb animated fadeIn">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item text-white fw-bold">Destinasi Wisata</li>
                </ol>
            </nav>
        </div>
    </div>
</div>

<div class="container">
    <div class="my-4 g-4">
        <div class="row">
            <div class="col">
                <div class="">
                    <div class="title m-4 text-center breadcrumb-item active fw-bold">Temukan Rekomendasi wisata yang kamu inginkan</div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-4 fadeIn mb-4">
                <div class="recommendation-form">
                    <form id="recommendationForm" class="m-4">
                        <div class="form-group mb-2">
                            <label class="fw-bolder">Kategori</label>
                            <div class="row">
                                <?php foreach ($kategori as $key => $value) { ?>
                                    <div class="form-check col-auto px-2">
                                        <label class="form-check-label">
                                            <input class="form-check-input" type="checkbox" name="kategori[]" value="<?= $value['kategori'] ?>">
                                            <?= $value['kategori'] ?>
                                        </label>
                                    </div>
                                <?php } ?>
                            </div>
                        </div>
                        <div class="form-group mb-2">
                            <label class="fw-bolder">Harga Tiket</label>
                            <input type="range" class="range-harga" name="harga_tiket" min="0" max="<?= $harga_tiket_tertinggi ?>" step="1000" oninput="updateRangeOutput(this, 'Rp. ', ' /orang')">
                            <output style="font-size: 12px;">Rp.  /orang</output>
                        </div>
                        <div class="form-group mb-2">
                            <label class="fw-bolder">Fasilitas</label>
                            <div class="row">
                                <?php foreach ($fasilitas as $key => $value) { ?>
                                    <div class="form-check col-auto px-2">
                                        <label class="form-check-label">
                                            <input class="form-check-input" type="checkbox" name="fasilitas[]" value="<?= $value['fasilitas'] ?>">
                                            <?= $value['fasilitas'] ?>
                                        </label>
                                    </div>
                                <?php } ?>
                            </div>
                        </div>
                        <div class="form-group mb-2">
                            <label class="fw-bolder">Lokasi</label>
                            <select name="lokasi" class="form-select">
                                <option value="">Pilih Lokasi Kecamatan</option>
                                <?php foreach ($kecamatan as $key => $value) { ?>
                                    <option value="<?= $value['kecamatan'] ?>"><?= $value['kecamatan'] ?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="form-group mb-2">
                            <label class="fw-bolder">Rating</label>
                            <input type="range" class="range-rating" name="rating" min="0" max="5" step="0.5" oninput="updateRangeOutput(this, 'Rating ', '')">
                            <output style="font-size: 12px;">Rating  </output> <i class="mdi mdi-star" style="color: gold; font-size: 12px;"></i>
                        </div>
                        <?php if (isset($session)) { ?>
                            <input type="hidden" name="id_user" value="<?= $session['id_user'] ?>">
                        <?php } ?>
                        <div class="form-group mt-3">
                            <div class="d-grid gap-2">
                                <button type="submit" class="btn btn-primary btn-block" id="submitButton">Cari</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-lg-8">
                <div class="recommendation-result-content">
                    <div id="recommendationResult" class="row">
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
                                <div class="col-lg-6 col-md-6 wow fadeIn mb-3" data-wow-delay="0.1s">
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

                                                            <p class="mb-0 fw-bold text-white" style="font-size: 12px;"><?= $jumlahReviewer[$destinasi['id_wisata']] ?> reviews</p>
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
                        <div class="pagination d-flex justify-content-center ">
                            <?= $pager->links('rekomendasi', 'rekomendasi_pager') ?>
                        </div>
                    </div>
                </div>

                <!-- JavaScript -->
                <script>
                    $(document).ready(function() {
                        // Function to check if any input or checkbox is filled
                        function checkForm() {
                            let isFormFilled = false;

                            // Check if any checkbox is checked
                            $('input[type="checkbox"]').each(function() {
                                if ($(this).is(':checked')) {
                                    isFormFilled = true;
                                    return false; // Break loop
                                }
                            });

                            // Check if any text or number input has value
                            $('input[type="text"], input[type="number"]').each(function() {
                                if ($(this).val().trim() !== '') {
                                    isFormFilled = true;
                                    return false; // Break loop
                                }
                            });

                            // Enable or disable the submit button
                            $('#submitButton').prop('disabled', !isFormFilled);
                        }

                        // Initial check on page load
                        checkForm();

                        // Check form inputs on change
                        $('input').on('change keyup', function() {
                            checkForm();
                        });

                        // Handle form submission
                        $('#recommendationForm').on('submit', function(e) {
                            e.preventDefault(); // Prevent the default form submission

                            $.ajax({
                                type: 'POST',
                                url: '<?= base_url(); ?>/rekomendasi', // Replace with the correct URL to your controller
                                data: $(this).serialize(), // Serialize the form data
                                success: function(response) {
                                    console.log(response);
                                    // Clear previous results
                                    $('#recommendationResult').empty();

                                    // Check if there are results
                                    if (response.length > 0 && !response.error) {
                                        // Limit the results to 5 items
                                        response.slice(0, 4).forEach(function(res) {
                                            const card = `
                                <div class="col-lg-6 col-md-6 wow fadeIn mb-3" data-wow-delay="0.1s">
                                    <div class="card property-item rounded overflow-hidden">
                                        <div class="position-relative overflow-hidden">
                                            <a href="<?= base_url('') ?>/rekomendasi/detail_wisata/${res.item.nama_wisata}"><img class="img-fluid" src="<?= base_url(); ?>/img/${res.item.gambar}" alt="${res.item.nama_wisata}"></a>
                                            <div class="position-absolute start-0 bottom-5">
                                                <div class="d-flex gap-2 flex-row align-items-center">
                                                    <div class="bg-primary text-white rounded ms-4 p-2">${res.item.avg_rating}</div>
                                                    <div class="d-flex flex-column gap-1 justify-content-start">
                                                        <div class="d-flex">
                                                            ${generateStars(res.item.avg_rating)}
                                                        </div>
                                                        <p class="mb-0 fw-bold text-white" style="font-size: 12px;">${res.jumlah_reviewer} reviews</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="p-4 pb-0">
                                            <a class="d-block h5 mb-2" href="">${res.item.nama_wisata}</a>
                                            <p><i class="mdi mdi-google-maps text-primary me-2"></i>${res.item.lokasi_kec}</p>
                                        </div>
                                        <div class="d-flex border-top">
                                            <small class="flex-fill mx-4 py-2"><i class="mdi mdi-home-assistant text-primary me-2"></i>${res.item.kategori}</small>
                                        </div>
                                    </div>
                                </div>
                            `;
                                            $('#recommendationResult').append(card);
                                        });
                                    } else {
                                        $('#recommendationResult').append('<p>NTidak ditemukan rekomendasi yang sesuai dengan keinginan Anda!!.</p>');
                                    }
                                },
                                error: function(xhr, status, error) {
                                    console.log(xhr.responseText);
                                    $('#recommendationResult').html('<p>An error has occurred: ' + xhr.responseText + '</p>');
                                }
                            });
                        });

                        // Function to generate star rating
                        function generateStars(rating) {
                            let fullStars = Math.floor(rating);
                            let halfStar = (rating - fullStars >= 0.5) ? 1 : 0;
                            let emptyStars = 5 - fullStars - halfStar;
                            let starsHtml = '';

                            for (let i = 0; i < fullStars; i++) {
                                starsHtml += '<i class="mdi mdi-star" style="color: gold; font-size: 12px;"></i>';
                            }
                            if (halfStar) {
                                starsHtml += '<i class="mdi mdi-star-half" style="color: gold; font-size: 12px;"></i>';
                            }
                            // for (let i = 0; i < emptyStars; i++) {
                            //     starsHtml += '<i class="far fa-star" style="font-size: 12px;"></i>';
                            // }
                            return starsHtml;
                        }

                        // Fungsi untuk memperbarui nilai output dan gaya range
                    });

                    function updateRangeOutput(input, prefix = '', suffix = '') {
                        const output = input.nextElementSibling;
                        output.textContent = prefix + input.value + suffix;
                    }

                    // Event listener untuk menambahkan kelas primary saat input range diubah
                    const ranges = document.querySelectorAll('input[type="range"]');
                    ranges.forEach(range => {
                        range.addEventListener('input', function() {
                            // Hapus kelas primary dari semua range
                            ranges.forEach(r => {
                                r.classList.remove('primary');
                            });
                            // Tambahkan kelas primary pada range yang sedang dipilih
                            this.classList.add('primary');
                        });
                    });

                    const checkboxes = document.querySelectorAll('input[type="checkbox"]');

                    checkboxes.forEach(checkbox => {
                        checkbox.addEventListener('change', function() {
                            // Toggle class 'selected' on label when checkbox is checked
                            if (this.checked) {
                                this.parentElement.classList.add('selected');
                            } else {
                                this.parentElement.classList.remove('selected');
                            }
                        });
                    });

                </script>
                <style>
                    .range-harga,
                    .range-rating {
                        width: 100%;
                        height: 20px;
                        border: none;
                        border-radius: 10px;
                    }

                    .range-harga::-webkit-slider-thumb,
                    .range-rating::-webkit-slider-thumb {
                        width: 20px;
                        height: 20px;
                        border-radius: 50%;
                        cursor: pointer;
                        border: none;
                    }

                    .form-check-input {
                        display: none;
                        margin: 0px;
                        padding: 0px;
                    }

                    .form-check-label {
                        font-size: 12px;
                        cursor: pointer;
                        color: #00b4fa;
                        border: 1px solid #00b4fa;
                        border-radius: 5px;
                        padding: 5px;
                        margin: 5px 0px;
                        /* Menambahkan margin antara label */
                    }

                    /* Background style for selected categories */
                    .selected {
                        background-color: #00b4fa;
                        color: #fff;
                        font-weight: bold;
                        font-size: 12px;
                        /* Ganti warna latar belakang sesuai kebutuhan */
                    }

                    .suggestions {
                        border: 1px solid #ccc;
                        max-height: 150px;
                        overflow-y: auto;
                        position: absolute;
                        width: calc(100% - 50px);
                        z-index: 1000;
                        background-color: white;
                        display: none;
                    }

                    .suggestions ul {
                        list-style-type: none;
                        padding: 0;
                        margin: 0;
                    }

                    .suggestions li {
                        padding: 8px;
                        cursor: pointer;
                    }

                    .suggestions li:hover {
                        background-color: #f0f0f0;
                    }
                </style>
            </div>

        </div>
    </div>
</div>





<?= $this->endSection("contents") ?>