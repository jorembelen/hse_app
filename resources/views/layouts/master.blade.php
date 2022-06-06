
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

   <!-- CSRF Token -->
   <meta name="csrf-token" content="{{ csrf_token() }}">

	<title>@yield('title')</title>

	<link rel="canonical" href="pages-blank.html" />
	{{-- <link rel="shortcut icon" href="/admin/assets/img/rcl.ico"> --}}

	<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500&amp;display=swap" rel="stylesheet">


	<link href="/admin/plugins/flatpickr/custom-flatpickr.css" rel="stylesheet" type="text/css">
	<link href="/admin/plugins/flatpickr/flatpickr.css" rel="stylesheet" type="text/css">
	<link href="/admin/assets/css/scrollspyNav.css" rel="stylesheet" type="text/css" />
   <link href="/admin/plugins/file-upload/file-upload-with-preview.min.css" rel="stylesheet" type="text/css" />
   <link href="/admin/plugins/lightbox/photoswipe.css" rel="stylesheet" type="text/css" />
   <link href="/admin/plugins/lightbox/default-skin/default-skin.css" rel="stylesheet" type="text/css" />
   <link href="/admin/plugins/lightbox/custom-photswipe.css" rel="stylesheet" type="text/css" />

	<!-- Choose your prefered color scheme -->
	 <link href="/assets/css/light.css" rel="stylesheet">
     <link href="/assets/css/prevent.css" rel="stylesheet" />

</head>

<body data-theme="light" data-layout="fluid" data-sidebar-position="left" data-sidebar-behavior="default">
	<div class="wrapper">

        @include('includes.sidebar')

		<div class="main">

            @include('includes.navbar')

			<main class="content">
				<div class="container-fluid p-0">

					<h1 class="h3 mb-3">@yield('title')</h1>

						@yield('content')
						@include('sweetalert::alert')

				</div>
			</main>

		@include('includes.footer')

		</div>
	</div>

	<script src="/assets/js/app.js"></script>


	<script src="/admin/plugins/lightbox/photoswipe.min.js"></script>
    <script src="/admin/plugins/lightbox/photoswipe-ui-default.min.js"></script>
	<script src="/admin/plugins/lightbox/custom-photswipe.js"></script>
    <script src="/assets/js/prevent.js"></script>
             <!-- Laravel Javascript Validation -->
             <script type="text/javascript" src="{{ asset('vendor/jsvalidation/js/jsvalidation.js')}}"></script>
                {!! JsValidator::formRequest('App\Http\Requests\LocationStoreRequest', '#loc-create'); !!}
                {!! JsValidator::formRequest('App\Http\Requests\EmployeeStoreRequest', '#emp-create'); !!}
                {!! JsValidator::formRequest('App\Http\Requests\UserStoreRequest', '#user-create'); !!}
				{!! JsValidator::formRequest('App\Http\Requests\UserUpdateRequest', '#user-update'); !!}
				{!! JsValidator::formRequest('App\Http\Requests\IncidentStoreRequest', '#inc-Create'); !!}
				{!! JsValidator::formRequest('App\Http\Requests\IncidentUpdateRequest', '#inc-Update'); !!}
				{!! JsValidator::formRequest('App\Http\Requests\ReportStoreRequest', '#rep-Create'); !!}
				{!! JsValidator::formRequest('App\Http\Requests\ReportUpdateRequest', '#rep-Update'); !!}

    <script>
		document.addEventListener("DOMContentLoaded", function() {
			// Datatables Responsive
			$("#datatables-reponsive").DataTable({
				responsive: true
			});
		});
	</script>
	<script>
		document.addEventListener("DOMContentLoaded", function() {
			// Select2
			$(".select2").each(function() {
				$(this)
					.wrap("<div class=\"position-relative\"></div>")
					.select2({
						tags: true,
						placeholder: "Select value",
						dropdownParent: $(this).parent()
					});
			})
		});
	</script>
		<script>
			document.addEventListener("DOMContentLoaded", function() {
				// Datatables with Buttons
				var datatablesButtons = $("#datatables-buttons").DataTable({
					responsive: true,
					lengthChange: !1,
					buttons: ["copy", "print"]
				});
				datatablesButtons.buttons().container().appendTo("#datatables-buttons_wrapper .col-md-6:eq(0)");
			});
		</script>

		<script>
			$(function() {
				// run on change for the selectbox
				$( "#frst_aid" ).change(function() {
					updateAiderDivs();
				});

				// handle the updating of the duration divs
				function updateAiderDivs() {
					// hide all form-duration-divs
					$('.frm-aider-div').hide();

					  // for Leave
					var aiderKey = $( "#frst_aid option:selected" ).val();
					$('#vid'+aiderKey).show();

				}

				// run at load, for the currently selected div to show up
				updateAiderDivs();

			});
			</script>


</body>

</html>
