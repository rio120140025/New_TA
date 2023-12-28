<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <title>Dashboard</title>

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

    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script>
        $(document).ready(function () {
            let latestReport = [];
            let buttonClicked = false;

            function checkNewReports() {
                $.ajax({
                    url: '<?= base_url('admin/ajaxCheckNewReports'); ?>',
                    type: 'GET',
                    dataType: 'json',
                    success: function (response) {
                        latestReport.push(response.latestReport.no_laporan);
                        console.log(latestReport[0]);

                        if (response.newReports) {
                            if (!buttonClicked && (latestReport[0] !== response.latestReport.no_laporan)) {
                                $('.dot-icon').show();
                            } else if (!buttonClicked && (latestReport[0] == response.latestReport.no_laporan)) {
                                $('.dot-icon').show();
                            } else if (buttonClicked && (latestReport[0] !== response.latestReport.no_laporan)) {
                                $('.dot-icon').show();
                            } else {
                                $('.dot-icon').hide();
                            }
                        }

                        $('#notificationDropdown').html(response.notificationContent);
                    },
                    complete: function () {
                        setTimeout(checkNewReports, 1000);
                    }
                });
            }

            $('.dot-icon').hide();

            $('#notificationButton').on('click', function () {
                $('.dot-icon').hide();
                buttonClicked = true;
                latestReport = [];
            });

            checkNewReports();
        });
    </script>

</head>

<body>
    <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
        data-sidebar-position="fixed" data-header-position="fixed">
        <aside class="left-sidebar">
            <div>
                <div class="brand-logo d-flex align-items-center justify-content-between">
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
                            <a class="sidebar-link" href="<?= site_url('AdminController/index/' . $current_page); ?>">
                                <iconify-icon icon="ic:round-dashboard" style="color: white;"></iconify-icon>
                                <span class="hide-menu">Dashboard</span>
                            </a>
                        </li>
                        <li class="nav-small-cap">
                            <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
                            <span class="hide-menu">Kelola Data Motor</span>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link"
                                href="<?= site_url('DataMotorController/index/' . $current_page); ?>">
                                <iconify-icon icon="material-symbols:motorcycle"></iconify-icon>
                                <span class="hide-menu">Data Tipe Motor</span>
                            </a>
                        </li>
                        <li class="nav-small-cap">
                            <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
                            <span class="hide-menu">Kelola Data Lokasi</span>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link"
                                href="<?= site_url('DataProvinsiController/index/' . $current_page); ?>">
                                <iconify-icon icon="tabler:location-filled"></iconify-icon>
                                <span class="hide-menu">Data Provinsi</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link"
                                href="<?= site_url('DataKabupatenKotaController/index/' . $current_page); ?>">
                                <iconify-icon icon="tabler:location-filled"></iconify-icon>
                                <span class="hide-menu">Data Kabupaten/Kota</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link"
                                href="<?= site_url('DataKecamatanController/index/' . $current_page); ?>">
                                <iconify-icon icon="tabler:location-filled"></iconify-icon>
                                <span class="hide-menu">Data Kecamatan</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link"
                                href="<?= site_url('DataKelurahanDesaController/index/' . $current_page); ?>">
                                <iconify-icon icon="tabler:location-filled"></iconify-icon>
                                <span class="hide-menu">Data Kelurahan/Desa</span>
                            </a>
                        </li>
                        <li class="nav-small-cap">
                            <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
                            <span class="hide-menu">Akun</span>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link" href="<?= site_url('AkunController'); ?>">
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
                    <div>
                        <div class="row">
                            <div class="col-md-6">
                                <button class="btn" id="notificationButton" data-toggle="dropdown" aria-haspopup="true"
                                    aria-expanded="false">
                                    <div class="icon-container">
                                        <iconify-icon icon="ion:notifcations" style="color: white;" width="25"
                                            height="25" class="notification-icon"></iconify-icon>
                                        <iconify-icon icon="radix-icons:dot-filled" style="color: red;" width="25"
                                            height="25" class="dot-icon"></iconify-icon>
                                    </div>
                                </button>
                                <div class="dropdown-menu" aria-labelledby="notificationButton"
                                    id="notificationDropdown">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="navbar-collapse justify-content-end px-0" id="navbarNav">
                        <ul class="navbar-nav flex-row ms-auto align-items-center justify-content-end">
                            <a href="<?= base_url(); ?>" class="btn btn-secondary list-inline-item">Back To Home</a>
                            <a href="<?php echo site_url('LoginController/logout'); ?>"
                                class="btn btn-danger list-inline-item">Log Out</a>
                    </div>
                </nav>
            </header>
        </div>
        <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6">
            <div class="body-wrapper radial-gradient min-vh-100">
                <div class="container-fluid">
                    <div class="container-fluid">
                        <div class="content-wrapper">
                            <form method="post">
                                <div class="row">
                                    <div class="col-md-p mb-2 stretch-card transparent">
                                        <div class="card card-tale">
                                            <div class="card-body text-center">
                                                <button type="submit" name="filter" value="today" class="btn"
                                                    style="color: #555555; text-decoration: none;">
                                                    <h6 class="fs-4">TOTAL LAPORAN</h6>
                                                    <strong class="fs-8">
                                                        <?php echo $totalToday; ?>
                                                    </strong>
                                                    <h6 class="fs-3">Hari ini</h6>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-p mb-2 stretch-card transparent">
                                        <div class="card card-tale">
                                            <div class="card-body text-center">
                                                <button type="submit" name="filter" value="last_7_days" class="btn"
                                                    style="color: #555555; text-decoration: none;">
                                                    <h6 class="fs-4">TOTAL LAPORAN</h6>
                                                    <strong class="fs-8">
                                                        <?php echo $totalLast7Days; ?>
                                                    </strong>
                                                    <h6 class="fs-3">7 hari terakhir</h6>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-p mb-2 stretch-card transparent">
                                        <div class="card card-tale">
                                            <div class="card-body text-center">
                                                <button type="submit" name="filter" value="last_30_days" class="btn"
                                                    style="color: #555555; text-decoration: none;">
                                                    <h6 class="fs-4">TOTAL LAPORAN</h6>
                                                    <strong class="fs-8">
                                                        <?php echo $totalLast30Days; ?>
                                                    </strong>
                                                    <h6 class="fs-3">30 hari terakhir</h6>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-p mb-2 stretch-card transparent">
                                        <div class="card card-tale">
                                            <div class="card-body text-center">
                                                <button type="submit" name="filter" value="status_2" class="btn"
                                                    style="color: #555555; text-decoration: none;">
                                                    <h6 class="fs-4">TOTAL LAPORAN</h6>
                                                    <strong class="fs-8">
                                                        <?php echo $totalStatus2; ?>
                                                    </strong>
                                                    <h6 class="fs-3">Kasus selesai</h6>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-p mb-2 stretch-card transparent">
                                        <div class="card card-tale">
                                            <div class="card-body text-center">
                                                <button type="submit" name="filter" value="" class="btn"
                                                    style="color: #555555; text-decoration: none;">
                                                    <h6 class="fs-4">TOTAL LAPORAN</h6>
                                                    <strong class="fs-8">
                                                        <?php echo $totalAll; ?>
                                                    </strong>
                                                    <h6 class="fs-3">Tercatat</h6>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <?php if (isset($success_message)): ?>
                            <div class="alert alert-success" role="alert">
                                <?= $success_message ?>
                            </div>
                        <?php endif; ?>
                        <div class="card">
                            <div class="card-body">
                                <div class="card">
                                    <div class="card-body">
                                        <form method="post">
                                            <div class="mb-3">
                                                <label for="search" class="form-label">Pencarian</label>
                                                <input type="text" class="form-control" name="search" id="search"
                                                    aria-describedby="searchHelp">
                                            </div>
                                            <button type="submit" class="btn btn-primary">Cari</button>
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
                                                <a href="<?php echo site_url('TambahLaporanController'); ?>"
                                                    class="btn btn-warning">Tambah Laporan</a>
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
                                                                <select class="form-select" id="dis_id_kejadian"
                                                                    name="id_districts_kejadian">
                                                                    <option value="">Semua Kecamatan</option>
                                                                </select>
                                                            </div>
                                                            <script>
                                                                $(document).ready(function () {
                                                                    $.ajax({
                                                                        url: "<?= site_url('LaporController/get_kecamatan_by_123'); ?>",
                                                                        method: "POST",
                                                                        dataType: "json",
                                                                        success: function (data) {
                                                                            var options = '<option value="">Semua Kecamatan</option>';
                                                                            data.forEach(function (item) {
                                                                                options += '<option value="' + item.dis_id + '">' + item.dis_name + '</option>';
                                                                            });
                                                                            $('#dis_id_kejadian').html(options);
                                                                        }
                                                                    });
                                                                });
                                                            </script>
                                                            <div class="mb-3">
                                                                <h6 for="subdis_name" class="form-label">Kelurahan/Desa
                                                                </h6>
                                                                <select class="form-select" id="subdis_id_kejadian"
                                                                    name="id_subdistricts_kejadian">
                                                                    <option value="">Semua Kelurahan/Desa</option>
                                                                </select>
                                                            </div>
                                                            <script>
                                                                $(document).ready(function () {
                                                                    $('select[name="id_districts_kejadian"]').change(function () {
                                                                        var dis_id = $(this).val();

                                                                        if (dis_id != '') {
                                                                            $.ajax({
                                                                                url: "<?= site_url('LaporController/get_kelurahandesa_by_kecamatan'); ?>",
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
                                                                                    $('#subdis_id_kejadian').html(options);
                                                                                }
                                                                            });
                                                                        } else {
                                                                            $('#subdis_id_kejadian').html('<option value="">Semua Kelurahan/Desa</option>');
                                                                        }
                                                                    });
                                                                });
                                                            </script>
                                                            <button type="submit"
                                                                class="btn btn-primary">Simpan</button>
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
                                                            <h6 class="fw-semibold mb-0">Nomor Laporan
                                                                <iconify-icon icon="vaadin:sort"
                                                                    onclick="sortTable(0)"></iconify-icon>
                                                            </h6>
                                                        </th>
                                                        <th class="border-bottom-0">
                                                            <h6 class="fw-semibold mb-0">Nama Pelapor<iconify-icon
                                                                    icon="vaadin:sort"
                                                                    onclick="sortTable(1)"></iconify-icon> </h6>
                                                        </th>
                                                        <th class="border-bottom-0">
                                                            <h6 class="fw-semibold mb-0">Tipe Motor<iconify-icon
                                                                    icon="vaadin:sort"
                                                                    onclick="sortTable(2)"></iconify-icon> </h6>
                                                        </th>
                                                        <th class="border-bottom-0">
                                                            <h6 class="fw-semibold mb-0">Tempat Kejadian Perkara</h6>
                                                        </th>
                                                        <th class="border-bottom-0">
                                                            <h6 class="fw-semibold mb-0">Waktu Kejadian<iconify-icon
                                                                    icon="vaadin:sort"
                                                                    onclick="sortTable(4)"></iconify-icon> </h6>
                                                        </th>
                                                        <th class="border-bottom-0">
                                                            <h6 class="fw-semibold mb-0">Status<iconify-icon
                                                                    icon="vaadin:sort"
                                                                    onclick="sortTable(5)"></iconify-icon> </h6>
                                                        </th>
                                                        <th class="border-bottom-0">
                                                            <h6 class="fw-semibold mb-0">Detail</h6>
                                                        </th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php foreach ($laporan as $row): ?>
                                                        <tr>
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
                                                                    <?= $row->alamat_kejadian; ?>, Kelurahan/Desa
                                                                    <?= $row->subdis_name; ?>, Kecamatan
                                                                    <?= $row->dis_name; ?>
                                                                </h6>
                                                            </td>
                                                            <td>
                                                                <h6 class="fw-normal">
                                                                    <?= $row->waktu_kejadian; ?>
                                                                </h6>
                                                            </td>
                                                            <td>
                                                                <?php if ($row->status == 0): ?>
                                                                    <div class="text-warning">
                                                                        <h6 class="fw-normal">Pending</h6>
                                                                    </div>
                                                                <?php elseif ($row->status == 1): ?>
                                                                    <div class="text-danger">
                                                                        <h6 class="fw-normal">Dalam Lidik</h6>
                                                                    </div>
                                                                <?php elseif ($row->status == 2): ?>
                                                                    <div class="text-success">
                                                                        <h6 class="fw-normal">Kasus Selesai</h6>
                                                                    </div>
                                                                <?php endif; ?>
                                                            </td>
                                                            <td>
                                                                <?php
                                                                $no_laporan = str_replace('/', '-', $row->no_laporan);
                                                                $detail_url = site_url('DetailController/index/' . $no_laporan);
                                                                ?>
                                                                <a href="<?= $detail_url; ?>" class="text-secondary">
                                                                    <h6 class="fw-normal">Detail</h6>
                                                                </a>
                                                            </td>
                                                        </tr>
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
                                                echo '<a href="' . site_url("DataMotorController/index/" . ($current_page - 1)) . '" class="btn btn-primary">Sebelumnya</a>';
                                            }

                                            for ($i = $start_page; $i <= $max_pages; $i++) {
                                                echo '<a href="' . site_url("DataMotorController/index/" . $i) . '"';
                                                if ($i == $current_page) {
                                                    echo ' class="btn btn-primary active"';
                                                } else {
                                                    echo ' class="btn btn-primary"';
                                                }
                                                echo '>' . $i . '</a>';
                                            }

                                            if ($current_page < $total_pages) {
                                                echo '<a href="' . site_url("DataMotorController/index/" . ($current_page + 1)) . '" class="btn btn-primary">Selanjutnya</a>';
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