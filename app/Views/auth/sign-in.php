<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Brewok Kopi </title>
    <link rel="icon" type="image/jpeg" href="<?= base_url('assets/img/logo/Logo.jpeg?v=<?= time() ?>'); ?>">
    <link rel="stylesheet" href="<?= base_url('assets/css/app.css'); ?>">
    <link rel="stylesheet" href="<?= base_url('assets/css/app-dark.css'); ?>">
    <link rel="preconnect" href="https://fonts.googleapis.com" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;600;700;800&display=swap" rel="stylesheet" crossorigin="anonymous">
    <style>
        body {
            background-color: var(--bs-body-bg);
        }

        #auth {
            height: 100vh;
            overflow-x: hidden;
        }

        #auth #auth-right {
            height: 100%;
            background: 
                linear-gradient(rgba(0,0,0,0.6), rgba(0,0,0,0.6)),
                url('<?= base_url('assets/img/Gambar2.jpeg'); ?>');
        }

        #auth #auth-left {
            padding: 5rem;
        }

        #auth #auth-left .auth-title {
            font-size: 4rem;
            margin-bottom: 1rem;
        }

        #auth #auth-left .auth-subtitle {
            font-size: 1.7rem;
            line-height: 2.5rem;
            color: #a8aebb;
        }

        #auth #auth-left .auth-logo {
            margin-bottom: 7rem;
        }

        #auth #auth-left .auth-logo img {
            height: 2rem;
        }

        @media screen and (max-width: 1399.9px) {
            #auth #auth-left {
                padding: 3rem;
            }
        }

        @media screen and (max-width: 767px) {
            #auth #auth-left {
                padding: 5rem;
            }
        }

        @media screen and (max-width: 576px) {
            #auth #auth-left {
                padding: 5rem 3rem;
            }
        }

        html[data-bs-theme="dark"] #auth-right {
            background: url(./png/4853433.png), linear-gradient(90deg, #2d499d, #3f5491);
        }

        .auth-logo-img {
            max-width: 100%;
            height: auto;
            max-height: 240px;
            object-fit: contain;
        }

        @media screen and (max-width: 768px) {

            .auth-logo-img {
                max-height: 180px;
            }

            #auth #auth-left {
                padding: 3rem 2rem;
            }

            #auth #auth-left h1 {
                font-size: 2rem;
            }

            #auth #auth-left .auth-subtitle {
                font-size: 1rem;
                line-height: 1.8rem;
            }
        }

        @media screen and (max-width: 576px) {

            .auth-logo-img {
                max-height: 140px;
            }

            #auth #auth-left {
                padding: 2rem 1.5rem;
            }
        }
        @media screen and (max-width: 991px) {

            #auth-right {
                min-height: auto;
                padding: 2rem 1rem !important;
            }

            #auth-right .card {
                margin-top: 2rem;
            }

            #auth-right .card-body {
                padding: 1.5rem;
            }

            #auth-right .card-title {
                font-size: 1.2rem;
            }

            #auth-right .card-text,
            #auth-right p {
                font-size: 0.95rem;
                line-height: 1.6rem;
            }
        }
    </style>
    <script src="<?= base_url('assets/js/init-theme.js'); ?>"></script>
</head>

<body>
    <div id="auth">
        <div class="row h-100">
            <div class="col-lg-5 col-12">
                <div id="auth-left">
                    <div class="mb-5 text-center text-lg-start">
                        <a href="#">
                            <img 
                                src="<?= base_url('assets/img/logo/Logo.jpeg'); ?>" 
                                alt="Logo Brewok Kopi"
                                class="img-fluid auth-logo-img"
                                loading="lazy"
                                >
                        </a>
                    </div>
                    <h1>Brewok Kopi</h1>
                    <p class="auth-subtitle mb-3">Login dengan akun anda</p>

                    <?php if(session()->getFlashdata('error')) : ?>

                    <div class="alert alert-danger">
                    <?= session()->getFlashdata('error') ?>
                    </div>

                    <?php endif; ?>

                    <form action="<?= base_url('/login/process') ?>" method="post">
                        <div class="form-group position-relative has-icon-left mb-4">
                            <input type="email" name="email" class="form-control form-control-xl" placeholder="Email">
                            <div class="form-control-icon">
                                <i class="bi bi-person"></i>
                            </div>
                        </div>
                        <div class="form-group position-relative has-icon-left mb-4">
                            <input type="password" name="password" class="form-control form-control-xl" placeholder="Password">
                            <div class="form-control-icon">
                                <i class="bi bi-shield-lock"></i>
                            </div>
                        </div>
                        <button class="btn btn-primary btn-block btn-lg shadow-lg mt-2">Login</button>
                    </form>
                </div>
            </div>
            <div class="col-lg-7 d-block">
                <div id="auth-right" class="p-md-5 p-3">
                    <div class="d-flex align-items-center h-75">
                        <div class="card my-3 w-100">
                            <div class="card-body">
                                <h4 class="card-title">Informasi Pengumuman</h4>
                                <p class="card-text">
                                    Selamat datang di sistem Brewok Kopi. Halaman login ini merupakan akses khusus bagi karyawan yang memiliki hak penggunaan sistem, seperti Owner, Admin, dan Kasir, untuk mendukung kegiatan operasional sehari-hari. 
                                    Pastikan Anda menggunakan akun resmi yang telah diberikan dan memasukkan email serta password dengan benar.
                                </p>
                                <p>Demi menjaga keamanan data, harap tidak membagikan informasi login kepada pihak lain yang tidak berkepentingan. 
                                    Apabila Anda mengalami kendala saat login atau terdapat masalah pada akun, silakan menghubungi Owner sebagai penanggung jawab dan pengguna. Informasi penting terkait operasional, pembaruan sistem, maupun pengumuman lainnya akan disampaikan melalui halaman ini.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>