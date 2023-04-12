<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}" dir="{{ app()->isLocale('en') ? 'ltr' : 'rtl' }}">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quip Solution</title>
    <link rel="shortcut icon" href="{{ asset('landing-assets/images/logo/logo.png') }}">
    <link rel="stylesheet" href="{{ asset('landing-assets/lib/font-awesome/css/all.css') }}">
    <link rel="stylesheet" href="{{ asset('landing-assets/lib/swiper/swiper-bundle.min.css') }}">
    <link rel="stylesheet" href="{{ asset('landing-assets/lib/animate/aos.css') }}">

    @if (app()->isLocale('en'))
        <link rel="stylesheet" href="{{ asset('landing-assets/lib/bootstrap/css/bootstrap.min.css') }}">
    @else
        <link rel="stylesheet" href="{{ asset('landing-assets/lib/bootstrap/css/bootstrap.rtl.min.css') }}">
    @endif

    <link rel="stylesheet" href="{{ asset('landing-assets/css/index.css') }}">
    @if (app()->isLocale('ar'))
        <link rel="stylesheet" href="{{ asset('landing-assets/css/indexAr.css') }}">
    @endif
</head>

<body>
    <header>
        <nav class="navbar navbar-expand-lg shadow-sm pb-3">
            <div class="container-fluid col-xl-11 pt-3">
                <a class="navbar-brand" href="{{ route('landing.index') }}">
                    <img src="{{ asset('landing-assets/images/logo/logo-l.png') }}" class="img-fluid">
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse justify-content-end" id="navbarNavDropdown">
                    <ul class="navbar-nav align-items-center">
                        <li class="nav-item">
                            <a class="nav-link " href="{{ route('landing.index') }}"> {{ __('home') }} </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" href="{{ route('landing.acw') }}"> {{ __('why_acw') }} </a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                                aria-expanded="false">
                                {{ __('products') }}
                            </a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item"
                                        href="{{ route('landing.products') }}">{{ __('all_products') }}</a></li>
                                @foreach ($categories as $category)
                                    <li><a class="dropdown-item"
                                            href="{{ route('landing.products', ['category' => $category->id]) }}">{{ $category['name_' . app()->getLocale()] }}</a>
                                    </li>
                                @endforeach
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('landing.maintenance') }}">{{ __('maintenance') }}</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('landing.contact') }}">{{ __('contact_us') }}</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link nav-icon-s"
                                href="{{ route('landing.locale', app()->isLocale('en') ? 'ar' : 'en') }}">
                                <svg width="20" height="18" viewBox="0 0 20 18" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M18.1818 2.45455H9.09091L8.18182 0H1.81818C0.818182 0 0 0.736364 0 1.63636V13.9091C0 14.8091 0.818182 15.5455 1.81818 15.5455H9.09091L10 18H18.1818C19.1818 18 20 17.2636 20 16.3636V4.09091C20 3.19091 19.1818 2.45455 18.1818 2.45455ZM5.45455 12.2727C2.94545 12.2727 0.909091 10.44 0.909091 8.18182C0.909091 5.92364 2.94545 4.09091 5.45455 4.09091C6.68182 4.09091 7.70909 4.5 8.5 5.15455L7.3 6.19364C6.95455 5.89909 6.35455 5.55545 5.45455 5.55545C3.87273 5.55545 2.59091 6.73364 2.59091 8.18182C2.59091 9.63 3.87273 10.8082 5.45455 10.8082C7.28182 10.8082 8.03636 9.63 8.10909 8.83636H5.45455V7.43727H9.70909C9.77273 7.69091 9.81818 7.93636 9.81818 8.27182C9.81818 10.6118 8.08182 12.2727 5.45455 12.2727ZM11.0636 7.83818H14.4273C14.0364 8.86091 13.4182 9.82636 12.5636 10.6773C12.2818 10.3909 12.0182 10.0882 11.7818 9.77727L11.0636 7.83818ZM18.6364 15.9545C18.6364 16.4045 18.2273 16.7727 17.7273 16.7727H11.8182L13.6364 14.7273L12.6909 12.1909L15.5091 14.7273L16.3455 13.9745L13.3455 11.3155L13.3636 11.2991C14.3909 10.2764 15.1182 9.09818 15.5455 7.84636H17.2727V6.78273H13.1545V5.72727H11.9818V6.78273H10.6727L9.50909 3.68182H17.7273C18.2273 3.68182 18.6364 4.05 18.6364 4.5V15.9545Z"
                                        fill="white" />
                                </svg>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>


    <section class="page-padding-top">
        <div class="container col-11">
            <div class="row justify-content-center">
                <h2 class="title-page text-center p-0" data-aos="zoom-out-up" data-aos-duration="2000">
                    {{ __('why') }} <span class="automatic_acw"> {{ __('automatic_car_wash') }} </span> </h2>

                @foreach ($features as $feature)
                    @if ($loop->odd)
                        <div class=" d-flex flex-column flex-lg-row dall-automatic rounded-3 align-items-center"
                            data-aos="zoom-in-up" data-aos-easing="ease-in-sine">
                            <div class="automatic-div position-relative">
                                <span
                                    class="projects-number position-absolute translate-middle">{{ $loop->iteration < 10 ? '0' . $loop->iteration : $loop->iteration }}</span>
                                <h4 class="tit-Feature">{{ $feature['title_' . app()->getLocale()] }}</h4>
                            </div>
                            <div class="text-p-automatic">
                                {!! $feature['description_' . app()->getLocale()] !!}
                            </div>
                        </div>
                    @else
                        <div class=" d-flex flex-column-reverse flex-lg-row dall-automatic dall-automatic-right rounded-3 align-items-center"
                            data-aos="zoom-in-up" data-aos-easing="ease-in-sine">
                            <div class="text-p-automatic">
                                {!! $feature['description_' . app()->getLocale()] !!}
                            </div>
                            <div class="automatic-div position-relative">
                                <span
                                    class="projects-number position-absolute translate-middle">{{ $loop->iteration < 10 ? '0' . $loop->iteration : $loop->iteration }}</span>
                                <h4 class="tit-Feature">{{ $feature['title_' . app()->getLocale()] }}</h4>
                            </div>
                        </div>
                    @endif
                @endforeach
            </div>
        </div>
    </section>


    <section class="page-padding-top">
        <div class="container-fluid col-11">
            <div class="row justify-content-center align-items-center">
                <h2 class="title-page mb-lg-0 pb-0 text-center" data-aos="fade-up" data-aos-duration="1000">{{__('why')}} <span
                        class="Autoequip"> {{__('autoequip')}} </span> </h2>
                <div class="col-12 col-lg-7 ul-Autoequip" data-aos="fade-up" data-aos-easing="linear" data-aos-duration="1500">
                    {!! $siteSettings['autoequip_'.app()->getLocale()]->value !!}
                </div>
                <div class="col-12 col-lg-5" data-aos="flip-left" data-aos-easing="ease-out-cubic"
                    data-aos-duration="2000">
                    <img src="{{ asset('landing-assets/images/unico-highlights-1536x1536.png') }}" class="img-fluid">
                </div>
            </div>
        </div>
    </section>


    <footer class="bg-imgfooter page-f">
        <div class="container-fluid h-100 col-11 col-xxl-9">
            <div class="row justify-content-between align-items-center h-100 pb-4">
                <div class="col-12 col-lg-3 text-center">
                    <a class="" href="{{ route('landing.index') }}">
                        <img src="{{ asset('landing-assets/images/logo/230.png') }}" class="img-fluid"
                            width="235">
                    </a>
                </div>
                <div class="col-12 col-md-6  Gettouch">
                    <h2>Get in touch</h3>
                        <p><a href="mailto:{{ $siteSettings['email']->value }}">{{ __('email') }}:
                          {{ $siteSettings['email']->value }}</a></p>
                        <p><a href="tel:{{ $siteSettings['phone_number']->value }}">{{ __('phone_number') }}:
                          {{ $siteSettings['phone_number']->value }}</a></p>
                        <p>
                            <a href="#">{{ __('location') }}:
                              {{ $siteSettings['location_' . app()->getLocale()]->value }}
                                <span class="fa-rotate-180">
                                    <svg width="28" height="20" viewBox="0 0 28 20" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M14.9231 1.65722L26 9.65185L14.9231 17.6465M24.4615 9.65185L2 9.65185Z"
                                            fill="#EE5A4B" />
                                        <path d="M14.9231 1.65722L26 9.65185L14.9231 17.6465M24.4615 9.65185L2 9.65185"
                                            stroke="white" stroke-width="3" stroke-linecap="round"
                                            stroke-linejoin="round" />
                                    </svg>
                                </span>
                            </a>
                        </p>
                </div>
                <div class="d-flex flex-column flex-lg-row align-items-center justify-content-between pt-5 mt-5 ">
                    <div>
                        <p class="copyright">All rights reserved. copyright © {{ now()->year + 1 }}</p>
                    </div>
                    <div class="d-flex align-items-center">
                        <i class="fa-brands fa-facebook text-white fs-4"></i>
                        <i class="fa-brands fa-whatsapp text-white fs-4 px-3"></i>
                        <svg width="24" height="19" viewBox="0 0 24 19" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M1.63636 18.828H5.45454V9.13126L0 4.85327V17.1169C0 18.0637 0.733636 18.828 1.63636 18.828Z"
                                fill="#F4F4F4" />
                            <path
                                d="M18.5454 18.828H22.3636C23.269 18.828 24 18.0609 24 17.1169V4.85327L18.5454 9.13126"
                                fill="#F4F4F4" />
                            <path
                                d="M18.5454 1.71605V9.13124L24 4.85325V2.57165C24 0.45547 21.69 -0.750924 20.0727 0.518213"
                                fill="#F4F4F4" />
                            <path d="M5.45459 9.13125V1.71606L12 6.84966L18.5455 1.71606V9.13125L12 14.2648"
                                fill="#F4F4F4" />
                            <path
                                d="M0 2.57165V4.85325L5.45454 9.13124V1.71605L3.92727 0.518213C2.30727 -0.750924 0 0.45547 0 2.57165Z"
                                fill="#F4F4F4" />
                        </svg>
                    </div>
                </div>
            </div>
        </div>
    </footer>

    <script src="{{ asset('landing-assets/lib/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('landing-assets/lib/swiper/swiper-bundle.min.js') }}"></script>
    <script src="{{ asset('landing-assets/lib/animate/aso.js') }}"></script>
    <script src="{{ asset('landing-assets/js/animet.js') }}"></script>
</body>

</html>
