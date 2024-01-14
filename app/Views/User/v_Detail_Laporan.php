<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <title>Detail Laporan</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <link
        href="..\assets\img\png-transparent-bandar-lampung-maluku-kepolisian-daerah-lampung-indonesian-national-police-others-logo-indonesia-area-removebg-preview.png"
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

    <style>
        #map {
            width: 100%;
            height: 35vh;
            border-radius: 10px;
            z-index: 1;
        }
    </style>

    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css"
        integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY=" crossorigin="" />
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"
        integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo=" crossorigin=""></script>

    <script src="https://code.iconify.design/iconify-icon/1.0.7/iconify-icon.min.js"></script>

</head>

<body>
    <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
        data-sidebar-position="fixed" data-header-position="fixed">
        <aside class="left-sidebar">
            <div>
                <div class="brand-logo d-flex align-items-center justify-content-between">
                    <div style="padding: 25px 30%;">
                        <img src="../assets/img/png-transparent-bandar-lampung-maluku-kepolisian-daerah-lampung-indonesian-national-police-others-logo-indonesia-area-removebg-preview.png"
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
                        <li class="sidebar-item">
                            <a class="sidebar-link" href="<?= site_url('panicbutton'); ?>">
                                <iconify-icon icon="tabler:urgent"></iconify-icon>
                                <span class="hide-menu">Panic Button</span>
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
            <div class="body-wrapper radial-gradient">
                <div class="container-fluid">
                    <div class="container-fluid">
                        <div class="card">
                            <div class="card-body">
                                <p class="text-center">Detail Laporan</p>
                                <div class="mb-3">
                                    <h6 class="form-label">Nomor Laporan</h6>
                                    <input class="form-control" value="<?= $laporan['no_laporan']; ?>" readonly>
                                </div>
                                <div class="mb-3">
                                    <h6 class="form-label">Waktu Melapor</h6>
                                    <input class="form-control"
                                        value="<?= date('H:i:s d F Y', strtotime($laporan['waktu_melapor'])); ?>"
                                        readonly>
                                </div>
                                <div class="mb-4">
                                    <h6 class="form-label">Status</h6>
                                    <?php if ($laporan['id_status'] == 0): ?>
                                        <button class="btn btn-warning" disabled>
                                            Pending
                                        </button>
                                    <?php elseif ($laporan['id_status'] == 1): ?>
                                        <button class="btn btn-danger" disabled>
                                            Dalam Lidik
                                        </button>
                                    <?php elseif ($laporan['id_status'] == 2): ?>
                                        <button class="btn btn-success" disabled>
                                            Kasus Selesai
                                        </button>
                                    <?php endif; ?>
                                </div>
                                <h5 class="card-title fw-semibold mb-2">Identitas Pelapor</h5>
                                <div class="mb-3">
                                    <h6 class="form-label">NIK</h6>
                                    <input class="form-control" value="<?= $laporan['nik']; ?>" readonly>
                                </div>
                                <div class="mb-3">
                                    <h6 class="form-label">Nama</h6>
                                    <input class="form-control" value="<?= $laporan['nama']; ?>" readonly>
                                </div>
                                <div class="mb-3">
                                    <h6 class="form-label">Tempat, Tanggal Lahir</h6>
                                    <input class="form-control"
                                        value="<?= $laporan['tempat_lahir']; ?> , <?= date('d F Y', strtotime($laporan['tanggal_lahir'])); ?>"
                                        readonly>
                                </div>
                                <div class="mb-3">
                                    <h6 class="form-label">Jenis Kelamin</h6>
                                    <input class="form-control" value="<?= $laporan['jenis_kelamin']; ?>" readonly>
                                </div>
                                <div class="mb-3">
                                    <h6 class="form-label">Agama</h6>
                                    <input class="form-control" value="<?= $laporan['agama']; ?>" readonly>
                                </div>
                                <div class="mb-3">
                                    <h6 class="form-label">Pekerjaan</h6>
                                    <input class="form-control" value="<?= $laporan['pekerjaan']; ?>" readonly>
                                </div>
                                <div class="mb-3">
                                    <h6 class="form-label">Nomor HP</h6>
                                    <input class="form-control" value="<?= $laporan['no_hp']; ?>" readonly>
                                </div>
                                <div class="mb-4">
                                    <h6 class="form-label">Alamat</h6>
                                    <input class="form-control"
                                        value="<?= $laporan['alamat']; ?>, Kelurahan/Desa <?= $laporan['subdis_name']; ?>, Kecamatan <?= $laporan['dis_name']; ?>, Kabupaten/Kota <?= $laporan['city_name']; ?>, Provinsi <?= $laporan['prov_name']; ?>"
                                        readonly>
                                </div>
                                <h5 class="card-title fw-semibold mb-2">Uraian Kejadian</h5>
                                <div class="mb-3">
                                    <h6 class="form-label">Waktu Kejadian</h6>
                                    <input class="form-control"
                                        value="<?= date('H:i:s d F Y', strtotime($laporan['waktu_kejadian'])); ?>"
                                        readonly>
                                </div>
                                <div class="mb-3">
                                    <h6 class="form-label">Tipe Motor</h6>
                                    <input class="form-control" value="<?= $laporan['tipe_motor']; ?>" readonly>
                                </div>
                                <div class="mb-3">
                                    <h6 class="form-label">Nomor Plat</h6>
                                    <input class="form-control" value="<?= $laporan['no_plat']; ?>" readonly>
                                </div>
                                <div class="mb-3">
                                    <h6 class="form-label">Nomor Rangka</h6>
                                    <input class="form-control" value="<?= $laporan['no_rangka']; ?>" readonly>
                                </div>
                                <div class="mb-3">
                                    <h6 class="form-label">Nomor Mesin</h6>
                                    <input class="form-control" value="<?= $laporan['no_mesin']; ?>" readonly>
                                </div>
                                <div class="mb-3">
                                    <h6 class="form-label">Total Kerugian</h6>
                                    <input class="form-control" value="Rp. <?= $laporan['kerugian']; ?>" readonly>
                                </div>
                                <div class="mb-3">
                                    <h6 class="form-label">Kronologi</h6>
                                    <input class="form-control" value="<?= $laporan['kronologi']; ?>" readonly>
                                </div>
                                <div class="mb-3">
                                    <h6 class="form-label">Tempat Kejadian Perkara</h6>
                                    <input class="form-control" value="<?= $laporan['alamat_kejadian']; ?>" readonly>
                                </div>
                                <div class="mb-3">
                                    <h6 class="form-label">Titik Lokasi Tempat Kejadian Perkara</h6>
                                    <div id="map"></div>
                                </div>
                                <script>
                                    var map = L.map('map').setView([<?= $laporan['latitude']; ?>, <?= $laporan['longitude']; ?>], 17);
                                    googleStreets = L.tileLayer('http://{s}.google.com/vt?lyrs=m&x={x}&y={y}&z={z}', {
                                        maxZoom: 19,
                                        subdomains: ['mt0', 'mt1', 'mt2', 'mt3'],
                                        attribution: '&copy; <a>POLRES Lampung Utara</a>'
                                    }).addTo(map);
                                    L.marker([<?= $laporan['latitude']; ?>, <?= $laporan['longitude']; ?>]).addTo(map)
                                        .bindPopup('Tempat Kejadian Perkara')
                                        .openPopup();
                                </script>
                            </div>
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