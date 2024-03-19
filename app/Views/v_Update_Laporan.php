<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <title>Update Laporan</title>

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
</head>

<body>
    <div class="page-wrapper" id="main-wrapper">
        <div class="body-wrapper radial-gradient min-vh-100">
            <div class="container-fluid">
                <div class="container-fluid">
                    <div class="card">
                        <div class="card-body">
                            <p class="text-center">Update Laporan
                            </p>
                            <form method="post" action="<?= base_url('History/update_laporan') ?>">
                                <div class="mb-3">
                                    <h6 for="no_laporan" class="form-label">Nomor Laporan</h6>
                                    <input type="text" class="form-control" id="no_laporan" name="no_laporan"
                                        value="<?= $laporan['no_laporan'] ?>" readonly>
                                </div>
                                <div class="mb-3">
                                    <h6 class="form-label">Waktu Melapor</h6>
                                    <input class="form-control"
                                        value="<?= date('H:i:s d F Y', strtotime($laporan['waktu_melapor'])); ?>"
                                        readonly>
                                </div>
                                <h5 class="card-title fw-semibold mb-2">Identitas Pelapor</h5>
                                <input type="hidden" name="id_data_diri" value="<?= $laporan['id_data_diri'] ?>">
                                <div class="mb-3">
                                    <h6 for="nik" class="form-label">Nomor Induk Kependudukan
                                        (NIK)</h6>
                                    <input type="text" class="form-control" id="nik" name="nik" minlength="16" required>
                                </div>
                                <div class="mb-3">
                                    <h6 class="form-label">Nama Lengkap</h6>
                                    <input type="text" class="form-control" value="<?= $laporan['nama'] ?>" readonly>
                                </div>
                                <div class="mb-3">
                                    <h6 class="form-label">Nomor HP</h6>
                                    <input type="text" class="form-control" value="<?= $laporan['no_hp'] ?>" readonly>
                                </div>
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <h6 for="tempat_lahir" class="form-label">Tempat Lahir</h6>
                                        <input type="text" class="form-control" id="tempat_lahir" name="tempat_lahir"
                                            required>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <h6 for="tanggal_lahir" class="form-label">Tanggal Lahir</h6>
                                        <input type="date" class="form-control" id="tanggal_lahir" name="tanggal_lahir"
                                            required>
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
                                <input type="hidden" name="id_kendaraan" value="<?= $laporan['id_kendaraan'] ?>">
                                <div class="mb-3">
                                    <h6 class="form-label">Waktu Kejadian</h6>
                                    <input class="form-control"
                                        value="<?= date('H:i:s d F Y', strtotime($laporan['waktu_kejadian'])); ?>"
                                        readonly>
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
                                    <img src="..\..\public\assets\img\stnk.png" width="365">
                                    <div class="form-text">Keterangan:</div>
                                    <div class="form-text">1. Warna Kendaraan</div>
                                    <div class="form-text">2. Nomor Rangka</div>
                                    <div class="form-text">3. Nomor Mesin</div>
                                </div>
                                <div class="mb-3">
                                    <h6 for="no_plat" class="form-label">Nomor Plat</h6>
                                    <input type="text" class="form-control" id="no_plat"
                                        value="<?= $laporan['no_plat'] ?>" readonly>
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
                                    <input type="text" class="form-control" id="alamat_kejadian"
                                        value="<?= $laporan['alamat_kejadian']; ?>" name="alamat_kejadian" readonly>
                                </div>
                                <div class="mb-3">
                                    <h6 class="form-label">Titik Lokasi Tempat Kejadian Perkara</h6>
                                    <div id="map"></div>
                                </div>
                                <script>
                                    var map = L.map('map').setView([<?= $laporan['latitude']; ?>, <?= $laporan['longitude']; ?>], 17);
                                    googleStreets = L.tileLayer('https://{s}.google.com/vt?lyrs=m&x={x}&y={y}&z={z}', {
                                        maxZoom: 19,
                                        subdomains: ['mt0', 'mt1', 'mt2', 'mt3'],
                                        attribution: '&copy; <a>POLRES Lampung Utara</a>'
                                    }).addTo(map);
                                    L.marker([<?= $laporan['latitude']; ?>, <?= $laporan['longitude']; ?>]).addTo(map)
                                        .bindPopup('Tempat Kejadian Perkara')
                                        .openPopup();
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
    <script src="<?= base_url('assets/libs/apexcharts/dist/apexcharts.min.js'); ?>"></script>
    <script src="<?= base_url('assets/libs/simplebar/dist/simplebar.js'); ?>"></script>
    <script src="<?= base_url('assets/js/dashboard.js'); ?>"></script>
</body>

</html>