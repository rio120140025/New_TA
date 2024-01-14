<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <title>Dashboard</title>

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
            height: 67vh;
            border-radius: 10px;
            z-index: 1;
        }
    </style>

    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css"
        integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY=" crossorigin="" />
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"
        integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo=" crossorigin=""></script>

    <script src="https://code.iconify.design/iconify-icon/1.0.7/iconify-icon.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.7.1/chart.min.js"></script>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
        crossorigin="anonymous"></script>

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
                        $('#notificationModal').modal('show');
                        $('#modalNoLaporan').text(data.no_laporan);
                        $('#modalNama').text(data.nama);
                        $('#modalWaktuKejadian').text(data.waktu_kejadian);
                        $('#modalTempatKejadian').text(data.alamat_kejadian);

                        $('#detailButton').on('click', function () {
                            var noLaporan = $('#modalNoLaporan').text().replace(/\//g, '-');
                            var redirectURL = '<?= site_url('detaillaporan/') ?>' + noLaporan;
                            window.location.href = redirectURL;
                        });

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
                            <a class="sidebar-link" href="<?= site_url('Dashboard/' . $current_page); ?>">
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
        <div class="modal fade" id="notificationModal" tabindex="-1" aria-labelledby="notificationModalLabel"
            aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="notificationModalLabel">Peringatan Pencurian Sepeda Motor</h5>
                    </div>
                    <div class="modal-body">
                        <p><strong>No. Laporan:</strong> <span id="modalNoLaporan"></span></p>
                        <p><strong>Nama:</strong> <span id="modalNama"></span></p>
                        <p><strong>Waktu Kejadian:</strong> <span id="modalWaktuKejadian"></span></p>
                        <p><strong>Tempat Kejadian Perkara:</strong> <span id="modalTempatKejadian"></span></p>
                    </div>
                    <div class="modal-footer">
                        <a href="#" class="btn btn-secondary" id="detailButton">Detail</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6">
            <div class="body-wrapper radial-gradient min-vh-100">
                <div class="container-fluid">
                    <div class="container-fluid">
                        <div class="card mb-3">
                            <div class="card-body">
                                <div id="map"></div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-4">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="member d-flex justify-content-center">
                                            <div>
                                                <canvas id="doughnut" style="width: 200px;"></canvas>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class=" col-lg-4">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="member d-flex justify-content-center">
                                            <div>
                                                <canvas id="line" style="height: 200px; width: 340px;"></canvas>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class=" col-lg-4">
                                <div class="member d-flex justify-content-center">
                                    <div class="card">
                                        <div class="card-body">
                                            <div>
                                                <canvas id="barChart" style="height: 228px; width: 340px;"></canvas>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-body">
                                <form method="post">
                                    <div class="mb-3">
                                        <label for="search" class="form-label">Pencarian</label>
                                        <input type="text" class="form-control" name="search" id="search"
                                            aria-describedby="searchHelp">
                                    </div>
                                    <button type="submit" class="btn btn-warning">Cari</button>
                                </form>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-body" id="tabelmotor">
                                <div class="d-flex justify-content-between align-items-center mb-4">
                                    <h5 class="modal-title">Daftar Laporan</h5>
                                    <div class="d-flex gap-2">
                                        <a href="" data-bs-toggle="modal" data-bs-target="#exampleModal"
                                            class="btn btn-danger">Filter Lokasi</a>
                                        <a href="<?php echo site_url('TambahData'); ?>" class="btn btn-warning">Tambah
                                            Laporan</a>
                                    </div>
                                </div>
                                <div class="modal fade" id="exampleModal" tabindex="-1"
                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title">Filter Lokasi</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <form method="post">
                                                    <div class="mb-3">
                                                        <h6 for="dis_name_kejadian" class="form-label">Kecamatan
                                                        </h6>
                                                        <select class="form-select" id="dis_id" name="dis_id">
                                                            <option value="">Semua Kecamatan</option>
                                                        </select>
                                                    </div>
                                                    <script>
                                                        $(document).ready(function () {
                                                            $.ajax({
                                                                url: "<?= site_url('DataKecamatan/get_kecamatan_at_lampung'); ?>",
                                                                method: "POST",
                                                                dataType: "json",
                                                                success: function (data) {
                                                                    var options = '<option value="">Semua Kecamatan</option>';
                                                                    data.forEach(function (item) {
                                                                        options += '<option value="' + item.dis_id + '">' + item.dis_name + '</option>';
                                                                    });
                                                                    $('#dis_id').html(options);
                                                                }
                                                            });
                                                        });
                                                    </script>
                                                    <div class="mb-3">
                                                        <h6 for="subdis_name" class="form-label">Kelurahan/Desa
                                                        </h6>
                                                        <select class="form-select" id="subdis_id" name="subdis_id">
                                                            <option value="">Semua Kelurahan/Desa</option>
                                                        </select>
                                                    </div>
                                                    <script>
                                                        $(document).ready(function () {
                                                            $('select[name="dis_id"]').change(function () {
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
                                                                            var options = '<option value="">Semua Kelurahan/Desa</option>';
                                                                            data.forEach(function (item) {
                                                                                options += '<option value="' + item.subdis_id + '">' + item.subdis_name + '</option>';
                                                                            });
                                                                            $('#subdis_id').html(options);
                                                                        }
                                                                    });
                                                                } else {
                                                                    $('#subdis_id').html('<option value="">Semua Kelurahan/Desa</option>');
                                                                }
                                                            });
                                                        });
                                                    </script>
                                                    <button type="submit" class="btn btn-primary">Simpan</button>
                                                </form>
                                            </div>
                                            <div class="modal-footer">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="table-responsive">
                                    <table class="table text-nowrap mb-0 align-middle">
                                        <thead class="text-dark fs-4">
                                            <tr>
                                                <th class="border-bottom-0">
                                                    <h6 class="fw-semibold mb-0">No.</h6>
                                                </th>
                                                <th class="border-bottom-0">
                                                    <h6 class="fw-semibold mb-0">Nomor Laporan
                                                        <iconify-icon icon="vaadin:sort"
                                                            onclick="sortTable(0)"></iconify-icon>
                                                    </h6>
                                                </th>
                                                <th class="border-bottom-0">
                                                    <h6 class="fw-semibold mb-0">Nama Pelapor<iconify-icon
                                                            icon="vaadin:sort" onclick="sortTable(1)"></iconify-icon>
                                                    </h6>
                                                </th>
                                                <th class="border-bottom-0">
                                                    <h6 class="fw-semibold mb-0">Tipe Motor<iconify-icon
                                                            icon="vaadin:sort" onclick="sortTable(2)"></iconify-icon>
                                                    </h6>
                                                </th>
                                                <th class="border-bottom-0">
                                                    <h6 class="fw-semibold mb-0">Tempat Kejadian Perkara</h6>
                                                </th>
                                                <th class="border-bottom-0">
                                                    <h6 class="fw-semibold mb-0">Waktu Kejadian<iconify-icon
                                                            icon="vaadin:sort" onclick="sortTable(4)"></iconify-icon>
                                                    </h6>
                                                </th>
                                                <th class="border-bottom-0">
                                                    <h6 class="fw-semibold mb-0">Status<iconify-icon icon="vaadin:sort"
                                                            onclick="sortTable(5)"></iconify-icon> </h6>
                                                </th>
                                                <th class="border-bottom-0">
                                                    <h6 class="fw-semibold mb-0">Detail</h6>
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $number = (50 * ($current_page - 1) + 1); ?>
                                            <?php foreach ($laporan as $row): ?>
                                                <tr>
                                                    <td>
                                                        <h6 class="fw-normal">
                                                            <?= $number; ?>
                                                        </h6>
                                                    </td>
                                                    <td>
                                                        <h6 class="fw-normal">
                                                            <?= $row->no_laporan; ?>
                                                        </h6>
                                                    </td>
                                                    <td>
                                                        <h6 class="fw-normal">
                                                            <?= $row->nama; ?>
                                                        </h6>
                                                    </td>
                                                    <td>
                                                        <h6 class="fw-normal">
                                                            <?= $row->tipe_motor; ?>
                                                        </h6>
                                                    </td>
                                                    <td>
                                                        <h6 class="fw-normal">
                                                            <?= $row->alamat_kejadian; ?>
                                                        </h6>
                                                    </td>
                                                    <td>
                                                        <h6 class="fw-normal">
                                                            <?= $row->waktu_kejadian; ?>
                                                        </h6>
                                                    </td>
                                                    <td>
                                                        <?php if ($row->id_status == 0): ?>
                                                            <div class="text-warning">
                                                                <h6 class="fw-normal">Pending</h6>
                                                            </div>
                                                        <?php elseif ($row->id_status == 1): ?>
                                                            <div class="text-danger">
                                                                <h6 class="fw-normal">Dalam Lidik</h6>
                                                            </div>
                                                        <?php elseif ($row->id_status == 2): ?>
                                                            <div class="text-success">
                                                                <h6 class="fw-normal">Kasus Selesai</h6>
                                                            </div>
                                                        <?php endif; ?>
                                                    </td>
                                                    <td>
                                                        <?php
                                                        $no_laporan = str_replace('/', '-', $row->no_laporan);
                                                        $detail_url = site_url('detaillaporan/' . $no_laporan);
                                                        ?>
                                                        <a href="<?= $detail_url; ?>" class="text-secondary">
                                                            <h6 class="fw-normal">Detail</h6>
                                                        </a>
                                                    </td>
                                                </tr>
                                                <?php $number++; ?>
                                            <?php endforeach; ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="pagination justify-content-center">
                                <?php if ($total_data > 50): ?>
                                    <?php
                                    $max_pages = min($current_page + 4, $total_pages);
                                    $start_page = max($max_pages - 4, 1);

                                    if ($current_page > 1) {
                                        echo '<a href="' . site_url("Dashboard/index/" . ($current_page - 1)) . '" class="btn btn-primary"><</a>';
                                    }

                                    for ($i = $start_page; $i <= $max_pages; $i++) {
                                        echo '<a href="' . site_url("Dashboard/index/" . $i) . '"';
                                        if ($i == $current_page) {
                                            echo ' class="btn btn-primary active"';
                                        } else {
                                            echo ' class="btn btn-primary"';
                                        }
                                        echo '>' . $i . '</a>';
                                    }

                                    if ($current_page < $total_pages) {
                                        echo '<a href="' . site_url("Dashboard/index/" . ($current_page + 1)) . '" class="btn btn-primary">></a>';
                                    }
                                    ?>
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