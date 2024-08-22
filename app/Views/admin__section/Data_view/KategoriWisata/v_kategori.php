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
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Kategori Wisata</a></li>
                        <li class="breadcrumb-item active">Data Kategori</li>
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
                    <label class="page-title">Data Kategori</label>
                    <div class="table-responsive">
                        <table class="table table-centered table-nowrap table-hover mb-0">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Kategori</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if (!empty($kategori)) {
                                    $no = 1 + ($perPage * ($currentPage - 1));
                                    foreach ($kategori as $key => $k) {
                                ?>
                                        <tr>
                                            <td><?= $no++ ?></td>
                                            <td><?= $k['kategori'] ?></td>
                                            <td class="table-action">
                                                <a href="javascript:void(0);" class="action-icon edit-btn" data-kategori="<?= $k['kategori'] ?>" id-kategori="<?= $k['id_kategori'] ?>"> <i class="mdi mdi-square-edit-outline"></i></a>
                                                <a href="" id-kategori="<?= $k['id_kategori'] ?>" class="action-icon"> <i class="mdi mdi-delete delete-btn"></i></a>
                                            </td>
                                        </tr>
                                <?php
                                    }
                                } ?>
                            </tbody>
                        </table>
                        <div class="d-flex justify-content-end align-items-center mt-2">
                            <nav>
                                <?= $pager->links("kategori", 'kategori_pager') ?>
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
                        <label class="page-title">Tambah Data Kategori</label>
                        <form action="" method="POST" class="mt-2" id="kategoriForm">
                            <div class="form-group my-2">
                                <label for="kategori" class="my-1">Kategori</label>
                                <input type="text" class="form-control" name="kategori" id="kategoriInput" placeholder="Masukkan Kategori" required>
                            </div>

                            <div class="form-group">
                                <div class="d-grid gap-2">
                                    <button type="submit" class="btn btn-primary btn-block">Tambah Kategori</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="card" id="editFormContainer" style="display: none;">
                    <div class="card-body">
                        <label class="page-title">Edit Data Kategori</label>
                        <form action="" method="POST" class="mt-2" id="editKategoriForm">
                            <div class="form-group my-2">
                                <label for="editKategori" class="my-1">Kategori</label>
                                <input type="text" class="form-control" name="editKategori" id="editKategori" placeholder="Masukkan Kategori">
                                <input type="hidden" class="form-control" name="idKategori" id="idKategori">
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
        $('#kategoriForm').on('submit', function(e) {
            e.preventDefault();

            $.ajax({
                url: '/main_data/kategori_wisata/add/process',
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
                            window.location.href = '/main_data/kategori_wisata';
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
                const kategori = this.getAttribute('data-kategori');
                const id = this.getAttribute('id-kategori'); // assuming you have a data attribute like data-id
                document.getElementById('editKategori').value = kategori;
                document.getElementById('idKategori').value = id;
                document.getElementById('editFormContainer').style.display = 'block'; // assuming you have an element with id 'editFormContainer' to display the form
            });
        });
    });

    $(document).ready(function() {
        $('#editKategoriForm').on('submit', function(e) {
            e.preventDefault();

            $.ajax({
                url: '/main_data/kategori_wisata/edit/process/' + $('#idKategori').val(),
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
                            window.location.href = '/main_data/kategori_wisata';
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
            var idKategori = $(this).closest('a').attr('id-kategori');

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
                    // Kirim request AJAX untuk menghapus kategori
                    $.ajax({
                        url: '/main_data/kategori_wisata/delete/' + idKategori,
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
                                    window.location.href = '/main_data/kategori_wisata';
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