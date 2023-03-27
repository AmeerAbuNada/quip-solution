<!DOCTYPE html>
<html lang="en">
<!--begin::Head-->

<head>
    <base href="">
    <title>Admin Login</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    @include('dashboard.components.css')
</head>
<!--end::Head-->
<!--begin::Body-->

<body id="kt_body" class="bg-body">
    <!--begin::Main-->
    <!--begin::Root-->
    <div class="d-flex flex-column flex-root">
        <!--begin::Authentication - Sign-in -->
        <div
            class="d-flex flex-column flex-column-fluid bgi-position-y-bottom position-x-center bgi-no-repeat bgi-size-contain bgi-attachment-fixed">
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
                    <form class="form w-100" onsubmit="event.preventDefault(); login();" novalidate="novalidate"
                        id="kt_sign_in_form" action="#">
                        <!--begin::Heading-->
                        <div class="text-center mb-10">
                            <!--begin::Title-->
                            <h1 class="text-dark mb-3">Sign In</h1>
                            <!--end::Title-->
                        </div>
                        <!--begin::Heading-->
                        <!--begin::Input group-->
                        <div class="fv-row mb-10">
                            <!--begin::Label-->
                            <label class="form-label fs-6 fw-bolder text-dark">Email</label>
                            <!--end::Label-->
                            <!--begin::Input-->
                            <input class="form-control form-control-lg form-control-solid" id="email" type="text"
                                name="email" placeholder="example@domain.com" autocomplete="off" />
                            <!--end::Input-->
                        </div>
                        <!--end::Input group-->
                        <!--begin::Input group-->
                        <div class="fv-row mb-10">
                            <!--begin::Wrapper-->
                            <div class="d-flex flex-stack mb-2">
                                <!--begin::Label-->
                                <label class="form-label fw-bolder text-dark fs-6 mb-0">Password</label>
                                <!--end::Label-->
                                <!--begin::Link-->
                                <a href="{{route('password.email')}}"
                                    class="link-primary fs-6 fw-bolder">Forgot Password ?</a>
                                <!--end::Link-->
                            </div>
                            <!--end::Wrapper-->
                            <!--begin::Input-->
                            <input class="form-control form-control-lg form-control-solid" id="password"
                                type="password" name="password" autocomplete="off" />
                            <!--end::Input-->
                        </div>
                        <!--end::Input group-->
                        <!--begin::Actions-->
                        <div class="text-center">
                            <!--begin::Submit button-->
                            <button id="btn-submit" type="submit" class="btn btn-lg btn-primary w-100 mb-5">
                                <span class="indicator-label" id="btn-label">Login</span>
                                <span class="indicator-progress" id="btn-loader">
                                    <span class="spinner-border spinner-border-sm align-middle ms-2"></span>
                                </span>
                            </button>
                            <!--end::Submit button-->
                        </div>
                        <!--end::Actions-->
                    </form>
                    <!--end::Form-->
                </div>
                <!--end::Wrapper-->
            </div>
            <!--end::Content-->
        </div>
        <!--end::Authentication - Sign-in-->
    </div>
    <!--end::Root-->
    <!--end::Main-->
    <!--begin::Javascript-->
    @include('dashboard.components.js')
    <script>
        const btn = document.getElementById('btn-submit');
        const btnContent = document.getElementById('btn-label');
        const btnLoader = document.getElementById('btn-loader');

        function login() {
            let url = '{{ route('login') }}';
            let data = {
                email: document.getElementById('email').value,
                password: document.getElementById('password').value
            }

            btn.disabled = true;
            btnContent.innerHTML = '';
            btnLoader.style.display = 'block';

            axios.post(url, data).then((response) => {
                btn.setAttribute('class', 'btn btn-lg btn-success w-100 mb-5')
                btnContent.innerHTML = response.data.message;
                btnLoader.style.display = 'none';
                Toast.fire({
                    icon: "success",
                    title: response.data.message,
                });
                setTimeout(() => {
                    window.location.href = '{{route('dashboard.index')}}'
                }, 1000);
            }).catch((error) => {
                Toast.fire({
                    icon: "error",
                    title: error.response.data.message,
                });
                btn.disabled = false;
                btnContent.innerHTML = error.response.data.message;
                btn.setAttribute('class', 'btn btn-lg btn-danger w-100 mb-5')
                btnLoader.style.display = 'none';
                setTimeout(() => {
                    btnContent.innerHTML = 'Login';
                btn.setAttribute('class', 'btn btn-lg btn-primary w-100 mb-5')
                }, 3000)
            })
        }
    </script>
    <!--end::Javascript-->
</body>
<!--end::Body-->

</html>
