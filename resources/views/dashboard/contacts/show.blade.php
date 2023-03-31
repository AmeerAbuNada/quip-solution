@extends('dashboard.parent')

@section('title', 'Contact Message')

@section('styles')
@endsection

@section('content')
    <!--begin::Content-->
    <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
        <!--begin::Post-->
        <div class="post d-flex flex-column-fluid" id="kt_post">
            <!--begin::Container-->
            <div id="kt_content_container" class="container-xxl" style="max-width: 1800px">
                <!--begin::Inbox App - View & Reply -->
                <div class="d-flex flex-column flex-lg-row">
                    <!--begin::Content-->
                    <div class="flex-lg-row-fluid ms-lg-12 ms-xl-10">
                        <!--begin::Card-->
                        <div class="card">
                            <div class="card-body">
                                <!--begin::Title-->
                                <div class="d-flex flex-wrap gap-2 justify-content-between mb-8">
                                    <div class="d-flex align-items-center flex-wrap gap-2">
                                        <!--begin::Heading-->
                                        <h2 class="fw-bold me-3 my-1">{{ __('contacts.title') }}</h2>
                                        <!--begin::Heading-->
                                        <!--begin::Badges-->
                                        @if ($contact->status == 'pending')
                                            <span
                                                class="badge badge-light-warning my-1 me-2">{{ __('contacts.pending') }}</span>
                                        @else
                                            <span
                                                class="badge badge-light-success my-1 me-2">{{ __('contacts.answered') }}</span>
                                        @endif
                                        <!--end::Badges-->
                                    </div>
                                </div>
                                <!--end::Title-->
                                <!--begin::Message accordion-->
                                <div>
                                    <!--begin::Message header-->
                                    <div class="d-flex flex-wrap gap-2 flex-stack cursor-pointer"
                                        data-kt-inbox-message="header">
                                        <!--begin::Author-->
                                        <div class="d-flex align-items-center">
                                            <div class="pe-5">
                                                <!--begin::Author details-->
                                                <div class="d-flex align-items-center flex-wrap gap-1">
                                                    <a href="#"
                                                        class="fw-bolder text-dark text-hover-primary">{{ $contact->name }}</a>
                                                    <!--begin::Svg Icon | path: icons/duotune/abstract/abs050.svg-->
                                                    <span class="svg-icon svg-icon-7 svg-icon-success mx-3">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="24px"
                                                            height="24px" viewBox="0 0 24 24" version="1.1">
                                                            <circle fill="#000000" cx="12" cy="12"
                                                                r="8" />
                                                        </svg>
                                                    </span>
                                                    <!--end::Svg Icon-->
                                                    <span
                                                        class="text-muted fw-bolder">{{ \Carbon\Carbon::parse($contact->created_at)->diffForHumans() }}</span>
                                                </div>
                                                <!--end::Author details-->
                                                <!--begin::Message details-->
                                                <div>
                                                    <!--begin::Menu toggle-->
                                                    <a href="#" class="me-1" data-kt-menu-trigger="click"
                                                        data-kt-menu-placement="bottom-start">
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
                                                    <!--end::Menu toggle-->
                                                    <!--begin::Menu-->
                                                    <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-bold fs-7 w-300px p-4"
                                                        data-kt-menu="true">
                                                        <!--begin::Table-->
                                                        <table class="table mb-0">
                                                            <tbody>
                                                                <!--begin::From-->
                                                                <tr>
                                                                    <td class="w-75px text-muted">{{ __('contacts.from') }}
                                                                    </td>
                                                                    <td>{{ $contact->name }}</td>
                                                                </tr>
                                                                <!--end::From-->
                                                                <!--begin::Date-->
                                                                <tr>
                                                                    <td class="text-muted">{{ __('contacts.date') }}</td>
                                                                    <td>{{ $contact->created_at->format('Y-m-d h:i a') }}
                                                                    </td>
                                                                </tr>
                                                                <!--end::Date-->
                                                                <!--begin::Subject-->
                                                                <tr>
                                                                    <td class="text-muted">{{ __('contacts.email') }}</td>
                                                                    <td>{{ $contact->email }}</td>
                                                                </tr>
                                                                <!--end::Subject-->
                                                            </tbody>
                                                        </table>
                                                        <!--end::Table-->
                                                    </div>
                                                    <!--end::Menu-->
                                                </div>
                                                <!--end::Message details-->
                                            </div>
                                        </div>
                                        <!--end::Author-->
                                        <!--begin::Actions-->
                                        <div class="d-flex align-items-center flex-wrap gap-2">
                                            <!--begin::Date-->
                                            <span
                                                class="fw-bold text-muted text-end me-3">{{ $contact->created_at->format('Y-m-d h:i a') }}</span>
                                            <!--end::Date-->
                                        </div>
                                        <!--end::Actions-->
                                    </div>
                                    <!--end::Message header-->
                                    <!--begin::Message content-->
                                    <div class="collapse fade show" data-kt-inbox-message="message">
                                        <div class="py-5">
                                            <p>{{ $contact->message }}</p>

                                            <p class="mb-0">{{ $contact->name }}</p>
                                        </div>
                                    </div>
                                    <!--end::Message content-->
                                </div>
                                <!--begin::Form-->
                                <form id="kt_inbox_reply_form" class="rounded border mt-10">
                                    <!--begin::Body-->
                                    <div class="d-block">
                                        <!--begin::To-->
                                        <div class="d-flex align-items-center border-bottom px-8 min-h-50px">
                                            <!--begin::Label-->
                                            <div class="text-dark fw-bolder w-75px">{{ __('contacts.to') }}:</div>
                                            <!--end::Label-->
                                            <!--begin::Input-->
                                            <input type="text" class="form-control border-0" name="compose_to"
                                                value="{{ $contact->email }}" disabled />
                                            <!--end::Input-->
                                        </div>
                                        <!--end::To-->
                                        @if ($contact->status == 'answered')
                                            <!--begin::To-->
                                            <div class="d-flex align-items-center border-bottom px-8 min-h-50px">
                                                <!--begin::Label-->
                                                <div class="text-dark fw-bolder w-75px">{{ __('contacts.from') }}:</div>
                                                <!--end::Label-->
                                                <!--begin::Input-->
                                                <input type="text" class="form-control border-0" name="compose_to"
                                                    value="{{ $contact->admin->name }}  ( {{ $contact->admin->email }} )"
                                                    disabled />
                                                <!--end::Input-->
                                            </div>
                                            <!--end::To-->
                                        @endif

                                        <!--begin::Message-->
                                        @if ($contact->status == 'answered')
                                            <div class="border-0 px-3">
                                                {!! $contact->reply !!}</div>
                                        @else
                                            <div id="kt_inbox_form_editor" class="border-0 px-3"></div>
                                        @endif
                                        <!--end::Message-->
                                    </div>
                                    <!--end::Body-->
                                    <!--begin::Footer-->
                                    <div class="d-flex flex-stack flex-wrap gap-2 py-5 ps-8 pe-5 border-top">
                                        <!--begin::Actions-->
                                        <div class="d-flex align-items-center me-3">
                                            <!--begin::Send-->
                                            <div class="btn-group me-4">
                                                <!--begin::Submit-->
                                                <button onclick="reply()" id="send-btn" type="button"
                                                    class="btn btn-primary fs-bold px-6" @disabled($contact->status == 'answered')>
                                                    <span class="indicator-label">{{ __('contacts.send') }}</span>
                                                </button>
                                                <!--end::Submit-->
                                            </div>
                                            <!--end::Send-->
                                        </div>
                                        <!--end::Actions-->
                                    </div>
                                    <!--end::Footer-->
                                </form>
                                <!--end::Form-->
                            </div>
                        </div>
                        <!--end::Card-->
                    </div>
                    <!--end::Content-->
                </div>
                <!--end::Inbox App - View & Reply -->
            </div>
            <!--end::Container-->
        </div>
        <!--end::Post-->
    </div>
    <!--end::Content-->
@endsection

@section('scripts')
    @if ($contact->status == 'pending')
        <script src="{{ asset('dashboard-assets/js/custom/apps/inbox/reply.js') }}"></script>
    @endif
    <script>
        function reply() {
            if (document.getElementsByClassName('ql-editor')[0].innerHTML == '<p><br></p>' || document.getElementsByClassName('ql-editor')[0].innerHTML == '<p></p>') {
                Toast.fire({
                    icon: "error",
                    @if (app()->isLocale('en'))
                        title: 'Please Input the reply\'s message',
                    @else
                        title: 'يرجى إدخال محتوى رسالة الرد',
                    @endif
                });
                return;
            }
            let data = {
                reply: document.getElementsByClassName('ql-editor')[0].innerHTML
            }
            let url = '{{ route('contacts.reply', $contact->id) }}';
            put(url, data, 'send-btn', '{{ route('contacts.show', $contact->id) }}');
        }
    </script>
@endsection
