<!DOCTYPE html>
<html lang="en" class="h-100">

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
    <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet">
    <style>

        
        .card {
            background-color: #f0f0f0;
            border: 1px solid #ccc;
            transition: transform 0.3s, box-shadow 0.3s;
        }

        .card:hover {
            transform: scale(1.05);
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.3);
        }

    </style>

</head>

<body class="vh-100">
    <div id="preloader">
        <div class="lds-ripple">
            <div></div>
            <div></div>
        </div>
    </div>
    <div class="authincation h-100">
        <div class="container h-100">
            <div class="row justify-content-center h-100 align-items-center">
                <div class="col-md-9">
                    <div class="row justify-content-center align-items-center">
                        @foreach ($rpjmds as $key => $rpjmd)
                        <div class="col-md-3">
                            <a href="{{ route('main-detail',$rpjmd->id) }}">
                                <div class="card">
                                    <div class="card-body">
                                        <p class="card-text text-center" style="font-weight: bold;">RPJMD
                                        </p>
                                        <p class="card-text text-center" style="font-weight: bold;">{{ $rpjmd->tahun_awal }} - {{ $rpjmd->tahun_akhir }}
                                        </p>
                                    </div>
                                </div>
                            </a>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!--**********************************
	Scripts
***********************************-->
    <!-- Required vendors -->

    <script src="{{ asset('assets/vendor/global/global.min.js') }}"></script>
    <script src="{{ asset('assets/js/custom.min.js') }}"></script>
    <script src="{{ asset('assets/js/dlabnav-init.js') }}"></script>
</body>

</html>