<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <title>Data Akun</title>

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
    <script src="https://kit.fontawesome.com/c0e27fec68.js" crossorigin="anonymous"></script>
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
                                    <h5 class="modal-title">Kelola Akun</h5>
                                </div>
                                <form method="post" action="<?= base_url('UbahAkun/process_update') ?>">
                                    <?php if (session()->has('message')): ?>
                                        <div class="alert alert-danger" role="alert">
                                            <?= session('message') ?>
                                        </div>
                                    <?php endif; ?>
                                    <div class="mb-3">
                                        <h6 class="form-label">Email</h6>
                                        <input type="email" name="email" class="form-control" value="<?= $email ?>"
                                            required>
                                        <div class="form-text">Masukkan e-mail baru jika ingin mengubah e-mail anda
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <h6 class="form-label">Password</h6>
                                        <div class="password-container">
                                            <input type="password" name="password" id="password" class="form-control"
                                                minlength="8" required />
                                            <i class="fas fa-eye-slash toggle-password"
                                                onclick="togglePassword('password')"></i>
                                        </div>
                                        <div class="form-text">Masukkan password untuk konfirmasi perubahan email</div>
                                    </div>
                                    <div class="d-flex gap-2">
                                        <button type="submit" class="btn btn-warning">Simpan</button>
                                        <a href="<?php echo site_url('UbahAkun/update_password'); ?>"
                                            class="btn btn-danger list-inline-item">Ubah Password</a>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script>
            function togglePassword(inputId) {
                var passwordInput = document.getElementById(inputId);
                var icon = document.querySelector('.toggle-password');

                if (passwordInput.type === 'password') {
                    passwordInput.type = 'text';
                    icon.classList.remove('fa-eye-slash');
                    icon.classList.add('fa-eye', 'show-password');
                } else {
                    passwordInput.type = 'password';
                    icon.classList.remove('fa-eye', 'show-password');
                    icon.classList.add('fa-eye-slash');
                }
            }
        </script>
        <script src="<?= base_url('assets/libs/jquery/dist/jquery.min.js'); ?>"></script>
        <script src="<?= base_url('assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js'); ?>"></script>
        <script src="<?= base_url('assets/js/sidebarmenu.js'); ?>"></script>
        <script src="<?= base_url('assets/js/app.min.js'); ?>"></script>
        <script src="<?= base_url('assets/libs/apexcharts/dist/apexcharts.min.js'); ?>"></script>
        <script src="<?= base_url('assets/libs/simplebar/dist/simplebar.js'); ?>"></script>
        <script src="<?= base_url('assets/js/dashboard.js'); ?>"></script>
</body>

</html>