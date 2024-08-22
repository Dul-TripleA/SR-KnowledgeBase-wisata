<?= $this->extend('user__section/components/layout') ?>
<?= $this->section('contents') ?>

<style>
    .text-strike {
        text-decoration: line-through;
        text-decoration-color: #0e2e50;
        /* text-decoration-color: red; */
    }

    .star-rating {
        direction: rtl;
        display: inline-flex;
        font-size: 1.5rem;
    }

    .star-rating input[type="radio"] {
        display: none;
    }

    .star-rating label {
        color: #ddd;
        cursor: pointer;
    }

    .star-rating input[type="radio"]:checked~label {
        color: #ffc107;
    }

    .star-rating label:hover,
    .star-rating label:hover~label {
        color: #ffc107;
    }
</style>

<div class="container-fluid header d-flex align-items-center justify-content-center animated fadeIn" style="background-image: url(<?= base_url() ?>/img/cover.png); background-size: cover; background-position: center; width: 100%; height: 60vh;">
    <div class="d-flex align-items-center justify-content-center flex-column">
        <h1 class="display-5 animated fadeIn my-4 text-center ">Ayo Beri Kami <span class="text-strike text-primary">Pe</span>Masukan</h1>
        <nav aria-label="breadcrumb animated fadeIn">
            <ol class="breadcrumb">
                <li class="breadcrumb-item text-white fw-bold">Beri Masukan</li>
            </ol>
        </nav>
    </div>
</div>
<div class="container">
    <div class="row">
        <div class="row my-4 py-4">
            <?php if (isset($session)) { ?>
                <div class="col-md-6 d-flex flex-column">
                    <h1 class="display-5 animated fadeIn my-4 text-center text-md-start">Beri Kami <span class="text-strike text-primary">Pe</span>Masukan Agar Kami Dapat Terus Berkembang.</h1>
                    <p class="fw-medium text-center text-md-start" style="font-size: 18px;">Orang yang Mencintaimu Adalah Orang yang Senantiasa Memberimu Nasehat/Masukan.<span class="text-primary"> Jadi Beri Kami Masukan</span>
                    </p>
                </div>
                <div class="col-md-6">
                    <form action="" class="my-4 pt-3" id="feedbackForm">
                        <div class="form-group">
                            <textarea name="feedback" class="form-control" cols="10" rows="4" placeholder="Masukkan Saran Anda" required></textarea>
                        </div>
                        <div class="form-group mt-3 d-flex flex-row align-items-center gap-2">
                            <label for="">Rating</label>
                            <div class="star-rating">
                                <input type="radio" id="star5" name="rating" value="5" required><label for="star5" title="5 stars">★</label>
                                <input type="radio" id="star4" name="rating" value="4" required><label for="star4" title="4 stars">★</label>
                                <input type="radio" id="star3" name="rating" value="3" required><label for="star3" title="3 stars">★</label>
                                <input type="radio" id="star2" name="rating" value="2" required><label for="star2" title="2 stars">★</label>
                                <input type="radio" id="star1" name="rating" value="1" required><label for="star1" title="1 star">★</label>
                            </div>
                        </div>
                        <div class="form-group mt-3">
                            <div class="d-grid gap-2">
                                <input type="hidden" name="id_user" value="<?= $session['id_user'] ?>">
                                <button type="submit" class="btn btn-primary btn-block" id="submit">Kirimkan Masukan</button>
                            </div>
                        </div>
                    </form>
                </div>
            <?php } else { ?>
                <div class="col-12 d-flex flex-column">
                    <h1 class="display-5 animated fadeIn my-4 text-center">Beri Kami <span class="text-strike text-primary">Pe</span>Masukan Agar Kami Dapat Terus Berkembang.</h1>
                    <p class="fw-medium text-center" style="font-size: 18px;">Orang yang Mencintaimu Adalah Orang yang Senantiasa Memberimu Nasehat/Masukan. Kami Harus Tau Siapa yang Menyayangi Kami,<a href="<?= base_url("login") ?>"> Login Dulu Ya</a>
                    </p>
                </div>
            <?php } ?>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        $('#feedbackForm').on('submit', function(event) {
            event.preventDefault();
            $.ajax({
                url: "/beri_review_pada_DolanKuy/saveProcess",
                type: 'POST',
                data: $(this).serialize(),
                dataType: 'json',
                success: function(response) {
                    Swal.fire({
                        position: "top-end",
                        icon: "success",
                        title: "Your work has been saved",
                        showConfirmButton: false,
                        timer: 1500
                    });
                },
                error: function(xhr, status, error) {
                    let errorMessage = 'Terjadi kesalahan. Silakan coba lagi.';
                    if (xhr.responseJSON && xhr.responseJSON.message) {
                        errorMessage = xhr.responseJSON.message;
                    }
                    Swal.fire({
                        position: "top-end",
                        icon: "error",
                        title: errorMessage,
                        showConfirmButton: false,
                        timer: 1500
                    });
                }
            });
        });
    });
</script>





<?= $this->endSection() ?>