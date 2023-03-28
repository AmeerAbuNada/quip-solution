@extends('dashboard.parent')

@section('title', 'Admins')

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
                        <!--begin::Card title-->
                        <div class="card-title">
                            <!--begin::Search-->
                            <form method="GET" class="d-flex align-items-center position-relative my-1">
                                <!--begin::Svg Icon | path: icons/duotune/general/gen021.svg-->
                                <span class="svg-icon svg-icon-1 position-absolute ms-6">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                        viewBox="0 0 24 24" fill="none">
                                        <rect opacity="0.5" x="17.0365" y="15.1223" width="8.15546" height="2"
                                            rx="1" transform="rotate(45 17.0365 15.1223)" fill="black" />
                                        <path
                                            d="M11 19C6.55556 19 3 15.4444 3 11C3 6.55556 6.55556 3 11 3C15.4444 3 19 6.55556 19 11C19 15.4444 15.4444 19 11 19ZM11 5C7.53333 5 5 7.53333 5 11C5 14.4667 7.53333 17 11 17C14.4667 17 17 14.4667 17 11C17 7.53333 14.4667 5 11 5Z"
                                            fill="black" />
                                    </svg>
                                </span>
                                <!--end::Svg Icon-->
                                <input type="text" data-kt-user-table-filter="search" value="{{ request()->search }}"
                                    name="search" class="form-control form-control-solid w-350px ps-14"
                                    placeholder="{{ __('admins.search') }}" />
                                @if (request()->search)
                                    <a href="{{ route('admins.index') }}"
                                        class="btn btn-primary">{{ __('admins.clear') }}</a>
                                @endif
                            </form>
                            <!--end::Search-->
                        </div>
                        <!--begin::Card title-->
                        <!--begin::Card toolbar-->
                        <div class="card-toolbar">
                            <!--begin::Toolbar-->
                            <div class="d-flex justify-content-end" data-kt-user-table-toolbar="base">
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
                                    <!--end::Svg Icon-->{{ __('admins.add') }}
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
                                            <h2 class="fw-bolder">{{ __('admins.add') }}</h2>
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
                                                            class="required fw-bold fs-6 mb-2">{{ __('admins.full_name') }}</label>
                                                        <!--end::Label-->
                                                        <!--begin::Input-->
                                                        <input type="text" id="name" name="user_name"
                                                            class="form-control form-control-solid mb-3 mb-lg-0"
                                                            placeholder="{{ __('admins.full_name') }}" />
                                                        <!--end::Input-->
                                                    </div>
                                                    <!--end::Input group-->

                                                    <!--begin::Input group-->
                                                    <div class="fv-row mb-7">
                                                        <!--begin::Label-->
                                                        <label
                                                            class="required fw-bold fs-6 mb-2">{{ __('admins.email') }}</label>
                                                        <!--end::Label-->
                                                        <!--begin::Input-->
                                                        <input type="email" id="email" name="user_email"
                                                            class="form-control form-control-solid mb-3 mb-lg-0"
                                                            placeholder="example@domain.com" />
                                                        <!--end::Input-->
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
                            @foreach ($admins as $admin)
                                <div class="modal fade" id="kt_modal_edit_user_{{ $admin->id }}" tabindex="-1"
                                    aria-hidden="true">
                                    <!--begin::Modal dialog-->
                                    <div class="modal-dialog modal-dialog-centered mw-650px">
                                        <!--begin::Modal content-->
                                        <div class="modal-content">
                                            <!--begin::Modal header-->
                                            <div class="modal-header" id="kt_modal_edit_user_header_{{ $admin->id }}">
                                                <!--begin::Modal title-->
                                                <h2 class="fw-bolder">{{ __('admins.edit') }} ( {{ $admin->name }} )
                                                </h2>
                                                <!--end::Modal title-->
                                                <!--begin::Close-->
                                                <div class="btn btn-icon btn-sm btn-active-icon-primary"
                                                    data-kt-users-modal-action-{{ $admin->id }}="close">
                                                    <!--begin::Svg Icon | path: icons/duotune/arrows/arr061.svg-->
                                                    <span class="svg-icon svg-icon-1">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                            height="24" viewBox="0 0 24 24" fill="none">
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
                                                <form id="kt_modal_edit_user_form_{{ $admin->id }}"
                                                    onsubmit="event.preventDefault(); editItem({{ $admin->id }})"
                                                    class="form" action="#">
                                                    <!--begin::Scroll-->
                                                    <div class="d-flex flex-column scroll-y me-n7 pe-7"
                                                        id="kt_modal_edit_user_scroll_{{ $admin->id }}"
                                                        data-kt-scroll="true"
                                                        data-kt-scroll-activate="{default: false, lg: true}"
                                                        data-kt-scroll-max-height="auto"
                                                        data-kt-scroll-dependencies="#kt_modal_add_user_header"
                                                        data-kt-scroll-wrappers="#kt_modal_add_user_scroll"
                                                        data-kt-scroll-offset="300px">


                                                        <!--begin::Input group-->
                                                        <div class="fv-row mb-7">
                                                            <!--begin::Label-->
                                                            <label
                                                                class="required fw-bold fs-6 mb-2">{{ __('admins.full_name') }}</label>
                                                            <!--end::Label-->
                                                            <!--begin::Input-->
                                                            <input type="text" name="user_name"
                                                                id="name_{{ $admin->id }}"
                                                                class="form-control form-control-solid mb-3 mb-lg-0"
                                                                placeholder="{{ __('admins.full_name') }}"
                                                                value="{{ $admin->name }}" />
                                                            <!--end::Input-->
                                                        </div>
                                                        <!--end::Input group-->
                                                        <!--begin::Input group-->
                                                        <div class="fv-row mb-7">
                                                            <!--begin::Label-->
                                                            <label
                                                                class="required fw-bold fs-6 mb-2">{{ __('admins.email') }}</label>
                                                            <!--end::Label-->
                                                            <!--begin::Input-->
                                                            <input type="email" name="user_email"
                                                                id="email_{{ $admin->id }}"
                                                                class="form-control form-control-solid mb-3 mb-lg-0"
                                                                placeholder="example@domain.com"
                                                                value="{{ $admin->email }}" />
                                                            <!--end::Input-->
                                                        </div>
                                                        <!--end::Input group-->
                                                    </div>
                                                    <!--end::Scroll-->
                                                    <!--begin::Actions-->
                                                    <div class="text-center pt-15">
                                                        <button type="reset" class="btn btn-light me-3"
                                                            data-kt-users-modal-action-{{ $admin->id }}="cancel">{{ __('admins.clear') }}</button>
                                                        <button type="submit" id="submit-btn-{{ $admin->id }}"
                                                            class="btn btn-success"
                                                            data-kt-users-modal-action-{{ $admin->id }}="submit">
                                                            <span class="indicator-label">{{ __('admins.submit') }}</span>
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
                            @endforeach
                            <!--end::Modal - Add task-->
                        </div>
                        <!--end::Card toolbar-->
                    </div>
                    <!--end::Card header-->
                    <!--begin::Card body-->
                    <div class="card-body py-4 table-responsive">
                        <!--begin::Table-->
                        <table class="table align-middle table-row-dashed fs-6 gy-5" id="kt_table_users">
                            <!--begin::Table head-->
                            <thead>
                                <!--begin::Table row-->
                                <tr class="text-start text-muted fw-bolder fs-7 text-uppercase gs-0">
                                    <th class="min-w-125px">#</th>
                                    <th class="min-w-125px">{{ __('admins.admin') }}</th>
                                    <th class="min-w-125px">{{ __('admins.last_seen') }}</th>
                                    <th class="min-w-125px">{{ __('admins.join_date') }}</th>
                                    <th class="text-end min-w-100px">{{ __('admins.actions') }}</th>
                                </tr>
                                <!--end::Table row-->
                            </thead>
                            <!--end::Table head-->
                            <!--begin::Table body-->
                            <tbody class="text-gray-600 fw-bold">
                                @foreach ($admins as $admin)
                                    <!--begin::Table row-->
                                    <tr>
                                        <!--begin::Checkbox-->
                                        <td>
                                            {{ $loop->iteration + ((request()->page ?? 1) - 1) * 10 }}
                                        </td>
                                        <!--end::Checkbox-->
                                        <!--begin::User=-->
                                        <td class="d-flex align-items-center">
                                            <!--begin:: Avatar -->
                                            <div class="symbol symbol-circle symbol-50px overflow-hidden me-3">
                                                <a href="{{ route('admins.show', $admin) }}">
                                                    <div class="symbol-label">
                                                        @if ($admin->image)
                                                            <img src="{{ Storage::url($admin->image) }}" class="w-100">
                                                        @else
                                                            {!! $admin->image_tag !!}
                                                        @endif
                                                    </div>
                                                </a>
                                            </div>
                                            <!--end::Avatar-->
                                            <!--begin::User details-->
                                            <div class="d-flex flex-column">
                                                <a href="{{ route('admins.show', $admin) }}"
                                                    class="text-gray-800 text-hover-primary mb-1">{{ $admin->name }}</a>
                                                <span>{{ $admin->email }}</span>
                                            </div>
                                            <!--begin::User details-->
                                        </td>
                                        <!--end::User=-->
                                        <!--begin::Last login=-->
                                        <td>
                                            <div class="badge badge-light fw-bolder">
                                                @if ($admin->last_seen != null)
                                                    {{ \Carbon\Carbon::parse($admin->last_seen)->diffForHumans() }}
                                                @else
                                                    {{app()->isLocale('en') ? 'Never Logged In' : 'لم يسجل دخول'}}
                                                @endif
                                            </div>
                                        </td>
                                        <!--end::Last login=-->
                                        <!--begin::Joined-->
                                        <td>{{ $admin->created_at->format('Y-m-d h:i a') }}</td>
                                        <!--begin::Joined-->
                                        <!--begin::Action=-->
                                        <td class="text-end">
                                            @if ($admin->id != auth()->user()->id)
                                                <a href="#" class="btn btn-light btn-active-light-primary btn-sm"
                                                    data-kt-menu-trigger="click"
                                                    data-kt-menu-placement="bottom-end">{{__('admins.actions')}}
                                                    <!--begin::Svg Icon | path: icons/duotune/arrows/arr072.svg-->
                                                    <span class="svg-icon svg-icon-5 m-0">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                            height="24" viewBox="0 0 24 24" fill="none">
                                                            <path
                                                                d="M11.4343 12.7344L7.25 8.55005C6.83579 8.13583 6.16421 8.13584 5.75 8.55005C5.33579 8.96426 5.33579 9.63583 5.75 10.05L11.2929 15.5929C11.6834 15.9835 12.3166 15.9835 12.7071 15.5929L18.25 10.05C18.6642 9.63584 18.6642 8.96426 18.25 8.55005C17.8358 8.13584 17.1642 8.13584 16.75 8.55005L12.5657 12.7344C12.2533 13.0468 11.7467 13.0468 11.4343 12.7344Z"
                                                                fill="black" />
                                                        </svg>
                                                    </span>
                                                    <!--end::Svg Icon-->
                                                </a>
                                                <!--begin::Menu-->
                                                <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-bold fs-7 w-125px py-4"
                                                    data-kt-menu="true">
                                                    <!--begin::Menu item-->
                                                    <div class="menu-item px-3">
                                                        <a data-bs-toggle="modal"
                                                            data-bs-target="#kt_modal_edit_user_{{ $admin->id }}"
                                                            class="menu-link px-3">{{__('admins.actions_edit')}}</a>
                                                    </div>
                                                    <!--end::Menu item-->
                                                    <!--begin::Menu item-->
                                                    <div class="menu-item px-3">
                                                        <a onclick="delItem({{ $admin->id }}, this)"
                                                            class="menu-link px-3"
                                                            data-kt-users-table-filter="delete_row">{{__('admins.actions_delete')}}</a>
                                                    </div>
                                                    <!--end::Menu item-->
                                                </div>
                                            @else
                                                <div class="badge badge-light fw-bolder">{{__('admins.current_account')}}</div>
                                            @endif
                                            <!--end::Menu-->
                                        </td>
                                        <!--end::Action=-->
                                    </tr>
                                    <!--end::Table row-->
                                @endforeach
                            </tbody>
                            <!--end::Table body-->
                        </table>
                        <div class="d-flex flex-stack flex-wrap pt-10">
                            {{ $admins->links() }}
                        </div>
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
    {{-- <script src="{{asset('dashboard-assets/js/custom/apps/user-management/users/list/table.js')}}"></script>
<script src="{{asset('dashboard-assets/js/custom/apps/user-management/users/list/export-users.js')}}"></script> --}}
    <script src="{{ asset('dashboard-assets/js/custom/apps/user-management/users/list/add.js') }}"></script>
    <script>
        function performStore() {
            let data = {
                name: document.getElementById('name').value,
                email: document.getElementById('email').value,
            }
            let url = '{{ route('admins.store') }}'

            //post(url, data, buttonId, redirectTo, formId)
            post(url, data, 'submit-btn', '{{ route('admins.index') }}', 'kt_modal_add_user_form')
        }

        function delItem(id, ref) {
            let url = `/dashboard/admins/${id}`
            deleteItem(url, ref, '{{app()->getLocale()}}');
        }

        @foreach ($admins as $admin)
            "use strict";
            var KTUsersAddUser_{{ $admin->id }} = (function() {
                const t = document.getElementById("kt_modal_edit_user_{{ $admin->id }}"),
                    e = t.querySelector("#kt_modal_edit_user_form_{{ $admin->id }}"),
                    n = new bootstrap.Modal(t);
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
                                '[data-kt-users-modal-action-{{ $admin->id }}="submit"]'
                            );

                            t
                                .querySelector('[data-kt-users-modal-action-{{ $admin->id }}="cancel"]')
                                .addEventListener("click", (t) => {
                                    t.preventDefault(),
                                        n.hide()
                                }),
                                t
                                .querySelector('[data-kt-users-modal-action-{{ $admin->id }}="close"]')
                                .addEventListener("click", (t) => {
                                    t.preventDefault(),
                                        n.hide()
                                });
                        })();
                    },
                };
            })();
            KTUtil.onDOMContentLoaded(function() {
                KTUsersAddUser_{{ $admin->id }}.init();
            });
        @endforeach

        function editItem(id) {
            let data = {
                name: document.getElementById(`name_${id}`).value,
                email: document.getElementById(`email_${id}`).value,
            }

            let url = `/dashboard/admins/${id}`;

            put(url, data, `submit-btn-${id}`, '{{ url()->current() }}');
        }
    </script>
@endsection
