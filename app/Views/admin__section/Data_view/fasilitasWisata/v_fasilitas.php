<?= $this->extend('admin__section/components/layout') ?>
<?= $this->section('admin_contents') ?>


<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Admin</a></li>
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Main Data</a></li>
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Fasilitas Wisata</a></li>
                        <li class="breadcrumb-item active">Data Fasilitas</li>
                    </ol>
                </div>
                <h4 class="page-title">Main Data</h4>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <label class="page-title">Data Fasilitas</label>
                    <div class="table-responsive">
                        <table class="table table-centered table-nowrap table-hover mb-0">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Fasilitas</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if (!empty($fasilitas)) {
                                    $no = 1 + ($perPage * ($currentPage - 1));
                                    foreach ($fasilitas as $key => $k) {
                                ?>
                                        <tr>
                                            <td><?= $no++ ?></td>
                                            <td><?= $k['fasilitas'] ?></td>
                                            <td class="table-action">
                                                <a href="javascript:void(0);" class="action-icon edit-btn" data-fasilitas="<?= $k['fasilitas'] ?>" id-fasilitas="<?= $k['id_fasilitas'] ?>"> <i class="mdi mdi-square-edit-outline"></i></a>
                                                <a href="" id-fasilitas="<?= $k['id_fasilitas'] ?>" class="action-icon"> <i class="mdi mdi-delete delete-btn"></i></a>
                                            </td>
                                        </tr>
                                <?php
                                    }
                                } ?>
                            </tbody>
                        </table>
                        <div class="d-flex justify-content-end align-items-center mt-2">
                            <nav>
                                <?= $pager->links("fasilitas", 'fasilitas_pager') ?>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-6">
            <div class="row">
                <div class="card">
                    <div class="card-body">
                        <label class="page-title">Tambah Data Fasilitas</label>
                        <form action="" method="POST" class="mt-2" id="fasilitasForm">
                            <div class="form-group my-2">
                                <label for="fasilitas" class="my-1">fasilitas</label>
                                <input type="text" class="form-control" name="fasilitas" id="fasilitasInput" placeholder="Masukkan Fasilitas" required>
                            </div>

                            <div class="form-group">
                                <div class="d-grid gap-2">
                                    <button type="submit" class="btn btn-primary btn-block">Tambah Fasilitas</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="card" id="editFormContainer" style="display: none;">
                    <div class="card-body">
                        <label class="page-title">Edit Data Fasilitas</label>
                        <form action="" method="POST" class="mt-2" id="editFasilitasForm">
                            <div class="form-group my-2">
                                <label for="editFasilitas" class="my-1">Fasilitas</label>
                                <input type="text" class="form-control" name="editFasilitas" id="editFasilitas" placeholder="Masukkan Fasilitas">
                                <input type="hidden" class="form-control" name="idFasilitas" id="idFasilitas">
                            </div>

                            <div class="form-group">
                                <div class="d-grid gap-2">
                                    <button type="submit" class="btn btn-warning text-white btn-block">Simpan Perubahan</button>
                                </div>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>


    </div>
</div>

<script>
    // add script
    $(document).ready(function() {
        $('#fasilitasForm').on('submit', function(e) {
            e.preventDefault();
            $.ajax({
                url: '/main_data/fasilitas_wisata/add/process',
                type: 'POST',
                data: $(this).serialize(),
                dataType: 'json',
                success: function(response) {
                    Swal.fire({
                        title: response.type === 'success' ? 'Success!' : 'Error!',
                        text: response.text,
                        icon: response.type,
                        confirmButtonText: 'OK'
                    }).then((result) => {
                        if (response.type === 'success') {
                            window.location.href = '/main_data/fasilitas_wisata';
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
        });
    });

    document.addEventListener('DOMContentLoaded', function() {
        const editButtons = document.querySelectorAll('.edit-btn');

        editButtons.forEach(button => {
            button.addEventListener('click', function() {
                const fasilitas = this.getAttribute('data-fasilitas');
                const id = this.getAttribute('id-fasilitas');
                document.getElementById('editFasilitas').value = fasilitas;
                document.getElementById('idFasilitas').value = id;
                document.getElementById('editFormContainer').style.display = 'block';
            });
        });
    });

    $(document).ready(function() {
        $('#editFasilitasForm').on('submit', function(e) {
            e.preventDefault();

            $.ajax({
                url: '/main_data/fasilitas_wisata/edit/process/' + $('#idFasilitas').val(),
                type: 'POST',
                data: $(this).serialize(),
                dataType: 'json',
                success: function(response) {
                    Swal.fire({
                        title: response.type === 'success' ? 'Success!' : 'Error!',
                        text: response.text,
                        icon: response.type,
                        confirmButtonText: 'OK'
                    }).then((result) => {
                        if (response.type === 'success') {
                            window.location.href = '/main_data/fasilitas_wisata';
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
        });
    });

    // delete script
    $(document).ready(function() {
        // Tambahkan event listener untuk tombol/hyperlink delete
        $('.delete-btn').on('click', function(e) {
            e.preventDefault();


            var idFasilitas = $(this).closest('a').attr('id-fasilitas');

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
                        url: '/main_data/fasilitas_wisata/delete/' + idFasilitas,
                        type: 'DELETE',
                        dataType: 'json',
                        success: function(response) {
                            Swal.fire({
                                title: response.type === 'success' ? 'Success!' : 'Error!',
                                text: response.text,
                                icon: response.type,
                                confirmButtonText: 'OK'
                            }).then((result) => {
                                // Redirect atau refresh halaman jika sukses
                                if (response.type === 'success') {
                                    window.location.href = '/main_data/fasilitas_wisata';
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