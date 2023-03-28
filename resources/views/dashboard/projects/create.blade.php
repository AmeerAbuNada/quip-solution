@extends('dashboard.parent')

@section('title', 'Add New Project')

@section('styles')
    <style>
        .tox-tinymce {
            height: 500px !important;
        }
    </style>

    <link href="{{ asset('dashboard-assets/plugins/global/plugins.bundle.css') }}" rel="stylesheet" type="text/css" />
@endsection

@section('content')
    <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
        <!--begin::Post-->
        <div class="post d-flex flex-column-fluid" id="kt_post">
            <!--begin::Container-->
            <div id="kt_content_container" class="container-xxl" style="max-width: 2000px">
                <!--begin::Basic info-->
                <div class="card mb-5 mb-xl-10">
                    <div class="row">
                        <div class="col-lg-12">
                            <!--begin::Card header-->
                            <div class="card-header border-0">
                                <!--begin::Card title-->
                                <div class="card-title m-0">
                                    <h3 class="fw-bolder m-0">Add New Project</h3>
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
                                            <label class="col-lg-3 col-form-label fw-bold fs-6">Main Image</label>
                                            <!--end::Label-->
                                            <!--begin::Col-->
                                            <div class="col-lg-9">
                                                <!--begin::Image input-->
                                                <div class="image-input image-input-outline" data-kt-image-input="true"
                                                    style="background-image: url('{{ asset('dashboard-assets/media/svg/files/blank-image.svg') }}')">
                                                    <!--begin::Preview existing avatar-->
                                                    <div class="image-input-wrapper w-125px h-125px"
                                                        style="background-image: url({{ asset('dashboard-assets/media/svg/files/blank-image.svg') }})">
                                                    </div>
                                                    <!--end::Preview existing avatar-->
                                                    <!--begin::Label-->
                                                    <label
                                                        class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                                                        data-kt-image-input-action="change" data-bs-toggle="tooltip"
                                                        title="Change avatar">
                                                        <i class="bi bi-pencil-fill fs-7"></i>
                                                        <!--begin::Inputs-->
                                                        <input type="file" id="image" name="avatar"
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
                                        <!--begin::Input group-->
                                        <div class="row mb-6">
                                            <!--begin::Label-->
                                            <label class="col-lg-3 col-form-label required fw-bold fs-6">Project
                                                Name (English)</label>
                                            <!--end::Label-->
                                            <!--begin::Col-->
                                            <div class="col-lg-9 fv-row">
                                                <input type="text" id="name_en"
                                                    class="form-control form-control-lg form-control-solid"
                                                    placeholder="Project Name in English" />
                                            </div>
                                            <!--end::Col-->
                                        </div>
                                        <!--end::Input group-->
                                        <!--begin::Input group-->
                                        <div class="row mb-6">
                                            <!--begin::Label-->
                                            <label class="col-lg-3 col-form-label required fw-bold fs-6">Project
                                                Name (Arabic)</label>
                                            <!--end::Label-->
                                            <!--begin::Col-->
                                            <div class="col-lg-9 fv-row">
                                                <input type="text" id="name_ar"
                                                    class="form-control form-control-lg form-control-solid"
                                                    placeholder="Project Name in Arabic" />
                                            </div>
                                            <!--end::Col-->
                                        </div>
                                        <!--end::Input group-->
                                        
                                        <!--begin::Input group-->
                                        <div class="row mb-6" style="height: 100%">
                                            <!--begin::Label-->
                                            <label class="col-lg-3 col-form-label required fw-bold fs-6">Project
                                                Settings</label>
                                            <!--end::Label-->
                                            <!--begin::Col-->
                                            <div class="col-lg-9 fv-row">
                                                <label class="fw-bold fs-6" for="active">Active</label>
                                                <br>
                                                <input class="form-check-input mt-2" id="active"
                                                    style="width: 30px !important; height: 30px !important" type="checkbox"
                                                    value="1" checked />
                                            </div>
                                            <!--end::Col-->
                                        </div>
                                        <!--end::Input group-->
                                        
                                        <!--begin::Input group-->
                                        <div class="row mb-6">
                                            <div class="col-lg-6 fv-row">
                                                <!--begin::Label-->
                                                <label class="col-lg-12 col-form-label required fw-bold fs-6">Project
                                                    Description (English)</label>
                                                <!--end::Label-->
                                                <!--begin::Col-->
                                                <div class="col-lg-12 fv-row">
                                                    <textarea id="description_en" class="form-control form-control-lg form-control-solid"></textarea>
                                                </div>
                                                <!--end::Col-->
                                            </div>
                                            <div class="col-lg-6 fv-row">
                                                <!--begin::Label-->
                                                <label class="col-lg-12 col-form-label required fw-bold fs-6">Project
                                                    Description (Arabic)</label>
                                                <!--end::Label-->
                                                <!--begin::Col-->
                                                <div class="col-lg-12 fv-row">
                                                    <textarea id="description_ar" class="form-control form-control-lg form-control-solid"></textarea>
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
                                            class="btn btn-light btn-active-light-primary me-2">Reset</button>
                                        <button type="submit" class="btn btn-primary" id="submit-btn">Save
                                            Changes</button>
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
    <script src="{{ asset('dashboard-assets/plugins/global/plugins.bundle.js') }}"></script>
    <script>
        function performStore() {

            let url = '{{ route('projects.store') }}';

            post(url, gatherData(), 'submit-btn', '{{ route('projects.index') }}');
        }

        function gatherData() {
            let formData = new FormData();

            if (document.getElementById('image').files.length > 0) {
                formData.append('image', document.getElementById('image').files[0]);
            }

            formData.append('title_en', document.getElementById('name_en').value);
            formData.append('title_ar', document.getElementById('name_ar').value);

            formData.append('is_active', document.getElementById('active').checked);

            formData.append('description_en', tinymce.get("description_en").getContent());
            formData.append('description_ar', tinymce.get("description_ar").getContent());

            return formData;
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
