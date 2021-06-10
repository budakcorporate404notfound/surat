<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Persuratan Digital BIro Perencanaan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
</head>

<body>
    <section
        style="height:100%; width: 100%; box-sizing: border-box; position: relative; background-image: linear-gradient(to bottom, rgba(39, 59, 86, 1), rgba(36, 49, 66, 1));">
        <style>
            @import  url('https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap');

            .modal-backdrop.show {
                background-color: #FFFFFF;
                opacity: 0.6;
            }

            .btn-close,
            .btn-close:hover {
                color: #FFF;
            }

            .modal-header-3-1.modal {
                top: 2rem;
            }

            .header-3-1 .navbar {
                padding: 2rem 2rem;
            }

            .header-3-1 .navbar-light .navbar-nav .nav-link {
                font-size: 0.875rem;
                line-height: 1.25rem;
                color: #E8F1FF;
                font-weight: 300;
                line-height: 1.5rem;
                padding-top: 1.25rem;
                padding-bottom: 0rem;
                padding-left: 0;
                padding-right: 0;
                margin-right: 0;
                margin-left: 0;
            }

            .header-3-1 .navbar-light .navbar-nav .nav-link:hover {
                font-size: 0.875rem;
                line-height: 1.25rem;
                color: #FFFFFF;
                font-weight: 500;
                line-height: 1.5rem;
            }

            .header-3-1 .navbar-light .navbar-nav .active {
                position: relative;
                width: fit-content;
            }

            .header-3-1 .navbar-light .navbar-nav .active:before {
                content: "";
                position: absolute;
                margin-left: auto;
                margin-right: auto;
                left: 0;
                right: 0;
                text-align: center;
                bottom: 0;
                height: 0px;
                width: 80%;
                /* or 100px */
                border-bottom: 2px solid #FF7468;
            }

            .header-3-1 .navbar-light .navbar-nav .active>.nav-link,
            .header-3-1 .navbar-light .navbar-nav .nav-link.active,
            .header-3-1 .navbar-light .navbar-nav .nav-link.show,
            .header-3-1 .navbar-light .navbar-nav .show>.nav-link {
                font-weight: 500;
            }

            .header-3-1 .navbar-light .navbar-toggler-icon {
                background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' width='30' height='30' viewBox='0 0 30 30'%3e%3cpath stroke='rgba%28255, 255, 255, 0.5%29' stroke-linecap='round' stroke-miterlimit='10' stroke-width='2' d='M4 7h22M4 15h22M4 23h22'/%3e%3c/svg%3e");
            }

            .header-3-1 .navbar-light .navbar-toggler {
                border: none;
            }

            .modal-content-header-3-1 .modal-header,
            .modal-content-header-3-1 .modal-footer {
                border: none;
            }

            .btn:focus,
            .btn:active {
                outline: none !important;
            }

            .btn-fill-header-3-1 {
                border: 1px solid #FF7468;
                background-color: #FF7468;
                transition: 0.3s;
                border-radius: 999px;
                color: #ffffff;
                font-weight: 500;
                padding: 0.75rem 1.5rem 0.75rem 1.5rem;
                font-size: 0.875rem;
                line-height: 1.25rem;
            }

            .btn-fill-header-3-1:hover {
                color: #ffffff;
                background-color: #FF8378;
                border: 1px solid #FF8378;
            }

            .btn-no-fill-header-3-1 {
                color: #E8F1FF;
                font-weight: 500;
                padding: 0.75rem 2rem 0.75rem 2rem;
                font-size: 0.875rem;
                line-height: 1.25rem;
            }

            .btn-no-fill-header-3-1:hover {
                color: #FFFFFF;
            }

            .modal-header-3-1 .modal-dialog .modal-content {
                border-radius: 8px;
                background-color: #FFFFFF;
                border: none;
            }

            .responsive-header-3-1 li a {
                padding: 1rem 1rem;
            }

            .hr-header-3-1 {
                padding-left: 2rem;
                padding-right: 2rem;
            }

            .hero-header-3-1 {
                padding: 4rem 2rem 4rem 2rem;
            }

            .left-column-header-3-1 {
                margin-bottom: 0.75rem;
                width: 100%;
            }

            .title-text-big-header-3-1 {
                font-weight: 600;
                margin-bottom: 1.25rem;
                font-size: 2.25rem;
                line-height: 1.25rem;
                color: #FEFEFE;
            }

            .title-text-small-header-3-1 {
                font-weight: 600;
                margin-bottom: 1.25rem;
                font-size: 2.25rem;
                line-height: 2.5rem;
                color: #FEFEFE;
                padding-left: 0;
                padding-right: 0;
            }

            .text-caption-header-3-1 {
                font-size: 1rem;
                line-height: 1.5rem;
                font-weight: 300;
                letter-spacing: 0.025em;
                color: #E8F1FF;
                margin-bottom: 5rem;
            }

            .div-button-header-3-1 {
                display: contents;
            }

            .btn-get-header-3-1 {
                padding: 1rem 2rem 1rem 2rem;
                border-radius: 999px;
                margin-bottom: 1rem;
                color: #FFFFFF;
                font-weight: 600;
                font-size: 1rem;
                line-height: 1.5rem;
                border: 1px solid #FF7468;
                background-color: #FF7468;
                transition: 0.3s;
                margin-right: 0;
            }

            .btn-get-header-3-1:hover {
                color: #FFFFFF;
                background-color: #FF8378;
                border: 1px solid #FF8378;
            }

            .btn-outline-header-3-1 {
                padding: 1rem 1.5rem 1rem 1.5rem;
                border-radius: 999px;
                background-color: transparent;
                font-size: 1rem;
                line-height: 1.5rem;
                border: 1px solid #5D6E86;
                color: #5D6E86;
                transition: 0.3s;
            }

            .btn-outline-header-3-1:hover {
                border: 1px solid #FF7468;
                color: #FF7468;
            }

            .btn-outline-header-3-1:hover div path {
                fill: #FF7468;
            }

            .btn-outline-header-3-1:hover div rect {
                stroke: #FF7468;
            }

            .right-column-header-3-1 {
                width: 100%;
            }

            .hero-right-3-1 {
                right: 2rem;
                bottom: 0;
            }

            .card-outer-header-3-1 {
                padding-left: 0;
                z-index: 1;
            }

            .card-header-3-1 {
                transition: 0.4s;
                top: 0px;
                left: 0px;
                position: relative;
                background-color: #F5F5F5;
                padding: 1.25rem;
                border-radius: 0.75rem;
                width: 100%;
                margin-top: 2.5rem;
            }

            .card-header-3-1:hover {
                top: -3px;
                left: -3px;
                position: relative;
                transition: 0.4s;
            }

            .card-name-header-3-1 {
                font-weight: 600;
                font-size: 1rem;
                line-height: 1.5rem;
                margin-bottom: 0.25rem;
            }

            .card-job-header-3-1 {
                font-weight: 300;
                font-size: 0.75rem;
                line-height: 1rem;
                color: #AAA6A6;
                margin-bottom: 0;
            }

            .card-price-left-header-3-1 {
                font-weight: 500;
                font-size: 1rem;
                line-height: 1.5rem;
                margin-bottom: 0.125rem;
                color: #4E91F9;
            }

            .card-caption-header-3-1 {
                font-weight: 300;
                font-size: 0.75rem;
                line-height: 1rem;
                color: #AAA6A6;
                margin-bottom: 0;
            }

            .card-price-right-header-3-1 {
                font-weight: 500;
                font-size: 1rem;
                line-height: 1.5rem;
                margin-bottom: 0.125rem;
                color: #1B8171;
            }

            .btn-hire-header-3-1 {
                font-size: 1rem;
                line-height: 1.5rem;
                font-weight: 600;
                color: #FFFFFF;
                padding: 0.75rem 4rem 0.75rem 4rem;
                border-radius: 0.75rem;
                margin-bottom: 0.125rem;
                border: 1px solid #FF7468;
                background-color: #FF7468;
                transition: 0.3s;
            }

            .btn-hire-header-3-1:hover {
                color: #FFFFFF;
                background-color: #FF8378;
                border: 1px solid #FF8378;
            }

            .form-header-3-1 {
                width: 100%;
                border-radius: 999px;
                background-color: #E8F1FF;
                box-sizing: border-box;
                font-size: 14px;
                padding: 0rem 1rem;
                padding-right: 0.5rem;
                outline: none;
                border: none;
            }

            .form-header-3-1 div input[type="text"] {
                width: 100%;
                background-color: #E8F1FF;
                box-sizing: border-box;
                font-size: 14px;
                padding: 0rem 0.5rem;
                outline: none;
                border: none;
            }

            .center-search-header-3-1 {
                bottom: -0.5rem;
            }

            @media (min-width: 576px) {
                .modal-header-3-1 .modal-dialog {
                    max-width: 95%;
                    border-radius: 12px;
                }

                .header-3-1 .navbar {
                    padding: 2rem 2rem;
                }

                .title-text-big-header-3-1 {
                    font-size: 3rem;
                    line-height: 1.2;
                }

                .title-text-small-header-3-1 {
                    font-size: 3rem;
                    line-height: 1.2;
                    padding-left: 1.5rem;
                    padding-right: 1.5rem;
                }
            }

            @media (min-width: 768px) {
                .header-3-1 .navbar {
                    padding: 2rem 4rem;
                }

                .hr-header-3-1 {
                    padding-left: 4rem;
                    padding-right: 4rem;
                }

                .hero-header-3-1 {
                    padding: 4rem 4rem 4rem 4rem;
                }

                .left-column-header-3-1 {
                    margin-bottom: 3rem;
                }

                .title-text-small-header-3-1 {
                    padding-left: 1.5rem;
                    padding-right: 1.5rem;
                }

                .btn-get-header-3-1 {
                    margin-bottom: 0;
                    margin-right: 0.5rem;
                }

                .hero-right-3-1 {
                    right: 4rem;
                }

                .card-header-3-1 {
                    margin-left: auto;
                    margin-top: 0;
                }
            }

            @media (min-width: 992px) {
                .header-3-1 .navbar {
                    padding: 2rem 6rem;
                }

                .header-3-1 .navbar-light .navbar-nav .nav-link {
                    padding-top: 0rem;
                    padding-bottom: 0rem;
                    padding-left: 0;
                    padding-right: 0;
                    margin-right: 1rem;
                    margin-left: 1rem;
                }

                .header-3-1 .navbar-light .navbar-nav .active:before {
                    width: 40%;
                }

                .hr-header-3-1 {
                    padding-left: 6rem;
                    padding-right: 6rem;
                }

                .hero-header-3-1 {
                    padding: 4rem 6rem 5rem 6rem;
                }

                .left-column-header-3-1 {
                    width: 50%;
                    margin-bottom: 0;
                }

                .title-text-big-header-3-1 {
                    font-size: 2.75rem;
                    line-height: 1.25;
                }

                .title-text-small-header-3-1 {
                    font-size: 3.75rem;
                    line-height: 1.2;
                }

                .btn-get-header-3-1 {
                    margin-right: 2rem;
                }

                .right-column-header-3-1 {
                    width: 50%;
                }

                .hero-right-3-1 {
                    right: 6rem;
                }

                .card-outer-header-3-1 {
                    padding-left: 4rem;
                }

                .center-search-header-3-1 {
                    left: 48%;
                    top: 50%;
                    bottom: auto;
                    transform: translate(-48%, -50%);
                }

                .form-header-3-1 {
                    width: 340px;
                }
            }

            @media (max-width: 1023px) {
                .form-header-3-1 div input[type="text"] {
                    width: 100%;
                }
            }

        </style>
        <div class="header-3-1" style="font-family: 'Poppins', sans-serif;">
            <nav class="navbar navbar-expand-lg navbar-light">
                <a href="#">
                    <img style="margin-right:0.75rem" src="img/landing_page/logo.png" width="50" height="60" alt="">
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="modal"
                    data-bs-target="#targetModal-header-3-1">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="modal-header-3-1 modal fade" id="targetModal-header-3-1" tabindex="-1" role="dialog"
                    aria-labelledby="targetModalLabel-header-3-1" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content modal-content-header-3-1"
                            style="background-image: linear-gradient(to bottom right, rgba(39, 59, 86, 1), rgba(36, 49, 66, 1))">
                            <div class="modal-header" style="padding:	2rem; padding-bottom: 0;">
                                <a class="modal-title" id="targetModalLabel-header-3-1">
                                    <img style="margin-top:0.5rem" src="img/landing_page/logo.png" width="50" height="60" alt="">
                                </a>
                                <button type="button" class="close-header-3-1 btn-close" data-bs-dismiss="modal"
                                    aria-label="Close">
                                </button>
                            </div>
                            <div class="modal-body" style="padding:	2rem; padding-top: 0; padding-bottom: 0;">
                                <ul class="navbar-nav responsive-header-3-1 me-auto mt-2 mt-lg-0">
                                    <li class="nav-item active position-relative">
                                        <a class="nav-link main" href="#">Home</a>
                                    </li>
                                    <li class="nav-item position-relative">
                                        <a class="nav-link" href="#">menu 1</a>
                                    </li>
                                    <li class="nav-item position-relative">
                                        <a class="nav-link" href="#">menu 2</a>
                                    </li>
                                    <li class="nav-item position-relative">
                                        <a class="nav-link" href="#">menu 3</a>
                                    </li>
                                    <li class="nav-item position-relative">
                                        <a class="nav-link" data-bs-toggle="collapse" href="#collapse-header-3-1"
                                            role="button" aria-expanded="false" aria-controls="collapse-header-3-1">
                                            <svg width="15" height="15" viewBox="0 0 15 15" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path fill-rule="evenodd" clip-rule="evenodd"
                                                    d="M5.85 1.69346C3.5304 1.69346 1.65 3.57386 1.65 5.89346C1.65 8.21305 3.5304 10.0935 5.85 10.0935C8.1696 10.0935 10.05 8.21305 10.05 5.89346C10.05 3.57386 8.1696 1.69346 5.85 1.69346ZM0.25 5.89346C0.25 2.80066 2.75721 0.293457 5.85 0.293457C8.94279 0.293457 11.45 2.80066 11.45 5.89346C11.45 8.98625 8.94279 11.4935 5.85 11.4935C2.75721 11.4935 0.25 8.98625 0.25 5.89346Z"
                                                    fill="#E8F1FF" />
                                                <path fill-rule="evenodd" clip-rule="evenodd"
                                                    d="M8.85503 8.89848C9.12839 8.62512 9.57161 8.62512 9.84497 8.89848L14.045 13.0985C14.3183 13.3718 14.3183 13.8151 14.045 14.0884C13.7716 14.3618 13.3284 14.3618 13.055 14.0884L8.85503 9.88843C8.58166 9.61506 8.58166 9.17185 8.85503 8.89848Z"
                                                    fill="#E8F1FF" />
                                            </svg>
                                        </a>
                                        <form
                                            class="collapse position-absolute form-header-3-1 center-search-header-3-1"
                                            id="collapse-header-3-1">
                                            <div class="d-flex">
                                                <input type="text" class="rounded-full focus:outline-none"
                                                    placeholder="Search">
                                                <button class="btn" type='button'><svg
                                                        style="width: 20px; height: 20px;" data-bs-toggle="collapse"
                                                        href="#collapse-header-3-1" role="button" aria-expanded="false"
                                                        aria-controls="collapse-header-3-1" fill="none" stroke="#273B56"
                                                        viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                                                    </svg></button>
                                            </div>
                                        </form>
                                    </li>
                                </ul>
                            </div>
                            <div class="modal-footer" style="padding:	2rem; padding-top: 0.75rem">
                                <button class="btn btn-default btn-no-fill-header-3-1">Login</button>
                                <button class="btn btn-fill-header-3-1">Daftar</button>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="collapse navbar-collapse" id="navbarTogglerDemo-header-3-1">
                    <ul class="navbar-nav mx-auto mt-2 mt-lg-0">
                        <li class="nav-item active position-relative">
                            <a class="nav-link main" href="#" style="color: #FFFFFF;">Home</a>
                        </li>
                        <li class="nav-item position-relative">
                            <a class="nav-link" href="#">Tentang aplikasi</a>
                        </li>
                        <li class="nav-item position-relative">
                            <a class="nav-link" href="#">Pedoman penggunaan</a>
                        </li>
                        <li class="nav-item position-relative">
                            <a class="nav-link" href="#">Bantuan</a>
                        </li>
                        <li class="nav-item my-auto">
                            <a class="nav-link" data-bs-toggle="collapse" href="#collapse-header-3-1" role="button"
                                aria-expanded="false" aria-controls="collapse-header-3-1">
                                <svg width="15" height="15" viewBox="0 0 15 15" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                        d="M5.85 1.69346C3.5304 1.69346 1.65 3.57386 1.65 5.89346C1.65 8.21305 3.5304 10.0935 5.85 10.0935C8.1696 10.0935 10.05 8.21305 10.05 5.89346C10.05 3.57386 8.1696 1.69346 5.85 1.69346ZM0.25 5.89346C0.25 2.80066 2.75721 0.293457 5.85 0.293457C8.94279 0.293457 11.45 2.80066 11.45 5.89346C11.45 8.98625 8.94279 11.4935 5.85 11.4935C2.75721 11.4935 0.25 8.98625 0.25 5.89346Z"
                                        fill="#E8F1FF" />
                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                        d="M8.85503 8.89848C9.12839 8.62512 9.57161 8.62512 9.84497 8.89848L14.045 13.0985C14.3183 13.3718 14.3183 13.8151 14.045 14.0884C13.7716 14.3618 13.3284 14.3618 13.055 14.0884L8.85503 9.88843C8.58166 9.61506 8.58166 9.17185 8.85503 8.89848Z"
                                        fill="#E8F1FF" />
                                </svg>
                            </a>
                            <form class="collapse position-absolute form-header-3-1 center-search-header-3-1"
                                id="collapse-header-3-1">
                                <div class="d-flex">
                                    <input type="text" class="rounded-full focus:outline-none" placeholder="Search">
                                    <button class="btn" type='button'><svg style="width: 20px; height: 20px;"
                                            data-bs-toggle="collapse" href="#collapse-header-3-1" role="button"
                                            aria-expanded="false" aria-controls="collapse-header-3-1" fill="none"
                                            stroke="#273B56" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M6 18L18 6M6 6l12 12"></path>
                                        </svg></button>
                                </div>
                            </form>
                        </li>
                    </ul>
                    <?php if(Route::has('login')): ?>
                        <div class="fixed top-0 right-0 px-6 py-4 sm:block">
                            <?php if(auth()->guard()->check()): ?>
                                <a href="<?php echo e(url('/home')); ?>" class="btn btn-default btn-no-fill-header-3-1">Home</a>
                            <?php else: ?>
                                <a href="<?php echo e(route('login')); ?>" class="btn btn-default btn-no-fill-header-3-1">Login</a>

                                <?php if(Route::has('register')): ?>
                                    <a href="<?php echo e(route('register')); ?>" class="btn btn-fill-header-3-1">Register</a>
                                <?php endif; ?>
                            <?php endif; ?>
                        </div>
                    <?php endif; ?>
                    <!-- <button class="btn btn-default btn-no-fill-header-3-1">Login</button>
                    <button class="btn btn-fill-header-3-1">Daftar</button> -->
                </div>
            </nav>
            <div class="hr-header-3-1">
                <hr style="border-color: #2E425C; background-color: #2E425C; opacity: 1; margin: 0 !important;">
            </div>

            <div>
                <div class="mx-auto d-flex flex-lg-row flex-column hero-header-3-1">
                    <!-- Left Column -->
                    <div
                        class="left-column-header-3-1 flex-lg-grow-1 d-flex flex-column align-items-lg-start text-lg-start align-items-center text-center">
                        <h1 class="d-lg-block d-none title-text-big-header-3-1">
                            Temukan kemudahan kelola surat Anda dengan<br>
                            <span style="color: #7166FF;"> e-Persuratan</span> kapan pun dan<br>
                            dimana pun Anda berada..<br>
                        </h1>
                        <h1 class="d-block d-lg-none title-text-small-header-3-1">
                        Kelola surat Anda dengan<br>
                            <span style="color: #7166FF;"> e-Persuratan</span> kapan pun dan<br>
                            dimana pun Anda berada..<br>
                        </h1>
                        <p class="text-caption-header-3-1">Bekerja dimanapun jadi lebih mudah, dokumen dan data tersedia secara daring</p>
                        <div
                            class="div-button-header-3-1 d-md-flex align-items-center mx-auto mx-lg-0 justify-content-center">
                            <button class="btn btn-get-header-3-1 d-inline-flex">login</button>
                            <button class="btn btn-outline-header-3-1">
                                <div class="d-flex align-items-center">
                                    <svg class="me-2" width="27" height="27" viewBox="0 0 27 27" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M16.1793 13.7935L11.9166 10.9515V16.6355L16.1793 13.7935ZM18.1673 14.0708L11.1013 18.7815C11.0511 18.8149 10.9928 18.834 10.9326 18.8369C10.8723 18.8398 10.8125 18.8263 10.7593 18.7978C10.7062 18.7694 10.6617 18.727 10.6307 18.6753C10.5997 18.6236 10.5833 18.5644 10.5833 18.5041V9.0828C10.5833 9.0225 10.5997 8.96334 10.6307 8.91162C10.6617 8.8599 10.7062 8.81756 10.7593 8.7891C10.8125 8.76064 10.8723 8.74713 10.9326 8.75001C10.9928 8.7529 11.0511 8.77206 11.1013 8.80546L18.1673 13.5161C18.213 13.5466 18.2504 13.5878 18.2763 13.6362C18.3022 13.6846 18.3157 13.7386 18.3157 13.7935C18.3157 13.8483 18.3022 13.9024 18.2763 13.9507C18.2504 13.9991 18.213 14.0404 18.1673 14.0708Z"
                                            fill="#5D6E86" />
                                        <rect x="0.75" y="1.29346" width="25" height="25" rx="12.5" stroke="#5D6E86" />
                                    </svg>
                                    video panduan pengguna
                                </div>
                            </button>
                        </div>
                    </div>

                    <!-- Right Column -->
                    <div
                        class="right-column-header-3-1 d-flex justify-content-center justify-content-lg-start text-center pe-0">

                        <img id="img-fluid" class="position-absolute d-lg-block d-none" style="bottom:0;right:0;"
                            src="img/landing_page/gedung.jpg" width="1000" height="600" alt="">
                        <!--
          <img class="position-absolute d-lg-block d-none" style="bottom:0;right:0;" src="img/landing_page/gedung.jpg" width="1000" height="500" alt="">
          <img id="img-fluid" style="display: block;max-width: 100%;height: auto;" src="img/landing_page/gedung.jpg" alt="">

          <img class="position-absolute d-lg-block d-none hero-right-3-1" src="img/landing_page/gedung.jpg" width="1000" height="500" alt="">
           -->
                        <div class="d-flex align-items-end card-outer-header-3-1">
                            <div class="mx-auto d-flex flex-wrap align-items-center">
                                <div class="card-header-3-1 d-flex flex-column">
                                    <div class="d-flex align-items-center" style="margin-bottom: 1.25rem">
                                        <div>
                                            <img style="margin-right: 1rem;" src="img/landing_page/info.png" widht="50" height="60"
                                                alt="">
                                        </div>
                                        <div class="text-start">
                                            <p class="card-name-header-3-1">INFO SURAT</p>
                                            <p class="card-job-header-3-1">JUMLAH SURAT</p>
                                        </div>
                                    </div>
                                    <div class="row text-start" style="margin-bottom: 1.25rem">
                                        <div class="col-6">
                                            <p class="card-price-left-header-3-1">64,100</p>
                                            <p class="card-caption-header-3-1">Surat Masuk</p>
                                        </div>
                                        <div class="col-6 ps-0">
                                            <p class="card-price-right-header-3-1">106</p>
                                            <p class="card-caption-header-3-1">Surat Keluar</p>
                                        </div>
                                    </div>
                                    <button class="btn btn-hire-header-3-1">
                                        <div class="test d-none">show</div>
                                        detail
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>

        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
            integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
        </script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous">
        </script>
    </section>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous">
    </script>
</body>

</html>
<?php /**PATH C:\xampp\htdocs\surat\resources\views/welcome.blade.php ENDPATH**/ ?>