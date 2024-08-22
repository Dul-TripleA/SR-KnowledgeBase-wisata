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
                        <li class="breadcrumb-item active">>Dashboard</li>
                    </ol>
                </div>
                <h4 class="page-title"><?= $title ?></h4>
            </div>
        </div>
    </div>
    <!-- end page title -->


    <div class="row">
        <div class="col-12">
            <div class="card widget-inline">
                <div class="card-body p-0">
                    <div class="row g-0">
                        <div class="col-sm-6 col-xl-3">
                            <div class="card shadow-none m-0">
                                <div class="card-body text-center">
                                    <i class="dripicons-briefcase text-muted" style="font-size: 24px;"></i>
                                    <h3><span><?= $jumlahWisata ?></span></h3>
                                    <p class="text-muted font-15 mb-0">Total Wisata</p>
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-6 col-xl-3">
                            <div class="card shadow-none m-0 border-start">
                                <div class="card-body text-center">
                                    <i class="dripicons-checklist text-muted" style="font-size: 24px;"></i>
                                    <h3><span><?= $jumlahRekomendasi ?></span></h3>
                                    <p class="text-muted font-15 mb-0">Total Pencarian Rekomendasi</p>
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-6 col-xl-3">
                            <div class="card shadow-none m-0 border-start">
                                <div class="card-body text-center">
                                    <i class="dripicons-user-group text-muted" style="font-size: 24px;"></i>
                                    <h3><span><?= $jumlahUser ?></span></h3>
                                    <p class="text-muted font-15 mb-0">Total User</p>
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-6 col-xl-3">
                            <div class="card shadow-none m-0 border-start">
                                <div class="card-body text-center">
                                    <i class="dripicons-graph-line text-muted" style="font-size: 24px;"></i>
                                    <h3><span><?= $rating ?></span> <i class="mdi mdi-arrow-up text-success"></i></h3>
                                    <p class="text-muted font-15 mb-0">Efektifitas</p>
                                </div>
                            </div>
                        </div>

                    </div> <!-- end row -->
                </div>
            </div> <!-- end card-box-->
        </div> <!-- end col-->
    </div>
    <!-- end row-->

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="header-title mb-3">Riwayat Rekomendasi</h4>
                    <ul class="nav nav-pills nav-justified form-wizard-header mb-4">
                        <li class="nav-item">
                            <a href="#basictab1" data-bs-toggle="tab" data-toggle="tab" class="nav-link rounded-0 pt-2 pb-2 active">
                                <i class="mdi mdi-account-circle me-1"></i>
                                <span class="d-none d-sm-inline">Riwayat Recomendasi</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#basictab2" data-bs-toggle="tab" data-toggle="tab" class="nav-link rounded-0 pt-2 pb-2">
                                <i class="mdi mdi-face-profile me-1"></i>
                                <span class="d-none d-sm-inline">Unknown-User Riwayat Rekomendasi</span>
                            </a>
                        </li>
                    </ul>

                    <div class="tab-content b-0 mb-0">
                        <div class="tab-pane active" id="basictab1">
                            <div class="row">
                                <div class="col-12">
                                    <div class="table-responsive">
                                        <table class="table table-centered table-nowrap table-hover mb-0">
                                            <tbody>
                                                <?php
                                                $data = $historyRecommendation;
                                                if (!empty($data)) {
                                                    foreach ($data as $key => $d) {
                                                        if ($d['deleted_at'] == null) { ?>
                                                            <tr>
                                                                <td>
                                                                    <h5 class="font-14 my-1"><a href="" class="text-body">Pencarian ke - <?= $d['recommendation_Num'] ?></a></h5>
                                                                    <span class="text-muted font-13"><?= date('d F Y', strtotime($d['created_at'])) ?></span>
                                                                </td>
                                                                <td>
                                                                    <span class="text-muted font-13">User</span> <br>
                                                                    <span class="badge badge-warning-lighten"><?= $d['username'] ?></span>
                                                                </td>
                                                                <td>
                                                                    <span class="text-muted font-13">Nilai Similarity</span><br>
                                                                    <span class="font-14 mt-1 fw-normal"><?= $d['similarity'] ?></span>
                                                                </td>
                                                                <td>
                                                                    <span class="text-muted font-13">Hasil Rekomendasi</span><br>
                                                                    <span class="font-14 mt-1 fw-normal"><?= $d['nama_wisata'] ?></span>
                                                                </td>
                                                                <td class="table-action" style="width: 90px;">
                                                                    <a href="<?= base_url() ?>riwayat_rekomendasi/detail/<?= $d['recommendation_Num'] ?>" class="action-icon detail-btn" number="<?= $d['recommendation_Num'] ?>">
                                                                        <i class="mdi mdi-eye"></i>
                                                                    </a>
                                                                    <a href="" class="action-icon delete-btn" number="<?= $d['recommendation_Num'] ?>">
                                                                        <i class="mdi mdi-delete"></i>
                                                                    </a>
                                                                </td>
                                                            </tr>
                                                <?php  }
                                                    }
                                                }
                                                ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div> <!-- end col -->
                            </div> <!-- end row -->
                        </div>
                        <div class="tab-pane" id="basictab2">
                            <div class="row">
                                <div class="col-12">
                                    <div class="table-responsive">
                                        <table class="table table-centered table-nowrap table-hover mb-0">
                                            <tbody>
                                                <?php
                                                $data = $unknownUserHistoryrecommendation;
                                                if (!empty($data)) {
                                                    foreach ($data as $key => $d) {
                                                        if ($d['deleted_at'] == null) { ?>
                                                            <tr>
                                                                <td>
                                                                    <h5 class="font-14 my-1"><a href="" class="text-body">Pencarian ke - <?= $d['recommendation_Num'] ?></a></h5>
                                                                    <span class="text-muted font-13"><?= date('d F Y', strtotime($d['created_at'])) ?></span>
                                                                </td>
                                                                <td>
                                                                    <span class="text-muted font-13">User</span> <br>
                                                                    <span class="badge badge-warning-lighten"><?= $d['id_user'] ?></span>
                                                                </td>
                                                                <td>
                                                                    <span class="text-muted font-13">Nilai Similarity</span><br>
                                                                    <span class="font-14 mt-1 fw-normal"><?= $d['similarity'] ?></span>
                                                                </td>
                                                                <td>
                                                                    <span class="text-muted font-13">Hasil Rekomendasi</span><br>
                                                                    <span class="font-14 mt-1 fw-normal"><?= $d['nama_wisata'] ?></span>
                                                                </td>
                                                                <td class="table-action" style="width: 90px;">
                                                                    <a href="<?= base_url() ?>/riwayat_rekomendasi_unknown_user/detail/<?= $d['recommendation_Num'] ?>" class="action-icon detail-btn" number="<?= $d['recommendation_Num'] ?>">
                                                                        <i class="mdi mdi-eye"></i>
                                                                    </a>
                                                                    <a href="" class="action-icon delete-btn" number="<?= $d['recommendation_Num'] ?>">
                                                                        <i class="mdi mdi-delete"></i>
                                                                    </a>
                                                                </td>
                                                            </tr>
                                                <?php  }
                                                    }
                                                }
                                                ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div> <!-- end col -->
                            </div> <!-- end row -->
                        </div>

                        <!--  -->
                    </div> <!-- tab-content -->
                </div> <!-- end #basicwizard-->
            </div>
        </div>
    </div>
    <!-- end row-->
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="header-title mb-3">Review Wisata Terbaru</h4>
                    <div class="table-responsive">
                        <table class="table table-centered table-nowrap table-hover mb-0">
                            <tbody>
                                <?php if (!empty($review)) {
                                    foreach ($review as $key => $r) { ?>
                                        <tr>
                                            <td>
                                                <div class="d-flex align-items-start">
                                                    <img class="me-2 rounded-circle" src="<?= $r['profile_pic'] ?>" width="40" alt="Generic placeholder image">
                                                    <div>
                                                        <h5 class="mt-0 mb-1"><?= $r['username'] ?><small class="fw-normal ms-3"><?= $r['nama_wisata'] ?> | <?= date('d F Y', strtotime($r['created_at'])) . " " . date('H:i', strtotime($r['created_at'])) ?></small></h5>
                                                        <span class="font-13"><?= $r['komen'] ?></span>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <span class="text-muted font-13">Rating</span> <br>
                                                <?php
                                                $fullStars = floor($r['rating']);
                                                $halfStar = ($r['rating'] - $fullStars >= 0.5) ? 1 : 0;
                                                $emptyStars = 5 - $fullStars - $halfStar;
                                                for ($i = 0; $i < $fullStars; $i++) {
                                                ?>
                                                    <i class="mdi mdi-star m-0" style="color: gold; font-size: 12px;"></i>
                                                <?php }
                                                if ($halfStar) { ?>
                                                    <i class="mdi mdi-star-half-full m-0" style="color: gold; font-size: 12px;"></i>
                                                <?php } ?>
                                            </td>
                                            <td>
                                                <span class="text-muted font-13">Status</span> <br>
                                                <?php if ($r['status'] == 'Active' || $r['status'] == 'active') { ?>
                                                    <span class="badge badge-success-lighten"><?= $r['status'] ?></span>
                                                <?php } else { ?>
                                                    <span class="badge badge-danger-lighten"><?= $r['status'] ?></span>
                                                <?php } ?>
                                            </td>
                                            <td class="table-action" style="width: 50px;">
                                                <div class="dropdown">
                                                    <a href="#" class="dropdown-toggle arrow-none card-drop" data-bs-toggle="dropdown" aria-expanded="false">
                                                        <i class="mdi mdi-dots-horizontal"></i>
                                                    </a>
                                                    <?php if ($r['status'] == 'Active' || $r['status'] == 'active') { ?>
                                                        <div class="dropdown-menu dropdown-menu-end">
                                                            <a href="" id="<?= $r['id_review'] ?>" class="dropdown-item non-active">Non Actifkan Review</a>
                                                        </div>
                                                    <?php } else { ?>
                                                        <div class="dropdown-menu dropdown-menu-end">
                                                            <a href="" id="<?= $r['id_review'] ?>" class="dropdown-item review-active">Aktifkan Review</a>
                                                        </div>
                                                    <?php } ?>
                                                </div>
                                            </td>
                                        </tr>

                                <?php }
                                } ?>
                            </tbody>
                        </table>
                    </div> <!-- end table-responsive-->
                </div>

            </div> <!-- end card body-->
        </div> <!-- end card -->
    </div>


</div> <!-- container -->

</div> <!-- content -->
<script>
    $(document).ready(function() {
        // non-active review
        $('.non-active').on('click', function(event) {
            event.preventDefault();
            var reviewId = $(this).attr('id');

            Swal.fire({
                title: 'Anda yakin?',
                text: "Anda akan menonaktifkan review ini!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ya, non aktifkan!'
            }).then((result) => {
                if (result.isConfirmed) {
                    // Kirim permintaan AJAX ke controller
                    $.ajax({
                        url: "/update-status-review/" + reviewId,
                        type: 'POST',
                        data: {
                            id_review: reviewId
                        },
                        success: function(response) {
                            if (response.success) {
                                Swal.fire(
                                    'Deactivated!',
                                    'Review berhasil di take down.',
                                    'success'
                                ).then(() => {
                                    window.location.reload();
                                });;
                            } else {
                                Swal.fire(
                                    'Error!',
                                    'There was an error deactivating the review.',
                                    'error'
                                );
                            }
                        },
                        error: function() {
                            Swal.fire(
                                'Error!',
                                'There was an error processing your request.',
                                'error'
                            );
                        }
                    });
                }
            });
        });

        // active review
        $('.review-active').on('click', function(event) {
            event.preventDefault();
            var reviewId = $(this).attr('id');
            Swal.fire({
                title: 'Anda yakin?',
                text: "Anda akan mengaktifkan review ini!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ya, aktifkan!'
            }).then((result) => {
                if (result.isConfirmed) {
                    // Kirim permintaan AJAX ke controller
                    $.ajax({
                        url: "/update-status-review/" + reviewId,
                        type: 'POST',
                        data: {
                            id_review: reviewId
                        },
                        success: function(response) {
                            if (response.success) {
                                Swal.fire(
                                    'Deactivated!',
                                    'Review berhasil di aktifkan.',
                                    'success'
                                ).then(() => {
                                    window.location.reload();
                                });
                            } else {
                                Swal.fire(
                                    'Error!',
                                    'There was an error deactivating the review.',
                                    'error'
                                );
                            }
                        },
                        error: function() {
                            Swal.fire(
                                'Error!',
                                'There was an error processing your request.',
                                'error'
                            );
                        }
                    });
                }
            });
        });

        // delete sim
        $('.delete-btn').on('click', function(e) {
            e.preventDefault();

            // Ambil nilai number dari atribut
            var number = $(this).closest('a').attr('number');
            console.log(number);

            // Konfirmasi penghapusan dengan Sweet Alert
            Swal.fire({
                title: 'Anda yakin?',
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
                        url: '/riwayat_rekomendasi/delete/' + number,
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
                                    window.location.href = '/dashboard';
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