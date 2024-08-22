<?= $this->extend('admin__section/components/layout') ?>
<?= $this->section('admin_contents') ?>

<!-- start page title -->
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Admin</a></li>
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Riwayat Rekomendasi</a></li>
                    </ol>
                </div>
                <h4 class="page-title"><?= $title ?></h4>
            </div>
        </div>
    </div>
    <!-- end page title -->
</div>
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <table id="basic-datatable" class="table dt-responsive nowrap w-100">
                    <thead>
                        <tr class="m-auto">
                            <th>#</th>
                            <th>User</th>
                            <th>Sim. Kategori Wisata</th>
                            <th>Sim. Lokasi</th>
                            <th>Sim. Harga Tiket</th>
                            <th>Sim. Fasilitas</th>
                            <th>Sim. Rating</th>
                            <th>Simmilarity</th>
                            <th>Hasil Rekomendasi</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (!empty($history)) {
                            foreach ($history as $key => $v) {
                                if ($v['deleted_at'] == null) { ?>
                                    <tr>
                                        <td><a href="" class="fw-bold text-primary">Pencarian ke -<?= $v['recommendation_Num'] ?></a></td>
                                        <td><?= $v['id_user'] ?></td>
                                        <td><?= $v['sim_kategori'] ?></td>
                                        <td><?= $v['sim_lokasi'] ?></td>
                                        <td><?= $v['sim_harga_tiket'] ?></td>
                                        <td><?= $v['sim_fasilitas'] ?></td>
                                        <td><?= $v['sim_rating'] ?></td>
                                        <td><?= $v['similarity'] ?></td>
                                        <td><span class="badge badge-primary-lighten"><?= $v['nama_wisata'] ?></span></td>
                                        <td class="table-action" style="width: 90px;">
                                            <a href="<?= base_url() ?>/riwayat_rekomendasi_unknown_user/detail/<?= $v['recommendation_Num'] ?>" class="action-icon detail-btn">
                                                <i class="mdi mdi-eye"></i>
                                            </a>
                                            <a href="" class="action-icon delete-btn" number="<?= $v['recommendation_Num'] ?>">
                                                <i class="mdi mdi-delete"></i>
                                            </a>
                                        </td>
                                    </tr>
                                <?php } else {
                                } ?>
                        <?php }
                        } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function() {
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
                                    window.location.href = '/riwayat_rekomendasi_unknown_user';
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

<?= $this->endSection() ?>