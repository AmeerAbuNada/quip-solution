<!DOCTYPE html>
<html lang="en">
	<!--begin::Head-->
	<head><base href="../../">
		<title>Error | Not Found (404)</title>
		<meta charset="utf-8" />
		@include('dashboard.components.css')
	</head>
	<!--end::Head-->
	<!--begin::Body-->
	<body id="kt_body" class="auth-bg">
		<!--begin::Main-->
		<!--begin::Root-->
		<div class="d-flex flex-column flex-root">
			<!--begin::Authentication - 404 Page-->
			<div class="d-flex flex-column flex-center flex-column-fluid p-10">
				<!--begin::Illustration-->
				<img src="{{asset('dashboard-assets/imgs/logo2.png')}}" alt="" class="mw-100 mb-10 h-lg-200px" />
				<!--end::Illustration-->
				<!--begin::Message-->
				<h1 class="fw-bold mb-10" style="color: #A3A3C7">Page Not Found | 404</h1>
				<!--end::Message-->
				<!--begin::Link-->
				<div class="row">
					<div class="col-6">
						<a href="/" class="btn btn-primary">Home</a>
					</div>
					<div class="col-6">
						<a href="{{url()->previous()}}" class="btn btn-primary">Back</a>
					</div>
				</div>
				<!--end::Link-->
			</div>
			<!--end::Authentication - 404 Page-->
		</div>
		<!--end::Root-->
		<!--end::Main-->
		<!--begin::Javascript-->
		@include('dashboard.components.js')
		<!--end::Javascript-->
	</body>
	<!--end::Body-->
</html>