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
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Kecamatan</a></li>
                        <li class="breadcrumb-item active">Data Nama Kecamatan</li>
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
                    <label class="page-title">Data Kecamatan</label>
                    <div class="table-responsive">
                        <table class="table table-centered table-nowrap table-hover mb-0">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Kecamatan</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if (!empty($kecamatan)) {
                                    $no = 1 + ($perPage * ($currentPage - 1));
                                    foreach ($kecamatan as $key => $k) {
                                ?>
                                        <tr>
                                            <td><?= $no++ ?></td>
                                            <td><?= $k['kecamatan'] ?></td>
                                            <td class="table-action">
                                                <a href="javascript:void(0);" class="action-icon edit-btn" data-kecamatan="<?= $k['kecamatan'] ?>" id-kecamatan="<?= $k['id_kec'] ?>"> <i class="mdi mdi-square-edit-outline"></i></a>
                                                <a href="" id-kecamatan="<?= $k['id_kec'] ?>" class="action-icon"> <i class="mdi mdi-delete delete-btn"></i></a>
                                            </td>
                                        </tr>
                                <?php
                                    }
                                } ?>
                            </tbody>
                        </table>
                        <div class="d-flex justify-content-end align-items-center mt-2">
                            <nav>
                                <?= $pager->links("kecamatan", 'kecamatan_pager') ?>
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
                        <label class="page-title">Tambah Data Kecamatan</label>
                        <form action="" method="POST" class="mt-2" id="kecamatanForm">
                            <div class="form-group my-2">
                                <label for="kecamatan" class="my-1">Kecamatan</label>
                                <input type="text" class="form-control" name="kecamatan" id="kecamatanInput" placeholder="Masukkan Nama Kecamatan" required>
                            </div>

                            <div class="form-group">
                                <div class="d-grid gap-2">
                                    <button type="submit" class="btn btn-primary btn-block">Tambah Kecamatan</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="card" id="editFormContainer" style="display: none;">
                    <div class="card-body">
                        <label class="page-title">Edit Data Kecamatan</label>
                        <form action="" method="POST" class="mt-2" id="editKecamatanForm">
                            <div class="form-group my-2">
                                <label for="editKecamatan" class="my-1">Kecamatan</label>
                                <input type="text" class="form-control" name="editKecamatan" id="editKecamatan" placeholder="Masukkan Kecamatan">
                                <input type="hidden" class="form-control" name="idKecamatan" id="idKecamatan">
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
        $('#kecamatanForm').on('submit', function(e) {
            e.preventDefault();

            $.ajax({
                url: '/main_data/kecamatan/add/process',
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
                            window.location.href = '/main_data/kecamatan';
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
                const kecamatan = this.getAttribute('data-kecamatan');
                const id = this.getAttribute('id-kecamatan'); // assuming you have a data attribute like data-id
                document.getElementById('editKecamatan').value = kecamatan;
                document.getElementById('idKecamatan').value = id;
                document.getElementById('editFormContainer').style.display = 'block'; // assuming you have an element with id 'editFormContainer' to display the form
            });
        });
    });

    $(document).ready(function() {
        $('#editKecamatanForm').on('submit', function(e) {
            e.preventDefault();

            $.ajax({
                url: '/main_data/kecamatan/edit/process/' + $('#idKecamatan').val(),
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
                            window.location.href = '/main_data/kecamatan';
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

            // Ambil nilai id-kategori dari atribut
            var idKecamatan = $(this).closest('a').attr('id-kecamatan');

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
                    // Kirim request AJAX untuk menghapus kecamatan
                    $.ajax({
                        url: '/main_data/kecamatan/delete/' + idKecamatan,
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
                                    window.location.href = '/main_data/kecamatan';
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