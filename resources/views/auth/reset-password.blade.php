<!DOCTYPE html>
<html lang="en">
	<!--begin::Head-->
	<head><base href="../../../">
		<title>Reset Password</title>
		<meta charset="utf-8" />
		@include('dashboard.components.css')
	</head>
	<!--end::Head-->
	<!--begin::Body-->
	<body id="kt_body" class="bg-body">
		<!--begin::Main-->
		<!--begin::Root-->
		<div class="d-flex flex-column flex-root">
			<!--begin::Authentication - New password -->
			<div class="d-flex flex-column flex-column-fluid bgi-position-y-bottom position-x-center bgi-no-repeat bgi-size-contain bgi-attachment-fixed" style="background-image: url(assets/media/illustrations/sketchy-1/14.png">
				<!--begin::Content-->
				<div class="d-flex flex-center flex-column flex-column-fluid p-10 pb-lg-20">
					<!--begin::Logo-->
					<a href="#" class="mb-12">
						<img alt="Logo" src="{{ asset('dashboard-assets/imgs/logo1.png') }}"/>
					</a>
					<!--end::Logo-->
					<!--begin::Wrapper-->
					<div class="w-lg-550px bg-body rounded shadow-sm p-10 p-lg-15 mx-auto">
						<!--begin::Form-->
						<form class="form w-100" onsubmit="event.preventDefault(); resetPassword();" novalidate="novalidate" id="kt_new_password_form">
							<!--begin::Heading-->
							<div class="text-center mb-10">
								<!--begin::Title-->
								<h1 class="text-dark mb-3">Setup New Password</h1>
								<!--end::Title-->
								<!--begin::Link-->
								<div class="text-gray-400 fw-bold fs-4">Already have reset your password ?
								<a href="{{route('login')}}" class="link-primary fw-bolder">Sign in here</a></div>
								<!--end::Link-->
							</div>
							<!--begin::Heading-->
              <!--begin::Input group=-->
							<div class="fv-row mb-10">
								<label class="form-label fw-bolder text-dark fs-6">Email Address</label>
								<input class="form-control form-control-lg form-control-solid" id="email" type="email" placeholder="example@domain.com" autocomplete="off" value="{{request()->email}}"/>
							</div>
							<!--end::Input group=-->
							<!--begin::Input group-->
							<div class="mb-10 fv-row" data-kt-password-meter="true">
								<!--begin::Wrapper-->
								<div class="mb-1">
									<!--begin::Label-->
									<label class="form-label fw-bolder text-dark fs-6">Password</label>
									<!--end::Label-->
									<!--begin::Input wrapper-->
									<div class="position-relative mb-3">
										<input class="form-control form-control-lg form-control-solid" id="password" type="password" placeholder="" name="password" autocomplete="off" />
										<span class="btn btn-sm btn-icon position-absolute translate-middle top-50 end-0 me-n2" data-kt-password-meter-control="visibility">
											<i class="bi bi-eye-slash fs-2"></i>
											<i class="bi bi-eye fs-2 d-none"></i>
										</span>
									</div>
									<!--end::Input wrapper-->
									<!--begin::Meter-->
									<div class="d-flex align-items-center mb-3" data-kt-password-meter-control="highlight">
										<div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px me-2"></div>
										<div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px me-2"></div>
										<div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px me-2"></div>
										<div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px"></div>
									</div>
									<!--end::Meter-->
								</div>
								<!--end::Wrapper-->
								<!--begin::Hint-->
								<div class="text-muted">Use 8 or more characters.</div>
								<!--end::Hint-->
							</div>
							<!--end::Input group=-->
							<!--begin::Input group=-->
							<div class="fv-row mb-10">
								<label class="form-label fw-bolder text-dark fs-6">Confirm Password</label>
								<input class="form-control form-control-lg form-control-solid" id="password-confirmation" type="password" placeholder="" name="confirm-password" autocomplete="off" />
							</div>
							<!--end::Input group=-->
							<!--begin::Action-->
							<div class="text-center">
								<button type="submit" id="kt_new_password_submit" class="btn btn-lg btn-primary fw-bolder">
									<span class="indicator-label">Submit</span>
									<span class="indicator-progress">Please wait...
									<span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
								</button>
							</div>
							<!--end::Action-->
						</form>
						<!--end::Form-->
					</div>
					<!--end::Wrapper-->
				</div>
				<!--end::Content-->
			</div>
			<!--end::Authentication - New password-->
		</div>
		<!--end::Root-->
		<!--end::Main-->
		<!--begin::Javascript-->
		@include('dashboard.components.js')

    <script>
      function resetPassword() {
        let data = {
          token: '{{$token}}',
          email: document.getElementById('email').value,
          password: document.getElementById('password').value,
          password_confirmation: document.getElementById('password-confirmation').value
        }
        let url = '{{route('password.update')}}';

        post(url, data, 'kt_new_password_submit', '{{route('login')}}', 'kt_new_password_form');
      }
    </script>
		<!--end::Javascript-->
	</body>
	<!--end::Body-->
</html>