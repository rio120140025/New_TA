<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <title>Data Motor</title>

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
            <div class="body-wrapper radial-gradient min-vh-100">
                <div class="container-fluid">
                    <div class="container-fluid">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex justify-content-between align-items-center mb-4">
                                    <h5 class="modal-title">Data Motor</h5>
                                    <a href="" data-bs-toggle="modal" data-bs-target="#exampleModal"
                                        class="btn btn-warning">Tambah Data</a>
                                </div>
                                <?php if (session()->has('message')): ?>
                                    <div class="alert alert-success" role="alert">
                                        <?= session('message') ?>
                                    </div>
                                <?php endif; ?>
                                <div class="modal fade" id="exampleModal" tabindex="-1"
                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title">Tambah Data Sepeda Motor</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <form method="post" action="<?= site_url('DataMotor/save_motor'); ?>">
                                                    <div class="mb-3">
                                                        <div class="mb-3">
                                                            <img src="assets/img/stnk.png" width="365">
                                                            <div class="form-text">Keterangan:</div>
                                                            <div class="form-text">1. Warna Kendaraan</div>
                                                            <div class="form-text">2. Nomor Rangka</div>
                                                            <div class="form-text">3. Nomor Mesin</div>
                                                        </div>
                                                        <div class="mb-3">
                                                            <h6 for="id_motor" class="form-label">Tipe Motor
                                                            </h6>
                                                            <select class="form-select" id="id_motor" name="id_motor"
                                                                required>
                                                                <option value="">Pilih Tipe Motor</option>
                                                                <?php foreach ($motor as $k): ?>
                                                                    <option value="<?= $k->id_motor; ?>">
                                                                        <?= $k->tipe_motor; ?>
                                                                    </option>
                                                                <?php endforeach; ?>
                                                            </select>
                                                        </div>
                                                        <div class="mb-3">
                                                            <h6 for="no_plat" class="form-label">Nomor Plat</h6>
                                                            <input type="text" class="form-control" id="no_plat"
                                                                name="no_plat" required>
                                                            <div class="form-text">Masukkan nomor plat kendaraan sesuai
                                                                pada STNK</div>
                                                        </div>
                                                        <div class="mb-3">
                                                            <h6 for="warna" class="form-label">Warna</h6>
                                                            <input type="text" class="form-control" id="warna"
                                                                name="warna" required>
                                                            <div class="form-text">Masukkan warna kendaraan sesuai
                                                                padaSTNK</div>
                                                        </div>
                                                        <div class="mb-3">
                                                            <h6 for="no_rangka" class="form-label">Nomor Rangka
                                                            </h6>
                                                            <input type="text" class="form-control" id="no_rangka"
                                                                name="no_rangka" required>
                                                            <div class="form-text">Masukkan nomor rangka kendaraan
                                                                sesuai pada STNK</div>
                                                        </div>
                                                        <div class="mb-3">
                                                            <h6 for="no_mesin" class="form-label">Nomor Mesin
                                                            </h6>
                                                            <input type="text" class="form-control" id="no_mesin"
                                                                name="no_mesin" required>
                                                            <div class="form-text">Masukkan nomor mesin kendaraan sesuai
                                                                pada STNK</div>
                                                        </div>
                                                    </div>
                                                    <button type="submit" class="btn btn-primary">Simpan</button>
                                                </form>
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
                                                    <h6 class="fw-semibold mb-0">Tipe Motor</h6>
                                                </th>
                                                <th class="border-bottom-0">
                                                    <h6 class="fw-semibold mb-0">No Plat</h6>
                                                </th>
                                                <th class="border-bottom-0">
                                                    <h6 class="fw-semibold mb-0">Warna</h6>
                                                </th>
                                                <th class="border-bottom-0">
                                                    <h6 class="fw-semibold mb-0">No Rangka</h6>
                                                </th>
                                                <th class="border-bottom-0">
                                                    <h6 class="fw-semibold mb-0">No Mesin</h6>
                                                </th>
                                                <th class="border-bottom-0">
                                                    <h6 class="fw-semibold mb-0">Delete</h6>
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $number = 1; ?>
                                            <?php foreach ($kendaraan as $row): ?>
                                                <tr>
                                                    <td>
                                                        <h6 class="fw-normal">
                                                            <?= $number; ?>
                                                        </h6>
                                                    </td>
                                                    <td>
                                                        <h6 class="fw-normal">
                                                            <?= $row['tipe_motor']; ?>
                                                        </h6>
                                                    </td>
                                                    <td>
                                                        <h6 class="fw-normal">
                                                            <?= $row['no_plat']; ?>
                                                        </h6>
                                                    </td>
                                                    <td>
                                                        <h6 class="fw-normal">
                                                            <?= $row['warna']; ?>
                                                        </h6>
                                                    </td>
                                                    <td>
                                                        <h6 class="fw-normal">
                                                            <?= $row['no_rangka']; ?>
                                                        </h6>
                                                    </td>
                                                    <td>
                                                        <h6 class="fw-normal">
                                                            <?= $row['no_mesin']; ?>
                                                        </h6>
                                                    </td>
                                                    <td>
                                                        <a href="<?= site_url('DataMotor/delete_motor/' . $row['id_kendaraan']); ?>"
                                                            class="text-danger">
                                                            <h6 class="fw-normal">Delete</h6>
                                                        </a>
                                                    </td>
                                                </tr>
                                                <?php $number++; ?>
                                            <?php endforeach; ?>
                                        </tbody>
                                    </table>
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