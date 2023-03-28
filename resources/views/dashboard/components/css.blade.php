<link rel="canonical" href="https://preview.keenthemes.com/metronic8" />
<link rel="shortcut icon" href="{{ asset('dashboard-assets/media/logos/favicon.ico') }}" />
<!--begin::Fonts-->
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" />
<!--end::Fonts-->

@if (app()->isLocale('en'))
    <link href="{{ asset('dashboard-assets/plugins/custom/datatables/datatables.bundle.css') }}" rel="stylesheet"
        type="text/css">

    <!--begin::Global Stylesheets Bundle(used by all pages)-->
    <link href="{{ asset('dashboard-assets/plugins/global/plugins.bundle.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('dashboard-assets/css/style.bundle.css') }}" rel="stylesheet" type="text/css" />
    <!--end::Global Stylesheets Bundle-->
@else
    <link href="{{ asset('dashboard-assets/plugins/custom/datatables/datatables.bundle.rtl.css') }}" rel="stylesheet"
        type="text/css">

    <!--begin::Global Stylesheets Bundle(used by all pages)-->
    <link href="{{ asset('dashboard-assets/plugins/global/plugins.bundle.rtl.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('dashboard-assets/css/style.bundle.rtl.css') }}" rel="stylesheet" type="text/css" />
    <!--end::Global Stylesheets Bundle-->
@endif

<style>
    .tox-notification--warning {
        display: none !important;
        visibility: hidden !important;
    }
</style>
