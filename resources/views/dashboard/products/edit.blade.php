@extends('dashboard.parent')

@section('title', 'Edit Product')

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
            <div id="kt_content_container" class="container-xxl" style="max-width: 2000px">
                <!--begin::Basic info-->
                <div class="card mb-5 mb-xl-10">
                    <div class="row">
                        <div class="col-lg-12">
                            <!--begin::Card header-->
                            <div class="card-header border-0">
                                <!--begin::Card title-->
                                <div class="card-title m-0">
                                    <h3 class="fw-bolder m-0">{{__('products.edit')}} ({{ $product->name_en }})</h3>
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
                                            <label class="col-lg-3 col-form-label fw-bold fs-6">{{__('products.image')}}</label>
                                            <!--end::Label-->
                                            <!--begin::Col-->
                                            <div class="col-lg-9">
                                                <!--begin::Image input-->
                                                <div class="image-input image-input-outline" data-kt-image-input="true"
                                                    style="background-image: url('{{ $product->image_url }}')">
                                                    <!--begin::Preview existing avatar-->
                                                    <div class="image-input-wrapper w-125px h-125px"
                                                        style="background-image: url({{ $product->image_url }})">
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
                                                <div class="form-text">{{__('products.image_rules')}}</div>
                                                <!--end::Hint-->
                                            </div>
                                            <!--end::Col-->
                                        </div>
                                        <!--end::Input group-->
                                        <!--begin::Input group-->
                                        <div class="row mb-6">
                                            <!--begin::Label-->
                                            <label class="col-lg-3 col-form-label required fw-bold fs-6">{{ __('products.en_name') }}</label>
                                            <!--end::Label-->
                                            <!--begin::Col-->
                                            <div class="col-lg-9 fv-row">
                                                <input type="text" id="name_en" value="{{ $product->name_en }}"
                                                    class="form-control form-control-lg form-control-solid"
                                                    placeholder="{{ __('products.en_name') }}" />
                                            </div>
                                            <!--end::Col-->
                                        </div>
                                        <!--end::Input group-->
                                        <!--begin::Input group-->
                                        <div class="row mb-6">
                                            <!--begin::Label-->
                                            <label class="col-lg-3 col-form-label required fw-bold fs-6">{{ __('products.ar_name') }}</label>
                                            <!--end::Label-->
                                            <!--begin::Col-->
                                            <div class="col-lg-9 fv-row">
                                                <input type="text" id="name_ar" value="{{ $product->name_ar }}"
                                                    class="form-control form-control-lg form-control-solid"
                                                    placeholder="{{ __('products.ar_name') }}" />
                                            </div>
                                            <!--end::Col-->
                                        </div>
                                        <!--end::Input group-->
                                        <!--begin::Input group-->
                                        <div class="row mb-6">
                                            <!--begin::Label-->
                                            <label class="col-lg-3 col-form-label required fw-bold fs-6">{{ __('products.category') }}</label>
                                            <!--end::Label-->
                                            <!--begin::Col-->
                                            <div class="col-lg-9 fv-row">
                                                <select id="category" class="form-select form-select-solid"
                                                    data-control="select2" data-placeholder="{{ __('products.select_category') }}"
                                                    data-allow-clear="true">
                                                    <option></option>
                                                    @foreach ($categories as $category)
                                                        <option value="{{ $category->id }}" @selected($category->id == $product->category_id)>
                                                            {{ $category->name_en }} -
                                                            {{ $category->name_ar }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <!--end::Col-->
                                        </div>
                                        <!--end::Input group-->
                                        <!--begin::Input group-->
                                        <div class="row mb-6">
                                            <!--begin::Label-->
                                            <label class="col-lg-3 col-form-label required fw-bold fs-6">{{ __('products.catalog') }}</label>
                                            <!--end::Label-->
                                            <!--begin::Col-->
                                            <div class="col-lg-9 fv-row">
                                                <input type="file" id="catalog"
                                                    class="form-control form-control-lg form-control-solid" />
                                            </div>
                                            <!--end::Col-->
                                        </div>
                                        <!--end::Input group-->
                                        <!--begin::Input group-->
                                        <div class="row mb-6">
                                            <!--begin::Label-->
                                            <label class="col-lg-3 col-form-label required fw-bold fs-6">{{ __('products.video_link') }}</label>
                                            <!--end::Label-->
                                            <!--begin::Col-->
                                            <div class="col-lg-9 fv-row">
                                                <input type="text" id="video_link" value="{{ $product->video_link }}"
                                                    class="form-control form-control-lg form-control-solid"
                                                    placeholder="https://..." />
                                            </div>
                                            <!--end::Col-->
                                        </div>
                                        <!--end::Input group-->
                                        <!--begin::Input group-->
                                        <div class="row mb-6" style="height: 100%">
                                            <!--begin::Label-->
                                            <label class="col-lg-4 col-form-label required fw-bold fs-6">{{ __('products.settings') }}</label>
                                            <!--end::Label-->
                                            <!--begin::Col-->
                                            <div class="col-lg-4 fv-row">
                                                <label class="fw-bold fs-6" for="active">{{ __('products.active') }}</label>
                                                <br>
                                                <input class="form-check-input mt-2" id="active"
                                                    style="width: 30px !important; height: 30px !important" type="checkbox"
                                                    value="1" @checked($product->is_active) />
                                            </div>
                                            <!--end::Col-->
                                            <!--begin::Col-->
                                            <div class="col-lg-4 fv-row">
                                                <label class="fw-bold fs-6" for="best_selling">{{ __('products.best_selling') }}</label>
                                                <br>
                                                <input class="form-check-input mt-2" id="best_selling"
                                                    style="width: 30px !important; height: 30px !important"
                                                    type="checkbox" value="1" @checked($product->is_best_selling) />
                                            </div>
                                            <!--end::Col-->
                                        </div>
                                        <!--end::Input group-->
                                        <!--begin::Input group-->
                                        <div class="row mb-6">
                                            <!--begin::Label-->
                                            <label class="col-lg-3 col-form-label required fw-bold fs-6">{{ __('products.images') }}</label>
                                            <!--end::Label-->
                                            <!--begin::Col-->
                                            <div class="col-lg-9 fv-row">
                                                <!--begin::Card body-->
                                                <!--begin::Input group-->
                                                <!--begin::Dropzone-->
                                                <div class="card card-flush py-4">
                                                    <div class="dropzone" id="kt_ecommerce_add_product_media">
                                                        <!--begin::Message-->
                                                        <div class="dz-message needsclick">
                                                            <!--begin::Icon-->
                                                            <i class="bi bi-file-earmark-arrow-up text-primary fs-3x"></i>
                                                            <!--end::Icon-->
                                                            <!--begin::Info-->
                                                            <div class="ms-4">
                                                                <h3 class="fs-5 fw-bolder text-gray-900 mb-1">{{ __('products.drop_file') }}</h3>
                                                                <span class="fs-7 fw-bold text-gray-400">{{ __('products.images_rules') }}</span>
                                                            </div>
                                                            <!--end::Info-->
                                                        </div>
                                                    </div>
                                                    <!--end::Dropzone-->
                                                    @if ($product->images->count() != 0)

                                                        <table
                                                            class="table table-row-dashed table-row-gray-300 align-middle gs-0 gy-4">
                                                            <thead>
                                                                <tr>
                                                                    <th scope="col">{{__('products.image')}}</th>
                                                                    <th scope="col">{{__('products.delete_image')}}</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                @foreach ($product->images as $image)
                                                                    <tr>
                                                                        <th scope="row">
                                                                            <div class="image-input-wrapper w-50px h-50px">
                                                                                <img src="{{ Storage::url($image->path) }} "
                                                                                    alt="" width="70px"
                                                                                    height="70px"
                                                                                    style="object-fit: cover">
                                                                            </div>
                                                                        </th>
                                                                        <td>
                                                                            <button type="button"
                                                                                class="btn btn-sm btn-danger btn-active-danger"
                                                                                onclick="confirmDelete('{{ $image->id }}',this)">
                                                                                <i class="fas fa-trash"></i>
                                                                            </button>
                                                                        </td>
                                                                    </tr>
                                                                @endforeach
                                                            </tbody>
                                                        </table>
                                                    @endif
                                                </div>
                                                <!--end::Card header-->
                                            </div>
                                        </div>
                                        <!--end::Input group-->
                                        <!--begin::Input group-->
                                        <div class="row mb-6">
                                            <div class="col-lg-6 fv-row">
                                                <!--begin::Label-->
                                                <label class="col-lg-12 col-form-label required fw-bold fs-6">{{ __('products.description_en') }}</label>
                                                <!--end::Label-->
                                                <!--begin::Col-->
                                                <div class="col-lg-12 fv-row">
                                                    <textarea id="description_en" class="form-control form-control-lg form-control-solid">{{ $product->description_en }}</textarea>
                                                </div>
                                                <!--end::Col-->
                                            </div>
                                            <div class="col-lg-6 fv-row">
                                                <!--begin::Label-->
                                                <label class="col-lg-12 col-form-label required fw-bold fs-6">{{ __('products.description_ar') }}</label>
                                                <!--end::Label-->
                                                <!--begin::Col-->
                                                <div class="col-lg-12 fv-row">
                                                    <textarea id="description_ar" class="form-control form-control-lg form-control-solid">{{ $product->description_ar }}</textarea>
                                                </div>
                                                <!--end::Col-->
                                            </div>
                                        </div>
                                        <!--end::Input group-->


                                        <!--begin::Input group-->
                                        <div class="row mb-6">
                                            <div class="col-lg-6 fv-row">
                                                <!--begin::Label-->
                                                <label class="col-lg-4 col-form-label required fw-bold fs-6">{{ __('products.freatures_en') }}</label>
                                                <!--end::Label-->
                                                <!--begin::Col-->
                                                <div class="col-lg-12 fv-row">
                                                    <textarea id="features_en" class="form-control form-control-lg form-control-solid">{{ $product->features_en }}</textarea>
                                                </div>
                                                <!--end::Col-->
                                            </div>
                                            <div class="col-lg-6 fv-row">
                                                <!--begin::Label-->
                                                <label class="col-lg-4 col-form-label required fw-bold fs-6">{{ __('products.freatures_ar') }}</label>
                                                <!--end::Label-->
                                                <!--begin::Col-->
                                                <div class="col-lg-12 fv-row">
                                                    <textarea id="features_ar" class="form-control form-control-lg form-control-solid">{{ $product->features_ar }}</textarea>
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

            let url = '{{ route('products.update', $product) }}';

            post(url, gatherData(), 'submit-btn', '{{ route('products.index') }}');
        }

        function confirmDelete(id, ref) {
            let url = `/dashboard/products/images/${id}`;
            deleteItem(url, ref, '{{app()->getLocale()}}')
        }

        function gatherData() {
            let formData = new FormData();
            formData.append('_method', 'PUT');

            if (document.getElementById('image').files.length > 0) {
                formData.append('image', document.getElementById('image').files[0]);
            }

            formData.append('name_en', document.getElementById('name_en').value);
            formData.append('name_ar', document.getElementById('name_ar').value);

            formData.append('category_id', document.getElementById('category').value);

            if (document.getElementById('catalog').files.length > 0) {
                formData.append('catalog', document.getElementById('catalog').files[0]);
            }

            formData.append('video_link', document.getElementById('video_link').value);

            formData.append('is_active', document.getElementById('active').checked);
            formData.append('is_best_selling', document.getElementById('best_selling').checked);

            let images = myDropzone.getAcceptedFiles();
            for (var i = 0; i < images.length; i++) {
                formData.append('images[]', images[i]);
            }

            formData.append('description_en', tinymce.get("description_en").getContent());
            formData.append('description_ar', tinymce.get("description_ar").getContent());
            formData.append('features_en', tinymce.get("features_en").getContent());
            formData.append('features_ar', tinymce.get("features_ar").getContent());

            return formData;
        }

        let myDropzone = new Dropzone("#kt_ecommerce_add_product_media", {
            autoProcessQueue: false,
            url: "https://keenthemes.com/scripts/void.php",
            paramName: "file",
            maxFiles: 10,
            maxFilesize: 10,
            addRemoveLinks: !0,
            accept: function(e, t) {
                "wow.jpg" == e.name ? t("Naha, you don't.") : t();
            },
        })

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
        tinymce.init({
            selector: '#features_en',
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
            selector: '#features_ar',
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
