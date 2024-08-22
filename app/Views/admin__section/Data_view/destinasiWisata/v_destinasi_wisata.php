<?= $this->extend('admin__section/components/layout') ?>
<?= $this->section('admin_contents') ?>

<!-- Start Content-->
<div class="container-fluid">

    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Admin</a></li>
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Main Data</a></li>
                        <li class="breadcrumb-item active">Destinasi Wisata</li>
                    </ol>
                </div>
                <h4 class="page-title">Main Data</h4>
            </div>
        </div>
    </div>
    <!-- end page title -->

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="row mb-2">
                        <div class="col-sm-4">
                            <a href="<?= base_url("/main_data/destinasi_wisata/add") ?>" class="btn btn-danger mb-2"><i class="mdi mdi-plus-circle me-2"></i> Tambah Data Wisata</a>
                        </div>
                    </div>

                    <div class="table-responsive">
                        <table class="table table-centered w-100 dt-responsive nowrap" id="products-datatable">
                            <thead class="table-light">
                                <tr>
                                    <!-- <th class="all" style="width: 20px;">
                                        <div class="form-check">
                                            <input type="checkbox" class="form-check-input" id="customCheck1">
                                            <label class="form-check-label" for="customCheck1">&nbsp;</label>
                                        </div>
                                    </th> -->
                                    <th class="all">Nama Wisata</th>
                                    <th>Kategori</th>
                                    <th>Harga Tiket</th>
                                    <th>Lokasi (Kecamatan)</th>
                                    <th>Rating</th>
                                    <th>Fasilitas</th>
                                    <th style="width: 85px;">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if (!empty($destinasiWisata) && is_array($destinasiWisata)) : ?>
                                    <?php foreach ($destinasiWisata as $wisata) :
                                        $rating = $wisata["avg_rating"];
                                        $fullStars = floor($rating);
                                        $halfStar = ($rating - $fullStars >= 0.5) ? 1 : 0;
                                        $emptyStars = 5 - $fullStars - $halfStar;
                                    ?>
                                        <tr class="font-12">
                                            <!-- <td>
                                                <div class="form-check">
                                                    <input type="checkbox" class="form-check-input" id="customCheck11">
                                                    <label class="form-check-label" for="customCheck11">&nbsp;</label>
                                                </div>
                                            </td> -->
                                            <td>
                                                <p class="m-0 d-inline-block align-middle font-12">
                                                    <a href="" class="link-primary"><?= esc($wisata['nama_wisata']) ?></a>
                                                </p>
                                            </td>
                                            <td>
                                                <?php
                                                $kategori = json_decode($wisata['kategori'], true);
                                                if (is_array($kategori)) {
                                                    echo esc(implode(", ", $kategori));
                                                } else {
                                                    echo esc($wisata['kategori']); // Handle the case where it's not a valid JSON array
                                                }
                                                ?>
                                            </td>
                                            <td>
                                                Rp. <?= esc($wisata['harga_tiket']) ?>
                                            </td>
                                            <td>
                                                <?= esc($wisata['lokasi_kec']) ?>
                                            </td>
                                            <td>
                                                <?= $rating ?><br>
                                                <?php for ($i = 0; $i < $fullStars; $i++) {
                                                ?>
                                                    <i class="mdi mdi-star" style="color: gold; font-size: 10px;"></i>
                                                <?php }
                                                if ($halfStar) { ?>
                                                    <i class="mdi mdi-star-half" style="color: gold; font-size: 10px;"></i>
                                                <?php } ?>
                                                <?php for ($i = 0; $i < $emptyStars; $i++) { ?>
                                                    <i class="mdi mdi-star-outline" style="color: gold; font-size: 10px;"></i>
                                                <?php } ?>
                                            </td>
                                            <td>
                                                <?php
                                                $fasilitas = json_decode($wisata['fasilitas'], true);
                                                if (is_array($fasilitas)) {
                                                    echo esc(implode(", ", $fasilitas));
                                                } else {
                                                    echo esc($wisata['fasilitas']); // Handle the case where it's not a valid JSON array
                                                }
                                                ?>
                                            </td>
                                            <td class="table-action">
                                                <a href="<?= base_url("/main_data/destinasi_wisata/edit/" . $wisata['id_wisata']) ?>" class="action-icon"> <i class="mdi mdi-square-edit-outline"></i></a>
                                                <a href="" class="action-icon delete-btn" id_wisata="<?= $wisata['id_wisata'] ?>"> <i class="mdi mdi-delete"></i></a>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                <?php else : ?>
                                    <tr>
                                        <td colspan="8" class="text-center">Tidak ada destinasi wisata yang ditemukan.</td>
                                    </tr>
                                <?php endif; ?>

                            </tbody>
                        </table>
                    </div>
                </div> <!-- end card-body-->
            </div> <!-- end card-->
        </div> <!-- end col -->
    </div>
    <!-- end row -->
</div> <!-- container -->

<script>
    $(document).ready(function() {
        $('.delete-btn').on('click', function(e) {
            e.preventDefault();

            // Ambil nilai number dari atribut
            var number = $(this).closest('a').attr('id_wisata');
            console.log(number);

            // Konfirmasi penghapusan dengan Sweet Alert
            Swal.fire({
                title: 'Anda yakin menghapus ini?',
                text: "Anda tidak akan dapat mengembalikan ini!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ya, hapus!',
                cancelButtonText: 'Batal'
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: '/main_data/destinasi_wisata/delete/' + number,
                        type: 'DELETE',
                        dataType: 'json',
                        success: function(response) {
                            Swal.fire({
                                title: response.type === 'success' ? 'Success!' : 'Error!',
                                text: response.text,
                                icon: response.type,
                                confirmButtonText: 'OK'
                            }).then((result) => {
                                if (response.type === 'success') {
                                    window.location.href = '/riwayat_rekomendasi';
                                }
                            });
                        },
                        error: function(xhr, status, error) {
                            Swal.fire({
                                title: 'Error!',
                                text: 'Terjadi kesalahan. Silakan coba lagi.',
                                icon: 'error',
                                confirmButtonText: 'OK'
                            });
                        }
                    });
                }
            });
        });
    });
</script>
<?= $this->endsection() ?>