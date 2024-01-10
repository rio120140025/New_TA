<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <title>Pencurian Sepeda Motor Polres Lampung Utara</title>

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

    <link href="assets/vendor/aos/aos.css" rel="stylesheet" />
    <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet" />
    <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet" />
    <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet" />
    <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet" />
    <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet" />
    <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet" />

    <link href="assets/css/style.css" rel="stylesheet" />

    <style>
        #map {
            width: 100%;
            height: 67vh;
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
</head>

<body>
    <header id="header" class="fixed-top">
        <div class="container d-flex align-items-center">
            <h1 class="logo me-auto"><a href="">Polres Lampung Utara</a></h1>
            <nav id="navbar" class="navbar">
                <ul>
                    <li><a class="nav-link scrollto active" href="#hero">Home</a></li>
                    <li><a class="nav-link scrollto" href="#about">Maps</a></li>
                    <li><a class="nav-link scrollto" href="#skills">Evaluasi</a></li>
                    <li><a class="nav-link" href="<?php echo site_url('history'); ?>">History</a></li>
                    <li>
                        <a class="getstarted" href="<?php echo site_url('panicbutton'); ?>">Panic Button</a>
                    </li>
                    <li><a class="login" href="<?php echo site_url('login'); ?>">Log In</a></li>
                </ul>
                <i class="bi bi-list mobile-nav-toggle"></i>
            </nav>
        </div>
    </header>
    <section id="hero" class="d-flex align-items-center">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 d-flex flex-column justify-content-center pt-4 pt-lg-0 order-2 order-lg-1"
                    data-aos="fade-up" data-aos-delay="200">
                    <h2>Sistem Informasi Geografis</h2>
                    <h1>Lokasi Pencurian <br> Sepeda Motor</h1>
                    <div class="d-flex justify-content-center justify-content-lg-start">
                        <a href="<?php echo site_url('panicbutton'); ?>" class="btn-get-started">Panic Button</a>
                        <a href="#about" class="btn-watch-video scrollto">Maps</a>
                    </div>
                </div>
                <div class="col-lg-6 order-1 order-lg-2 hero-img text-center" data-aos="zoom-in" data-aos-delay="200">
                    <img src="assets\img\png-transparent-bandar-lampung-maluku-kepolisian-daerah-lampung-indonesian-national-police-others-logo-indonesia-area-removebg-preview.png"
                        class="img-fluid animated" alt="" />
                </div>
            </div>
        </div>
    </section>
    <main id="main">
        <section id="about" class="about">
            <div class="container" data-aos="fade-up">
                <div class="section-title">
                    <h2>Maps</h2>
                </div>
                <div id="map"></div>
                <script>
                    $(document).ready(function () {
                        var map;
                        var marker;

                        map = L.map('map').setView([0, 0], 15);

                        L.tileLayer('http://{s}.google.com/vt?lyrs=m&x={x}&y={y}&z={z}', {
                            maxZoom: 19,
                            subdomains: ['mt0', 'mt1', 'mt2', 'mt3'],
                            attribution: '&copy; <a>POLRES Lampung Utara</a>'
                        }).addTo(map);

                        function showLocation(lat, lng) {
                            if (marker) {
                                map.removeLayer(marker);
                            }
                            marker = L.marker([lat, lng]).addTo(map);
                            marker.bindPopup("Lokasi Anda").openPopup();
                            map.setView([lat, lng], 13);
                        }

                        function getLocation() {
                            if ("geolocation" in navigator) {
                                navigator.geolocation.watchPosition(function (position) {
                                    var lat = position.coords.latitude;
                                    var lng = position.coords.longitude;
                                    showLocation(lat, lng);

                                    document.getElementById('latitude').value = lat;
                                    document.getElementById('longitude').value = lng;
                                });
                            } else {
                                alert("Geolocation tidak didukung oleh browser Anda.");
                            }
                        }
                        getLocation();

                        $.ajax({
                            url: "<?php echo base_url('home/get_data'); ?>",
                            dataType: 'json',
                            method: 'get',
                            success: function (data) {
                                var customIcon = L.icon({
                                    iconUrl: 'assets/svg/location-warning.svg',
                                    iconSize: [46, 46],
                                    iconAnchor: [23, 46],
                                    popupAnchor: [0, -46]
                                });
                                data.laporan.map(data => {
                                    L.marker([data.latitude, data.longitude], { icon: customIcon })
                                        .bindPopup(`Tipe Motor: <strong>${data.tipe_motor}</strong><br>Tempat Kejadian Perkara: <br>Waktu Kejadian: <strong>${data.waktu_kejadian}</strong>`)
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
            </div>
        </section>
        <section id="skills" class="team section-bg">
            <div class="container" data-aos="fade-up">

                <div class="section-title">
                    <h2>Evaluasi</h2>
                </div>

                <div class="row">
                    <div class="col-lg-4">
                        <div class="member d-flex justify-content-center">
                            <div>
                                <canvas id="doughnut"></canvas>
                            </div>
                        </div>
                    </div>
                    <div class=" col-lg-4">
                        <div class="member d-flex justify-content-center">
                            <div>
                                <canvas id="line" style="height: 300px; width: 340px;"></canvas>
                            </div>
                        </div>
                    </div>
                    <div class=" col-lg-4">
                        <div class="member d-flex justify-content-center">
                            <div>
                                <canvas id="barChart" style="height: 300px; width: 340px;"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <footer id="footer">
            <div class="footer-top">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-2 col-md-6 footer-links">
                            <img src="assets\img\png-transparent-bandar-lampung-maluku-kepolisian-daerah-lampung-indonesian-national-police-others-logo-indonesia-area-removebg-preview.png"
                                alt="" width="135" height="180" />
                        </div>
                        <div class="col-lg-6 col-md-6 footer-contact">
                            <h3>Polres Lampung Utara</h3>
                            <p>
                                Jl. Tjoekoel Soebroto, Klp. Tujuh, Kec. Kotabumi Sel., Kabupaten Lampung Utara, Lampung
                                34511
                                <br><br>
                                <strong>Telepon:</strong> 0816-263-573<br>
                                <strong>Email:</strong> info@example.com<br>
                            </p>
                        </div>
                        <div class="col-lg-3 col-md-6 footer-links">
                            <h4>Media Sosial Kami</h4>
                            <p>Ikuti kami melalui media sosial berikut:</p>
                            <div class="social-links mt-3">
                                <a href="https://web.facebook.com/HumasPolresLampungUtaraa/?_rdc=1&_rdr"
                                    class="facebook"><i class="bx bxl-facebook"></i></a>
                                <a href="https://www.instagram.com/humaspolreslampungutaraa/" class="instagram"><i
                                        class="bx bxl-instagram"></i></a>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </footer>

        <div id="preloader"></div>
        <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
                class="bi bi-arrow-up-short"></i></a>

        <script src="assets/vendor/aos/aos.js"></script>
        <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
        <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
        <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
        <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
        <script src="assets/vendor/waypoints/noframework.waypoints.js"></script>
        <script src="assets/vendor/php-email-form/validate.js"></script>
        <script src="assets/js/main.js"></script>
</body>

</html>