<!DOCTYPE html>
<html lang="en">
	<!--begin::Head-->
	<head><base href="../../../">
		<title>Forgot Password</title>
		<meta charset="utf-8" />
		@include('dashboard.components.css')
	</head>
	<!--end::Head-->
	<!--begin::Body-->
	<body id="kt_body" class="bg-body">
		<!--begin::Main-->
		<!--begin::Root-->
		<div class="d-flex flex-column flex-root">
			<!--begin::Authentication - Password reset -->
			<div class="d-flex flex-column flex-column-fluid bgi-position-y-bottom position-x-center bgi-no-repeat bgi-size-contain bgi-attachment-fixed">
				<!--begin::Content-->
				<div class="d-flex flex-center flex-column flex-column-fluid p-10 pb-lg-20">
					<!--begin::Logo-->
					<a href="/" class="mb-12">
						<img alt="Logo" src="{{ asset('dashboard-assets/imgs/logo1.png') }}"/>
					</a>
					<!--end::Logo-->
					<!--begin::Wrapper-->
					<div class="w-lg-500px bg-body rounded shadow-sm p-10 p-lg-15 mx-auto">
						<!--begin::Form-->
						<form class="form w-100" onsubmit="event.preventDefault(); forgotPassword();" novalidate="novalidate" id="kt_password_reset_form">
							<!--begin::Heading-->
							<div class="text-center mb-10">
								<!--begin::Title-->
								<h1 class="text-dark mb-3">Forgot Password ?</h1>
								<!--end::Title-->
								<!--begin::Link-->
								<div class="text-gray-400 fw-bold fs-4">Enter your email to reset your password.</div>
								<!--end::Link-->
							</div>
							<!--begin::Heading-->
							<!--begin::Input group-->
							<div class="fv-row mb-10">
								<label class="form-label fw-bolder text-gray-900 fs-6">Email</label>
								<input class="form-control form-control-solid" id="email" type="email" placeholder="example@domain.com" name="email" autocomplete="off" />
							</div>
							<!--end::Input group-->
							<!--begin::Actions-->
							<div class="d-flex flex-wrap justify-content-center pb-lg-0">
								<button type="submit" id="kt_password_reset_submit" class="btn btn-lg btn-primary fw-bolder me-4">
									<span class="indicator-label">Submit</span>
									<span class="indicator-progress">Please wait...
									<span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
								</button>
								<a href="{{route('login')}}" class="btn btn-lg btn-light-primary fw-bolder">Cancel</a>
							</div>
							<!--end::Actions-->
						</form>
						<!--end::Form-->
					</div>
					<!--end::Wrapper-->
				</div>
				<!--end::Content-->
			</div>
			<!--end::Authentication - Password reset-->
		</div>
		<!--end::Root-->
		<!--end::Main-->
		<!--begin::Javascript-->
		@include('dashboard.components.js')
		<!--end::Javascript-->
    <script>
      function forgotPassword() {
        let data = {
          email: document.getElementById('email').value
        }
        let url = '{{route('password.email')}}'

        post(url, data, 'kt_password_reset_submit', undefined, 'kt_password_reset_form')
      }
    </script>
	</body>
	<!--end::Body-->
</html>