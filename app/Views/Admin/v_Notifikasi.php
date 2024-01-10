<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <title>Notifikasi</title>

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
                            <span class="hide-menu">Notifikasi</span>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link" href="<?= site_url('notifikasi'); ?>">
                                <iconify-icon icon="fluent:alert-12-filled"></iconify-icon>
                                <span class="hide-menu">Notifikasi</span>
                            </a>
                        </li>
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
                            <div class="card-header">
                                Notifikasi
                            </div>
                            <div class="card-body">
                                <?php if (session()->has('message')): ?>
                                    <div class="alert alert-success" role="alert">
                                        <?= session('message') ?>
                                    </div>
                                <?php endif; ?>
                                <?php if (!empty($laporan)): ?>
                                    <?php foreach ($laporan as $row): ?>
                                        <div class="card">
                                            <div class="card-body">
                                                <div class="mb-3">
                                                    <h6 class="form-label">Nomor Laporan</h6>
                                                    <?= $row['no_laporan']; ?>
                                                </div>
                                                <div class="mb-3">
                                                    <h6 class="form-label">Waktu Melapor</h6>
                                                    <?= date('H:i:s d F Y', strtotime($row['waktu_melapor'])); ?>
                                                </div>
                                                <div class="mb-3">
                                                    <h6 class="form-label">Tempat Kejadian Perkara</h6>
                                                    <?php if (!empty($row['alamat_kejadian'])): ?>
                                                        <?= $row['alamat_kejadian']; ?>
                                                    <?php else: ?>
                                                        <p>Data tidak ditemukan</p>
                                                    <?php endif; ?>
                                                </div>
                                                <?php
                                                $no_laporan = str_replace('/', '-', $row['no_laporan']);
                                                ?>
                                                <?php if (!empty($row['alamat_kejadian'])): ?>
                                                    <a href="<?= site_url('detaillaporan/' . $no_laporan); ?>"
                                                        class="btn btn-primary">Lihat Detail</a>
                                                <?php else: ?>
                                                    <a href="<?= site_url('updatelaporan/' . $no_laporan); ?>"
                                                        class="btn btn-danger">Lengkapi Laporan</a>
                                                <?php endif; ?>

                                            </div>
                                        </div>
                                    <?php endforeach; ?>
                                <?php else: ?>
                                    <p>Tidak ada data.</p>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <input type="hidden" id="latitude" name="latitude">
    <input type="hidden" id="longitude" name="longitude">
    <script>
        $(document).ready(function () {
            var map;
            var marker;

            map = L.map('map').setView([-4.786564, 104.827749], 11);

            L.tileLayer('http://{s}.google.com/vt?lyrs=m&x={x}&y={y}&z={z}', {
                maxZoom: 19,
                subdomains: ['mt0', 'mt1', 'mt2', 'mt3'],
                attribution: '&copy; <a>POLRES Lampung Utara</a>'
            }).addTo(map);

            $.ajax({
                url: "<?php echo base_url('home/get_data'); ?>",
                dataType: 'json',
                method: 'get',
                success: function (data) {
                    const baseUrl = window.location.origin;
                    var customIcon = L.icon({
                        iconUrl: '../assets/svg/location-warning.svg',
                        iconSize: [46, 46],
                        iconAnchor: [23, 46],
                        popupAnchor: [0, -46]
                    });

                    data.laporan.map(data => {
                        const no_laporan = data.no_laporan.replace(/\//g, '-');
                        const detailUrl = `${baseUrl}/curanmorpolreslampungutara/public/detaillaporan/${no_laporan}`;

                        L.marker([data.latitude, data.longitude], { icon: customIcon })
                            .bindPopup(`
                <strong>Tipe Motor:</strong> ${data.tipe_motor}<br>
                <strong>Tempat Kejadian Perkara:</strong> ${data.alamat_kejadian}<br>
                <strong>Waktu Kejadian:</strong> ${data.waktu_kejadian}<br>
                <strong>Detail:</strong> <a href="${detailUrl}" target="_blank">Lihat Detail</a>
            `)
                            .addTo(map);

                        var circle = L.circle([data.latitude, data.longitude], {
                            color: 'red',
                            fillColor: '#f03',
                            fillOpacity: 0.1
                        }).addTo(map);
                    });

                    var doughnutData = {
                        labels: data.motor.map(item => item.tipe_motor),
                        datasets: [{
                            data: data.motor.map(item => item.jumlah),
                            backgroundColor: [
                                'rgba(255, 99, 132, 0.7)',
                                'rgba(54, 162, 235, 0.7)',
                                'rgba(255, 206, 86, 0.7)',
                                'rgba(75, 192, 192, 0.7)',
                                'rgba(153, 102, 255, 0.7)',
                                'rgba(255, 159, 64, 0.7)',
                            ],
                            borderColor: [
                                'rgba(255, 99, 132, 1)',
                                'rgba(54, 162, 235, 1)',
                                'rgba(255, 206, 86, 1)',
                                'rgba(75, 192, 192, 1)',
                                'rgba(153, 102, 255, 1)',
                                'rgba(255, 159, 64, 1)',
                            ],
                            borderWidth: 1
                        }]
                    };

                    var doughnutCtx = document.getElementById('doughnut').getContext('2d');
                    var doughnutChart = new Chart(doughnutCtx, {
                        type: 'doughnut',
                        data: doughnutData
                    });

                    var lineData = {
                        labels: data.bulan.map(item => item.month),
                        datasets: [{
                            label: 'Jumlah Laporan',
                            data: data.bulan.map(item => item.jumlah),
                            fill: false,
                            borderColor: 'rgba(75, 192, 192, 1)',
                            borderWidth: 2
                        }]
                    };

                    var lineCtx = document.getElementById('line').getContext('2d');
                    var lineChart = new Chart(lineCtx, {
                        type: 'line',
                        data: lineData
                    });

                    var barData = {
                        labels: data.subdis.map(item => item.subdis_name),
                        datasets: [{
                            label: 'Jumlah Kasus Curanmor',
                            data: data.subdis.map(item => item.jumlah),
                            backgroundColor: 'rgba(75, 192, 192, 0.7)',
                            borderColor: 'rgba(75, 192, 192, 1)',
                            borderWidth: 1
                        }]
                    };

                    var barCtx = document.getElementById('barChart').getContext('2d');
                    var barChart = new Chart(barCtx, {
                        type: 'bar',
                        data: barData
                    });

                }
            });
        });
    </script>
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