<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <title>Tambah Data</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <link
        href="assets\img\png-transparent-bandar-lampung-maluku-kepolisian-daerah-lampung-indonesian-national-police-others-logo-indonesia-area-removebg-preview.png"
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

    <script src="https://code.iconify.design/iconify-icon/1.0.7/iconify-icon.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://js.pusher.com/8.2.0/pusher.min.js"></script>

    <script>
        if ('serviceWorker' in navigator) {
            navigator.serviceWorker.register('/curanmorpolreslampungutara/public/assets/js/service-worker.js')
                .then(registration => {
                    console.log('Service Worker registered with scope:', registration.scope);

                    var pusher = new Pusher('3f13a94c15910301c709', {
                        cluster: 'ap1',
                        encrypted: true
                    });

                    var channel = pusher.subscribe('panic-channel');

                    channel.bind('panic-event', function (data) {
                        data.url = '<?= site_url('detaillaporan/') ?>' + data.no_laporan.replace(/\//g, '-');

                        if (registration.active) {
                            registration.active.postMessage(data);
                        }
                    });

                })
                .catch(error => {
                    console.error('Service Worker registration failed:', error);
                });
        }
    </script>
</head>

<body>
    <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
        data-sidebar-position="fixed" data-header-position="fixed">
        <aside class="left-sidebar">
            <div>
                <div class="brand-logo d-flex align-items-center justify-content-between">
                    <div style="padding: 25px 30%;">
                        <img src="assets/img/png-transparent-bandar-lampung-maluku-kepolisian-daerah-lampung-indonesian-national-police-others-logo-indonesia-area-removebg-preview.png"
                            alt="Logo" width="80">
                    </div>
                    <div class="close-btn d-xl-none d-block sidebartoggler cursor-pointer" id="sidebarCollapse">
                        <span>
                            <i class="ti ti-x fs-8"></i>
                        </span>
                    </div>
                </div>
                <nav class="sidebar-nav scroll-sidebar" data-simplebar="">
                    <ul id="sidebarnav">
                        <li class="nav-small-cap">
                            <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
                            <span class="hide-menu">Home</span>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link" href="<?= site_url('Dashboard/1'); ?>">
                                <iconify-icon icon="ic:round-dashboard"></iconify-icon>
                                <span class="hide-menu">Dashboard</span>
                            </a>
                        </li>
                        <li class="nav-small-cap">
                            <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
                            <span class="hide-menu">Kelola Data Motor</span>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link" href="<?= site_url('datatipemotor/1'); ?>">
                                <iconify-icon icon="material-symbols:motorcycle"></iconify-icon>
                                <span class="hide-menu">Data Tipe Motor</span>
                            </a>
                        </li>
                        <li class="nav-small-cap">
                            <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
                            <span class="hide-menu">Kelola Data Lokasi</span>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link" href="<?= site_url('dataprovinsi/1'); ?>">
                                <iconify-icon icon="tabler:location-filled"></iconify-icon>
                                <span class="hide-menu">Data Provinsi</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link" href="<?= site_url('datakabupatenkota/1'); ?>">
                                <iconify-icon icon="tabler:location-filled"></iconify-icon>
                                <span class="hide-menu">Data Kabupaten/Kota</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link" href="<?= site_url('datakecamatan/1'); ?>">
                                <iconify-icon icon="tabler:location-filled"></iconify-icon>
                                <span class="hide-menu">Data Kecamatan</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link" href="<?= site_url('datakelurahandesa/1'); ?>">
                                <iconify-icon icon="tabler:location-filled"></iconify-icon>
                                <span class="hide-menu">Data Kelurahan/Desa</span>
                            </a>
                        </li>
                        <li class="nav-small-cap">
                            <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
                            <span class="hide-menu">Akun</span>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link" href="<?php echo site_url('UbahAkun'); ?>">
                                <iconify-icon icon="mdi:account-cog" width="24" height="24"></iconify-icon>
                                <span class="hide-menu">Kelola Akun</span>
                            </a>
                        </li>
                    </ul>
                </nav>
            </div>
        </aside>
        <div class="body-wrapper">
            <header class="app-header">
                <nav class="navbar navbar-expand-lg navbar-light">
                    <ul class="navbar-nav">
                        <li class="nav-item d-block d-xl-none">
                            <a class="nav-link sidebartoggler nav-icon-hover" id="headerCollapse"
                                href="javascript:void(0)">
                                <i class="ti ti-menu-2"></i>
                            </a>
                        </li>
                    </ul>
                    <div class="navbar-collapse justify-content-end px-0" id="navbarNav">
                        <ul class="navbar-nav flex-laporan ms-auto align-items-center justify-content-end">
                            <a href="<?= base_url(); ?>" class="btn btn-dark list-inline-item">Back To Home</a>
                            <a href="<?php echo site_url('Login/logout'); ?>" class="btn btn-light list-inline-item">Log
                                Out</a>
                        </ul>
                    </div>
                </nav>
            </header>
        </div>
        <div class="body-wrapper radial-gradient min-vh-100">
            <div class="container-fluid">
                <div class="container-fluid">
                    <div class="card">
                        <div class="card-body">
                            <p class="text-center">Tambah Data </p>
                            <form method="post" action="<?= base_url('PanicButton/tambah_data') ?>">
                                <h5 class="card-title fw-semibold mb-2">Identitas Pelapor</h5>
                                <div class="mb-3">
                                    <h6 for="nik" class="form-label">Nomor Induk Kependudukan
                                        (NIK)</h6>
                                    <input type="text" class="form-control" id="nik" name="nik" minlength="16">
                                </div>
                                <div class="mb-3">
                                    <h6 class="form-label">Nama Lengkap</h6>
                                    <input type="text" name="nama" class="form-control" required>
                                </div>
                                <div class="mb-3">
                                    <h6 class="form-label">Nomor HP</h6>
                                    <input type="text" name="no_hp" class="form-control">
                                </div>
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <h6 for="tempat_lahir" class="form-label">Tempat Lahir</h6>
                                        <input type="text" class="form-control" id="tempat_lahir" name="tempat_lahir">
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <h6 for="tanggal_lahir" class="form-label">Tanggal Lahir</h6>
                                        <input type="date" class="form-control" id="tanggal_lahir" name="tanggal_lahir">
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <h6 for="jenis_kelamin" class="form-label">Jenis Kelamin</h6>
                                    <select class="form-select" id="jenis_kelamin" name="jenis_kelamin" required>
                                        <option value="" selected>Pilih Jenis Kelamin</option>
                                        <option value="Laki-laki">Laki-laki</option>
                                        <option value="Perempuan">Perempuan</option>
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <h6 for="agama" class="form-label">Agama</h6>
                                    <select class="form-select" id="agama" name="agama" required>
                                        <option value="" selected>Pilih Agama</option>
                                        <option value="Islam">Islam</option>
                                        <option value="Kristen">Kristen</option>
                                        <option value="Katolik">Katolik</option>
                                        <option value="Hindu">Hindu</option>
                                        <option value="Budha">Budha</option>
                                        <option value="Kong Hu Cu">Kong Hu Cu</option>
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <h6 for="pekerjaan" class="form-label">Pekerjaan</h6>
                                    <input type="text" class="form-control" id="pekerjaan" name="pekerjaan" required>
                                </div>
                                <u class='fw-normal mb-1'>Alamat</u>
                                <div class="mb-3">
                                    <h6 for="prov_id" class="form-label">Provinsi</h6>
                                    <select class="form-select" id="prov_id" required>
                                        <option value="">Pilih Provinsi</option>
                                        <?php foreach ($provinsi as $p): ?>
                                            <option value="<?= $p->prov_id; ?>">
                                                <?= $p->prov_name; ?>
                                            </option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <h6 for="city_name" class="form-label">Kabupaten/Kota</h6>
                                    <select class="form-select" id="city_id" required>
                                    </select>
                                </div>
                                <script>
                                    $(document).ready(function () {
                                        $('#prov_id').change(function () {
                                            var prov_id = $(this).val();
                                            console.log('Selected Province ID:', prov_id);
                                            if (prov_id != '') {
                                                $.ajax({
                                                    url: "<?= site_url('DataKabupatenKota/get_kabupatenkota_by_provinsi'); ?>",
                                                    method: "POST",
                                                    data: {
                                                        prov_id: prov_id
                                                    },
                                                    dataType: "json",
                                                    success: function (data) {
                                                        var options = '<option value="">Pilih Kabupaten/Kota</option>';
                                                        data.forEach(function (item) {
                                                            options += '<option value="' + item.city_id + '">' + item.city_name + '</option>';
                                                        });
                                                        $('#city_id').html(options);
                                                    }
                                                });
                                            } else {
                                                $('#city_id').html('<option value="">Pilih Kabupaten/Kota</option>');
                                            }
                                        });
                                    });
                                </script>
                                <div class="mb-3">
                                    <h6 for="dis_name" class="form-label">Kecamatan</h6>
                                    <select class="form-select" id="dis_id" required>
                                    </select>
                                </div>
                                <script>
                                    $(document).ready(function () {
                                        $('#city_id').change(function () {
                                            var city_id = $(this).val();

                                            if (city_id != '') {
                                                $.ajax({
                                                    url: "<?= site_url('DataKecamatan/get_kecamatan_by_kabupatenkota'); ?>",
                                                    method: "POST",
                                                    data: {
                                                        city_id: city_id
                                                    },
                                                    dataType: "json",
                                                    success: function (data) {
                                                        var options = '<option value="">Pilih Kecamatan</option>';
                                                        data.forEach(function (item) {
                                                            options += '<option value="' + item.dis_id + '">' + item.dis_name + '</option>';
                                                        });
                                                        $('#dis_id').html(options);
                                                    }
                                                });
                                            } else {
                                                $('#dis_id').html('<option value="">Pilih Kecamatan</option>');
                                            }
                                        });
                                    });
                                </script>
                                <div class="mb-3">
                                    <h6 for="subdis_name" class="form-label">Kelurahan/Desa</h6>
                                    <select class="form-select" id="subdis_id" name="subdis_id" required>
                                    </select>
                                </div>
                                <script>
                                    $(document).ready(function () {
                                        $('#dis_id').change(function () {
                                            var dis_id = $(this).val();

                                            if (dis_id != '') {
                                                $.ajax({
                                                    url: "<?= site_url('DataKelurahanDesa/get_kelurahandesa_by_kecamatan'); ?>",
                                                    method: "POST",
                                                    data: {
                                                        dis_id: dis_id
                                                    },
                                                    dataType: "json",
                                                    success: function (data) {
                                                        var options = '<option value="">Pilih Kelurahan/Desa</option>';
                                                        data.forEach(function (item) {
                                                            options += '<option value="' + item.subdis_id + '">' + item.subdis_name + '</option>';
                                                        });
                                                        $('#subdis_id').html(options);
                                                    }
                                                });
                                            } else {
                                                $('#subdis_id').html('<option value="">Pilih Kelurahan/Desa</option>');
                                            }
                                        });
                                    });
                                </script>
                                <div class="mb-3">
                                    <h6 for="alamat" class="form-label">Alamat</h6>
                                    <input type="text" class="form-control" id="alamat" name="alamat" required>
                                </div>
                                <h5 class="card-title fw-semibold mb-2">Uraian Kejadian</h5>
                                <div class="mb-3">
                                    <h6 class="form-label">Waktu Kejadian</h6>
                                    <input type="datetime-local" name="waktu_kejadian" class="form-control" required>
                                </div>
                                <div class="mb-3">
                                    <h6 for="id_motor" class="form-label">Tipe Motor
                                    </h6>
                                    <select class="form-select" id="id_motor" name="id_motor" required>
                                        <option value="">Pilih Tipe Motor</option>
                                        <?php foreach ($motor as $k): ?>
                                            <option value="<?= $k->id_motor; ?>">
                                                <?= $k->tipe_motor; ?>
                                            </option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <h6 for="no_plat" class="form-label">Nomor Plat</h6>
                                    <input type="text" class="form-control" name="no_plat" id="no_plat" required>
                                </div>
                                <div class="mb-3">
                                    <h6 for="warna" class="form-label">Warna</h6>
                                    <input type="text" class="form-control" id="warna" name="warna" required>
                                </div>
                                <div class="mb-3">
                                    <h6 for="no_rangka" class="form-label">Nomor Rangka
                                    </h6>
                                    <input type="text" class="form-control" id="no_rangka" name="no_rangka" required>
                                </div>
                                <div class="mb-3">
                                    <h6 for="no_mesin" class="form-label">Nomor Mesin
                                    </h6>
                                    <input type="text" class="form-control" id="no_mesin" name="no_mesin" required>
                                </div>
                                <div class="mb-3">
                                    <h6 for="kronologi" class="form-label">Kronologi</h6>
                                    <textarea rows="5" type="text" class="form-control" id="kronologi" name="kronologi"
                                        required></textarea>
                                </div>
                                <div class="mb-3">
                                    <h6 for="kronologi" class="form-label">Total Kerugian</h6>
                                    <input type="number" class="form-control" id="kerugian" name="kerugian" required>
                                </div>
                                <div class="mb-3">
                                    <h6 for="kronologi" class="form-label">Detail Lokasi Kejadian</h6>
                                    <input type="text" class="form-control" id="alamat_kejadian" name="alamat_kejadian"
                                        required>
                                </div>
                                <button type="submit" class="btn btn-warning">Submit</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="<?= base_url('assets/libs/jquery/dist/jquery.min.js'); ?>"></script>
    <script src="<?= base_url('assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js'); ?>"></script>
    <script src="<?= base_url('assets/js/sidebarmenu.js'); ?>"></script>
    <script src="<?= base_url('assets/js/app.min.js'); ?>"></script>
    <script src="<?= base_url('assets/js/sort.js'); ?>"></script>
    <script src="<?= base_url('assets/libs/apexcharts/dist/apexcharts.min.js'); ?>"></script>
    <script src="<?= base_url('assets/libs/simplebar/dist/simplebar.js'); ?>"></script>
    <script src="<?= base_url('assets/js/dashboard.js'); ?>"></script>
</body>

</html>