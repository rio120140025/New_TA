<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <title>Sukses</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <link
        href="<?= base_url('assets/img/png-transparent-bandar-lampung-maluku-kepolisian-daerah-lampung-indonesian-national-police-others-logo-indonesia-area-removebg-preview.png'); ?>"
        rel="icon" />

    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet" />

    <link href="<?= base_url('assets/vendor/aos/aos.css'); ?>" rel="stylesheet" />
    <link href="<?= base_url('assets/vendor/bootstrap/css/bootstrap.min.css'); ?>" rel="stylesheet" />
    <link href="<?= base_url('assets/vendor/bootstrap-icons/bootstrap-icons.css'); ?>" rel="stylesheet" />
    <link href="<?= base_url('assets/vendor/boxicons/css/boxicons.min.css'); ?>" rel="stylesheet" />
    <link href="<?= base_url('assets/vendor/glightbox/css/glightbox.min.css'); ?>" rel="stylesheet" />
    <link href="<?= base_url('assets/vendor/remixicon/remixicon.css'); ?>" rel="stylesheet" />
    <link href="<?= base_url('assets/vendor/swiper/swiper-bundle.min.css'); ?>" rel="stylesheet" />

    <link rel="stylesheet" href="<?= base_url('assets/css/styles.min.css'); ?>" />
    <link rel="stylesheet" href="<?= base_url('assets/css/icons/tabler-icons/tabler-icons.css'); ?>" />

    <script src="https://kit.fontawesome.com/c0e27fec68.js" crossorigin="anonymous"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/clipboard.js/2.0.8/clipboard.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            var copyButton = document.getElementById('copyButton');
            var noLaporan = "<?php echo $no_laporan; ?>";

            var clipboard = new ClipboardJS(copyButton, {
                text: function () {
                    return noLaporan;
                }
            });

            clipboard.on('success', function (e) {
                alert('Nomor laporan berhasil disalin!');
                e.clearSelection();
            });

            clipboard.on('error', function (e) {
                alert('Gagal menyalin nomor laporan.');
            });
        });
    </script>
</head>

<body>
    <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
        data-sidebar-position="fixed" data-header-position="fixed">
        <div
            class="position-relative overflow-hidden radial-gradient min-vh-100 d-flex align-items-center justify-content-center">
            <div class="d-flex align-items-center justify-content-center w-100">
                <div class="row justify-content-center w-100">
                    <div class="col-md-8 col-lg-6 col-xxl-3">
                        <div class="card mb-0">
                            <div class="card-body">
                                <h4 class="fw-semibold mb-4">Pengaduan Pencurian Sepeda Motor</h4>
                                <form>
                                    <div class="mb-3">
                                        <p class="form-label" style="text-align: justify;">Laporan anda telah diterima oleh pihak RESKRIM POLRES
                                            Lampung Utara.</p>
                                        <p class="form-label">Nomor laporan :
                                            <strong>
                                                <?php echo $no_laporan; ?>
                                            </strong>
                                        </p>
                                        <p class="form-label" style="text-align: justify;">Simpan nomor laporan untuk mengakses riwayat laporan dan silahkan untuk melengkapi laporan
                                            anda pada halaman <a href="<?= base_url('history'); ?>">History</a>.</p>
                                    </div>
                                </form>
                                <form class="d-flex justify-content-between">
                                    <div class="row">
                                        <div class="col-md-6 mb-3">
                                            <a href="<?= base_url(); ?>" class="btn btn-secondary">Back To Home</a>
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <button id="copyButton" class="btn btn-warning">Copy Nomor Laporan</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="<?= base_url('../assets/libs/jquery/dist/jquery.min.js'); ?>"></script>
    <script src="<?= base_url('../assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js'); ?>"></script>
</body>

</html>