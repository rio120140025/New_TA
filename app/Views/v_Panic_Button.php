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
    <div class="body-wrapper radial-gradient">
        <div class="container-fluid">
            <div class="container-fluid">
                <div class="card">
                    <div class="card-body">
                        <a href="<?= base_url(); ?>" class="btn btn-dark list-inline-item">Back</a>
                        <p class="text-center">Pengaduan Kasus Pencurian Sepeda Motor di Polres Lampung
                            Utara
                        </p>
                        <div id="locationMessage" class="alert alert-danger" style="display: none;"></div>
                        <form method="post" action="<?= base_url('PanicButton/insert_data_not_login') ?>">
                            <h5 class="card-title fw-semibold mb-2">Identitas Pelapor</h5>
                            <div class="mb-3">
                                <h6 for="nama" class="form-label">Nama Lengkap</h6>
                                <input type="text" class="form-control" id="nama" name="nama" required>
                                <div class="form-text">Masukkan nama lengkap sesuai pada KTP anda</div>
                            </div>
                            <div class="mb-3">
                                <h6 for="no_hp" class="form-label">Nomor HP</h6>
                                <input type="text" class="form-control" id="no_hp" name="no_hp" required>
                                <div class="form-text">Masukkan nomor hp yang dapat dihubungi</div>
                            </div>
                            <h5 class="card-title fw-semibold mb-2">Informasi Kendaraan</h5>
                            <div class="mb-3">
                                <h6 for="no_plat" class="form-label">Nomor Plat</h6>
                                <input type="text" class="form-control" id="no_plat" name="no_plat" required>
                                <div class="form-text">Masukkan nomor plat kendaraan yang dicuri</div>
                            </div>
                            <h5 class="card-title fw-semibold mb-2">Informasi Lain</h5>
                            <div class="mb-3">
                                <h6 for="waktu_kejadian" class="form-label">Waktu Kejadian</h6>
                                <input type="datetime-local" class="form-control" id="waktu_kejadian"
                                    name="waktu_kejadian" required>
                            </div>
                            <div class="mb-3">
                                <h6 class="form-label">Titik Lokasi Tempat Kejadian Perkara</h6>
                                <div id="map"></div>
                            </div>
                            <div class="panic-button-container">
                                <button type="submit" class="panic-button">Panic <br> Button</button>
                            </div>
                            <input type="hidden" id="latitude" name="latitude">
                            <input type="hidden" id="longitude" name="longitude">
                            <input type="hidden" id="tkp" name="alamat_kejadian">
                            <input type="hidden" id="lokasi" name="lokasi">
                            <script>
                                var map = L.map('map').setView([0, 0], 15);
                                var marker;

                                L.tileLayer('https://{s}.google.com/vt?lyrs=m&x={x}&y={y}&z={z}', {
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
                                            var county = data.address.county;

                                            if (county === "Lampung Utara") {
                                                var address = data.display_name;
                                                var lokasi = data.address.village || data.address.town || data.address.city_district;

                                                marker = L.marker([lat, lng]).addTo(map);
                                                marker.bindPopup(address).openPopup();

                                                document.getElementById('tkp').value = address;
                                                document.getElementById('lokasi').value = lokasi;
                                            } else {
                                                document.getElementById('locationMessage').innerHTML = 'Lokasi Anda berada di luar wilayah Lampung Utara. Fitur ini tidak bisa digunakan.';
                                                document.getElementById('locationMessage').style.display = 'block';
                                                document.querySelector('form').style.display = 'none';
                                            }
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
    <script src="<?= base_url('assets/libs/jquery/dist/jquery.min.js'); ?>"></script>
    <script src="<?= base_url('assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js'); ?>"></script>
    <script src="<?= base_url('assets/js/sidebarmenu.js'); ?>"></script>
    <script src="<?= base_url('assets/js/app.min.js'); ?>"></script>
    <script src="<?= base_url('assets/libs/apexcharts/dist/apexcharts.min.js'); ?>"></script>
    <script src="<?= base_url('assets/libs/simplebar/dist/simplebar.js'); ?>"></script>
    <script src="<?= base_url('assets/js/dashboard.js'); ?>"></script>
</body>

</html>