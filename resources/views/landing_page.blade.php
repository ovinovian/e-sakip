<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="keywords" content="" />
    <meta name="author" content="" />
    <meta name="robots" content="" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Workload : Workload Project Management Admin  Bootstrap 5 Template" />
    <meta property="og:title" content="Workload : Workload Project Management Admin  Bootstrap 5 Template" />
    <meta property="og:description" content="Workload : Workload Project Management Admin  Bootstrap 5 Template" />
    <meta property="og:image" content="https:/workload.dexignlab.com/xhtml/social-image.png" />
    <meta name="format-detection" content="telephone=no">

    <!-- PAGE TITLE HERE -->
    <title>e-SAKIP</title>
    <link href="{{ asset('assets/images/logo.png') }}" rel="icon">
    <link href="{{ asset('assets/images/logo.png') }}" rel="apple-touch-icon">
    <link rel="icon" type="image/png" sizes="192x192" href="{{ asset('assets/images/logo.png') }}">

    <!-- FAVICONS ICON -->
    <link rel="shortcut icon" type="image/png" href="images/favicon.png" />
    <link href="assets/vendor/jquery-nice-select/css/nice-select.css" rel="stylesheet">
    <link href="assets/vendor/owl-carousel/owl.carousel.css" rel="stylesheet">
    <link href="assets/css/style.css" rel="stylesheet">

</head>

<body>

    <!--*******************
        Preloader start
    ********************-->
    <div id="preloader">
        <div class="lds-ripple">
            <div></div>
            <div></div>
        </div>
    </div>
    <!--*******************
        Preloader end
    ********************-->

    <!--**********************************
        Main wrapper start
    ***********************************-->
    <div id="main-wrapper">

        <!--**********************************
            Nav header start
        ***********************************-->
        <div class="nav-header">
            <a href="{{ url('/')}}" class="brand-logo">
                <img src="{{ asset('assets/images/logo.png') }}" alt="logo" height="60">

                <div class="brand-title">
                    <h2 class="">e-SAKIP</h2>
                    <span class="brand-sub-title">Kabupaten Bangka</span>
                </div>
            </a>

        </div>
        <!--**********************************
            Nav header end
        ***********************************-->

        <!--**********************************
            Chat box End
        ***********************************-->

        <!--**********************************
            Header start
        ***********************************-->
        <div class="header">
            <div class="header-content">
                <nav class="navbar navbar-expand">
                    <div class="collapse navbar-collapse justify-content-between">
                        <div class="header-left">
                            <div class="dashboard_bar">

                            </div>

                        </div>
                        <ul class="navbar-nav header-right">

                            <li class="nav-item dropdown header-profile">
                                <!-- <a class="nav-link" href="javascript:void(0);" role="button" data-bs-toggle="dropdown">
                                    <button type="button" class="btn btn-primary">Masuk</button>
                                </a> -->
                                <a href="{{ route('login') }}" class="btn btn-success ai-icon">
                                    <svg id="icon-logout" xmlns="http://www.w3.org/2000/svg" class="text-white" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                        <path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"></path>
                                        <polyline points="16 17 21 12 16 7"></polyline>
                                        <line x1="21" y1="12" x2="9" y2="12"></line>
                                    </svg>
                                    <span class="ms-2"> Masuk </span>
                                </a>

                            </li>
                        </ul>
                    </div>
                </nav>
            </div>
        </div>

        <!--**********************************
            Header end ti-comment-alt
        ***********************************-->

        <!--**********************************
            Sidebar start
        ***********************************-->

        <!--**********************************
            Sidebar end
        ***********************************-->

        <!--**********************************
            Content body start
        ***********************************-->
        <!-- <div class="content-body">
            <div class="container-fluid" style="background-color: red;">
                
            </div>
        </div> -->

        <div class="container-fluid" style="padding-top:9rem;padding-left:2rem;padding-right:2rem">
            <div class="row mb-3">
                <div class="col-xl-12">
                    <div class="card">
                        <div class="card-header border-0">
                            <div>
                                <h4 class="fs-20 font-w700">Important Projects</h4>
                                <span>Lorem ipsum dolor sit amet</span>
                            </div>
                            <div class="dropdown">
                                <div class="btn-link" data-bs-toggle="dropdown">
                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <circle cx="12.4999" cy="3.5" r="2.5" fill="#A5A5A5" />
                                        <circle cx="12.4999" cy="11.5" r="2.5" fill="#A5A5A5" />
                                        <circle cx="12.4999" cy="19.5" r="2.5" fill="#A5A5A5" />
                                    </svg>
                                </div>
                                <div class="dropdown-menu dropdown-menu-right">
                                    <a class="dropdown-item" href="javascript:void(0)">Delete</a>
                                    <a class="dropdown-item" href="javascript:void(0)">Edit</a>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class=" owl-carousel card-slider">
                                <div class="items">
                                    <div class="slide-info">
                                        <div class="d-flex align-items-center mb-3">
                                            <div class="slide-icon">
                                                <span class="bg-ombe">
                                                    <svg width="38" height="38" viewBox="0 0 38 38" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path d="M19 0C15.2422 -4.48119e-08 11.5687 1.11433 8.44417 3.20208C5.31963 5.28982 2.88435 8.25722 1.44629 11.729C0.00822388 15.2008 -0.36804 19.0211 0.36508 22.7067C1.0982 26.3924 2.90777 29.7778 5.56497 32.435C8.22217 35.0922 11.6076 36.9018 15.2933 37.6349C18.9789 38.368 22.7992 37.9918 26.271 36.5537C29.7428 35.1156 32.7102 32.6804 34.7979 29.5558C36.8857 26.4313 38 22.7578 38 19H28.456C28.456 20.8702 27.9014 22.6984 26.8624 24.2535C25.8233 25.8085 24.3465 27.0205 22.6187 27.7362C20.8908 28.4519 18.9895 28.6392 17.1552 28.2743C15.3209 27.9094 13.636 27.0088 12.3136 25.6864C10.9912 24.364 10.0906 22.6791 9.7257 20.8448C9.36084 19.0105 9.5481 17.1092 10.2638 15.3813C10.9795 13.6535 12.1915 12.1767 13.7465 11.1376C15.3016 10.0986 17.1298 9.54401 19 9.54401V0Z" fill="white" />
                                                    </svg>
                                                </span>
                                            </div>
                                            <div class="ms-3">
                                                <h4 class="fs-18 font-w500">Ombe Cafe</h4>
                                                <span>Cafe</span>
                                            </div>
                                        </div>
                                        <p class="fs-16">Responsive Landing Page Website Projects</p>
                                        <div class="slider-button mb-4">
                                            <span class="badge-lg text-danger bgl-danger">MOBILE</span>
                                            <span class="badge-lg text-blue bgl-blue">WEBSITES</span>
                                        </div>
                                        <div class="progress default-progress mb-2">
                                            <div class="progress-bar progress-animated" style="width: 40%; height:10px;" role="progressbar">
                                            </div>
                                        </div>
                                        <div class="d-flex align-items-end mt-1 justify-content-between">
                                            <span><small class="text-black font-w700">12</small> Task Done</span>
                                            <span>Due date: 12/05/2020</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="items">
                                    <div class="slide-info">
                                        <div class="d-flex align-items-center mb-3">
                                            <div class="slide-icon">
                                                <span class="bg-pushup">
                                                    <svg width="27" height="35" viewBox="0 0 27 35" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path d="M7.64071 24.2591V33V34H6.64071H2H1V33V2.3725V1.3725H2H6.64071H7.64071V2.3725V3.23854C9.32631 1.9176 11.6215 1 14.4566 1C21.0001 1 26 6.38308 26 13.8785C26 21.3958 21.0207 26.5501 14.4566 26.5501C11.7277 26.5501 9.372 25.6258 7.64071 24.2591ZM19.2779 13.8785C19.2779 9.46345 16.3463 7.09747 13.4389 7.09747C10.5614 7.09747 7.64071 9.39188 7.64071 13.7957C7.64071 18.1544 10.5578 20.4526 13.4389 20.4526C16.3833 20.4526 19.2779 18.2557 19.2779 13.8785Z" fill="white" stroke="white" stroke-width="2" />
                                                    </svg>
                                                </span>
                                            </div>
                                            <div class="ms-3">
                                                <h4 class="fs-18 font-w500">Pushup Studios</h4>
                                                <span>Coffe Shops</span>
                                            </div>
                                        </div>
                                        <p class="fs-16">Reservation Application Integrated with Desktop App</p>
                                        <div class="slider-button mb-4">
                                            <span class="badge-lg text-danger bgl-danger">DESKTOP APP</span>
                                        </div>
                                        <div class="progress default-progress mb-2">
                                            <div class="progress-bar progress-animated" style="width: 40%; height:10px;" role="progressbar">
                                            </div>
                                        </div>
                                        <div class="d-flex align-items-end mt-1 justify-content-between">
                                            <span><small class="text-black font-w700">12</small> Task Done</span>
                                            <span>Due date: 12/05/2020</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="items">
                                    <div class="slide-info">
                                        <div class="d-flex align-items-center mb-3">
                                            <div class="slide-icon">
                                                <span class="bg-kleon">
                                                    <svg width="24" height="31" viewBox="0 0 24 31" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path d="M17.2782 31H24L10.1504 15.5223L23.7744 0H17.3233L5.14286 14.1396V0H0V31H5.14286V17.1281L17.2782 31Z" fill="white" />
                                                    </svg>

                                                </span>
                                            </div>
                                            <div class="ms-3">
                                                <h4 class="fs-18 font-w500">Kleon Team</h4>
                                                <span>Coffe Shops</span>
                                            </div>
                                        </div>
                                        <p class="fs-16">Responsive Landing Page Website Projects</p>
                                        <div class="slider-button mb-4">
                                            <span class="badge-lg text-danger bgl-danger">DESKTOP APP</span>
                                        </div>
                                        <div class="progress default-progress mb-2">
                                            <div class="progress-bar progress-animated" style="width: 40%; height:10px;" role="progressbar">
                                            </div>
                                        </div>
                                        <div class="d-flex align-items-end mt-1 justify-content-between">
                                            <span><small class="text-black font-w700">12</small> Task Done</span>
                                            <span>Due date: 12/05/2020</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="items">
                                    <div class="slide-info">
                                        <div class="d-flex align-items-center mb-3">
                                            <div class="slide-icon">
                                                <span class="bg-biji">
                                                    <svg width="27" height="35" viewBox="0 0 27 35" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path d="M7.64071 10.7409V2V1H6.64071H2H1V2V32.6275V33.6275H2H6.64071H7.64071V32.6275V31.7615C9.32631 33.0824 11.6215 34 14.4566 34C21.0001 34 26 28.6169 26 21.1215C26 13.6042 21.0207 8.44993 14.4566 8.44993C11.7277 8.44993 9.372 9.37416 7.64071 10.7409ZM19.2779 21.1215C19.2779 25.5366 16.3463 27.9025 13.4389 27.9025C10.5614 27.9025 7.64071 25.6081 7.64071 21.2043C7.64071 16.8456 10.5578 14.5474 13.4389 14.5474C16.3833 14.5474 19.2779 16.7443 19.2779 21.1215Z" fill="white" stroke="white" stroke-width="2" />
                                                    </svg>
                                                </span>
                                            </div>
                                            <div class="ms-3">
                                                <h4 class="fs-18 font-w500">Biji’s Coffee</h4>
                                                <span>Coffe Shops</span>
                                            </div>
                                        </div>
                                        <p class="fs-16">Responsive Landing Page Website Projects</p>
                                        <div class="slider-button mb-4">
                                            <span class="badge-lg text-danger bgl-danger">DESKTOP APP</span>
                                        </div>
                                        <div class="progress default-progress mb-2">
                                            <div class="progress-bar progress-animated" style="width: 40%; height:10px;" role="progressbar">
                                            </div>
                                        </div>
                                        <div class="d-flex align-items-end mt-1 justify-content-between">
                                            <span><small class="text-black font-w700">12</small> Task Done</span>
                                            <span>Due date: 12/05/2020</span>
                                        </div>
                                    </div>
                                </div>

                            </div>

                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xl-6 col-sm-12">
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="card">
                                <div class="card-header border-0">
                                    <div>
                                        <h4 class="fs-20 font-w700">Project Categories</h4>
                                        <span class="fs-14 font-w400 d-block">Lorem ipsum dolor sit amet</span>
                                    </div>
                                    <div class="dropdown">
                                        <div class="btn-link" data-bs-toggle="dropdown">
                                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <circle cx="12.4999" cy="3.5" r="2.5" fill="#A5A5A5" />
                                                <circle cx="12.4999" cy="11.5" r="2.5" fill="#A5A5A5" />
                                                <circle cx="12.4999" cy="19.5" r="2.5" fill="#A5A5A5" />
                                            </svg>
                                        </div>
                                        <div class="dropdown-menu dropdown-menu-right">
                                            <a class="dropdown-item" href="javascript:void(0)">Delete</a>
                                            <a class="dropdown-item" href="javascript:void(0)">Edit</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="row align-items-center">
                                        <div class="col-xl-6">
                                            <div>
                                                <span class="fs-18 font-w600 mb-3 d-block">Legend</span>
                                            </div>
                                            <div>
                                                <div class="d-flex align-items-center justify-content-between mb-4">
                                                    <span class="fs-18 font-w500">
                                                        <svg class="me-3" width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <rect width="20" height="20" rx="6" fill="#886CC0" />
                                                        </svg>
                                                        Primary (27%)
                                                    </span>
                                                    <span class="fs-18 font-w600">763</span>
                                                </div>
                                                <div class="d-flex align-items-center justify-content-between  mb-4">
                                                    <span class="fs-18 font-w500">
                                                        <svg class="me-3" width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <rect width="20" height="20" rx="6" fill="#26E023" />
                                                        </svg>
                                                        Promotion (11%)
                                                    </span>
                                                    <span class="fs-18 font-w600">321</span>
                                                </div>
                                                <div class="d-flex align-items-center justify-content-between  mb-4">
                                                    <span class="fs-18 font-w500">
                                                        <svg class="me-3" width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <rect width="20" height="20" rx="6" fill="#61CFF1" />
                                                        </svg>
                                                        Forum (22%)
                                                    </span>
                                                    <span class="fs-18 font-w600">69</span>
                                                </div>
                                                <div class="d-flex align-items-center justify-content-between  mb-4">
                                                    <span class="fs-18 font-w500">
                                                        <svg class="me-3" width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <rect width="20" height="20" rx="6" fill="#FFDA7C" />
                                                        </svg>
                                                        Socials (15%)
                                                    </span>
                                                    <span class="fs-18 font-w600">154</span>
                                                </div>
                                                <div class="d-flex align-items-center justify-content-between  mb-4">
                                                    <span class="fs-18 font-w500">
                                                        <svg class="me-3" width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <rect width="20" height="20" rx="6" fill="#FF86B1" />
                                                        </svg>
                                                        Spam (25%)
                                                    </span>
                                                    <span class="fs-18 font-w600">696</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xl-6 text-center">
                                            <div id="emailchart" class="mb-3"></div>
                                            <a href="javascript:void(0);" class="btn btn-outline-primary btn-rounded">Update Progress</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-6 col-sm-12">
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="card">
                                <div class="card-header border-0">
                                    <div>
                                        <h4 class="fs-20 font-w700">Project Categories</h4>
                                        <span class="fs-14 font-w400 d-block">Lorem ipsum dolor sit amet</span>
                                    </div>
                                    <div class="dropdown">
                                        <div class="btn-link" data-bs-toggle="dropdown">
                                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <circle cx="12.4999" cy="3.5" r="2.5" fill="#A5A5A5" />
                                                <circle cx="12.4999" cy="11.5" r="2.5" fill="#A5A5A5" />
                                                <circle cx="12.4999" cy="19.5" r="2.5" fill="#A5A5A5" />
                                            </svg>
                                        </div>
                                        <div class="dropdown-menu dropdown-menu-right">
                                            <a class="dropdown-item" href="javascript:void(0)">Delete</a>
                                            <a class="dropdown-item" href="javascript:void(0)">Edit</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="row align-items-center">
                                        <div class="col-xl-6">
                                            <div>
                                                <span class="fs-18 font-w600 mb-3 d-block">Legend</span>
                                            </div>
                                            <div>
                                                <div class="d-flex align-items-center justify-content-between mb-4">
                                                    <span class="fs-18 font-w500">
                                                        <svg class="me-3" width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <rect width="20" height="20" rx="6" fill="#886CC0" />
                                                        </svg>
                                                        Primary (27%)
                                                    </span>
                                                    <span class="fs-18 font-w600">763</span>
                                                </div>
                                                <div class="d-flex align-items-center justify-content-between  mb-4">
                                                    <span class="fs-18 font-w500">
                                                        <svg class="me-3" width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <rect width="20" height="20" rx="6" fill="#26E023" />
                                                        </svg>
                                                        Promotion (11%)
                                                    </span>
                                                    <span class="fs-18 font-w600">321</span>
                                                </div>
                                                <div class="d-flex align-items-center justify-content-between  mb-4">
                                                    <span class="fs-18 font-w500">
                                                        <svg class="me-3" width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <rect width="20" height="20" rx="6" fill="#61CFF1" />
                                                        </svg>
                                                        Forum (22%)
                                                    </span>
                                                    <span class="fs-18 font-w600">69</span>
                                                </div>
                                                <div class="d-flex align-items-center justify-content-between  mb-4">
                                                    <span class="fs-18 font-w500">
                                                        <svg class="me-3" width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <rect width="20" height="20" rx="6" fill="#FFDA7C" />
                                                        </svg>
                                                        Socials (15%)
                                                    </span>
                                                    <span class="fs-18 font-w600">154</span>
                                                </div>
                                                <div class="d-flex align-items-center justify-content-between  mb-4">
                                                    <span class="fs-18 font-w500">
                                                        <svg class="me-3" width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <rect width="20" height="20" rx="6" fill="#FF86B1" />
                                                        </svg>
                                                        Spam (25%)
                                                    </span>
                                                    <span class="fs-18 font-w600">696</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xl-6 text-center">
                                            <div id="emailchart2" class="mb-3"></div>
                                            <a href="javascript:void(0);" class="btn btn-outline-primary btn-rounded">Update Progress</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-xl-12">
                    <div class="card overflow-hidden">
                        <div class="card-body">
                            <div class="side-border">
                                <h4 class="fs-20 font-w700"><span>Today</span></h4>
                            </div>
                            <div class="latest d-flex align-items-center justify-content-between flex-wrap">
                                <div class="d-flex align-items-center flex-wrap mb-3">
                                    <span class="me-3">2m ago</span>
                                    <div class="enaergy">
                                        <span class="bg-primary"><i class="fas fa-bolt"></i></span>
                                    </div>
                                    <div class="ms-0 ms-sm-3">
                                        <h4 class="fs-18 font-w500">Jackie Kun mentioned you at Kleon Projects</h4>
                                        <p class="mb-0 fs-16">Monday, June 31 2020</p>
                                    </div>
                                </div>
                                <a href="javascript:void(0);" class="btn btn-outline-primary btn-rounded mb-3">Go to board</a>
                            </div>
                            <div class="latest d-flex align-items-center justify-content-between flex-wrap">
                                <div class="d-flex align-items-center flex-wrap mb-3">
                                    <span class="me-3">2m ago</span>
                                    <div class="enaergy">
                                        <span class="bg-secondary"><i class="fas fa-clock"></i></span>
                                    </div>
                                    <div class="ms-0 ms-sm-3">
                                        <h4 class="fs-18 font-w500">[REMINDER] Due date of Highspeed Studios Projects te task will be coming</h4>
                                        <p class="mb-0 fs-16">Monday, June 31 2020</p>
                                    </div>
                                </div>
                                <a href="javascript:void(0);" class="btn  btn-link btn-rounded mb-3">Go to board</a>
                            </div>
                            <div class="latest d-flex align-items-center justify-content-between flex-wrap">
                                <div class="d-flex align-items-center flex-wrap mb-3">
                                    <span class="me-3">2m ago</span>
                                    <div class="enaergy">
                                        <span class="bg-blue"><i class="fas fa-bolt"></i></span>
                                    </div>
                                    <div class="ms-0 ms-sm-3">
                                        <h4 class="fs-18 font-w500">Olivia Johanna has created new task at Kleon Projects</h4>
                                        <p class="mb-0 fs-16">Monday, June 31 2020</p>
                                    </div>
                                </div>
                                <a href="javascript:void(0);" class="btn  btn-link btn-rounded mb-3">Go to board</a>
                            </div>
                            <div class="latest d-flex align-items-center justify-content-between flex-wrap">
                                <div class="d-flex align-items-center flex-wrap mb-3">
                                    <span class="me-3">2m ago</span>
                                    <div class="enaergy">
                                        <span class="bg-primary"><i class="fas fa-bolt"></i></span>
                                    </div>
                                    <div class="ms-0 ms-sm-3">
                                        <h4 class="fs-18 font-w500">Jackie Kun commented at Kleon Projects “Hei, please update the progress gu..</h4>
                                        <p class="mb-0 fs-16">Monday, June 31 2020</p>
                                    </div>
                                </div>
                                <a href="javascript:void(0);" class="btn  btn-link btn-rounded mb-3">Go to board</a>
                            </div>
                            <div class="latest d-flex align-items-center justify-content-between flex-wrap">
                                <div class="d-flex align-items-center flex-wrap mb-3">
                                    <span class="me-3">2m ago</span>
                                    <div class="enaergy">
                                        <span class="bg-primary"><i class="fas fa-bolt"></i></span>
                                    </div>
                                    <div class="ms-0 ms-sm-3">
                                        <h4 class="fs-18 font-w500">You has moved “Wireframing Landing Page” task to Done</h4>
                                        <p class="mb-0 fs-16">Monday, June 31 2020</p>
                                    </div>
                                </div>
                                <a href="javascript:void(0);" class="btn  btn-link btn-rounded mb-3">Go to board</a>
                            </div>
                            <div class="side-border">
                                <h4 class="fs-20 font-w700"><span>Yesterday</span></h4>
                            </div>
                            <div class="latest d-flex align-items-center justify-content-between flex-wrap">
                                <div class="d-flex align-items-center flex-wrap mb-3">
                                    <span class="me-3">2m ago</span>
                                    <div class="enaergy">
                                        <span class="bg-primary"><i class="fas fa-bolt"></i></span>
                                    </div>
                                    <div class="ms-0 ms-sm-3">
                                        <h4 class="fs-18 font-w500">Jackie Kun mentioned you at Kleon Projects</h4>
                                        <p class="mb-0 fs-16">Monday, June 31 2020</p>
                                    </div>
                                </div>
                                <a href="javascript:void(0);" class="btn btn-outline-primary btn-rounded mb-3">Go to board</a>
                            </div>
                            <div class="latest d-flex align-items-center justify-content-between flex-wrap">
                                <div class="d-flex align-items-center flex-wrap mb-3">
                                    <span class="me-3">2m ago</span>
                                    <div class="enaergy">
                                        <span class="bg-secondary"><i class="fas fa-bolt"></i></span>
                                    </div>
                                    <div class="ms-0 ms-sm-3">
                                        <h4 class="fs-18 font-w500">[REMINDER] Due date of Highspeed Studios Projects te task will be coming</h4>
                                        <p class="mb-0 fs-16">Monday, June 31 2020</p>
                                    </div>
                                </div>
                                <a href="javascript:void(0);" class="btn  btn-link btn-rounded mb-3">Go to board</a>
                            </div>
                            <div class="latest d-flex align-items-center justify-content-between flex-wrap">
                                <div class="d-flex align-items-center flex-wrap mb-3">
                                    <span class="me-3">2m ago</span>
                                    <div class="enaergy">
                                        <span class="bg-blue"><i class="fas fa-bolt"></i></span>
                                    </div>
                                    <div class="ms-0 ms-sm-3">
                                        <h4 class="fs-18 font-w500">You has moved “Wireframing Landing Page” task to Done</h4>
                                        <p class="mb-0 fs-16">Monday, June 31 2020</p>
                                    </div>
                                </div>
                                <a href="javascript:void(0);" class="btn  btn-link btn-rounded mb-3">Go to board</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!--**********************************
            Content body end
        ***********************************-->


        <!--**********************************
            Footer start
        ***********************************-->

        <!--**********************************
            Footer end
        ***********************************-->

        <!--**********************************
           Support ticket button start
        ***********************************-->

        <!--**********************************
           Support ticket button end
        ***********************************-->



    </div>
    <!--**********************************
        Main wrapper end
    ***********************************-->

    <!--**********************************
        Scripts
    ***********************************-->
    <!-- Required vendors -->
    <script src="{{ asset('assets/vendor/global/global.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/jquery-nice-select/js/jquery.nice-select.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/select2/js/select2.full.min.js') }}"></script>
    <script src="{{ asset('assets/js/plugins-init/select2-init.js') }}"></script>
    <script src="{{ asset('assets/plugins/sweetalert2/dist/sweetalert2.all.min.js') }}"></script>
    <script src="{{ asset('assets/js/custom.min.js') }}"></script>
    <script src="{{ asset('assets/js/dlabnav-init.js') }}"></script>
    <script src="{{ asset('assets/vendor/chart.js/Chart.bundle.min.js') }}"></script>

    <!-- Apex Chart -->
    <script src="{{ asset('assets/vendor/apexchart/apexchart.js') }}"></script>

    <!-- Chart piety plugin files -->
    <script src="{{ asset('assets/vendor/peity/jquery.peity.min.js') }}"></script>
    <!-- Dashboard 1 -->
    <script src="{{ asset('assets/js/dashboard/dashboard-1.js') }}"></script>

    <script src="{{ asset('assets/vendor/owl-carousel/owl.carousel.js') }}"></script>
    <script>
        function cardsCenter() {

            /*  testimonial one function by = owl.carousel.js */



            jQuery('.card-slider').owlCarousel({
                loop: true,
                margin: 10,
                nav: false,
                //center:true,
                slideSpeed: 3000,
                paginationSpeed: 3000,
                dots: false,
                navText: ['', ''],
                responsive: {
                    0: {
                        items: 1
                    },
                    576: {
                        items: 2
                    },
                    800: {
                        items: 2
                    },
                    991: {
                        items: 2
                    },
                    1200: {
                        items: 3
                    },
                    1600: {
                        items: 4
                    }
                }
            })
        }

        jQuery(window).on('load', function() {
            setTimeout(function() {
                cardsCenter();
            }, 1000);
        });
    </script>



</body>

</html>