<?= $this->extend('admin__section/components/layout') ?>
<?= $this->section('admin_contents') ?>

<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Admin</a></li>
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Setting Website</a></li>
                    </ol>
                </div>
                <h4 class="page-title">Setting Website</h4>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="row">
            <div class="col-12 col-md-8">
                <form action="" id="FormDeskripsiWeb">
                    <div class="card p-2">
                        <div class="form-group">
                            <label for="web_name" class="my-1 fw-bold">Nama Website</label>
                            <input type="text" class="form-control" name="web_name" id="web_name" value="<?= $settingWeb['web_name'] ?>">
                        </div>
                        <div class="form-group">
                            <label for="deskripsi" class="my-1 fw-bold">Deskripsi Website</label>
                            <textarea id="web_desc" name="deskripsi"><?= $settingWeb['deskripsi'] ?></textarea>
                        </div>
                        <div class="form-group d-grid gap-1">
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="email" class="my-1 fw-bold">Email Website</label>
                                    <input type="email" name="email" id="email" value="<?= $settingWeb['email'] ?>" class="form-control">
                                </div>
                                <div class="col-md-6">
                                    <label for="telp" class="my-1 fw-bold">Telephone Website</label>
                                    <input type="number" name="telp" value="<?= $settingWeb['telp'] ?>" class="form-control" id="telp">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="alamat" class="my-1 fw-bold">Alamat</label>
                            <input type="text" name="alamat" id="alamat" value="<?= $settingWeb['alamat'] ?>" class="form-control">
                        </div>
                        <div class="form-group d-grid gap-1">
                            <div class="row">
                                <div class="col-md-4">
                                    <label for="ig" class="my-1 fw-bold">Usename Instagram</label>
                                    <input type="text" name="ig" id="ig" value="<?= $settingWeb['u_ig'] ?>" class="form-control">
                                </div>
                                <div class="col-md-4">
                                    <label for="fb" class="my-1 fw-bold">Username Facebook</label>
                                    <input type="text" name="fb" value="<?= $settingWeb['u_fb'] ?>" class="form-control" id="telp">
                                </div>
                                <div class="col-md-4">
                                    <label for="channel" class="my-1 fw-bold">Channel Youtube</label>
                                    <input type="text" name="channel" value="<?= $settingWeb['channel'] ?>" class="form-control" id="telp">
                                </div>
                            </div>
                        </div>
                        <div class="form-group d-grid gap-1">
                            <div class="row">
                                <div class="col-md-4">
                                    <label for="link_ig" class="my-1 fw-bold">Link Instagram</label>
                                    <input type="text" name="link_ig" id="link_ig" value="<?= $settingWeb['ig'] ?>" class="form-control">
                                </div>
                                <div class="col-md-4">
                                    <label for="link_fb" class="my-1 fw-bold">Link Facebook</label>
                                    <input type="text" name="link_fb" value="<?= $settingWeb['fb'] ?>" class="form-control" id="telp">
                                </div>
                                <div class="col-md-4">
                                    <label for="link_yt" class="my-1 fw-bold">Link Channel Youtube</label>
                                    <input type="text" name="link_yt" value="<?= $settingWeb['yt'] ?>" class="form-control" id="telp">
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary mt-2">Simpan Perubahan</button>
                    </div>
                </form>
            </div>
            <div class="col-12 col-md-4">
                <form id="formUpdateLogo" enctype="multipart/form-data">
                    <div class="card p-2">
                        <div class="tab-pane show active" id="file-upload-preview">
                            <div class="dropzone dz-clickable custom-dropzone" id="logoIconDropzone" data-plugin="dropzone" data-previews-container="#file-previews-icon" data-upload-preview-template="#uploadPreviewTemplateIcon">
                                <div class="dz-message needsclick">
                                    <i class="h1 text-muted dripicons-cloud-upload"></i>
                                    <p class="fw-bolder">Upload Icon Logo Anda di sini.</p>
                                    <span class="text-muted" style="font-size: small;">(Logo akan ditampilkan di <strong>Navbar.</strong> Ukuran<strong>Maks. 2MB</strong>)</span>
                                </div>
                                <div class="dropzone-previews mt-3" id="file-previews-icon"></div>
                            </div>
                        </div>
                        <!-- Preview Template for Icon Logo -->
                        <div class="d-none" id="uploadPreviewTemplateIcon">
                            <div class="card bg-primary mb-0 shadow">
                                <a href="javascript:void(0);" class="m-1 text-white fw-bold" data-dz-name style="font-size: small;"></a>
                            </div>
                        </div>
                    </div>

                    <div class="card p-2">
                        <div class="tab-pane show active" id="file-upload-preview">
                            <div class="dropzone dz-clickable custom-dropzone" id="mainLogoDropzone" data-plugin="dropzone" data-previews-container="#file-previews-main" data-upload-preview-template="#uploadPreviewTemplateMain">
                                <div class="dz-message needsclick">
                                    <i class="h1 text-muted dripicons-cloud-upload"></i>
                                    <p class="fw-bolder">Upload Logo Utama Anda di sini.</p>
                                    <span class="text-muted" style="font-size: small;">(Logo akan ditampilkan di <strong>Halaman Tentang Kami.</strong> Ukuran<strong>Maks. 2MB</strong>)</span>
                                </div>
                                <div class="dropzone-previews mt-3" id="file-previews-main"></div>
                            </div>
                        </div>
                        <!-- Preview Template for Main Logo -->
                        <div class="d-none" id="uploadPreviewTemplateMain">
                            <div class="card bg-primary mb-0 shadow">
                                <a href="javascript:void(0);" class="m-1 text-white fw-bold" data-dz-name style="font-size: small;"></a>
                            </div>
                        </div>
                    </div>

                    <input type="file" name="iconLogo" id="iconLogo" hidden>
                    <input type="file" name="mainLogo" id="mainLogo" hidden>
                    <button type="submit" class="btn btn-primary w-100" id_sett="<?= $settingWeb['id_setting'] ?>">Update Logo</button>
                </form>
            </div>
        </div>
    </div>
</div>
</div>
<script>
    Dropzone.autoDiscover = false;
    $(document).ready(function() {
        // logo
        var myDropzone = new Dropzone("#logoIconDropzone", {
            url: "/",
            previewsContainer: "#file-previews-icon",
            previewTemplate: document.querySelector('#uploadPreviewTemplateIcon').innerHTML,
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
                    document.getElementById('iconLogo').files = dataTransfer.files;
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
                            $('#iconLogo').val('');
                            this.removeFile(file);
                        });
                    } else {
                        console.log("Error:", message);
                    }
                });
            }
        });

        // main 
        var myDropzone = new Dropzone("#mainLogoDropzone", {
            url: "/",
            previewsContainer: "#file-previews-main",
            previewTemplate: document.querySelector('#uploadPreviewTemplateMain').innerHTML,
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
                    document.getElementById('mainLogo').files = dataTransfer.files;
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
                            $('#mainLogo').val('');
                            this.removeFile(file);
                        });
                    } else {
                        console.log("Error:", message);
                    }
                });
            }
        });

        // Update Logo
        $('#formUpdateLogo').on('submit', function(e) {
            e.preventDefault();
            Swal.fire({
                title: 'Apakah Anda Yakin?',
                text: "Anda akan mengupdate logo!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, Update it!'
            }).then((response) => {
                if (response.isConfirmed) {
                    $.ajax({
                        url: '/setting_website/update/logo/' + <?= $settingWeb['id_setting'] ?>,
                        type: 'POST',
                        data: new FormData(this),
                        processData: false,
                        contentType: false,
                        success: function(response) {
                            if (response.status == 200) {
                                Swal.fire({
                                    title: 'Success!',
                                    text: response.message,
                                    icon: 'success',
                                    confirmButtonText: 'OK'
                                }).then(() => {
                                    location.reload();
                                });
                            } else {
                                Swal.fire({
                                    title: 'Error!',
                                    text: response.message,
                                    icon: 'error',
                                    confirmButtonText: 'OK'
                                });
                            }
                        },
                        error: function(xhr, status, error) {
                            Swal.fire({
                                title: 'Error!',
                                text: error,
                                icon: 'error',
                                confirmButtonText: 'OK'
                            });
                        }
                    });
                }
            });

        });

        // update desc Web
        $("#FormDeskripsiWeb").on('submit', function(e) {
            e.preventDefault();
            Swal.fire({
                title: 'Apakah Anda Yakin?',
                text: "Anda akan mengupdate logo!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, Update it!'
            }).then((response) => {
                if (response.isConfirmed) {
                    $.ajax({
                        url: '/setting_website/update/desc/' + <?= $settingWeb['id_setting'] ?>,
                        type: 'POST',
                        data: new FormData(this),
                        processData: false,
                        contentType: false,
                        success: function(response) {
                            if (response.status == 200) {
                                Swal.fire({
                                    title: 'Success!',
                                    text: response.message,
                                    icon: 'success',
                                    confirmButtonText: 'OK'
                                }).then(() => {
                                    location.reload();
                                });
                            } else {
                                Swal.fire({
                                    title: 'Error!',
                                    text: response.message,
                                    icon: 'error',
                                    confirmButtonText: 'OK'
                                });
                            }
                        },
                        error: function(xhr, status, error) {
                            Swal.fire({
                                title: 'Error!',
                                text: error,
                                icon: 'error',
                                confirmButtonText: 'OK'
                            });
                        }
                    })
                }
            })
        });
    });
</script>

<?= $this->endSection() ?>