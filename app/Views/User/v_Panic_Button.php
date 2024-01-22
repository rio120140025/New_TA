<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <title>Panic Button</title>

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

    <script src="https://code.jquery.com/jquery-3.7.1.min.js"
        integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.7.1/chart.min.js"></script>

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
                                <p class="text-center">Pengaduan Kasus Pencurian Sepeda Motor di Polres Lampung
                                    Utara
                                </p>
                                <form method="post" action="<?= base_url('PanicButton/insert_data') ?>">
                                    <div class="mb-3">
                                        <h6 for="id_kendaraan" class="form-label">Informasi Sepeda Motor</h6>
                                    </div>
                                    <select class="form-select mb-3" id="id_kendaraan" name="id_kendaraan" required>
                                        <option value="">Pilih Motor</option>
                                        <?php foreach ($kendaraan as $row): ?>
                                            <option value="<?= $row['id_kendaraan']; ?>">
                                                <?= $row['tipe_motor']; ?>
                                                <p>||</p>
                                                <?= $row['no_plat']; ?>
                                            </option>
                                        <?php endforeach; ?>
                                    </select>
                                    <div class="mb-3">
                                        <h6 for="waktu_kejadian" class="form-label">Waktu Kejadian</h6>
                                        <input type="datetime-local" class="form-control" id="waktu_kejadian"
                                            name="waktu_kejadian" required>
                                    </div>
                                    <div class="mb-3">
                                        <h6 class="form-label">Titik Lokasi Tempat Kejadian Perkara</h6>
                                        <div id="map"></div>
                                    </div>
                                    <button type="submit" class="btn btn-warning">Submit</button>
                                    <input type="hidden" id="latitude" name="latitude">
                                    <input type="hidden" id="longitude" name="longitude">
                                    <input type="hidden" id="tkp" name="alamat_kejadian">
                                    <input type="hidden" id="lokasi" name="lokasi">
                                    <script>
                                        var map = L.map('map').setView([0, 0], 15);
                                        var marker;

                                        L.tileLayer('http://{s}.google.com/vt?lyrs=m&x={x}&y={y}&z={z}', {
                                            maxZoom: 17,
                                            subdomains: ['mt0', 'mt1', 'mt2', 'mt3'],
                                            attribution: '&copy; <a>POLRES Lampung Utara</a>'
                                        }).addTo(map);

                                        function showLocation(lat, lng) {
                                            if (marker) {
                                                map.removeLayer(marker);
                                            }

                                            fetch(`https://nominatim.openstreetmap.org/reverse?format=json&lat=${lat}&lon=${lng}`)
                                                .then(response => response.json())
                                                .then(data => {
                                                    var address = data.display_name;
                                                    var lokasi = data.address.village || data.address.town || data.address.city_district;

                                                    marker = L.marker([lat, lng]).addTo(map);
                                                    marker.bindPopup(address).openPopup();

                                                    document.getElementById('tkp').value = address;
                                                    document.getElementById('lokasi').value = lokasi;
                                                })
                                                .catch(error => console.error('Error fetching location data:', error));

                                            map.setView([lat, lng], 15);
                                        }

                                        function getLocation() {
                                            if ("geolocation" in navigator) {
                                                navigator.geolocation.watchPosition(function (position) {
                                                    var lat = position.coords.latitude;
                                                    var lng = position.coords.longitude;
                                                    showLocation(lat, lng);

                                                    document.getElementById('latitude').value = lat;
                                                    document.getElementById('longitude').value = lng;

                                                    var currentTime = new Date();
                                                    var day = String(currentTime.getDate()).padStart(2, '0');
                                                    var month = String(currentTime.getMonth() + 1).padStart(2, '0');
                                                    var year = String(currentTime.getFullYear()).slice(-2);
                                                    var hours = String(currentTime.getHours()).padStart(2, '0');
                                                    var minutes = String(currentTime.getMinutes()).padStart(2, '0');
                                                    var seconds = String(currentTime.getSeconds()).padStart(2, '0');
                                                    var dateStr = day + month + year;
                                                    var timeStr = hours + minutes + seconds;
                                                    document.getElementById('waktu_melapor').value = dateStr + timeStr;
                                                });
                                            } else {
                                                alert("Geolocation tidak didukung oleh browser Anda.");
                                            }
                                        }
                                        getLocation();
                                    </script>
                                </form>
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