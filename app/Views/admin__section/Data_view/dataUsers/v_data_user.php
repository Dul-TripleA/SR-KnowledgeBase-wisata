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
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Main Data</a></li>
                        <li class="breadcrumb-item active">Data Users</li>
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
                            <th>Profile Picture</th>
                            <th>Username</th>
                            <th>Email</th>
                            <th>Tanggal Akun Dibuat</th>
                            <th>Terakhir Login</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (!empty($users)) {
                            foreach ($users as $key => $v) {

                                $parts = explode('@', $v->email);
                                $firstPart = substr($parts[0], 0, 2);
                                $maskedEmail = $firstPart . '....@' . $parts[1];

                                if ($v->deleted_at == null) { ?>
                                    <tr class="m-auto">
                                        <td><a href="" class="fw-bold text-primary"></a></td>
                                        <td>
                                            <?php 
                                                if($v->profile_pic != 'default.png'){ ?>
                                                    <img src="<?= $v->profile_pic ?>" class="rounded-circle " width="20%">
                                                <?php }else{ ?>
                                                    <img src="<?= base_url('img/'. $v->profile_pic) ?>" class="rounded-circle" width="20%">
                                                <?php } ?>
                                        </td>
                                        <td><?= $v->username ?></td>
                                        <td><?= $maskedEmail ?></td>
                                        <td><?= date('d F Y', strtotime($v->created_at)) . " " . date('H:i', strtotime($v->created_at)) ?></td>
                                        <td><?= date('d F Y', strtotime($v->updated_at)) . " " . date('H:i', strtotime($v->updated_at)) ?></td>
                                        <td class="table-action" style="width: 90px;">
                                            <a href="" class="action-icon delete-btn" number="<?= $v->id_user ?>">
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
                text: "Anda mungkin tidak akan dapat mengembalikan ini!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ya, hapus!',
                cancelButtonText: 'Batal'
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: '/main_data/users/delete/' + number,
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
                                    window.location.href = '/main_data/users';
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