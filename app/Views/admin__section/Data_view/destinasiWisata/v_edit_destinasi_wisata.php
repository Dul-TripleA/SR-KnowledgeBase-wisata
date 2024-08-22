<?= $this->extend('admin__section/components/layout') ?>
<?= $this->section('admin_contents') ?>

<style>
    .disabled-option {
        color: blue;
    }
</style>
<!-- Start Content-->
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Admin</a></li>
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Main Data</a></li>
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Destinasi Wisata</a></li>
                        <li class="breadcrumb-item active">Edit Wisata</li>
                    </ol>
                </div>
                <h4 class="page-title">Main Data</h4>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="header-title mb-3">Form Edit Destinasi Wisata</h4>

                    <form id="mainForm" method="post" class="row gap-2" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="destinasi_wisata">Destinasi Wisata</label>
                            <input type="text" class="form-control" id="destinasi_wisata" name="destinasi_wisata" placeholder="Masukkan Destinasi Wisata" value="<?= esc($wisata['nama_wisata']) ?>" required>
                        </div>
                        <div class="form-group">
                            <label for="kategori_wisata">Kategori Wisata</label>
                            <div class="input-kat-list" id="inputKatList"></div>
                            <div class="form-group row">
                                <div class="col-10">
                                    <select class="form-control" id="kategori_wisata">
                                        <option value="" selected disabled>Pilih Kategori</option>
                                        <?php foreach ($kategori as $key => $k) { ?>
                                            <option value="<?= $k['kategori'] ?>" <?= $wisata['kategori'] == $k['kategori'] ? 'selected' : '' ?>>
                                                <?= $k['kategori'] ?>
                                            </option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <div class="col-2">
                                    <div class="d-grid gap-2">
                                        <button type="button" id="saveKategoryButton" class="btn btn-primary btn-block">Simpan</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="harga_tiket">Harga Tiket</label>
                            <input type="number" class="form-control" id="harga_tiket" name="harga_tiket" placeholder="Masukkan Harga Tiket Wisata" value="<?= esc($wisata['harga_tiket']) ?>" required>
                        </div>
                        <div class="form-group d-grid gap-1">
                            <div class="row">
                                <div class="col-3">
                                    <label for="lokasi">Lokasi (Kecamatan)</label>
                                    <select class="form-control" id="lokasi" name="lokasi">
                                        <option value="" selected disabled>Pilih Kecamatan</option>
                                        <?php foreach ($kecamatan as $key => $kec) { ?>
                                            <option value="<?= $kec['kecamatan'] ?>" <?= $wisata['lokasi_kec'] == $kec['kecamatan'] ? 'selected' : '' ?>><?= $kec['kecamatan'] ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <div class="col-9">
                                    <label for="alamat">Alamat Lengkap</label>
                                    <input type="text" class="form-control" id="alamat" name="alamat" placeholder="Masukkan Alamat Lengkap Destinasi" value="<?= esc($wisata['alamat']) ?>" required>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="link_gmaps">Link Google Maps</label>
                            <input type="text" class="form-control" id="link_gmaps" name="link_gmaps" placeholder="Masukkan Link Google Maps" value="<?= esc($wisata['link_gmaps']) ?>" required>
                            <span class="text-muted font-12">Sertakan link google maps, exc : <span class="text-primary font-10">https://www.google.com/maps</span></span>
                        </div>
                        <div class="form-group">
                            <label for="fasilitas_wisata">Fasilitas Wisata</label>
                            <div class="input-fas-list" id="inputFasList"></div>
                            <div class="row">
                                <div class="col-10">
                                    <select class="form-control" id="fasilitas_wisata">
                                        <option value="" selected disabled>Pilih Fasilitas</option>
                                        <?php foreach ($fasilitas as $key => $f) { ?>
                                            <option value="<?= $f['fasilitas'] ?>" <?= in_array($f['fasilitas'], json_decode($wisata['fasilitas'])) ? 'selected' : '' ?>><?= $f['fasilitas'] ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <div class="col-2">
                                    <div class="d-grid gap-2">
                                        <button type="button" id="saveFasilitasButton" class="btn btn-primary btn-block">Simpan</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="deskripsi_wisata">Deskripsi Wisata</label>
                            <textarea id="edit_wisata_desc_<?= $wisata['id_wisata'] ?>" name="deskripsi"><?= esc($wisata['deskripsi']) ?></textarea>
                        </div>
                        <div class="form-group">
                            <label for="gambar_wisata">Gambar Wisata</label>
                        </div>

                        <!-- File Upload Section -->
                        <div class="tab-pane show active" id="file-upload-preview">
                            <div class="dropzone dz-clickable" id="myAwesomeDropzone" data-plugin="dropzone" data-previews-container="#file-previews" data-upload-preview-template="#uploadPreviewTemplate">
                                <div class="dz-message needsclick">
                                    <i class="h1 text-muted dripicons-cloud-upload"></i>
                                    <h3>Drop files here or click to upload.</h3>
                                    <span class="text-muted font-13">(Jumlah Maksimal File <strong>3 Gambar</strong> Ukuran Maks. <strong>1 MB</strong>.)</span>
                                </div>
                            </div>

                            <div class="dropzone-previews mt-3" id="file-previews"></div>
                            <!-- Preview -->
                            <div class="mt-3">
                                <label>Gambar yang Sudah Ada</label>
                                <?php
                                $images = $wisata['gambar'];
                                // Periksa apakah $images adalah string
                                if (is_string($images)) {
                                    // Decode string JSON menjadi array
                                    $decodedImages = json_decode($images, true);
                                    // Pastikan hasil decoding adalah array
                                    if (json_last_error() === JSON_ERROR_NONE && is_array($decodedImages)) {
                                        foreach ($decodedImages as $value) { ?>
                                            <div class="card mt-1 mb-0 shadow-none border">
                                                <div class="p-2">
                                                    <div class="row align-items-center">
                                                        <div class="col-auto">
                                                            <img data-dz-thumbnail src="<?= base_url("img/$value") ?>" class="avatar-sm rounded bg-light" alt="Gambar Wisata">
                                                        </div>
                                                        <div class="col ps-0">
                                                            <a href="javascript:void(0);" class="text-muted fw-bold" data-dz-name><?= htmlspecialchars($value) ?></a>
                                                            <p class="mb-0" data-dz-size></p>
                                                        </div>
                                                        <div class="col-auto">
                                                            <!-- Button -->
                                                            <a href="javascript:void(0);" class="btn btn-link btn-lg text-muted" data-dz-remove data-file-name="<?= htmlspecialchars($value) ?>">
                                                                <i class="dripicons-cross"></i>
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <input type="hidden" name="existing_images[]" value="<?= htmlspecialchars($value) ?>">
                                            </div>
                                <?php }
                                    } else {
                                        echo "Tidak ada gambar untuk ditampilkan.";
                                    }
                                } else {
                                    echo "Tidak ada gambar untuk ditampilkan.";
                                }
                                ?>

                            </div>

                            <div class="fallback">
                                <input name="file[]" type="file" multiple hidden />
                            </div>

                        </div>
                        <!-- End of File Upload Section -->

                        <button type="submit" class="btn btn-primary">Simpan Data</button>

                        <!-- Hidden inputs for categories and facilities -->
                        <input type="hidden" id="kategori_wisata_hidden" name="kategori_wisata_hidden" value='<?= json_encode($wisata['kategori']) ?>'>
                        <input type="hidden" id="fasilitas_wisata_hidden" name="fasilitas_wisata_hidden" value='<?= json_encode($wisata['fasilitas']) ?>'>

                    </form>
                </div>
            </div>
        </div>
    </div>

    <style>
        .disabled-option {
            color: #0000FF;
            font-weight: bold;
        }

        .input-item {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 5px;
        }

        .input-item button {
            margin-left: 10px;
        }
    </style>

    <div class="d-none" id="uploadPreviewTemplate">
        <div class="card mt-1 mb-0 shadow-none border">
            <div class="p-2">
                <div class="row align-items-center">
                    <div class="col-auto">
                        <img data-dz-thumbnail src="#" class="avatar-sm rounded bg-light" alt="">
                    </div>
                    <div class="col ps-0">
                        <a href="javascript:void(0);" class="text-muted fw-bold" data-dz-name></a>
                        <p class="mb-0" data-dz-size></p>
                    </div>
                    <div class="col-auto">
                        <!-- Button -->
                        <a href="" class="btn btn-link btn-lg text-muted" data-dz-remove>
                            <i class="dripicons-cross"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            let kategoriArray = <?= json_encode(json_decode($wisata['kategori'])) ?>;
            let fasilitasArray = <?= json_encode(json_decode($wisata['fasilitas'])) ?>;

            updateKategoriList();
            updateFasilitasList();

            document.getElementById('saveKategoryButton').addEventListener('click', function() {
                let inputValue = document.getElementById('kategori_wisata').value;
                if (inputValue && !kategoriArray.includes(inputValue)) {
                    kategoriArray.push(inputValue);
                    document.getElementById('kategori_wisata').value = '';
                    updateKategoriList();
                    disableSelectedOptions('kategori_wisata', kategoriArray);
                }
            });

            function updateKategoriList() {
                let inputList = document.getElementById('inputKatList');
                inputList.innerHTML = '';
                kategoriArray.forEach((item, index) => {
                    let listItem = document.createElement('div');
                    listItem.className = 'input-item';
                    let itemText = document.createElement('span');
                    itemText.className = 'fw-bold'
                    itemText.textContent = ` ${item}`;
                    let deleteButton = document.createElement('button');
                    deleteButton.textContent = 'Hapus';
                    deleteButton.className = 'btn btn-danger btn-sm';
                    deleteButton.addEventListener('click', function() {
                        kategoriArray.splice(index, 1);
                        updateKategoriList();
                        disableSelectedOptions('kategori_wisata', kategoriArray);
                    });
                    listItem.appendChild(itemText);
                    listItem.appendChild(deleteButton);
                    inputList.appendChild(listItem);
                });
                updateHiddenFields();
            }

            document.getElementById('saveFasilitasButton').addEventListener('click', function() {
                let inputValue = document.getElementById('fasilitas_wisata').value;
                if (inputValue && !fasilitasArray.includes(inputValue)) {
                    fasilitasArray.push(inputValue);
                    document.getElementById('fasilitas_wisata').value = '';
                    updateFasilitasList();
                    disableSelectedOptions('fasilitas_wisata', fasilitasArray);
                }
            });

            function updateFasilitasList() {
                let inputList = document.getElementById('inputFasList');
                inputList.innerHTML = '';
                fasilitasArray.forEach((item, index) => {
                    let listItem = document.createElement('div');
                    listItem.className = 'input-item';
                    let itemText = document.createElement('span');
                    itemText.textContent = ` ${item}`;
                    let deleteButton = document.createElement('button');
                    deleteButton.textContent = 'Hapus';
                    deleteButton.className = 'btn btn-danger btn-sm';
                    deleteButton.addEventListener('click', function() {
                        fasilitasArray.splice(index, 1);
                        updateFasilitasList();
                        disableSelectedOptions('fasilitas_wisata', fasilitasArray);
                    });
                    listItem.appendChild(itemText);
                    listItem.appendChild(deleteButton);
                    inputList.appendChild(listItem);
                });
                updateHiddenFields();
            }

            function disableSelectedOptions(selectId, selectedArray) {
                let options = document.querySelectorAll(`#${selectId} option`);
                options.forEach(option => {
                    if (selectedArray.includes(option.value)) {
                        option.disabled = true;
                        option.classList.add('disabled-option');
                    } else {
                        option.disabled = false;
                        option.classList.remove('disabled-option');
                    }
                });
            }

            function updateHiddenFields() {
                document.getElementById('kategori_wisata_hidden').value = JSON.stringify(kategoriArray);
                document.getElementById('fasilitas_wisata_hidden').value = JSON.stringify(fasilitasArray);
            }

            // Add event listener for removing existing images
            let existingImageButtons = document.querySelectorAll('[data-dz-remove]');
            existingImageButtons.forEach(button => {
                button.addEventListener('click', function() {
                    let fileName = this.getAttribute('data-file-name');
                    let cardToRemove = this.closest('.card');
                    cardToRemove.remove();
                    // Remove the file from existing_images array
                    let hiddenInputs = document.querySelectorAll('input[name="existing_images[]"]');
                    hiddenInputs.forEach(input => {
                        if (input.value === fileName) {
                            input.remove();
                        }
                    });
                });
            });
        });

        Dropzone.autoDiscover = false;

        $(document).ready(function() {
            var myDropzone = new Dropzone("#myAwesomeDropzone", {
                url: "/", // Change this to your upload URL
                previewsContainer: "#file-previews",
                previewTemplate: document.querySelector('#uploadPreviewTemplate').innerHTML,
                autoProcessQueue: false,
                maxFiles: 3, // Limit the number of files to 3
                maxFilesize: 1, // Limit file size to 1 MB
                init: function() {
                    this.on("addedfile", function(file) {
                        console.log("File added:", file);
                    });
                    this.on("thumbnail", function(file, dataUrl) {
                        console.log("Thumbnail created:", file);
                    });
                }
            });

            document.querySelector('#mainForm').addEventListener('submit', function(event) {
                event.preventDefault();
                var formData = new FormData(this);
                myDropzone.getQueuedFiles().forEach(function(file) {
                    formData.append('file[]', file, Math.random().toString(36).substring(7) + '_' + file.name);
                });

                for (var pair of formData.entries()) {
                    console.log(pair[0] + ': ' + pair[1]);
                }

                fetch('/main_data/destinasi_wisata/edit/process/<?= $wisata['id_wisata'] ?>', {
                        method: 'POST',
                        body: formData
                    })
                    .then(response => {
                        if (!response.ok) {
                            throw new Error('Network response was not ok');
                        }
                        return response.json();
                    })
                    .then(data => {
                        // console.log(data);
                        Swal.fire({
                            title: "Success",
                            text: "Data wisata berhasil diubah",
                            icon: "success"

                        }).then(() => {
                            location.reload();
                        })
                    })
                    .catch(error => {
                        console.error('Error:', error);
                        Swal.fire({
                            title: "Error",
                            text: "Data wisata gagal diubah",
                            icon: "error"
                        }).then(() => {
                            location.reload();
                        })
                    });
            });


        });
    </script>

    <?= $this->endsection() ?>