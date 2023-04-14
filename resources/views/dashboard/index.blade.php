@extends('dashboard.parent')

@section('title', 'Home')

@section('styles')
@endsection

@section('content')
    <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
        <!--begin::Post-->
        <div class="post d-flex flex-column-fluid" id="kt_post">
            <!--begin::Container-->
            <div id="kt_content_container" class="container-xxl" style="max-width: 1800px">
                <!--begin::Row-->
                <div class="row g-5 g-xl-10 mb-xl-10">
                    <div class="col-md-6 col-lg-6 col-xl-6 col-xxl-3 mb-md-5 mb-xl-10">
                        <!--begin::Card widget 4-->
                        <div class="card card-flush h-md-50 mb-5 mb-xl-10">
                            <!--begin::Header-->
                            <div class="card-header pt-5">
                                <!--begin::Title-->
                                <div class="card-title d-flex flex-column">
                                    <!--begin::Info-->
                                    <div class="d-flex align-items-center">
                                        <!--begin::Amount-->
                                        <span class="fs-2hx fw-bolder text-dark me-2 lh-1">{{ count($projects) }}</span>
                                        <!--end::Amount-->
                                    </div>
                                    <!--end::Info-->
                                    <!--begin::Subtitle-->
                                    <span class="text-gray-400 pt-1 fw-bold fs-2">{{ __('dashboard.projects') }}</span>
                                    <!--end::Subtitle-->
                                </div>
                                <!--end::Title-->
                            </div>
                            <!--end::Header-->
                            <!--begin::Card body-->
                            <div class="card-body pt-2 pb-4 d-flex align-items-center">
                                <!--begin::Chart-->
                                <div class="d-flex flex-center me-5 me-xxl-7 pt-2">
                                    <div id="projects-chart" style="min-width: 70px; min-height: 70px" data-kt-size="70"
                                        data-kt-line="11"></div>
                                </div>
                                <!--end::Chart-->
                                <!--begin::Labels-->
                                <div class="d-flex flex-column content-justify-center">
                                    <!--begin::Label-->
                                    <div class="d-flex fs-6 fw-bold align-items-center">
                                        <!--begin::Bullet-->
                                        <div class="bullet w-8px h-6px rounded-2 bg-success me-3"></div>
                                        <!--end::Bullet-->
                                        <!--begin::Label-->
                                        <div class="text-gray-500 pe-1">{{ __('dashboard.active') }}</div>
                                        <!--end::Label-->
                                        <!--begin::Stats-->
                                        <div class="ms-auto fw-boldest text-gray-700 min-w-70px text-end">
                                            {{ count($projects->where('is_active', true)) }}</div>
                                        <!--end::Stats-->
                                    </div>
                                    <!--end::Label-->
                                    <!--begin::Label-->
                                    <div class="d-flex fs-6 fw-bold align-items-center my-3">
                                        <!--begin::Bullet-->
                                        <div class="bullet w-8px h-6px rounded-2 bg-danger me-3"></div>
                                        <!--end::Bullet-->
                                        <!--begin::Label-->
                                        <div class="text-gray-500 pe-1">{{ __('dashboard.inactive') }}</div>
                                        <!--end::Label-->
                                        <!--begin::Stats-->
                                        <div class="ms-auto fw-boldest text-gray-700 min-w-70px text-end">
                                            {{ count($projects->where('is_active', false)) }}</div>
                                        <!--end::Stats-->
                                    </div>
                                    <!--end::Label-->
                                </div>
                                <!--end::Labels-->
                            </div>
                            <!--end::Card body-->
                        </div>
                        <!--end::Card widget 4-->
                        <!--begin::Card widget 5-->
                        <div class="card card-flush h-md-50 mb-5 mb-xl-10">
                            <!--begin::Header-->
                            <div class="card-header pt-5">
                                <!--begin::Title-->
                                <div class="card-title d-flex flex-column">
                                    <!--begin::Info-->
                                    <div class="d-flex align-items-center">
                                        <!--begin::Amount-->
                                        <span class="fs-2hx fw-bolder text-dark me-2 lh-1">{{ count($features) }}</span>
                                        <!--end::Amount-->
                                    </div>
                                    <!--end::Info-->
                                    <!--begin::Subtitle-->
                                    <span class="text-gray-400 pt-1 fw-bold fs-2">{{ __('dashboard.features') }}</span>
                                    <!--end::Subtitle-->
                                </div>
                                <!--end::Title-->
                            </div>
                            <!--end::Header-->
                            <!--begin::Card body-->
                            <div class="card-body pt-2 pb-4 d-flex align-items-center">
                                <!--begin::Chart-->
                                <div class="d-flex flex-center me-5 me-xxl-7 pt-2">
                                    <div id="features-chart" style="min-width: 70px; min-height: 70px" data-kt-size="70"
                                        data-kt-line="11"></div>
                                </div>
                                <!--end::Chart-->
                                <!--begin::Labels-->
                                <div class="d-flex flex-column content-justify-center">
                                    <!--begin::Label-->
                                    <div class="d-flex fs-6 fw-bold align-items-center">
                                        <!--begin::Bullet-->
                                        <div class="bullet w-8px h-6px rounded-2 bg-success me-3"></div>
                                        <!--end::Bullet-->
                                        <!--begin::Label-->
                                        <div class="text-gray-500 pe-1">{{ __('dashboard.active') }}</div>
                                        <!--end::Label-->
                                        <!--begin::Stats-->
                                        <div class="ms-auto fw-boldest text-gray-700 min-w-70px text-end">
                                            {{ count($features->where('is_active', true)) }}</div>
                                        <!--end::Stats-->
                                    </div>
                                    <!--end::Label-->
                                    <!--begin::Label-->
                                    <div class="d-flex fs-6 fw-bold align-items-center my-3">
                                        <!--begin::Bullet-->
                                        <div class="bullet w-8px h-6px rounded-2 bg-danger me-3"></div>
                                        <!--end::Bullet-->
                                        <!--begin::Label-->
                                        <div class="text-gray-500 pe-1">{{ __('dashboard.inactive') }}</div>
                                        <!--end::Label-->
                                        <!--begin::Stats-->
                                        <div class="ms-auto fw-boldest text-gray-700 min-w-70px text-end">
                                            {{ count($features->where('is_active', false)) }}</div>
                                        <!--end::Stats-->
                                    </div>
                                    <!--end::Label-->
                                </div>
                                <!--end::Labels-->
                            </div>
                            <!--end::Card body-->
                        </div>
                        <!--end::Card widget 5-->
                    </div>
                    <div class="col-md-6 col-lg-6 col-xl-6 col-xxl-3 mb-md-5 mb-xl-10">
                        <!--begin::Card widget 4-->
                        <div class="card card-flush h-md-50 mb-5 mb-xl-10">
                            <!--begin::Header-->
                            <div class="card-header pt-5">
                                <!--begin::Title-->
                                <div class="card-title d-flex flex-column">
                                    <!--begin::Info-->
                                    <div class="d-flex align-items-center">
                                        <!--begin::Amount-->
                                        <span class="fs-2hx fw-bolder text-dark me-2 lh-1">{{ count($products) }}</span>
                                        <!--end::Amount-->
                                    </div>
                                    <!--end::Info-->
                                    <!--begin::Subtitle-->
                                    <span class="text-gray-400 pt-1 fw-bold fs-2">{{ __('dashboard.products') }}</span>
                                    <!--end::Subtitle-->
                                </div>
                                <!--end::Title-->
                            </div>
                            <!--end::Header-->
                            <!--begin::Card body-->
                            <div class="card-body pt-2 pb-4 d-flex align-items-center">
                                <!--begin::Chart-->
                                <div class="d-flex flex-center me-5 me-xxl-7 pt-2">
                                    <div id="products-chart" style="min-width: 70px; min-height: 70px" data-kt-size="70"
                                        data-kt-line="11"></div>
                                </div>
                                <!--end::Chart-->
                                <!--begin::Labels-->
                                <div class="d-flex flex-column content-justify-center">
                                    <!--begin::Label-->
                                    <div class="d-flex fs-6 fw-bold align-items-center my-3">
                                        <!--begin::Bullet-->
                                        <div class="bullet w-8px h-6px rounded-2 bg-primary me-3"></div>
                                        <!--end::Bullet-->
                                        <!--begin::Label-->
                                        <div class="text-gray-500 pe-1">{{ __('dashboard.best_selling') }}</div>
                                        <!--end::Label-->
                                        <!--begin::Stats-->
                                        <div class="ms-auto fw-boldest text-gray-700 min-w-70px text-end">
                                            {{ count($products->where('is_best_selling', true)) }}</div>
                                        <!--end::Stats-->
                                    </div>
                                    <!--end::Label-->
                                    <!--begin::Label-->
                                    <div class="d-flex fs-6 fw-bold align-items-center">
                                        <!--begin::Bullet-->
                                        <div class="bullet w-8px h-6px rounded-2 bg-success me-3"></div>
                                        <!--end::Bullet-->
                                        <!--begin::Label-->
                                        <div class="text-gray-500 pe-1">{{ __('dashboard.active') }}</div>
                                        <!--end::Label-->
                                        <!--begin::Stats-->
                                        <div class="ms-auto fw-boldest text-gray-700 min-w-70px text-end">
                                            {{ count($products->where('is_active', true)) }}</div>
                                        <!--end::Stats-->
                                    </div>
                                    <!--end::Label-->
                                    <!--begin::Label-->
                                    <div class="d-flex fs-6 fw-bold align-items-center my-3">
                                        <!--begin::Bullet-->
                                        <div class="bullet w-8px h-6px rounded-2 bg-danger me-3"></div>
                                        <!--end::Bullet-->
                                        <!--begin::Label-->
                                        <div class="text-gray-500 pe-1">{{ __('dashboard.inactive') }}</div>
                                        <!--end::Label-->
                                        <!--begin::Stats-->
                                        <div class="ms-auto fw-boldest text-gray-700 min-w-70px text-end">
                                            {{ count($products->where('is_active', false)) }}</div>
                                        <!--end::Stats-->
                                    </div>
                                    <!--end::Label-->

                                </div>
                                <!--end::Labels-->
                            </div>
                            <!--end::Card body-->
                        </div>
                        <!--end::Card widget 4-->
                        <!--begin::Card widget 5-->
                        <div class="card card-flush h-md-50 mb-xl-10">
                            <!--begin::Header-->
                            <div class="card-header pt-5">
                                <!--begin::Title-->
                                <div class="card-title d-flex flex-column">
                                    <!--begin::Info-->
                                    <div class="d-flex align-items-center">
                                        <!--begin::Amount-->
                                        <span class="fs-2hx fw-bolder text-dark me-2 lh-1">{{ count($categories) }}</span>
                                        <!--end::Amount-->
                                    </div>
                                    <!--end::Info-->
                                    <!--begin::Subtitle-->
                                    <span class="text-gray-400 pt-1 fw-bold fs-2">{{ __('dashboard.categories') }}</span>
                                    <!--end::Subtitle-->
                                </div>
                                <!--end::Title-->
                            </div>
                            <!--end::Header-->
                            <!--begin::Card body-->
                            <div class="card-body d-flex align-items-end pt-0">
                                <!--begin::Progress-->
                                <div class="d-flex align-items-center flex-column mt-3 w-100">
                                    <div class="h-8px mx-3 w-100 bg-light-success rounded">
                                        <div class="bg-success rounded h-8px" role="progressbar" style="width: 100%;"
                                            aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </div>
                                <!--end::Progress-->
                            </div>
                            <!--end::Card body-->
                        </div>
                        <!--end::Card widget 5-->
                    </div>

                    <!--begin::Col-->
                    <div class="col-lg-12 col-xl-12 col-xxl-6 mb-5 mb-xl-0">
                        <!--begin::Chart widget 3-->
                        <div class="card card-flush overflow-hidden h-md-100">
                            <!--begin::Header-->
                            <div class="card-header py-5">
                                <!--begin::Title-->
                                <h3 class="card-title align-items-start flex-column">
                                    <span class="card-label fw-bolder text-dark">{{ __('dashboard.week_visits') }}</span>
                                </h3>
                                <!--end::Title-->
                            </div>
                            <!--end::Header-->
                            <!--begin::Card body-->
                            <div class="card-body d-flex justify-content-between flex-column pb-1 px-0">
                                <!--begin::Statistics-->
                                <div class="px-9 mb-5">
                                    <!--begin::Statistics-->
                                    <div class="d-flex mb-2">
                                        <span
                                            class="fs-2hx fw-bolder text-gray-800 me-2 lh-1">{{ $lastSevenDaysVisitsCount }}</span>
                                    </div>
                                    <!--end::Statistics-->
                                    <!--begin::Description-->
                                    <span class="fs-2 fw-bold text-gray-400">{{ $visitsCount }}
                                        {{ __('dashboard.total_visits') }}</span>
                                    <!--end::Description-->
                                </div>
                                <!--end::Statistics-->
                                <!--begin::Chart-->
                                <div id="visits-chart" dir="ltr" class="min-h-auto ps-4 pe-6" style="height: 300px"></div>
                                <!--end::Chart-->
                            </div>
                            <!--end::Card body-->
                        </div>
                        <!--end::Chart widget 3-->
                    </div>
                    <!--end::Col-->

                    <div class="col-xl-12 mb-5 mb-xl-10">
                        <!--begin::Chart widget 15-->
                        <div class="card card-flush h-xl-100">
                            <!--begin::Header-->
                            <div class="card-header pt-7">
                                <!--begin::Title-->
                                <h3 class="card-title align-items-start flex-column">
                                    <span class="card-label fw-bolder text-dark">{{ __('dashboard.most_visited') }}</span>
                                </h3>
                                <!--end::Title-->
                            </div>
                            <!--end::Header-->
                            <!--begin::Body-->
                            <div class="card-body pt-5">
                                <!--begin::Chart container-->
                                <div id="kt_charts_widget_15_chart" dir="ltr" class="w-100 h-400px"></div>
                                <!--end::Chart container-->
                            </div>
                            <!--end::Body-->
                        </div>
                        <!--end::Chart widget 15-->
                    </div>

                    <div class="col-xl-6 mb-5 mb-xl-10">
                        <div class="card card-flush h-xl-100">
                            <!--begin::Header-->
                            <div class="card-header pt-7">
                                <!--begin::Title-->
                                <h3 class="card-title align-items-start flex-column">
                                    <span class="card-label fw-bolder text-dark">{{ __('contacts.title') }}</span>
                                </h3>
                                <!--end::Title-->
                            </div>
                            <!--end::Header-->
                            <!--begin::Body-->
                            <div class="card-body pt-5">
                                <!--begin::Table-->
                                <table class="table align-middle table-row-dashed table-hover fs-6 gy-5"
                                    id="contact_table">
                                    <!--begin::Table head-->
                                    <thead>
                                        <!--begin::Table row-->
                                        <tr class="text-start text-muted fw-bolder fs-7 text-uppercase gs-0">
                                            <th>#</th>
                                            <th>{{ __('contacts.name') }}</th>
                                            <th>{{ __('contacts.email') }}</th>
                                            <th>{{ __('contacts.message') }}</th>
                                            <th>{{ __('contacts.status') }}</th>
                                            <th>{{ __('contacts.sent_at') }}</th>
                                            <th>{{ __('contacts.actions') }}</th>
                                        </tr>
                                        <!--end::Table row-->
                                    </thead>
                                    <!--end::Table head-->
                                    <!--begin::Table body-->
                                    <tbody class="text-gray-600 fw-bold">

                                    </tbody>
                                    <!--end::Table body-->
                                </table>
                                <!--end::Table-->
                            </div>
                            <!--end::Body-->
                        </div>
                    </div>
                    <div class="col-xl-6 mb-5 mb-xl-10">
                        <div class="card card-flush h-xl-100">
                            <!--begin::Header-->
                            <div class="card-header pt-7">
                                <!--begin::Title-->
                                <h3 class="card-title align-items-start flex-column">
                                    <span class="card-label fw-bolder text-dark">{{ __('maintenances.title') }}</span>
                                </h3>
                                <!--end::Title-->
                            </div>
                            <!--end::Header-->
                            <!--begin::Body-->
                            <div class="card-body pt-5">
                                <!--begin::Table-->
                                <table class="table align-middle table-row-dashed table-hover fs-6 gy-5"
                                    id="maintetance_table">
                                    <!--begin::Table head-->
                                    <thead>
                                        <!--begin::Table row-->
                                        <tr class="text-start text-muted fw-bolder fs-7 text-uppercase gs-0">
                                            <th>#</th>
                                            <th>{{ __('maintenances.email') }}</th>
                                            <th>{{ __('maintenances.phone_number') }}</th>
                                            <th>{{ __('maintenances.message') }}</th>
                                            <th>{{ __('maintenances.status') }}</th>
                                            <th>{{ __('maintenances.sent_at') }}</th>
                                            <th>{{ __('maintenances.actions') }}</th>
                                        </tr>
                                        <!--end::Table row-->
                                    </thead>
                                    <!--end::Table head-->
                                    <!--begin::Table body-->
                                    <tbody class="text-gray-600 fw-bold">

                                    </tbody>
                                    <!--end::Table body-->
                                </table>
                                <!--end::Table-->
                            </div>
                            <!--end::Body-->
                        </div>
                        <div class="modal fade" tabindex="-1" id="kt_modal_1">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">{{ __('maintenances.message') }}</h5>

                                        <!--begin::Close-->
                                        <div class="btn btn-icon btn-sm btn-active-light-primary ms-2"
                                            data-bs-dismiss="modal" aria-label="Close">
                                            <span class="svg-icon svg-icon-2x"></span>
                                        </div>
                                        <!--end::Close-->
                                    </div>

                                    <div class="modal-body">
                                        <p id="description-p"></p>
                                    </div>

                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-danger"
                                            data-bs-dismiss="modal">{{ __('close') }}</button>
                                        <button style="display: none" id="mark-btn" type="button"
                                            class="btn btn-success">{{ __('maintenances.mark-completed') }}</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--end::Row-->
            </div>
            <!--end::Container-->
        </div>
        <!--end::Post-->
    </div>
@endsection

@section('scripts')
    {{-- <script src="{{ asset('dashboard-assets/js/widgets.bundle.js') }}"></script> --}}
    <script src="{{ asset('dashboard-assets/plugins/custom/datatables/datatables.bundle.js') }}"></script>

    <script src="https://cdn.amcharts.com/lib/5/index.js"></script>
    <script src="https://cdn.amcharts.com/lib/5/map.js"></script>
    <script src="https://cdn.amcharts.com/lib/5/geodata/worldLow.js"></script>
    <script src="https://cdn.amcharts.com/lib/5/geodata/continentsLow.js"></script>
    <script src="https://cdn.amcharts.com/lib/5/geodata/usaLow.js"></script>
    <script src="https://cdn.amcharts.com/lib/5/geodata/worldTimeZonesLow.js"></script>
    <script src="https://cdn.amcharts.com/lib/5/geodata/worldTimeZoneAreasLow.js"></script>
    <script src="https://cdn.amcharts.com/lib/5/themes/Animated.js"></script>
    <script src="https://cdn.amcharts.com/lib/5/xy.js"></script>
    <script src="https://cdn.amcharts.com/lib/5/percent.js"></script>
    <script src="https://cdn.amcharts.com/lib/5/radar.js"></script>
    <script>
        var e = document.getElementById("projects-chart");
        if (e) {
            var t = {
                    size: e.getAttribute("data-kt-size") ?
                        parseInt(e.getAttribute("data-kt-size")) : 70,
                    lineWidth: e.getAttribute("data-kt-line") ?
                        parseInt(e.getAttribute("data-kt-line")) : 11,
                    rotate: e.getAttribute("data-kt-rotate") ?
                        parseInt(e.getAttribute("data-kt-rotate")) : 145,
                },
                a = document.createElement("canvas"),
                r = document.createElement("span");
            "undefined" != typeof G_vmlCanvasManager &&
                G_vmlCanvasManager.initElement(a);
            var o = a.getContext("2d");
            (a.width = a.height = t.size),
            e.appendChild(r),
                e.appendChild(a),
                o.translate(t.size / 2, t.size / 2),
                o.rotate((t.rotate / 180 - 0.5) * Math.PI);
            var i = (t.size - t.lineWidth) / 2,
                s = function(e, t, a) {
                    (a = Math.min(Math.max(0, a || 1), 1)),
                    o.beginPath(),
                        o.arc(0, 0, i, 0, 2 * Math.PI * a, !1),
                        (o.strokeStyle = e),
                        (o.lineCap = "round"),
                        (o.lineWidth = t),
                        o.stroke();
                };
            s("#E44", t.lineWidth, 1),
                s(
                    KTUtil.getCssVariableValue("--bs-success"),
                    t.lineWidth,
                    @php
                        if (count($projects) > 0) {
                            $avgProjects = count($projects->where('is_active', true)) / count($projects);
                        } else {
                            $avgProjects = 0;
                        }
                    @endphp {{ $avgProjects == 0 ? 0.00001 : $avgProjects }}
                );
        }

        var e = document.getElementById("features-chart");
        if (e) {
            var t = {
                    size: e.getAttribute("data-kt-size") ?
                        parseInt(e.getAttribute("data-kt-size")) : 70,
                    lineWidth: e.getAttribute("data-kt-line") ?
                        parseInt(e.getAttribute("data-kt-line")) : 11,
                    rotate: e.getAttribute("data-kt-rotate") ?
                        parseInt(e.getAttribute("data-kt-rotate")) : 145,
                },
                a = document.createElement("canvas"),
                r = document.createElement("span");
            "undefined" != typeof G_vmlCanvasManager &&
                G_vmlCanvasManager.initElement(a);
            var o = a.getContext("2d");
            (a.width = a.height = t.size),
            e.appendChild(r),
                e.appendChild(a),
                o.translate(t.size / 2, t.size / 2),
                o.rotate((t.rotate / 180 - 0.5) * Math.PI);
            var i = (t.size - t.lineWidth) / 2,
                s = function(e, t, a) {
                    (a = Math.min(Math.max(0, a || 1), 1)),
                    o.beginPath(),
                        o.arc(0, 0, i, 0, 2 * Math.PI * a, !1),
                        (o.strokeStyle = e),
                        (o.lineCap = "round"),
                        (o.lineWidth = t),
                        o.stroke();
                };
            s("#E44", t.lineWidth, 1),
                s(
                    KTUtil.getCssVariableValue("--bs-success"),
                    t.lineWidth,
                    @php
                        if (count($features) > 0) {
                            $avgFeatures = count($features->where('is_active', true)) / count($features);
                        } else {
                            $avgFeatures = 0;
                        }
                    @endphp {{ $avgFeatures == 0 ? 0.00001 : $avgFeatures }}
                );
        }

        var e = document.getElementById("products-chart");
        if (e) {
            var t = {
                    size: e.getAttribute("data-kt-size") ?
                        parseInt(e.getAttribute("data-kt-size")) : 70,
                    lineWidth: e.getAttribute("data-kt-line") ?
                        parseInt(e.getAttribute("data-kt-line")) : 11,
                    rotate: e.getAttribute("data-kt-rotate") ?
                        parseInt(e.getAttribute("data-kt-rotate")) : 145,
                },
                a = document.createElement("canvas"),
                r = document.createElement("span");
            "undefined" != typeof G_vmlCanvasManager &&
                G_vmlCanvasManager.initElement(a);
            var o = a.getContext("2d");
            (a.width = a.height = t.size),
            e.appendChild(r),
                e.appendChild(a),
                o.translate(t.size / 2, t.size / 2),
                o.rotate((t.rotate / 180 - 0.5) * Math.PI);
            var i = (t.size - t.lineWidth) / 2,
                s = function(e, t, a) {
                    (a = Math.min(Math.max(0, a || 1), 1)),
                    o.beginPath(),
                        o.arc(0, 0, i, 0, 2 * Math.PI * a, !1),
                        (o.strokeStyle = e),
                        (o.lineCap = "round"),
                        (o.lineWidth = t),
                        o.stroke();
                };
            @php
                if (count($products) > 0) {
                    $avgBestSellingProjects = count($products->where('is_best_selling', true)) / count($products);
                    $avgActiveProjects = count($products->where('is_active', true)) / count($products);
                    $avgInactiveProjects = count($products->where('is_active', false)) / count($products);
                } else {
                    $avgBestSellingProjects = 0;
                    $avgActiveProjects = 0;
                    $avgInactiveProjects = 0;
                }
            @endphp {{ $avgProjects == 0 ? 0.00001 : $avgProjects }}
            s("#E44", t.lineWidth, 1),
                s(
                    KTUtil.getCssVariableValue("--bs-success"),
                    t.lineWidth,
                    {{ $avgActiveProjects == 0 ? 0.00001 : $avgActiveProjects }}
                ),
                s(
                    KTUtil.getCssVariableValue("--bs-primary"),
                    t.lineWidth,
                    {{ $avgBestSellingProjects == 0 ? 0.00001 : $avgBestSellingProjects }}
                );
        }


        var e = document.getElementById("visits-chart");
        if (e) {
            var t = parseInt(KTUtil.css(e, "height")),
                a = KTUtil.getCssVariableValue("--bs-gray-500"),
                r = KTUtil.getCssVariableValue("--bs-border-dashed-color"),
                o = KTUtil.getCssVariableValue("--bs-success"),
                i = KTUtil.getCssVariableValue("--bs-success"),
                s = new ApexCharts(e, {
                    series: [{
                        name: "Visitors",
                        data: [
                            @if (count($lastSevenDaysVisits) > 0)
                                {{ $lastSevenDaysVisits[0]->count }},
                            @endif
                            @foreach ($lastSevenDaysVisits as $visit)
                                {{ $visit->count }},
                            @endforeach
                            @if (count($lastSevenDaysVisits) > 0)
                                {{ $lastSevenDaysVisits[count($lastSevenDaysVisits) - 1]->count }},
                            @endif
                        ],
                    }, ],
                    chart: {
                        fontFamily: "inherit",
                        type: "area",
                        height: t,
                        toolbar: {
                            show: !1
                        },
                    },
                    plotOptions: {},
                    legend: {
                        show: !1
                    },
                    dataLabels: {
                        enabled: !1
                    },
                    fill: {
                        type: "gradient",
                        gradient: {
                            shadeIntensity: 1,
                            opacityFrom: 0.3,
                            opacityTo: 0.7,
                            stops: [0, 90, 100],
                        },
                    },
                    stroke: {
                        curve: "smooth",
                        show: !0,
                        width: 3,
                        colors: [o],
                    },
                    xaxis: {
                        categories: [
                            "",
                            @foreach ($lastSevenDaysVisits as $visit)
                                "{{ $visit->date }}",
                            @endforeach
                            "",
                        ],
                        axisBorder: {
                            show: !1
                        },
                        axisTicks: {
                            show: !1
                        },
                        tickAmount: 6,
                        labels: {
                            rotate: 0,
                            rotateAlways: !0,
                            style: {
                                colors: a,
                                fontSize: "12px"
                            },
                        },
                        crosshairs: {
                            position: "front",
                            stroke: {
                                color: o,
                                width: 1,
                                dashArray: 3
                            },
                        },
                        tooltip: {
                            enabled: !0,
                            formatter: void 0,
                            offsetY: 0,
                            style: {
                                fontSize: "12px"
                            },
                        },
                    },
                    yaxis: {
                        tickAmount: 10,
                        max: {{ $maxLastSevenDaysVisitsValue }},
                        min: {{ $minLastSevenDaysVisitsValue }},
                        labels: {
                            style: {
                                colors: a,
                                fontSize: "12px"
                            },

                        },
                    },
                    states: {
                        normal: {
                            filter: {
                                type: "none",
                                value: 0
                            }
                        },
                        hover: {
                            filter: {
                                type: "none",
                                value: 0
                            }
                        },
                        active: {
                            allowMultipleDataPointsSelection: !1,
                            filter: {
                                type: "none",
                                value: 0
                            },
                        },
                    },
                    tooltip: {
                        style: {
                            fontSize: "12px"
                        },
                        y: {

                        },
                    },
                    colors: [i],
                    grid: {
                        borderColor: r,
                        strokeDashArray: 4,
                        yaxis: {
                            lines: {
                                show: !0
                            }
                        },
                    },
                    markers: {
                        strokeColor: o,
                        strokeWidth: 3
                    },
                });
            setTimeout(function() {
                s.render();
            }, 300);
        }

        var e = document.getElementById("kt_charts_widget_15_chart");
        e &&
            am5.ready(function() {
                var t = am5.Root.new(e);
                t.setThemes([am5themes_Animated.new(t)]);
                var a = t.container.children.push(
                        am5xy.XYChart.new(t, {
                            panX: !1,
                            panY: !1,
                            layout: t.verticalLayout,
                        })
                    ),
                    r =
                    (a.get("colors"),
                        [
                            @foreach ($mostVisitedCountries as $country)
                                {
                                    country: "{{ $country->countryName }}",
                                    visits: {{ $country->count }},
                                    columnSettings: {
                                        fill: am5.color(
                                            KTUtil.getCssVariableValue(
                                                "--bs-primary"
                                            )
                                        ),
                                    },
                                },
                            @endforeach
                        ]),
                    o = a.xAxes.push(
                        am5xy.CategoryAxis.new(t, {
                            categoryField: "country",
                            renderer: am5xy.AxisRendererX.new(t, {
                                minGridDistance: 30,
                            }),
                            bullet: function(e, t, a) {
                                return am5xy.AxisBullet.new(e, {
                                    location: 0.5,
                                    sprite: am5.Picture.new(e, {
                                        width: 24,
                                        height: 24,
                                        centerY: am5.p50,
                                        centerX: am5.p50,
                                        src: a.dataContext.icon,
                                    }),
                                });
                            },
                        })
                    );
                o.get("renderer").labels.template.setAll({
                        paddingTop: 20,
                        fontWeight: "400",
                        fontSize: 13,
                        fill: am5.color(
                            KTUtil.getCssVariableValue("--bs-gray-500")
                        ),
                    }),
                    o.get("renderer").grid.template.setAll({
                        disabled: !0,
                        strokeOpacity: 0,
                    }),
                    o.data.setAll(r);
                var i = a.yAxes.push(
                    am5xy.ValueAxis.new(t, {
                        renderer: am5xy.AxisRendererY.new(t, {}),
                    })
                );
                i.get("renderer").grid.template.setAll({
                        stroke: am5.color(
                            KTUtil.getCssVariableValue("--bs-gray-300")
                        ),
                        strokeWidth: 1,
                        strokeOpacity: 1,
                        strokeDasharray: [3],
                    }),
                    i.get("renderer").labels.template.setAll({
                        fontWeight: "400",
                        fontSize: 13,
                        fill: am5.color(
                            KTUtil.getCssVariableValue("--bs-gray-500")
                        ),
                    });
                var s = a.series.push(
                    am5xy.ColumnSeries.new(t, {
                        xAxis: o,
                        yAxis: i,
                        valueYField: "visits",
                        categoryXField: "country",
                    })
                );
                s.columns.template.setAll({
                        tooltipText: "{categoryX}: {valueY}",
                        tooltipY: 0,
                        strokeOpacity: 0,
                        templateField: "columnSettings",
                    }),
                    s.columns.template.setAll({
                        strokeOpacity: 0,
                        cornerRadiusBR: 0,
                        cornerRadiusTR: 6,
                        cornerRadiusBL: 0,
                        cornerRadiusTL: 6,
                    }),
                    s.data.setAll(r),
                    s.appear(),
                    a.appear(1e3, 100);
            });

        $(function() {
            var contactTable = $('#contact_table').DataTable({
                language: {
                    "lengthMenu": "Show _MENU_",
                },
                dom: "<'row'" +
                    "<'col-sm-6 d-flex align-items-center justify-conten-start'l>" +
                    "<'col-sm-6 d-flex align-items-center justify-content-end'f>" +
                    ">" +

                    "<'table-responsive'tr>" +

                    "<'row'" +
                    "<'col-sm-12 col-md-5 d-flex align-items-center justify-content-center justify-content-md-start'i>" +
                    "<'col-sm-12 col-md-7 d-flex align-items-center justify-content-center justify-content-md-end'p>" +
                    ">",
                processing: true,
                serverSide: true,
                responsive: true,
                responsivePriority: 1,
                order: [
                    [0, 'desc']
                ],
                @if (app()->isLocale('ar'))
                    language: {
                        "sEmptyTable": "ليست هناك بيانات متاحة في الجدول",
                        "sLoadingRecords": "جارٍ التحميل...",
                        "sProcessing": "جارٍ التحميل...",
                        "sLengthMenu": "أظهر _MENU_ مدخلات",
                        "sZeroRecords": "لم يعثر على أية سجلات",
                        "sInfo": "إظهار _START_ إلى _END_ من أصل _TOTAL_ مدخل",
                        "sInfoEmpty": "يعرض 0 إلى 0 من أصل 0 سجل",
                        "sInfoFiltered": "(منتقاة من مجموع _MAX_ مُدخل)",
                        "sSearch": "ابحث:",
                        "oPaginate": {
                            "sFirst": "الأول",
                            "sPrevious": "السابق",
                            "sNext": "التالي",
                            "sLast": "الأخير"
                        },
                        "oAria": {
                            "sSortAscending": ": تفعيل لترتيب العمود تصاعدياً",
                            "sSortDescending": ": تفعيل لترتيب العمود تنازلياً"
                        },
                        "select": {
                            "rows": {
                                "_": "%d قيمة محددة",
                                "0": "",
                                "1": "1 قيمة محددة"
                            }
                        },
                    },
                @endif
                ajax: "{{ route('dashboard.contacts') }}",
                columns: [{
                        data: 'id',
                        name: 'id'
                    },
                    {
                        data: 'name',
                        name: 'name'
                    },
                    {
                        data: 'email',
                        name: 'email',
                    },
                    {
                        data: 'message_raw',
                        name: 'message',
                    },
                    {
                        data: 'status_raw',
                        name: 'status',
                    },
                    {
                        data: 'created_at',
                        name: 'created_at',
                    },
                    {
                        data: 'action',
                        name: 'action',
                        orderable: false,
                        searchable: false
                    }
                ]
            });

            var maintetanceTable = $('#maintetance_table').DataTable({
                language: {
                    "lengthMenu": "Show _MENU_",
                },
                dom: "<'row'" +
                    "<'col-sm-6 d-flex align-items-center justify-conten-start'l>" +
                    "<'col-sm-6 d-flex align-items-center justify-content-end'f>" +
                    ">" +

                    "<'table-responsive'tr>" +

                    "<'row'" +
                    "<'col-sm-12 col-md-5 d-flex align-items-center justify-content-center justify-content-md-start'i>" +
                    "<'col-sm-12 col-md-7 d-flex align-items-center justify-content-center justify-content-md-end'p>" +
                    ">",
                processing: true,
                serverSide: true,
                responsive: true,
                responsivePriority: 1,
                order: [
                    [0, 'desc']
                ],
                @if (app()->isLocale('ar'))
                    language: {
                        "sEmptyTable": "ليست هناك بيانات متاحة في الجدول",
                        "sLoadingRecords": "جارٍ التحميل...",
                        "sProcessing": "جارٍ التحميل...",
                        "sLengthMenu": "أظهر _MENU_ مدخلات",
                        "sZeroRecords": "لم يعثر على أية سجلات",
                        "sInfo": "إظهار _START_ إلى _END_ من أصل _TOTAL_ مدخل",
                        "sInfoEmpty": "يعرض 0 إلى 0 من أصل 0 سجل",
                        "sInfoFiltered": "(منتقاة من مجموع _MAX_ مُدخل)",
                        "sSearch": "ابحث:",
                        "oPaginate": {
                            "sFirst": "الأول",
                            "sPrevious": "السابق",
                            "sNext": "التالي",
                            "sLast": "الأخير"
                        },
                        "oAria": {
                            "sSortAscending": ": تفعيل لترتيب العمود تصاعدياً",
                            "sSortDescending": ": تفعيل لترتيب العمود تنازلياً"
                        },
                        "select": {
                            "rows": {
                                "_": "%d قيمة محددة",
                                "0": "",
                                "1": "1 قيمة محددة"
                            }
                        },
                    },
                @endif
                ajax: "{{ route('dashboard.maintenances') }}",
                columns: [{
                        data: 'id',
                        name: 'id'
                    },
                    {
                        data: 'email',
                        name: 'email',
                    },
                    {
                        data: 'phone_number',
                        name: 'phone_number',
                    },
                    {
                        data: 'message_raw',
                        name: 'description',
                    },
                    {
                        data: 'status_raw',
                        name: 'status',
                    },
                    {
                        data: 'created_at',
                        name: 'created_at',
                    },
                    {
                        data: 'action',
                        name: 'action',
                        orderable: false,
                        searchable: false
                    }
                ]
            });

        });

        function delContact(id, ref) {
            let url = `/dashboard/contacts/${id}`
            swalWithBootstrapButtons
            @if (app()->isLocale('en'))
                .fire({
                    title: "Are you sure?",
                    text: "You won't be able to revert this!",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonText: "Yes, delete it!",
                    cancelButtonText: "No, cancel!",
                    reverseButtons: true,
                })
            @else
                .fire({
                    title: "هل أنت متأكد من عملية الحذف؟",
                    text: "لا يمكن التراجع بعد الحذف",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonText: "حذف",
                    cancelButtonText: "إلغاء",
                    reverseButtons: true,
                })
            @endif
            .then((result) => {
                if (result.isConfirmed) {
                    axios
                        .delete(url)
                        .then((response) => {
                            // ref.closest("tr").remove();
                            @if (app()->isLocale('en'))
                                swalWithBootstrapButtons.fire(
                                    "Deleted!",
                                    response.data.message,
                                    "success"
                                );
                            @else
                                swalWithBootstrapButtons.fire(
                                    "تمت عملية الحذف",
                                    response.data.message,
                                    "success"
                                );
                            @endif
                            let table = $('#contact_table').DataTable();
                            let currentPage = table.page();
                            table.ajax.reload(function() {
                                // Check if current page is still available
                                if (currentPage > table.page.info().pages - 1) {
                                    table.page('last').draw(false); // Return to last available page
                                }
                            }, false);
                        })
                        .catch((error) => {
                            @if (app()->isLocale('en'))
                                swalWithBootstrapButtons.fire(
                                    "Error",
                                    error.response.data.message,
                                    "error"
                                );
                            @else
                                swalWithBootstrapButtons.fire(
                                    "حذف خلل",
                                    error.response.data.message,
                                    "error"
                                );
                            @endif
                        });
                }
            });
        }

        function getDescription(id, ref) {
            ref.disabled = true;
            axios.get(`/dashboard/maintenances/${id}`)
                .then((response) => {
                    document.getElementById('description-p').textContent = response.data.description;
                    let markBtn = document.getElementById('mark-btn');
                    if (response.data.status == 'pending') {
                        markBtn.style.display = 'block';
                        markBtn.setAttribute('onclick', `markAsRead(${response.data.id}, this)`);
                    } else {
                        markBtn.style.display = 'none';
                        markBtn.setAttribute('onclick', `markAsRead(-1, this)`);
                    }
                    ref.disabled = false;
                    openModal();
                })
                .catch((error) => {
                    ref.disabled = false;
                    Toast.fire({
                        icon: "error",
                        title: error.response.data.message,
                    });
                })
        }

        function openModal() {
            var modal = document.getElementById('kt_modal_1');
            var modalInstance = new bootstrap.Modal(modal);
            modalInstance.show();
        }

        function markAsRead(id, ref) {
            if (id == -1) return;

            ref.disabled = true;
            let url = `/dashboard/maintenances/${id}`;
            axios.put(url)
                .then((response) => {
                    $('#maintetance_table').DataTable().ajax.reload(null, false);
                    Toast.fire({
                        icon: "success",
                        title: response.data.message,
                    });
                    ref.style.display = 'none';
                })
                .catch((error) => {
                    Toast.fire({
                        icon: "error",
                        title: error.response.data.message,
                    });
                })
                .finally(() => {
                    ref.disabled = false;
                })
        }

        function delMaintenance(id, ref) {
            let url = `/dashboard/maintenances/${id}`
            swalWithBootstrapButtons
            @if (app()->isLocale('en'))
                .fire({
                    title: "Are you sure?",
                    text: "You won't be able to revert this!",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonText: "Yes, delete it!",
                    cancelButtonText: "No, cancel!",
                    reverseButtons: true,
                })
            @else
                .fire({
                    title: "هل أنت متأكد من عملية الحذف؟",
                    text: "لا يمكن التراجع بعد الحذف",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonText: "حذف",
                    cancelButtonText: "إلغاء",
                    reverseButtons: true,
                })
            @endif
            .then((result) => {
                if (result.isConfirmed) {
                    axios
                        .delete(url)
                        .then((response) => {
                            // ref.closest("tr").remove();
                            @if (app()->isLocale('en'))
                                swalWithBootstrapButtons.fire(
                                    "Deleted!",
                                    response.data.message,
                                    "success"
                                );
                            @else
                                swalWithBootstrapButtons.fire(
                                    "تمت عملية الحذف",
                                    response.data.message,
                                    "success"
                                );
                            @endif
                            let table = $('#maintetance_table').DataTable();
                            let currentPage = table.page();
                            table.ajax.reload(function() {
                                // Check if current page is still available
                                if (currentPage > table.page.info().pages - 1) {
                                    table.page('last').draw(false); // Return to last available page
                                }
                            }, false);
                        })
                        .catch((error) => {
                            @if (app()->isLocale('en'))
                                swalWithBootstrapButtons.fire(
                                    "Error",
                                    error.response.data.message,
                                    "error"
                                );
                            @else
                                swalWithBootstrapButtons.fire(
                                    "حذف خلل",
                                    error.response.data.message,
                                    "error"
                                );
                            @endif
                        });
                }
            });
        }

        

        
    </script>

@endsection
