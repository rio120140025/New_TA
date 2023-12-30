<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <title>Data Diri</title>

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
                            <a class="sidebar-link" href="<?= site_url('Dashboard'); ?>">
                                <iconify-icon icon="ic:round-dashboard"></iconify-icon>
                                <span class="hide-menu">Dashboard</span>
                            </a>
                        </li>
                        <li class="nav-small-cap">
                            <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
                            <span class="hide-menu">Akun</span>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link" href="<?php echo site_url('UbahAkun'); ?>">
                                <iconify-icon icon="mdi:account-cog"></iconify-icon>
                                <span class="hide-menu">Kelola Akun</span>
                            </a>
                        </li>
                        <li class="nav-small-cap">
                            <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
                            <span class="hide-menu">Kelola Data</span>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link" href="<?php echo site_url('DataDiri'); ?>">
                                <iconify-icon icon="mdi:user"></iconify-icon>
                                <span class="hide-menu">Data Diri</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link" href="<?php echo site_url('DataMotor'); ?>">
                                <iconify-icon icon="material-symbols:motorcycle"></iconify-icon>
                                <span class="hide-menu">Data Motor</span>
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
                        <ul class="navbar-nav flex-row ms-auto align-items-center justify-content-end">
                            <a href="<?= base_url(); ?>" class="btn btn-dark list-inline-item">Back To Home</a>
                            <a href="<?php echo site_url('Login/logout'); ?>" class="btn btn-light list-inline-item">Log
                                Out</a>
                        </ul>
                    </div>
                </nav>
            </header>
        </div>
        <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6">
            <div class="body-wrapper radial-gradient min-vh-100">
                <div class="container-fluid">
                    <div class="container-fluid">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex justify-content-between align-items-center mb-4">
                                    <h5 class="modal-title">Data Diri</h5>
                                </div>
                                <?php if (session()->has('message')): ?>
                                    <div class="alert alert-success" role="alert">
                                        <?= session('message') ?>
                                    </div>
                                <?php endif; ?>
                                <form method="post" action="<?= base_url('DataDiri/update_data_diri') ?>">
                                    <input type="hidden" name="id_data_diri" value="<?= $id_data_diri ?>">
                                    <div class="mb-3">
                                        <h6 for="nik" class="form-label">Nomor Induk Kependudukan
                                            (NIK)</h6>
                                        <input type="text" class="form-control" id="nik" name="nik" value="<?= $nik ?>"
                                            minlength="16" required>
                                    </div>
                                    <div class="mb-3">
                                        <h6 for="nama" class="form-label">Nama Lengkap</h6>
                                        <input type="text" class="form-control" id="nama" name="nama"
                                            value="<?= $nama ?>" required>
                                    </div>
                                    <div class="mb-3">
                                        <h6 for="no_hp" class="form-label">Nomor HP</h6>
                                        <input type="text" class="form-control" id="no_hp" name="no_hp"
                                            value="<?= $no_hp ?>" required>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6 mb-3">
                                            <h6 for="tempat_lahir" class="form-label">Tempat Lahir</h6>
                                            <input type="text" class="form-control" id="tempat_lahir"
                                                name="tempat_lahir" value="<?= $tempat_lahir ?>" required>
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <h6 for="tanggal_lahir" class="form-label">Tanggal Lahir</h6>
                                            <input type="date" class="form-control" id="tanggal_lahir"
                                                name="tanggal_lahir" value="<?= $tanggal_lahir ?>" required>
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <h6 for="jenis_kelamin" class="form-label">Jenis Kelamin</h6>
                                        <select class="form-select" id="jenis_kelamin" name="jenis_kelamin" required>
                                            <option value="" <?= ($jenis_kelamin == '') ? 'selected' : '' ?>>Pilih Jenis
                                                Kelamin</option>
                                            <option value="Laki-laki" <?= ($jenis_kelamin == 'Laki-laki') ? 'selected' : '' ?>>Laki-laki</option>
                                            <option value="Perempuan" <?= ($jenis_kelamin == 'Perempuan') ? 'selected' : '' ?>>Perempuan</option>
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <h6 for="agama" class="form-label">Agama</h6>
                                        <select class="form-select" id="agama" name="agama" required>
                                            <option value="" <?= ($agama == '') ? 'selected' : '' ?>>Pilih Agama</option>
                                            <option value="Islam" <?= ($agama == 'Islam') ? 'selected' : '' ?>>
                                                Islam</option>
                                            <option value="Kristen" <?= ($agama == 'Kristen') ? 'selected' : '' ?>>Kristen
                                            </option>
                                            <option value="Katolik" <?= ($agama == 'Katolik') ? 'selected' : '' ?>>Katolik
                                            </option>
                                            <option value="Hindu" <?= ($agama == 'Hindu') ? 'selected' : '' ?>>
                                                Hindu</option>
                                            <option value="Budha" <?= ($agama == 'Budha') ? 'selected' : '' ?>>
                                                Budha</option>
                                            <option value="Kong Hu Cu" <?= ($agama == 'Kong Hu Cu') ? 'selected' : '' ?>>
                                                Kong Hu Cu</option>
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <h6 for="pekerjaan" class="form-label">Pekerjaan</h6>
                                        <input type="text" class="form-control" id="pekerjaan" name="pekerjaan"
                                            value="<?= $pekerjaan ?>" required>
                                    </div>
                                    <u class='fw-normal mb-1'>Alamat</u>
                                    <div class="mb-3">
                                        <h6 for="prov_id" class="form-label">Provinsi</h6>
                                        <select class="form-select" id="prov_id" required>
                                            <?php foreach ($provinsi as $p): ?>
                                                <option value="<?= $p->prov_id; ?>" <?= ($p->prov_id == $location['prov_id']) ? 'selected' : ''; ?>>
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
                                            var prov_id = <?= json_encode($location['prov_id']); ?>;
                                            var city_id = <?= json_encode($location['city_id']); ?>;

                                            showCities(prov_id, city_id);

                                            $('#prov_id').change(function () {
                                                var selectedProvId = $(this).val();
                                                showCities(selectedProvId, null);
                                            });

                                            function showCities(selectedProvId, selectedCityId) {
                                                $.ajax({
                                                    url: "<?= site_url('DataKabupatenKota/get_kabupatenkota_by_provinsi'); ?>",
                                                    method: "POST",
                                                    data: {
                                                        prov_id: selectedProvId
                                                    },
                                                    dataType: "json",
                                                    success: function (data) {
                                                        var options = '<option value="">Pilih Kabupaten/Kota</option>';
                                                        data.forEach(function (item) {
                                                            var selectedAttr = (item.city_id == selectedCityId) ? 'selected' : '';
                                                            options += '<option value="' + item.city_id + '" ' + selectedAttr + '>' + item.city_name + '</option>';
                                                        });
                                                        $('#city_id').html(options);
                                                    }
                                                });
                                            }
                                        });
                                    </script>
                                    <div class="mb-3">
                                        <h6 for="dis_name" class="form-label">Kecamatan</h6>
                                        <select class="form-select" id="dis_id" required>
                                        </select>
                                    </div>
                                    <script>
                                        $(document).ready(function () {
                                            var prov_id = <?= json_encode($location['prov_id']); ?>;
                                            var city_id = <?= json_encode($location['city_id']); ?>;
                                            var dis_id = <?= json_encode($location['dis_id']); ?>;

                                            showCities(city_id, dis_id);

                                            $('#prov_id').change(function () {
                                                var selectedProvId = $(this).val();
                                                showCities(selectedProvId, null);
                                            });

                                            $('#city_id').change(function () {
                                                var selectedCityId = $(this).val();
                                                showCities(selectedCityId, null);
                                            });

                                            function showCities(selectedCityId, selectedDisId) {
                                                $.ajax({
                                                    url: "<?= site_url('DataKecamatan/get_kecamatan_by_kabupatenkota'); ?>",
                                                    method: "POST",
                                                    data: {
                                                        city_id: selectedCityId
                                                    },
                                                    dataType: "json",
                                                    success: function (data) {
                                                        var options = '<option value="">Pilih Kecamatan</option>';
                                                        data.forEach(function (item) {
                                                            var selectedAttr = (item.dis_id == selectedDisId) ? 'selected' : '';
                                                            options += '<option value="' + item.dis_id + '" ' + selectedAttr + '>' + item.dis_name + '</option>';
                                                        });
                                                        $('#dis_id').html(options);
                                                    }
                                                });
                                            }
                                        });
                                    </script>
                                    <div class="mb-3">
                                        <h6 for="subdis_name" class="form-label">Kelurahan/Desa</h6>
                                        <select class="form-select" id="subdis_id" name="subdis_id" required>
                                        </select>
                                    </div>
                                    <script>
                                        $(document).ready(function () {
                                            var prov_id = <?= json_encode($location['prov_id']); ?>;
                                            var city_id = <?= json_encode($location['city_id']); ?>;
                                            var dis_id = <?= json_encode($location['dis_id']); ?>;
                                            var subdis_id = <?= json_encode($location['subdis_id']); ?>;

                                            showCities(dis_id, subdis_id);

                                            $('#prov_id').change(function () {
                                                var selectedProvId = $(this).val();
                                                showCities(selectedProvId, null);
                                            });

                                            $('#city_id').change(function () {
                                                var selectedCityId = $(this).val();
                                                showCities(selectedCityId, null);
                                            });

                                            $('#dis_id').change(function () {
                                                var selectedDisId = $(this).val();
                                                showCities(selectedDisId, null);
                                            });

                                            function showCities(selectedDisId, selectedSubDisId) {
                                                $.ajax({
                                                    url: "<?= site_url('DataKelurahanDesa/get_kelurahandesa_by_kecamatan'); ?>",
                                                    method: "POST",
                                                    data: {
                                                        dis_id: selectedDisId
                                                    },
                                                    dataType: "json",
                                                    success: function (data) {
                                                        var options = '<option value="">Pilih Kelurahan/Desa</option>';
                                                        data.forEach(function (item) {
                                                            var selectedAttr = (item.subdis_id == selectedSubDisId) ? 'selected' : '';
                                                            options += '<option value="' + item.subdis_id + '" ' + selectedAttr + '>' + item.subdis_name + '</option>';
                                                        });
                                                        $('#subdis_id').html(options);
                                                    }
                                                });
                                            }
                                        });
                                    </script>
                                    <div class="mb-3">
                                        <h6 for="alamat" class="form-label">Alamat</h6>
                                        <input type="text" class="form-control" id="alamat" name="alamat"
                                            value="<?= $alamat ?>" required>
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
        <script src="<?= base_url('assets/libs/apexcharts/dist/apexcharts.min.js'); ?>"></script>
        <script src="<?= base_url('assets/libs/simplebar/dist/simplebar.js'); ?>"></script>
        <script src="<?= base_url('assets/js/dashboard.js'); ?>"></script>
</body>

</html>