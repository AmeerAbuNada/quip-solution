@extends('dashboard.parent')

@section('title', 'Projects')

@section('styles')
@endsection

@section('content')
    <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
        <!--begin::Post-->
        <div class="post d-flex flex-column-fluid" id="kt_post">
            <!--begin::Container-->
            <div id="kt_content_container" class="container-xxl">
                <!--begin::Card-->
                <div class="card">
                    <!--begin::Card header-->
                    <div class="card-header border-0 pt-6">
                        <!--begin::Card toolbar-->
                        <div class="card-toolbar">
                            <!--begin::Toolbar-->
                            <div class="d-flex justify-content-end" style="gap: 20px" data-kt-user-table-toolbar="base">
                                <!--begin::Add user-->
                                <a href="{{ route('projects.create') }}" class="btn btn-primary">
                                    <!--begin::Svg Icon | path: icons/duotune/arrows/arr075.svg-->
                                    <span class="svg-icon svg-icon-2">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            viewBox="0 0 24 24" fill="none">
                                            <rect opacity="0.5" x="11.364" y="20.364" width="16" height="2"
                                                rx="1" transform="rotate(-90 11.364 20.364)" fill="black" />
                                            <rect x="4.36396" y="11.364" width="16" height="2" rx="1"
                                                fill="black" />
                                        </svg>
                                    </span>
                                    <!--end::Svg Icon-->{{ __('add_new') }}
                                </a>
                                <!--end::Add user-->
                                <!--begin::Add user-->
                                <button type="button" class="btn btn-secondary" onclick="refreshTable(this)">
                                    <!--begin::Svg Icon | path: icons/duotune/arrows/arr075.svg-->
                                    <span class="svg-icon svg-icon-2">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M16.023 9.348h4.992v-.001M2.985 19.644v-4.992m0 0h4.992m-4.993 0l3.181 3.183a8.25 8.25 0 0013.803-3.7M4.031 9.865a8.25 8.25 0 0113.803-3.7l3.181 3.182m0-4.991v4.99" />
                                        </svg>

                                    </span>
                                    <!--end::Svg Icon-->{{ __('refresh_data') }}
                                </button>
                                <!--end::Add user-->
                            </div>
                            <!--end::Toolbar-->
                        </div>
                        <!--end::Card toolbar-->
                    </div>
                    <!--end::Card header-->
                    <!--begin::Card body-->
                    <div class="card-body py-4">
                        <!--begin::Table-->
                        <table class="table align-middle table-row-dashed table-hover fs-6 gy-5" id="kt_table_users">
                            <!--begin::Table head-->
                            <thead>
                                <!--begin::Table row-->
                                <tr class="text-start text-muted fw-bolder fs-7 text-uppercase gs-0">
                                    <th>#</th>
                                    <th>{{ __('projects.image') }}</th>
                                    <th>{{ __('projects.name_en') }}</th>
                                    <th>{{ __('projects.name_ar') }}</th>
                                    <th>{{ __('projects.active') }}</th>
                                    <th>{{ __('projects.created_at') }}</th>
                                    <th>{{ __('projects.actions') }}</th>
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
                    <!--end::Card body-->
                </div>
                <!--end::Card-->
            </div>
            <!--end::Container-->
        </div>
        <!--end::Post-->
    </div>
@endsection

@section('scripts')
    <script src="{{ asset('dashboard-assets/plugins/custom/datatables/datatables.bundle.js') }}"></script>
    <script>
        $(function() {
            var table = $('#kt_table_users').DataTable({
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
                ajax: "{{ route('projects.index') }}",
                columns: [{
                        data: 'id',
                        name: 'id'
                    },
                    {
                        data: 'image',
                        name: 'image',
                        orderable: false,
                        searchable: false
                    },
                    {
                        data: 'title_en',
                        name: 'title_en'
                    },
                    {
                        data: 'title_ar',
                        name: 'title_ar',
                    },
                    {
                        data: 'active',
                        name: 'active',
                        orderable: false,
                        searchable: false
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
            // table.on('processing.dt', function(e, settings, processing) {
            //     $('#loader').css('display', processing ? 'block' : 'none');
            // });
        });

        function delItem(id, ref) {
            let url = `/dashboard/projects/${id}`
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
                            @if(app()->isLocale('en'))
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
                            let table = $('#kt_table_users').DataTable();
                            let currentPage = table.page();
                            table.ajax.reload(function() {
                                // Check if current page is still available
                                if (currentPage > table.page.info().pages - 1) {
                                    table.page('last').draw(false); // Return to last available page
                                }
                            }, false);
                        })
                        .catch((error) => {
                            @if(app()->isLocale('en'))
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

        function toggleOptions(id, type, ref) {
            let data = {
                type: type,
                value: ref.checked
            }

            put(`/dashboard/projects/${id}/toggle`, data);
        }

        function refreshTable(ref) {
            ref.disabled = true;
            $('#kt_table_users').DataTable().ajax.reload();
            setTimeout(() => {
                ref.disabled = false;
            }, 300);
        }
    </script>
@endsection
