@extends('dashboard.parent')

@section('title', 'Maintenance Requests')

@section('styles')
@endsection

@section('content')
    <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
        <!--begin::Post-->
        <div class="post d-flex flex-column-fluid" id="kt_post">
            <!--begin::Container-->
            <div id="kt_content_container" class="container-xxl" style="max-width: 1800px">
                <!--begin::Card-->
                <div class="card">
                    <!--begin::Card header-->
                    <div class="card-header border-0 pt-6">
                        <!--begin::Card toolbar-->
                        <div class="card-toolbar">
                            <!--begin::Toolbar-->
                            <div class="d-flex justify-content-end" style="gap: 10px" data-kt-user-table-toolbar="base">
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

                                <button type="button" class="btn btn-info" onclick="filterTable('', this)">
                                    <!--begin::Svg Icon | path: icons/duotune/arrows/arr075.svg-->
                                    <span class="svg-icon svg-icon-2">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M16.023 9.348h4.992v-.001M2.985 19.644v-4.992m0 0h4.992m-4.993 0l3.181 3.183a8.25 8.25 0 0013.803-3.7M4.031 9.865a8.25 8.25 0 0113.803-3.7l3.181 3.182m0-4.991v4.99" />
                                        </svg>

                                    </span>
                                    <!--end::Svg Icon-->{{ __('maintenances.all') }}
                                </button>

                                <button type="button" class="btn btn-success" onclick="filterTable('completed', this)">
                                    <!--begin::Svg Icon | path: icons/duotune/arrows/arr075.svg-->
                                    <span class="svg-icon svg-icon-2">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M16.023 9.348h4.992v-.001M2.985 19.644v-4.992m0 0h4.992m-4.993 0l3.181 3.183a8.25 8.25 0 0013.803-3.7M4.031 9.865a8.25 8.25 0 0113.803-3.7l3.181 3.182m0-4.991v4.99" />
                                        </svg>

                                    </span>
                                    <!--end::Svg Icon-->{{ __('maintenances.completed') }}
                                </button>

                                <button type="button" class="btn btn-warning" onclick="filterTable('pending', this)">
                                    <!--begin::Svg Icon | path: icons/duotune/arrows/arr075.svg-->
                                    <span class="svg-icon svg-icon-2">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M16.023 9.348h4.992v-.001M2.985 19.644v-4.992m0 0h4.992m-4.993 0l3.181 3.183a8.25 8.25 0 0013.803-3.7M4.031 9.865a8.25 8.25 0 0113.803-3.7l3.181 3.182m0-4.991v4.99" />
                                        </svg>

                                    </span>
                                    <!--end::Svg Icon-->{{ __('maintenances.pending') }}
                                </button>
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
                    <!--end::Card body-->
                </div>
                <div class="modal fade" tabindex="-1" id="kt_modal_1">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">{{ __('maintenances.message') }}</h5>

                                <!--begin::Close-->
                                <div class="btn btn-icon btn-sm btn-active-light-primary ms-2" data-bs-dismiss="modal"
                                    aria-label="Close">
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
                ajax: "{{ route('maintenances.index') }}",
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

        function delItem(id, ref) {
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

        function refreshTable(ref) {
            ref.disabled = true;
            $('#kt_table_users').DataTable().ajax.reload();
            setTimeout(() => {
                ref.disabled = false;
            }, 300);
        }

        function filterTable(type, ref) {
            ref.disabled = true;
            $('#kt_table_users').DataTable().search(type).draw();
            setTimeout(() => {
                ref.disabled = false;
            }, 300);
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
                    $('#kt_table_users').DataTable().ajax.reload(null, false);
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
    </script>
@endsection
