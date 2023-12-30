<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <title>Log In</title>

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

    <link rel="stylesheet" href="assets/css/styles.min.css" />

    <script src="https://kit.fontawesome.com/c0e27fec68.js" crossorigin="anonymous"></script>
</head>

<body>
    <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
        data-sidebar-position="fixed" data-header-position="fixed">
        <div
            class="position-relative overflow-hidden radial-gradient min-vh-100 d-flex align-items-center justify-content-center">
            <div class="d-flex align-items-center justify-content-center w-100">
                <div class="row justify-content-center w-100">
                    <div class="col-md-8 col-lg-6 col-xxl-3">
                        <div class="card mb-0">
                            <div class="card-body">
                                <h3 class="text-heading">Log In</h3>
                                <form method="post" action="javascript:void(0);" onsubmit="submitForm();">
                                    <?php if (session()->has('message')): ?>
                                        <div class="alert alert-success" role="alert">
                                            <?= session('message') ?>
                                        </div>
                                    <?php endif; ?>
                                    <?php
                                    $success_message = session()->getFlashdata('success_message');
                                    if (!empty($success_message)) {
                                        echo '<div class="alert alert-success">' . $success_message . '</div>';
                                    }
                                    ?>
                                    <div class="alert alert-danger" role="alert" id="error-message"
                                        style="display: none;"></div>
                                    <div class="mb-3">
                                        <label class="form-label">Email</label>
                                        <input type="email" name="email" class="form-control" required>
                                        <div class="form-text">Masukkan e-mail anda</div>
                                    </div>
                                    <div class="mb-4">
                                        <label class="form-label">Password</label>
                                        <div class="password-container">
                                            <input type="password" name="password" id="password" class="form-control"
                                                minlength="8" required />
                                            <i class="fas fa-eye-slash toggle-password"
                                                onclick="togglePassword('password')"></i>
                                        </div>
                                        <div class="form-text">Password minimal 8 karakter</div>
                                    </div>
                                    <button type="submit" class="btn btn-warning w-100 py-2 fs-4 mb-2 rounded-2"
                                        onclick="submitForm();">Sign
                                        In</button>
                                    <p><a href="<?php echo site_url('forgot'); ?>" class="w-100 py-8 mb-8 rounded-2"
                                            style="font-size: 14px; color: #6c757d;">Lupa Password</a></p>
                                    <div>
                                        <div class="divider-p">
                                            <div class="divider-i"></div>
                                            <span class="divider-t">Belum Memiliki Akun?</span>
                                            <div class="divider-i"></div>
                                        </div>
                                    </div>
                                    <a href="<?php echo site_url('register'); ?>"
                                        class="btn btn-outline-dark w-100 py-8 fs-4 mb-4 rounded-2">Register</a>
                                    <script>
                                        function submitForm() {
                                            var email = document.querySelector('input[name="email"]').value;
                                            var password = document.querySelector('input[name="password"]').value;

                                            var xhr = new XMLHttpRequest();

                                            xhr.open('POST', '<?php echo site_url('Login/process_login'); ?>', true);
                                            xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

                                            xhr.onload = function () {
                                                if (xhr.status === 200) {
                                                    var response = JSON.parse(xhr.responseText);
                                                    if (response.success) {
                                                        window.location.href = '<?php echo site_url('Dashboard'); ?>';
                                                    } else {
                                                        document.getElementById('error-message').style.display = 'block';
                                                        document.getElementById('error-message').innerHTML = response.error;
                                                    }
                                                }
                                            };

                                            var data = 'email=' + email + '&password=' + password;
                                            xhr.send(data);
                                        }
                                    </script>
                                </form>
                            </div>
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
    <script src="assets/libs/jquery/dist/jquery.min.js"></script>
    <script src="assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>