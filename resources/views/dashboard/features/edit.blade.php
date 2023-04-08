@extends('dashboard.parent')

@section('title', 'Edit Feature')

@section('styles')
    <style>
        .tox-tinymce {
            height: 500px !important;
        }
    </style>

@endsection

@section('content')
    <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
        <!--begin::Post-->
        <div class="post d-flex flex-column-fluid" id="kt_post">
            <!--begin::Container-->
            <div id="kt_content_container" class="container-xxl" style="max-width: 1800px">
                <!--begin::Basic info-->
                <div class="card mb-5 mb-xl-10">
                    <div class="row">
                        <div class="col-lg-12">
                            <!--begin::Card header-->
                            <div class="card-header border-0">
                                <!--begin::Card title-->
                                <div class="card-title m-0">
                                    <h3 class="fw-bolder m-0">{{__('features.edit')}} ({{ $feature['title_'.app()->getLocale()] }})</h3>
                                </div>
                                <!--end::Card title-->
                            </div>
                            <!--begin::Card header-->
                            <!--begin::Content-->
                            <div id="kt_account_settings_profile_details" class="collapse show">
                                <!--begin::Form-->
                                <form class="form" onsubmit="event.preventDefault(); performStore();">
                                    <!--begin::Card body-->
                                    <div class="card-body border-top p-9">
                                        <!--begin::Input group-->
                                        <div class="row mb-6">
                                            <!--begin::Label-->
                                            <label class="col-lg-3 col-form-label required fw-bold fs-6">{{__('features.english_name')}}</label>
                                            <!--end::Label-->
                                            <!--begin::Col-->
                                            <div class="col-lg-9 fv-row">
                                                <input type="text" id="name_en" value="{{ $feature->title_en }}"
                                                    class="form-control form-control-lg form-control-solid"
                                                    placeholder="{{__('features.english_name')}}" />
                                            </div>
                                            <!--end::Col-->
                                        </div>
                                        <!--end::Input group-->
                                        <!--begin::Input group-->
                                        <div class="row mb-6">
                                            <!--begin::Label-->
                                            <label class="col-lg-3 col-form-label required fw-bold fs-6">{{__('features.arabic_name')}}</label>
                                            <!--end::Label-->
                                            <!--begin::Col-->
                                            <div class="col-lg-9 fv-row">
                                                <input type="text" id="name_ar" value="{{ $feature->title_ar }}"
                                                    class="form-control form-control-lg form-control-solid"
                                                    placeholder="{{__('features.arabic_name')}}" />
                                            </div>
                                            <!--end::Col-->
                                        </div>
                                        <!--end::Input group-->

                                        <!--begin::Input group-->
                                        <div class="row mb-6" style="height: 100%">
                                            <!--begin::Label-->
                                            <label class="col-lg-3 col-form-label required fw-bold fs-6">{{__('features.settings')}}</label>
                                            <!--end::Label-->
                                            <!--begin::Col-->
                                            <div class="col-lg-9 fv-row">
                                                <label class="fw-bold fs-6" for="active">{{__('features.active')}}</label>
                                                <br>
                                                <input class="form-check-input mt-2" id="active"
                                                    style="width: 30px !important; height: 30px !important" type="checkbox"
                                                    value="1" @checked($feature->is_active) />
                                            </div>
                                            <!--end::Col-->
                                        </div>
                                        <!--end::Input group-->

                                        <!--begin::Input group-->
                                        <div class="row mb-6">
                                            <div class="col-lg-6 fv-row">
                                                <!--begin::Label-->
                                                <label class="col-lg-12 col-form-label required fw-bold fs-6">{{__('features.description_en')}}</label>
                                                <!--end::Label-->
                                                <!--begin::Col-->
                                                <div class="col-lg-12 fv-row">
                                                    <textarea id="description_en" class="form-control form-control-lg form-control-solid">{{ $feature->description_en }}</textarea>
                                                </div>
                                                <!--end::Col-->
                                            </div>
                                            <div class="col-lg-6 fv-row">
                                                <!--begin::Label-->
                                                <label class="col-lg-12 col-form-label required fw-bold fs-6">{{__('features.description_ar')}}</label>
                                                <!--end::Label-->
                                                <!--begin::Col-->
                                                <div class="col-lg-12 fv-row">
                                                    <textarea id="description_ar" class="form-control form-control-lg form-control-solid">{{ $feature->description_ar }}</textarea>
                                                </div>
                                                <!--end::Col-->
                                            </div>
                                        </div>
                                        <!--end::Input group-->
                                    </div>
                                    <!--end::Col-->
                                    <!--begin::Actions-->
                                    <div class="card-footer d-flex justify-content-end py-6 px-9">
                                        <button type="reset"
                                            class="btn btn-light btn-active-light-primary me-2">{{__('reset')}}</button>
                                        <button type="submit" class="btn btn-primary" id="submit-btn">{{__('save_changes')}}</button>
                                    </div>
                                    <!--end::Actions-->
                                </form>
                                <!--end::Form-->
                            </div>
                            <!--end::Content-->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--end::Basic info-->
@endsection

@section('scripts')
    <script src="{{ asset('dashboard-assets/js/editor.js') }}"></script>
    <script>
        function performStore() {

            let url = '{{ route('features.update', $feature) }}';

            put(url, gatherData(), 'submit-btn', '{{ route('features.index') }}');
        }

        function gatherData() {
            let data = {
                title_en: document.getElementById('name_en').value,
                title_ar: document.getElementById('name_ar').value,
                is_active: document.getElementById('active').checked,
                description_en: tinymce.get("description_en").getContent(),
                description_ar: tinymce.get("description_ar").getContent(),
            }

            return data;
        }

        tinymce.init({
            selector: '#description_en',
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
        tinymce.init({
            selector: '#description_ar',
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
    </script>
@endsection
