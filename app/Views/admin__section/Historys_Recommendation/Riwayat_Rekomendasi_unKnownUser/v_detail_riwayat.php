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
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Detail Riwayat Rekomendasi</a></li>
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
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="fw-bold border-primary ">
                            <td>Hasil Rekomendasi</td>
                            <td><?= $hasilRekomendasi['id_user'] ?></td>
                            <td><?= $hasilRekomendasi['sim_kategori'] ?></td>
                            <td><?= $hasilRekomendasi['sim_lokasi'] ?></td>
                            <td><?= $hasilRekomendasi['sim_harga_tiket'] ?></td>
                            <td><?= $hasilRekomendasi['sim_fasilitas'] ?></td>
                            <td><?= $hasilRekomendasi['sim_rating'] ?></td>
                            <td><?= $hasilRekomendasi['similarity'] ?></td>
                            <td><span class="badge badge-success-lighten"><?= $hasilRekomendasi['nama_wisata'] ?></span></td>
                        </tr>
                        <?php if (!empty($history)) {
                            foreach ($history as $key => $v) { ?>
                                <tr>
                                    <td></td>
                                    <td><?= $v['id_user'] ?></td>
                                    <td><?= $v['sim_kategori'] ?></td>
                                    <td><?= $v['sim_lokasi'] ?></td>
                                    <td><?= $v['sim_harga_tiket'] ?></td>
                                    <td><?= $v['sim_fasilitas'] ?></td>
                                    <td><?= $v['sim_rating'] ?></td>
                                    <td><?= $v['similarity'] ?></td>
                                    <td><span class="badge badge-primary-lighten"><?= $v['nama_wisata'] ?></span></td>
                                </tr>
                        <?php }
                        } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection() ?>