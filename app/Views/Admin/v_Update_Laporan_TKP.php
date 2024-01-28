<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <title>Update Laporan TKP</title>

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
                        <img src="..\assets/img/png-transparent-bandar-lampung-maluku-kepolisian-daerah-lampung-indonesian-national-police-others-logo-indonesia-area-removebg-preview.png"
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
                            <p class="text-center">Update Laporan TKP
                            </p>
                            <form method="post" action="<?= base_url('UpdateLaporanTKP/update_laporan') ?>">
                                <div class="mb-3">
                                    <h6 for="no_laporan" class="form-label">Nomor Laporan</h6>
                                    <input type="text" class="form-control" id="no_laporan" name="no_laporan"
                                        value="<?= $laporan['no_laporan'] ?>" readonly>
                                </div>
                                <div class="mb-3">
                                    <h6 for="latitude" class="form-label">Latitude</h6>
                                    <input type="text" class="form-control" id="latitude" name="latitude" required>
                                </div>
                                <div class="mb-3">
                                    <h6 for="longitude" class="form-label">Latitude</h6>
                                    <input type="text" class="form-control" id="longitude" name="longitude" required>
                                </div>
                                <div class="mb-3 form-check">
                                    <input type="checkbox" class="form-check-input" id="toggleLocation" checked>
                                    <label class="form-check-label" for="toggleLocation">Aktifkan Lokasi GPS</label>
                                </div>
                                <div class="mb-3">
                                    <h6 class="form-label">Titik Lokasi Tempat Kejadian Perkara</h6>
                                    <div id="map"></div>
                                </div>
                                <input type="hidden" id="tkp" name="alamat_kejadian">
                                <input type="hidden" id="lokasi" name="lokasi">
                                <script>
                                    var map = L.map("map").setView([0, 0], 15);
                                    var marker;
                                    var locationToggle = document.getElementById("toggleLocation");
                                    var latitudeInput = document.getElementById("latitude");
                                    var longitudeInput = document.getElementById("longitude");

                                    L.tileLayer("https://{s}.google.com/vt?lyrs=m&x={x}&y={y}&z={z}", {
                                        maxZoom: 17,
                                        subdomains: ["mt0", "mt1", "mt2", "mt3"],
                                        attribution: "&copy; <a>POLRES Lampung Utara</a>",
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
                                        if (locationToggle.checked && "geolocation" in navigator) {
                                            alert("Geolocation dinyalakan.");
                                            navigator.geolocation.getCurrentPosition(function (position) {
                                                var lat = position.coords.latitude;
                                                var lng = position.coords.longitude;
                                                showLocation(lat, lng);

                                                latitudeInput.value = lat;
                                                longitudeInput.value = lng;
                                            });
                                        } else {
                                            alert("Geolocation dimatikan.");
                                        }
                                    }

                                    getLocation();
                                    locationToggle.addEventListener("change", getLocation);
                                </script>

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