@extends('dashboard.parent')

@section('title', auth()->user()->name . "'s Settings")

@section('styles')
@endsection

@section('content')
    <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
        <!--begin::Post-->
        <div class="post d-flex flex-column-fluid" id="kt_post">
            <!--begin::Container-->
            <div id="kt_content_container" class="container-xxl" style="max-width: 1800px">
                <!--begin::Basic info-->
                <div class="card mb-5 mb-xl-10">
                    <!--begin::Card header-->
                    <div class="card-header border-0 cursor-pointer" role="button" data-bs-toggle="collapse"
                        data-bs-target="#kt_account_profile_details" aria-expanded="true"
                        aria-controls="kt_account_profile_details">
                        <!--begin::Card title-->
                        <div class="card-title m-0">
                            <h3 class="fw-bolder m-0">{{ $title }}</h3>
                        </div>
                        <!--end::Card title-->
                    </div>
                    <!--begin::Card header-->
                    <!--begin::Content-->
                    <div id="kt_account_settings_profile_details" class="collapse show">
                        <!--begin::Form-->
                        <form class="form" onsubmit="event.preventDefault(); performUpdate();">
                            <!--begin::Card body-->
                            <div class="card-body border-top p-9">
                                @foreach ($settings as $setting)
                                    @switch($setting->type)
                                        @case('image')
                                            <!--begin::Input group-->
                                            <div class="row mb-6">
                                                <!--begin::Label-->
                                                <label class="col-lg-4 col-form-label fw-bold fs-6">{{ $setting['label_'.app()->getLocale()] }}</label>
                                                <!--end::Label-->
                                                <!--begin::Col-->
                                                <div class="col-lg-8">
                                                    <!--begin::Image input-->
                                                    <div class="image-input image-input-outline" data-kt-image-input="true"
                                                        style="background-image: url('{{ $setting->image_url }}')">
                                                        <!--begin::Preview existing avatar-->
                                                        <div class="image-input-wrapper w-125px h-125px"
                                                            style="background-image: url({{ $setting->image_url }})"></div>
                                                        <!--end::Preview existing avatar-->
                                                        <!--begin::Label-->
                                                        <label
                                                            class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                                                            data-kt-image-input-action="change" data-bs-toggle="tooltip"
                                                            title="Change avatar">
                                                            <i class="bi bi-pencil-fill fs-7"></i>
                                                            <!--begin::Inputs-->
                                                            <input type="file" id="{{ $setting->key }}" name="avatar"
                                                                accept=".png, .jpg, .jpeg" />
                                                            <input type="hidden" name="avatar_remove" />
                                                            <!--end::Inputs-->
                                                        </label>
                                                        <!--end::Label-->
                                                        <!--begin::Cancel-->
                                                        <span
                                                            class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                                                            data-kt-image-input-action="cancel" data-bs-toggle="tooltip"
                                                            title="Cancel avatar">
                                                            <i class="bi bi-x fs-2"></i>
                                                        </span>
                                                        <!--end::Cancel-->
                                                        <!--begin::Remove-->
                                                        <span
                                                            class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                                                            data-kt-image-input-action="remove" data-bs-toggle="tooltip"
                                                            title="Remove avatar">
                                                            <i class="bi bi-x fs-2"></i>
                                                        </span>
                                                        <!--end::Remove-->
                                                    </div>
                                                    <!--end::Image input-->
                                                    <!--begin::Hint-->
                                                    <div class="form-text">Allowed file types: png, jpg, jpeg.</div>
                                                    <!--end::Hint-->
                                                </div>
                                                <!--end::Col-->
                                            </div>
                                            <!--end::Input group-->
                                        @break

                                        @case('text')
                                            <!--begin::Input group-->
                                            <div class="row mb-6">
                                                <!--begin::Label-->
                                                <label
                                                    class="col-lg-4 col-form-label required fw-bold fs-6">{{ $setting['label_'.app()->getLocale()] }}</label>
                                                <!--end::Label-->
                                                <!--begin::Col-->
                                                <div class="col-lg-8 fv-row">
                                                    <input type="text" id="{{ $setting->key }}"
                                                        class="form-control form-control-lg form-control-solid"
                                                        value="{{ $setting->value }}" />
                                                </div>
                                                <!--end::Col-->
                                            </div>
                                            <!--end::Input group-->
                                        @break

                                        @case('textarea')
                                            <!--begin::Input group-->
                                            <div class="row mb-6">
                                                <!--begin::Label-->
                                                <label
                                                    class="col-lg-4 col-form-label required fw-bold fs-6">{{ $setting['label_'.app()->getLocale()] }}</label>
                                                <!--end::Label-->
                                                <!--begin::Col-->
                                                <div class="col-lg-8 fv-row">
                                                    <textarea rows="5" id="{{ $setting->key }}" class="form-control form-control-lg form-control-solid">{{ $setting->value }}</textarea>
                                                </div>
                                                <!--end::Col-->
                                            </div>
                                            <!--end::Input group-->
                                        @break

                                        @case('file')
                                            <!--begin::Input group-->
                                            <div class="row mb-6">
                                                <!--begin::Label-->
                                                <label
                                                    class="col-lg-4 col-form-label required fw-bold fs-6">{{ $setting['label_'.app()->getLocale()] }}</label>
                                                <!--end::Label-->
                                                <!--begin::Col-->
                                                <div class="col-lg-8 fv-row">
                                                    <input type="file" id="{{ $setting->key }}"
                                                        class="form-control form-control-lg form-control-solid" />
                                                </div>
                                                <!--end::Col-->
                                            </div>
                                            <!--end::Input group-->
                                        @break

                                        @case('editor')
                                            <!--begin::Input group-->
                                            <div class="row mb-6">
                                                <!--begin::Label-->
                                                <label
                                                    class="col-lg-4 col-form-label required fw-bold fs-6">{{ $setting['label_'.app()->getLocale()] }}</label>
                                                <!--end::Label-->
                                                <!--begin::Col-->
                                                <div class="col-lg-12 fv-row">
                                                    <textarea id="{{ $setting->key }}" class="form-control form-control-lg form-control-solid">{{ $setting->value }}</textarea>
                                                </div>
                                                <!--end::Col-->
                                            </div>
                                            <!--end::Input group-->
                                        @break
                                    @endswitch
                                @endforeach
                            </div>
                            <!--end::Card body-->
                            <!--begin::Actions-->
                            <div class="card-footer d-flex justify-content-end py-6 px-9">
                                <button type="reset" class="btn btn-light btn-active-light-primary me-2">{{__('reset')}}</button>
                                <button type="submit" class="btn btn-primary" id="submit-btn">{{__('save_changes')}}</button>
                            </div>
                            <!--end::Actions-->
                        </form>
                        <!--end::Form-->
                    </div>
                    <!--end::Content-->
                </div>
                <!--end::Basic info-->
            </div>
            <!--end::Container-->
        </div>
        <!--end::Post-->
    </div>
@endsection

@section('scripts')
    <script src="{{ asset('dashboard-assets/js/editor.js') }}"></script>
    <script>
        function performUpdate() {
            let formData = new FormData();
            @foreach ($settings as $setting)
                @switch($setting->type)
                    @case('image')
                    @case('file')
                    if (document.getElementById('{{ $setting->key }}').files.length > 0) {
                        formData.append('{{ $setting->key }}', document.getElementById('{{ $setting->key }}').files[0]);
                    }
                    @break

                    @case('text')
                    @case('textarea')
                    formData.append('{{ $setting->key }}', document.getElementById('{{ $setting->key }}').value);
                    @break

                    @case('editor')
                    formData.append('{{ $setting->key }}', tinymce.get("{{ $setting->key }}").getContent());
                    @break
                @endswitch
            @endforeach

            let url = '{{ route('settings.update') }}';

            post(url, formData, 'submit-btn');
        }

        @foreach ($settings as $setting)
            @if ($setting->type == 'editor')
                tinymce.init({
                    selector: '#{{ $setting->key }}',
                    plugins: 'anchor autolink charmap codesample emoticons image link lists media searchreplace table visualblocks wordcount checklist mediaembed casechange export formatpainter pageembed linkchecker a11ychecker tinymcespellchecker permanentpen powerpaste advtable advcode editimage tinycomments tableofcontents footnotes mergetags autocorrect typography inlinecss',
                    toolbar: 'undo redo | blocks fontfamily fontsize | bold italic underline strikethrough | link image media table mergetags | addcomment showcomments | spellcheckdialog a11ycheck typography | align lineheight | checklist numlist bullist indent outdent | emoticons charmap | removeformat',
                    tinycomments_mode: 'embedded',
                    tinycomments_author: 'Author name',
                    mergetags_list: [{
                            value: 'First.Name',
                            title: 'First Name'
                        },
                        {
                            value: 'Email',
                            title: 'Email'
                        },
                    ]
                });
            @endif
        @endforeach
    </script>
@endsection
