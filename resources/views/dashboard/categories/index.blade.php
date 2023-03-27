@extends('dashboard.parent')

@section('title', 'Categories')

@section('styles')
    <link rel="stylesheet" href="{{ asset('landing-assets/icons/font-awesome-4.7.0/css/font-awesome.min.css') }}">
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
                                    <!--end::Svg Icon-->Add New Category
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
                                    <!--end::Svg Icon-->Refresh Data
                                </button>
                                <!--end::Add user-->
                            </div>
                            <!--end::Toolbar-->
                            <!--begin::Group actions-->
                            <div class="d-flex justify-content-end align-items-center d-none"
                                data-kt-user-table-toolbar="selected">
                                <div class="fw-bolder me-5">
                                    <span class="me-2" data-kt-user-table-select="selected_count"></span>Selected
                                </div>
                                <button type="button" class="btn btn-danger"
                                    data-kt-user-table-select="delete_selected">Delete Selected</button>
                            </div>
                            <!--end::Group actions-->
                            <!--begin::Modal - Add task-->
                            <div class="modal fade" id="kt_modal_add_user" tabindex="-1" aria-hidden="true">
                                <!--begin::Modal dialog-->
                                <div class="modal-dialog modal-dialog-centered mw-650px">
                                    <!--begin::Modal content-->
                                    <div class="modal-content">
                                        <!--begin::Modal header-->
                                        <div class="modal-header" id="kt_modal_add_user_header">
                                            <!--begin::Modal title-->
                                            <h2 class="fw-bolder">Add Category</h2>
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
                                                        <label class="required fw-bold fs-6 mb-2">Name (English)</label>
                                                        <!--end::Label-->
                                                        <!--begin::Input-->
                                                        <input type="text" id="name_en"
                                                            class="form-control form-control-solid mb-3 mb-lg-0"
                                                            placeholder="Name in English" />
                                                        <!--end::Input-->
                                                    </div>
                                                    <!--end::Input group-->
                                                    <!--begin::Input group-->
                                                    <div class="fv-row mb-7">
                                                        <!--begin::Label-->
                                                        <label class="required fw-bold fs-6 mb-2">Name (Arabic)</label>
                                                        <!--end::Label-->
                                                        <!--begin::Input-->
                                                        <input type="text" id="name_ar"
                                                            class="form-control form-control-solid mb-3 mb-lg-0"
                                                            placeholder="Name in Arabic" />
                                                        <!--end::Input-->
                                                    </div>
                                                    <!--end::Input group-->

                                                </div>
                                                <!--end::Scroll-->
                                                <!--begin::Actions-->
                                                <div class="text-center pt-15">
                                                    <button type="reset" class="btn btn-danger me-3"
                                                        data-kt-users-modal-action="cancel">Discard</button>
                                                    <button type="submit" id="submit-btn" class="btn btn-success"
                                                        data-kt-users-modal-action="submit">
                                                        <span class="indicator-label">Submit</span>
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
                                            <h2 class="fw-bolder">Edit Item ( <span id="edit_name"></span> )</h2>
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
                                                        <label class="required fw-bold fs-6 mb-2">Name (English)</label>
                                                        <!--end::Label-->
                                                        <!--begin::Input-->
                                                        <input type="text" id="name_en_update"
                                                            class="form-control form-control-solid mb-3 mb-lg-0"
                                                            placeholder="Name in English" />
                                                        <!--end::Input-->
                                                    </div>
                                                    <!--end::Input group-->
                                                    <!--begin::Input group-->
                                                    <div class="fv-row mb-7">
                                                        <!--begin::Label-->
                                                        <label class="required fw-bold fs-6 mb-2">Name (Arabic)</label>
                                                        <!--end::Label-->
                                                        <!--begin::Input-->
                                                        <input type="text" id="name_ar_update"
                                                            class="form-control form-control-solid mb-3 mb-lg-0"
                                                            placeholder="Name in Arabic" />
                                                        <!--end::Input-->
                                                    </div>
                                                    <!--end::Input group-->
                                                </div>
                                                <!--end::Scroll-->
                                                <!--begin::Actions-->
                                                <div class="text-center pt-15">
                                                    <button type="reset" class="btn btn-light me-3"
                                                        data-kt-items-modal-action="cancel">Cancel</button>
                                                    <button type="submit" id="submit-btn-update" class="btn btn-success"
                                                        data-kt-items-modal-action="submit">
                                                        <span class="indicator-label">Save</span>
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
                                    <th>English Name</th>
                                    <th>Arabic Name</th>
                                    <th>Created At</th>
                                    <th>Actions</th>
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
                ajax: "{{ route('categories.index') }}",
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
            }
            let url = '{{ route('categories.store') }}'

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
            let url = `/dashboard/categories/${id}`
            swalWithBootstrapButtons
                .fire({
                    title: "Are you sure?",
                    text: "You won't be able to revert this!",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonText: "Yes, delete it!",
                    cancelButtonText: "No, cancel!",
                    reverseButtons: true,
                })
                .then((result) => {
                    if (result.isConfirmed) {
                        axios
                            .delete(url)
                            .then((response) => {
                                // ref.closest("tr").remove();
                                swalWithBootstrapButtons.fire(
                                    "Deleted!",
                                    response.data.message,
                                    "success"
                                );
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
                                swalWithBootstrapButtons.fire(
                                    "Error",
                                    error.response.data.message,
                                    "error"
                                );
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

        function showEdit(id, name_en, name_ar) {
            document.getElementById('edit_name').innerHTML = name_en;

            document.getElementById('name_en_update').value = name_en;
            document.getElementById('name_ar_update').value = name_ar;

            document.getElementById('kt_modal_edit_item_form').setAttribute('onsubmit',
                `event.preventDefault(); editItem(${id})`);
        }

        function editItem(id) {
            let btn = document.getElementById('submit-btn-update');
            btn.disabled = true;
            let data = {
                name_en: document.getElementById(`name_en_update`).value,
                name_ar: document.getElementById(`name_ar_update`).value,
            }

            let url = `/dashboard/categories/${id}`;
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
