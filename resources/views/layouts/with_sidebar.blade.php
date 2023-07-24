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
	<!-- <meta property="og:image" content="https:/workload.dexignlab.com/xhtml/social-image.png" /> -->
	<meta name="format-detection" content="telephone=no">
	
	<!-- PAGE TITLE HERE -->
	<title>Workload Project Management</title>
	
	@include('layouts.partials.with_sidebars.style')
    
    @yield("style")

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
		
		@include('layouts.partials.with_sidebars.nav_header')

        <!--**********************************
            Nav header end
        ***********************************-->
		
		<!--**********************************
            Chat box start
        ***********************************-->
		
		@include('layouts.partials.with_sidebars.chat_box')

		<!--**********************************
            Chat box End
        ***********************************-->
		
		<!--**********************************
            Header start
        ***********************************-->
        
		@include('layouts.partials.with_sidebars.header')

        <!--**********************************
            Header end ti-comment-alt
        ***********************************-->

        <!--**********************************
            Sidebar start
        ***********************************-->

		@include('layouts.partials.with_sidebars.sidebar')

        <!--**********************************
            Sidebar end
        ***********************************-->
		
		<!--**********************************
            Content body start
        ***********************************-->

        @yield("content")
        
        <!--**********************************
            Content body end
        ***********************************-->
		


		
        <!--**********************************
            Footer start
        ***********************************-->
        
		@include('layouts.partials.with_sidebars.footer')

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
   
	@include('layouts.partials.with_sidebars.script')

    @yield("script")

</body>
</html>