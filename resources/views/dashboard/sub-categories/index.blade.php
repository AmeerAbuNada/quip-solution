@extends('dashboard.parent')

@section('title', 'Sub Categories')

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
                            <div class="d-flex justify-content-end" style="gap: 20px" data-kt-user-table-toolbar="base">
                                <!--begin::Add user-->
                                <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                    data-bs-target="#kt_modal_add_user">
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
                                </button>
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
                            <!--begin::Modal - Add task-->
                            <div class="modal fade" id="kt_modal_add_user" tabindex="-1" aria-hidden="true">
                                <!--begin::Modal dialog-->
                                <div class="modal-dialog modal-dialog-centered mw-650px">
                                    <!--begin::Modal content-->
                                    <div class="modal-content">
                                        <!--begin::Modal header-->
                                        <div class="modal-header" id="kt_modal_add_user_header">
                                            <!--begin::Modal title-->
                                            <h2 class="fw-bolder">{{ __('categories.add') }}</h2>
                                            <!--end::Modal title-->
                                            <!--begin::Close-->
                                            <div class="btn btn-icon btn-sm btn-active-icon-primary"
                                                data-kt-users-modal-action="close">
                                                <!--begin::Svg Icon | path: icons/duotune/arrows/arr061.svg-->
                                                <span class="svg-icon svg-icon-1">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                        viewBox="0 0 24 24" fill="none">
                                                        <rect opacity="0.5" x="6" y="17.3137" width="16"
                                                            height="2" rx="1" transform="rotate(-45 6 17.3137)"
                                                            fill="black" />
                                                        <rect x="7.41422" y="6" width="16" height="2"
                                                            rx="1" transform="rotate(45 7.41422 6)"
                                                            fill="black" />
                                                    </svg>
                                                </span>
                                                <!--end::Svg Icon-->
                                            </div>
                                            <!--end::Close-->
                                        </div>
                                        <!--end::Modal header-->
                                        <!--begin::Modal body-->
                                        <div class="modal-body scroll-y mx-5 mx-xl-15 my-7">
                                            <!--begin::Form-->
                                            <form id="kt_modal_add_user_form" class="form"
                                                onsubmit="event.preventDefault(); performStore();">
                                                <!--begin::Scroll-->
                                                <div class="d-flex flex-column scroll-y me-n7 pe-7"
                                                    id="kt_modal_add_user_scroll" data-kt-scroll="true"
                                                    data-kt-scroll-activate="{default: false, lg: true}"
                                                    data-kt-scroll-max-height="auto"
                                                    data-kt-scroll-dependencies="#kt_modal_add_user_header"
                                                    data-kt-scroll-wrappers="#kt_modal_add_user_scroll"
                                                    data-kt-scroll-offset="300px">
                                                    <!--begin::Input group-->
                                                    <div class="fv-row mb-7">
                                                        <!--begin::Label-->
                                                        <label
                                                            class="required fw-bold fs-6 mb-2">{{ __('categories.en_name') }}</label>
                                                        <!--end::Label-->
                                                        <!--begin::Input-->
                                                        <input type="text" id="name_en"
                                                            class="form-control form-control-solid mb-3 mb-lg-0"
                                                            placeholder="{{ __('categories.en_name') }}" />
                                                        <!--end::Input-->
                                                    </div>
                                                    <!--end::Input group-->
                                                    <!--begin::Input group-->
                                                    <div class="fv-row mb-7">
                                                        <!--begin::Label-->
                                                        <label
                                                            class="required fw-bold fs-6 mb-2">{{ __('categories.ar_name') }}</label>
                                                        <!--end::Label-->
                                                        <!--begin::Input-->
                                                        <input type="text" id="name_ar"
                                                            class="form-control form-control-solid mb-3 mb-lg-0"
                                                            placeholder="{{ __('categories.ar_name') }}" />
                                                        <!--end::Input-->
                                                    </div>
                                                    <!--end::Input group-->
                                                    <!--begin::Input group-->
                                                    <div class="fv-row mb-7">
                                                        <!--begin::Label-->
                                                        <label
                                                            class="required fw-bold fs-6 mb-2">{{ __('products.select_category') }}</label>
                                                        <!--end::Label-->
                                                        <select id="category" class="form-select form-select-solid">
                                                            <option value="-1">{{ __('products.select_category') }}
                                                            </option>
                                                            @foreach ($categories as $category)
                                                                <option value="{{ $category->id }}">
                                                                    {{ $category->name_en }} -
                                                                    {{ $category->name_ar }}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    <!--end::Input group-->

                                                </div>
                                                <!--end::Scroll-->
                                                <!--begin::Actions-->
                                                <div class="text-center pt-15">
                                                    <button type="reset" class="btn btn-danger me-3"
                                                        data-kt-users-modal-action="cancel">{{ __('admins.discard') }}</button>
                                                    <button type="submit" id="submit-btn" class="btn btn-success"
                                                        data-kt-users-modal-action="submit">
                                                        <span class="indicator-label">{{ __('admins.submit') }}</span>
                                                        <span class="indicator-progress">
                                                            <span
                                                                class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                                                    </button>
                                                </div>
                                                <!--end::Actions-->
                                            </form>
                                            <!--end::Form-->
                                        </div>
                                        <!--end::Modal body-->
                                    </div>
                                    <!--end::Modal content-->
                                </div>
                                <!--end::Modal dialog-->
                            </div>
                            <div class="modal fade" id="kt_modal_edit_item" tabindex="-1" aria-hidden="true">
                                <!--begin::Modal dialog-->
                                <div class="modal-dialog modal-dialog-centered mw-650px">
                                    <!--begin::Modal content-->
                                    <div class="modal-content">
                                        <!--begin::Modal header-->
                                        <div class="modal-header" id="kt_modal_edit_item_header">
                                            <!--begin::Modal title-->
                                            <h2 class="fw-bolder">{{ __('categories.edit') }} ( <span
                                                    id="edit_name"></span> )</h2>
                                            <!--end::Modal title-->
                                            <!--begin::Close-->
                                            <div class="btn btn-icon btn-sm btn-active-icon-primary"
                                                data-kt-items-modal-action="close">
                                                <!--begin::Svg Icon | path: icons/duotune/arrows/arr061.svg-->
                                                <span class="svg-icon svg-icon-1">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                        viewBox="0 0 24 24" fill="none">
                                                        <rect opacity="0.5" x="6" y="17.3137"
                                                            width="16" height="2" rx="1"
                                                            transform="rotate(-45 6 17.3137)" fill="black" />
                                                        <rect x="7.41422" y="6" width="16"
                                                            height="2" rx="1"
                                                            transform="rotate(45 7.41422 6)" fill="black" />
                                                    </svg>
                                                </span>
                                                <!--end::Svg Icon-->
                                            </div>
                                            <!--end::Close-->
                                        </div>
                                        <!--end::Modal header-->
                                        <!--begin::Modal body-->
                                        <div class="modal-body scroll-y mx-5 mx-xl-15 my-7">
                                            <!--begin::Form-->
                                            <form id="kt_modal_edit_item_form" class="form" action="#">
                                                <!--begin::Scroll-->
                                                <div class="d-flex flex-column scroll-y me-n7 pe-7"
                                                    id="kt_modal_edit_item_scroll" data-kt-scroll="true"
                                                    data-kt-scroll-activate="{default: false, lg: true}"
                                                    data-kt-scroll-max-height="auto"
                                                    data-kt-scroll-dependencies="#kt_modal_add_item_header"
                                                    data-kt-scroll-wrappers="#kt_modal_add_item_scroll"
                                                    data-kt-scroll-offset="300px">
                                                    <!--begin::Input group-->
                                                    <div class="fv-row mb-7">
                                                        <!--begin::Label-->
                                                        <label
                                                            class="required fw-bold fs-6 mb-2">{{ __('categories.en_name') }}</label>
                                                        <!--end::Label-->
                                                        <!--begin::Input-->
                                                        <input type="text" id="name_en_update"
                                                            class="form-control form-control-solid mb-3 mb-lg-0"
                                                            placeholder="{{ __('categories.en_name') }}" />
                                                        <!--end::Input-->
                                                    </div>
                                                    <!--end::Input group-->
                                                    <!--begin::Input group-->
                                                    <div class="fv-row mb-7">
                                                        <!--begin::Label-->
                                                        <label
                                                            class="required fw-bold fs-6 mb-2">{{ __('categories.ar_name') }}</label>
                                                        <!--end::Label-->
                                                        <!--begin::Input-->
                                                        <input type="text" id="name_ar_update"
                                                            class="form-control form-control-solid mb-3 mb-lg-0"
                                                            placeholder="{{ __('categories.ar_name') }}" />
                                                        <!--end::Input-->
                                                    </div>
                                                    <!--end::Input group-->
                                                    <!--begin::Input group-->
                                                    <div class="fv-row mb-7">
                                                        <!--begin::Label-->
                                                        <label
                                                            class="required fw-bold fs-6 mb-2">{{ __('products.select_category') }}</label>
                                                        <!--end::Label-->
                                                        <select id="category_update"
                                                            class="form-select form-select-solid">
                                                            <option value="-1">{{ __('products.select_category') }}
                                                            </option>
                                                            @foreach ($categories as $category)
                                                                <option value="{{ $category->id }}">
                                                                    {{ $category->name_en }} -
                                                                    {{ $category->name_ar }}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    <!--end::Input group-->
                                                </div>
                                                <!--end::Scroll-->
                                                <!--begin::Actions-->
                                                <div class="text-center pt-15">
                                                    <button type="reset" class="btn btn-light me-3"
                                                        data-kt-items-modal-action="cancel">{{ __('admins.discard') }}</button>
                                                    <button type="submit" id="submit-btn-update" class="btn btn-success"
                                                        data-kt-items-modal-action="submit">
                                                        <span class="indicator-label">{{ __('admins.update') }}</span>
                                                        <span class="indicator-progress">Please wait...
                                                            <span
                                                                class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                                                    </button>
                                                </div>
                                                <!--end::Actions-->
                                            </form>
                                            <!--end::Form-->
                                        </div>
                                        <!--end::Modal body-->
                                    </div>
                                    <!--end::Modal content-->
                                </div>
                                <!--end::Modal dialog-->
                            </div>
                            <!--end::Modal - Add task-->
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
                                    <th>{{ __('categories.en_name') }}</th>
                                    <th>{{ __('categories.ar_name') }}</th>
                                    <th>{{ __('categories.category') }}</th>
                                    <th>{{ __('categories.created_at') }}</th>
                                    <th>{{ __('categories.actions') }}</th>
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
    <script src="{{ asset('dashboard-assets/js/custom/apps/user-management/users/list/add.js') }}"></script>
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
                ajax: "{{ route('sub-categories.index') }}",
                columns: [{
                        data: 'id',
                        name: 'id'
                    },
                    {
                        data: 'name_en',
                        name: 'name_en'
                    },
                    {
                        data: 'name_ar',
                        name: 'name_ar',
                    },
                    {
                        data: 'category',
                        name: 'category',
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
        // $("#kt_table_users").DataTable({
        //     "language": {
        //         "lengthMenu": "Show _MENU_",
        //     },
        //     "dom": "<'row'" +
        //         "<'col-sm-6 d-flex align-items-center justify-conten-start'l>" +
        //         "<'col-sm-6 d-flex align-items-center justify-content-end'f>" +
        //         ">" +

        //         "<'table-responsive'tr>" +

        //         "<'row'" +
        //         "<'col-sm-12 col-md-5 d-flex align-items-center justify-content-center justify-content-md-start'i>" +
        //         "<'col-sm-12 col-md-7 d-flex align-items-center justify-content-center justify-content-md-end'p>" +
        //         ">"
        // });

        function performStore() {
            let btn = document.getElementById('submit-btn');
            btn.disabled = true;
            let data = {
                name_en: document.getElementById('name_en').value,
                name_ar: document.getElementById('name_ar').value,
                category_id: document.getElementById('category').value
            }
            let url = '{{ route('sub-categories.store') }}'

            //post(url, data, buttonId, redirectTo, formId)
            axios.post(url, data).then((response) => {
                Toast.fire({
                    icon: "success",
                    title: response.data.message,
                });
                document.getElementById('kt_modal_add_user_form').reset();
                mainModal.hide();
                $('#kt_table_users').DataTable().ajax.reload();
            }).catch((error) => {
                Toast.fire({
                    icon: "error",
                    title: error.response.data.message,
                });
            }).finally(() => {
                btn.disabled = false;
            })
        }

        function delItem(id, ref) {
            let url = `/dashboard/sub-categories/${id}`
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

        "use strict";
        var mainEditModal = null;
        var editModal = (function() {
            const t = document.getElementById("kt_modal_edit_item"),
                e = t.querySelector("#kt_modal_edit_item_form"),
                n = new bootstrap.Modal(t);
            mainEditModal = n;
            return {
                init: function() {
                    (() => {
                        var o = FormValidation.formValidation(e, {
                            fields: {

                            },
                            plugins: {
                                trigger: new FormValidation.plugins.Trigger(),
                                bootstrap: new FormValidation.plugins.Bootstrap5({
                                    rowSelector: ".fv-row",
                                    eleInvalidClass: "",
                                    eleValidClass: "",
                                }),
                            },
                        });
                        const i = t.querySelector(
                            '[data-kt-items-modal-action="submit"]'
                        );

                        t
                            .querySelector('[data-kt-items-modal-action="cancel"]')
                            .addEventListener("click", (t) => {
                                t.preventDefault(),
                                    n.hide()
                            }),
                            t
                            .querySelector('[data-kt-items-modal-action="close"]')
                            .addEventListener("click", (t) => {
                                t.preventDefault(),
                                    n.hide()
                            });
                    })();
                },
            };
        })();
        KTUtil.onDOMContentLoaded(function() {
            editModal.init();
        });

        function showEdit(id, name_en, name_ar, category) {
            document.getElementById('edit_name').innerHTML = name_en;

            document.getElementById('name_en_update').value = name_en;
            document.getElementById('name_ar_update').value = name_ar;

            document.getElementById('kt_modal_edit_item_form').setAttribute('onsubmit',
                `event.preventDefault(); editItem(${id})`);

            document.getElementById('category_update').options.forEach((e) => {
                e.removeAttribute('checked');
                if(e.value == category) {
                    e.selected = true;
                }
            });
        }

        function editItem(id) {
            let btn = document.getElementById('submit-btn-update');
            btn.disabled = true;
            let data = {
                name_en: document.getElementById(`name_en_update`).value,
                name_ar: document.getElementById(`name_ar_update`).value,
                category_id: document.getElementById('category_update').value
            }

            let url = `/dashboard/sub-categories/${id}`;
            axios.put(url, data).then((response) => {
                Toast.fire({
                    icon: "success",
                    title: response.data.message,
                });
                mainEditModal.hide();
                $('#kt_table_users').DataTable().ajax.reload(null, false);
            }).catch((error) => {
                Toast.fire({
                    icon: "error",
                    title: error.response.data.message,
                });
            }).finally(() => {
                btn.disabled = false;
            })
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
