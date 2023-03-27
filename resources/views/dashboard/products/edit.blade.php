@extends('dashboard.parent')

@section('title', 'Add New Product')

@section('styles')
    <style>
        .tox-tinymce {
            height: 1000px !important;
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
                        <div class="col-lg-9">
                            <!--begin::Card header-->
                            <div class="card-header border-0">
                                <!--begin::Card title-->
                                <div class="card-title m-0">
                                    <h3 class="fw-bolder m-0">Edit Product ({{ $product->name }})</h3>
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
                                        <!--begin::Input group-->
                                        <div class="row mb-6">
                                            <!--begin::Label-->
                                            <label class="col-lg-3 col-form-label fw-bold fs-6">Main Image</label>
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
                                                <div class="form-text">Allowed file types: png, jpg, jpeg.</div>
                                                <!--end::Hint-->
                                            </div>
                                            <!--end::Col-->
                                        </div>
                                        <!--end::Input group-->
                                        <!--begin::Input group-->
                                        <div class="row mb-6">
                                            <!--begin::Label-->
                                            <label class="col-lg-3 col-form-label required fw-bold fs-6">Product
                                                Name</label>
                                            <!--end::Label-->
                                            <!--begin::Col-->
                                            <div class="col-lg-9 fv-row">
                                                <input type="text" id="name" value="{{ $product->name }}"
                                                    class="form-control form-control-lg form-control-solid"
                                                    placeholder="MSI GE78 raider" />
                                            </div>
                                            <!--end::Col-->
                                        </div>
                                        <!--end::Input group-->
                                        <!--begin::Input group-->
                                        <div class="row mb-6">
                                            <!--begin::Label-->
                                            <label class="col-lg-3 col-form-label required fw-bold fs-6">Product
                                                Price</label>
                                            <!--end::Label-->
                                            <!--begin::Col-->
                                            <div class="col-lg-5 fv-row">
                                                <label class="fw-bold fs-6">Original Price</label>
                                                <input type="text" id="price" value="{{ $product->price }}"
                                                    class="form-control form-control-lg form-control-solid"
                                                    placeholder="1500" />
                                            </div>
                                            <!--end::Col-->
                                            <!--begin::Col-->
                                            <div class="col-lg-4 fv-row">
                                                <label class="fw-bold fs-6">Discount Price</label>
                                                <input type="text" id="discount_price"
                                                    value="{{ $product->discount_price }}"
                                                    class="form-control form-control-lg form-control-solid"
                                                    placeholder="1350" />
                                            </div>
                                            <!--end::Col-->
                                        </div>
                                        <!--end::Input group-->
                                        <!--begin::Input group-->
                                        <div class="row mb-6" style="height: 100%">
                                            <!--begin::Label-->
                                            <label class="col-lg-3 col-form-label required fw-bold fs-6">Product
                                                Settings</label>
                                            <!--end::Label-->
                                            <!--begin::Col-->
                                            <div class="col-lg-2 fv-row">
                                                <label class="fw-bold fs-6" for="active">Active</label>
                                                <br>
                                                <input class="form-check-input mt-2" id="active"
                                                    style="width: 30px !important; height: 30px !important" type="checkbox"
                                                    value="1" @checked($product->is_active) />
                                            </div>
                                            <!--end::Col-->
                                            <!--begin::Col-->
                                            <div class="col-lg-2 fv-row">
                                                <label class="fw-bold fs-6" for="in_stock">In Stock</label>
                                                <br>
                                                <input class="form-check-input mt-2" id="in_stock"
                                                    style="width: 30px !important; height: 30px !important" type="checkbox"
                                                    value="1" @checked($product->in_stock) />
                                            </div>
                                            <!--end::Col-->
                                            <!--begin::Col-->
                                            <div class="col-lg-2 fv-row">
                                                <label class="fw-bold fs-6" for="slider">Slider</label>
                                                <br>
                                                <input class="form-check-input mt-2" id="slider"
                                                    style="width: 30px !important; height: 30px !important" type="checkbox"
                                                    value="1" @checked($product->is_slider) />
                                            </div>
                                            <!--end::Col-->
                                            <!--begin::Col-->
                                            <div class="col-lg-1 fv-row">
                                                <label class="fw-bold fs-6" for="offer">Offer</label>
                                                <br>
                                                <input class="form-check-input mt-2" id="offer"
                                                    onclick="toggleDate()"
                                                    style="width: 30px !important; height: 30px !important"
                                                    type="checkbox" value="1" @checked($product->offer_date != null) />
                                            </div>
                                            <div id="date-div" class="col-lg-2 fv-row"
                                                style="display: {{ $product->offer_date != null ? 'block' : 'none' }}">
                                                <label class="fw-bold fs-6" for="offer">End Date</label>
                                                <br>
                                                <input type="date" id="offer_date" value="{{ $product->offer_date }}"
                                                    class="form-control form-control-lg form-control-solid mt-2"
                                                    placeholder="1350" />
                                            </div>
                                            <!--end::Col-->
                                        </div>
                                        <!--end::Input group-->
                                        <!--begin::Input group-->
                                        <div class="row mb-6">
                                            <!--begin::Label-->
                                            <label class="col-lg-3 col-form-label required fw-bold fs-6">Images</label>
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
                                                                <h3 class="fs-5 fw-bolder text-gray-900 mb-1">Drop files
                                                                    here
                                                                    or
                                                                    click to upload.</h3>
                                                                <span class="fs-7 fw-bold text-gray-400">Upload images
                                                                    only</span>
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
                                                                    <th scope="col">Image</th>
                                                                    <th scope="col">Delete</th>
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
                                            <!--begin::Label-->
                                            <label class="col-lg-3 col-form-label required fw-bold fs-6">Tags</label>
                                            <!--end::Label-->
                                            <div class="col-lg-9 fv-row">
                                                <input id="kt_ecommerce_add_product_tags"
                                                    name="kt_ecommerce_add_product_tags" class="form-control mb-2"
                                                    value="{{ $product->tags }}" />
                                                <div class="text-muted fs-7">Add tags to a product.</div>
                                            </div>

                                        </div>
                                        <!--end::Input group-->
                                        <!--begin::Input group-->
                                        <div class="row mb-6">
                                            <!--begin::Label-->
                                            <label class="col-lg-3 col-form-label required fw-bold fs-6">Colors</label>
                                            <!--end::Label-->
                                            <!--begin::Col-->
                                            <div class="col-lg-9 fv-row">
                                                <!--begin::Input group-->
                                                <div class="" data-kt-ecommerce-catalog-add-product="auto-options">
                                                    <!--begin::Repeater-->
                                                    <div id="kt_ecommerce_add_product_options">
                                                        <!--begin::Form group-->
                                                        <div class="form-group">
                                                            <div data-repeater-list="kt_ecommerce_add_product_options"
                                                                class="d-flex flex-column gap-3">

                                                                <div data-repeater-item=""
                                                                    class="form-group d-flex flex-wrap gap-5">
                                                                    <!--begin::Select2-->
                                                                    <div class="col-lg-11">
                                                                        <input type="color"
                                                                            class="form-control form-control-lg form-control-solid">
                                                                    </div>
                                                                    <!--end::Select2-->
                                                                    <button type="button" data-repeater-delete=""
                                                                        class="btn btn-sm btn-icon btn-light-danger">
                                                                        <!--begin::Svg Icon | path: icons/duotune/arrows/arr088.svg-->
                                                                        <span class="svg-icon svg-icon-2">
                                                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                                                width="24" height="24"
                                                                                viewBox="0 0 24 24" fill="none">
                                                                                <rect opacity="0.5" x="7.05025"
                                                                                    y="15.5356" width="12"
                                                                                    height="2" rx="1"
                                                                                    transform="rotate(-45 7.05025 15.5356)"
                                                                                    fill="black" />
                                                                                <rect x="8.46447" y="7.05029"
                                                                                    width="12" height="2"
                                                                                    rx="1"
                                                                                    transform="rotate(45 8.46447 7.05029)"
                                                                                    fill="black" />
                                                                            </svg>
                                                                        </span>
                                                                        <!--end::Svg Icon-->
                                                                    </button>
                                                                </div>
                                                                @if ($product->colors != null)
                                                                    @foreach ($product->colors as $color)
                                                                        <div data-repeater-item=""
                                                                            class="form-group d-flex flex-wrap gap-5">
                                                                            <!--begin::Select2-->
                                                                            <div class="col-lg-11">
                                                                                <input type="color"
                                                                                    value="{{ $color }}"
                                                                                    class="form-control form-control-lg form-control-solid">
                                                                            </div>
                                                                            <!--end::Select2-->
                                                                            <button type="button" data-repeater-delete=""
                                                                                class="btn btn-sm btn-icon btn-light-danger">
                                                                                <!--begin::Svg Icon | path: icons/duotune/arrows/arr088.svg-->
                                                                                <span class="svg-icon svg-icon-2">
                                                                                    <svg xmlns="http://www.w3.org/2000/svg"
                                                                                        width="24" height="24"
                                                                                        viewBox="0 0 24 24"
                                                                                        fill="none">
                                                                                        <rect opacity="0.5"
                                                                                            x="7.05025" y="15.5356"
                                                                                            width="12" height="2"
                                                                                            rx="1"
                                                                                            transform="rotate(-45 7.05025 15.5356)"
                                                                                            fill="black" />
                                                                                        <rect x="8.46447"
                                                                                            y="7.05029" width="12"
                                                                                            height="2" rx="1"
                                                                                            transform="rotate(45 8.46447 7.05029)"
                                                                                            fill="black" />
                                                                                    </svg>
                                                                                </span>
                                                                                <!--end::Svg Icon-->
                                                                            </button>
                                                                        </div>
                                                                    @endforeach
                                                                @endif
                                                            </div>
                                                        </div>
                                                        <!--end::Form group-->
                                                        <!--begin::Form group-->
                                                        <div class="form-group mt-5">
                                                            <button type="button" data-repeater-create=""
                                                                class="btn btn-sm btn-light-primary">
                                                                <!--begin::Svg Icon | path: icons/duotune/arrows/arr087.svg-->
                                                                <span class="svg-icon svg-icon-2">
                                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                                        height="24" viewBox="0 0 24 24"
                                                                        fill="none">
                                                                        <rect opacity="0.5" x="11"
                                                                            y="18" width="12" height="2"
                                                                            rx="1" transform="rotate(-90 11 18)"
                                                                            fill="black" />
                                                                        <rect x="6" y="11"
                                                                            width="12" height="2" rx="1"
                                                                            fill="black" />
                                                                    </svg>
                                                                </span>
                                                                <!--end::Svg Icon-->Add another variation
                                                            </button>
                                                        </div>
                                                        <!--end::Form group-->
                                                    </div>
                                                    <!--end::Repeater-->
                                                </div>
                                                <!--end::Input group-->
                                            </div>
                                        </div>
                                        <!--end::Input group-->
                                        <!--begin::Input group-->
                                        <div class="row mb-6">
                                            <!--begin::Label-->
                                            <label class="col-lg-3 col-form-label required fw-bold fs-6">Sizes</label>
                                            <!--end::Label-->
                                            <!--begin::Col-->
                                            <div class="col-lg-9 fv-row">
                                                <!--begin::Input group-->
                                                <div class="" data-kt-ecommerce-catalog-add-product="auto-options">
                                                    <!--begin::Repeater-->
                                                    <div id="kt_ecommerce_add_product_options_size">
                                                        <!--begin::Form group-->
                                                        <div class="form-group">
                                                            <div data-repeater-list="kt_ecommerce_add_product_options_size"
                                                                class="d-flex flex-column gap-3">
                                                                <div data-repeater-item=""
                                                                    class="form-group d-flex flex-wrap gap-5">
                                                                    <!--begin::Select2-->
                                                                    <div class="col-lg-11">
                                                                        <input type="text"
                                                                            class="form-control form-control-lg form-control-solid">
                                                                    </div>
                                                                    <!--end::Select2-->
                                                                    <button type="button" data-repeater-delete=""
                                                                        class="btn btn-sm btn-icon btn-light-danger">
                                                                        <!--begin::Svg Icon | path: icons/duotune/arrows/arr088.svg-->
                                                                        <span class="svg-icon svg-icon-2">
                                                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                                                width="24" height="24"
                                                                                viewBox="0 0 24 24" fill="none">
                                                                                <rect opacity="0.5" x="7.05025"
                                                                                    y="15.5356" width="12"
                                                                                    height="2" rx="1"
                                                                                    transform="rotate(-45 7.05025 15.5356)"
                                                                                    fill="black" />
                                                                                <rect x="8.46447" y="7.05029"
                                                                                    width="12" height="2"
                                                                                    rx="1"
                                                                                    transform="rotate(45 8.46447 7.05029)"
                                                                                    fill="black" />
                                                                            </svg>
                                                                        </span>
                                                                        <!--end::Svg Icon-->
                                                                    </button>
                                                                </div>
                                                                @if ($product->sizes != null)
                                                                    @foreach ($product->sizes as $size)
                                                                        <div data-repeater-item=""
                                                                            class="form-group d-flex flex-wrap gap-5">
                                                                            <!--begin::Select2-->
                                                                            <div class="col-lg-11">
                                                                                <input type="text"
                                                                                    value="{{ $size }}"
                                                                                    class="form-control form-control-lg form-control-solid">
                                                                            </div>
                                                                            <!--end::Select2-->
                                                                            <button type="button" data-repeater-delete=""
                                                                                class="btn btn-sm btn-icon btn-light-danger">
                                                                                <!--begin::Svg Icon | path: icons/duotune/arrows/arr088.svg-->
                                                                                <span class="svg-icon svg-icon-2">
                                                                                    <svg xmlns="http://www.w3.org/2000/svg"
                                                                                        width="24" height="24"
                                                                                        viewBox="0 0 24 24"
                                                                                        fill="none">
                                                                                        <rect opacity="0.5"
                                                                                            x="7.05025" y="15.5356"
                                                                                            width="12" height="2"
                                                                                            rx="1"
                                                                                            transform="rotate(-45 7.05025 15.5356)"
                                                                                            fill="black" />
                                                                                        <rect x="8.46447"
                                                                                            y="7.05029" width="12"
                                                                                            height="2" rx="1"
                                                                                            transform="rotate(45 8.46447 7.05029)"
                                                                                            fill="black" />
                                                                                    </svg>
                                                                                </span>
                                                                                <!--end::Svg Icon-->
                                                                            </button>
                                                                        </div>
                                                                    @endforeach
                                                                @endif
                                                            </div>
                                                        </div>
                                                        <!--end::Form group-->
                                                        <!--begin::Form group-->
                                                        <div class="form-group mt-5">
                                                            <button type="button" data-repeater-create=""
                                                                class="btn btn-sm btn-light-primary">
                                                                <!--begin::Svg Icon | path: icons/duotune/arrows/arr087.svg-->
                                                                <span class="svg-icon svg-icon-2">
                                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                                        height="24" viewBox="0 0 24 24"
                                                                        fill="none">
                                                                        <rect opacity="0.5" x="11"
                                                                            y="18" width="12" height="2"
                                                                            rx="1" transform="rotate(-90 11 18)"
                                                                            fill="black" />
                                                                        <rect x="6" y="11"
                                                                            width="12" height="2" rx="1"
                                                                            fill="black" />
                                                                    </svg>
                                                                </span>
                                                                <!--end::Svg Icon-->Add another variation
                                                            </button>
                                                        </div>
                                                        <!--end::Form group-->
                                                    </div>
                                                    <!--end::Repeater-->
                                                </div>
                                                <!--end::Input group-->
                                            </div>
                                        </div>
                                        <!--end::Input group-->
                                        <!--begin::Input group-->
                                        <div class="row mb-6">
                                            <!--begin::Label-->
                                            <label class="col-lg-4 col-form-label required fw-bold fs-6">Product
                                                Info</label>
                                            <!--end::Label-->
                                            <!--begin::Col-->
                                            <div class="col-lg-12 fv-row">
                                                <textarea id="product_info" class="form-control form-control-lg form-control-solid">{{ $product->product_info }}</textarea>
                                            </div>
                                            <!--end::Col-->
                                        </div>
                                        <!--end::Input group-->
                                        <!--begin::Input group-->
                                        <div class="row mb-6">
                                            <!--begin::Label-->
                                            <label class="col-lg-4 col-form-label required fw-bold fs-6">Product
                                                Description</label>
                                            <!--end::Label-->
                                            <!--begin::Col-->
                                            <div class="col-lg-12 fv-row">
                                                <textarea id="product_description" class="form-control form-control-lg form-control-solid">{{ $product->product_description }}</textarea>
                                            </div>
                                            <!--end::Col-->
                                        </div>
                                        <!--end::Input group-->
                                        <!--begin::Input group-->
                                        <div class="row mb-6">
                                            <!--begin::Label-->
                                            <label class="col-lg-4 col-form-label required fw-bold fs-6">Additional
                                                Information</label>
                                            <!--end::Label-->
                                            <!--begin::Col-->
                                            <div class="col-lg-12 fv-row">
                                                <textarea id="additional_information" class="form-control form-control-lg form-control-solid">{{ $product->additional_information }}</textarea>
                                            </div>
                                            <!--end::Col-->
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
                        <div class="col-lg-3">
                            <!--begin::Card header-->
                            <div class="card-header border-0">
                                <!--begin::Card title-->
                                <div class="card-title m-0">
                                    <h3 class="fw-bolder m-0">Product Categories</h3>
                                </div>
                                <!--end::Card title-->

                            </div>
                            <!--begin::Card header-->
                            <!--begin::Content-->
                            <div id="kt_account_settings_profile_details" class="collapse show">
                                <!--begin::Form-->
                                <form class="form" onsubmit="event.preventDefault();">
                                    <!--begin::Card body-->
                                    <div class="card-body border-top p-9">
                                        <!--begin::Input group-->
                                        <div class="row mb-6">
                                            <!--begin::Label-->
                                            <!--end::Label-->
                                            @foreach ($categories->where('category_id', null) as $category)
                                                <!--begin::Col-->
                                                <div class="col-lg-12 fv-row mt-3"
                                                    style="display: flex; align-items: center; gap: 10px">
                                                    <input class="form-check-input" id="category_{{ $category->slug }}"
                                                        style="width: 30px !important; height: 30px !important"
                                                        type="checkbox" value="1" @checked($product->categories->contains($category->id)) />
                                                    <label class="fw-bold fs-6"
                                                        for="category_{{ $category->slug }}">{{ $category->name }}</label>
                                                </div>
                                                <!--end::Col-->
                                                @foreach ($category->categories as $subCategory)
                                                    <!--begin::Col-->
                                                    <div class="col-lg-12 fv-row mt-3"
                                                        style="display: flex; align-items: center; gap: 10px; margin-left: 20px">
                                                        &#x21B3;
                                                        <input class="form-check-input"
                                                            id="category_{{ $subCategory->slug }}"
                                                            style="width: 30px !important; height: 30px !important"
                                                            type="checkbox" value="1" @checked($product->categories->contains($subCategory->id)) />
                                                        <label class="fw-bold fs-6"
                                                            for="category_{{ $subCategory->slug }}">{{ $subCategory->name }}</label>
                                                    </div>
                                                    <!--end::Col-->
                                                    @foreach ($subCategory->categories as $subSubCategory)
                                                        <!--begin::Col-->
                                                        <div class="col-lg-12 fv-row mt-3"
                                                            style="display: flex; align-items: center; gap: 10px; margin-left: 40px">
                                                            &#x21B3;
                                                            <input class="form-check-input"
                                                                id="category_{{ $subSubCategory->slug }}"
                                                                style="width: 30px !important; height: 30px !important"
                                                                type="checkbox" value="1"
                                                                @checked($product->categories->contains($subSubCategory->id)) />
                                                            <label class="fw-bold fs-6"
                                                                for="category_{{ $subSubCategory->slug }}">{{ $subSubCategory->name }}</label>
                                                        </div>
                                                        <!--end::Col-->
                                                    @endforeach
                                                @endforeach
                                            @endforeach

                                        </div>
                                        <!--end::Input group-->
                                    </div>
                                    <!--end::Col-->

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
    <script src="{{ asset('dashboard-assets/plugins/custom/formrepeater/formrepeater.bundle.js') }}"></script>
    <script>
        function getTags() {
            let str = document.getElementById('kt_ecommerce_add_product_tags').value;
            if (str != '') {
                str = JSON.parse(str);
                var keyword = "";
                for (var i = 0; i < str.length; i++) {
                    if (i !== str.length - 1) {
                        keyword += str[i]["value"] + ",";
                    } else {
                        keyword += str[i]["value"];
                    }
                }
                return keyword;
            }
            return '';
        }

        function getColors() {
            var repeater = document.getElementById("kt_ecommerce_add_product_options");
            var inputs = repeater.getElementsByTagName("input");
            var data = [];
            for (var i = 0; i < inputs.length; i++) {
                data.push(inputs[i].value);
            }
            return data;
        }

        function getSizes() {
            var repeater = document.getElementById("kt_ecommerce_add_product_options_size");
            var inputs = repeater.getElementsByTagName("input");
            var data = [];
            for (var i = 0; i < inputs.length; i++) {
                data.push(inputs[i].value);
            }
            return data;
        }

        function performUpdate() {
            let url = '{{ route('products.update', $product->slug) }}';
            post(url, gatherData(), 'submit-btn', '{{ route('products.index') }}');
        }

        function toggleDate() {
            let dateDiv = document.getElementById('date-div');
            let checkBox = document.getElementById('offer');
            if (checkBox.checked) {
                dateDiv.style.display = 'block';
            } else {
                dateDiv.style.display = 'none';
            }

        }

        function getCategoriesArr() {
            let result = [];
            @foreach ($categories as $category)
                if (document.getElementById('category_{{ $category->slug }}').checked) {
                    result.push({{ $category->id }});
                }
            @endforeach
            return result;
        }

        function gatherData() {
            let formData = new FormData();
            formData.append('_method', 'PUT');
            if (document.getElementById('image').files.length > 0) {
                formData.append('image', document.getElementById('image').files[0]);
            }
            formData.append('name', document.getElementById('name').value);
            formData.append('price', document.getElementById('price').value);
            formData.append('discount_price', document.getElementById('discount_price').value);
            formData.append('is_active', document.getElementById('active').checked);
            formData.append('in_stock', document.getElementById('in_stock').checked);
            formData.append('slider', document.getElementById('slider').checked);
            formData.append('offer', document.getElementById('offer').checked);
            if (document.getElementById('offer').checked) {
                formData.append('offer_date', document.getElementById('offer_date').value);
            }
            let images = myDropzone.getAcceptedFiles();
            for (var i = 0; i < images.length; i++) {
                formData.append('images[]', images[i]);
            }
            formData.append('tags', getTags());

            let colors = getColors();
            for (var i = 0; i < colors.length; i++) {
                formData.append('colors[]', colors[i]);
            }

            let sizes = getSizes();
            for (var i = 0; i < sizes.length; i++) {
                formData.append('sizes[]', sizes[i]);
            }

            let categories = getCategoriesArr();
            for (var i = 0; i < categories.length; i++) {
                formData.append('categories[]', categories[i]);
            }
            formData.append('product_info', tinymce.get("product_info").getContent());
            formData.append('product_description', tinymce.get("product_description").getContent());
            formData.append('additional_information', tinymce.get("additional_information").getContent());

            return formData;
        }

        function confirmDelete(id, ref) {
            let url = `/dashboard/products/images/${id}`;
            deleteItem(url, ref)
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

        $("#kt_ecommerce_add_product_options").repeater({
            initEmpty: false,
            defaultValues: {
                "text-input": "foo"
            },
            show: function() {
                $(this).slideDown();
            },
            hide: function(e) {
                $(this).slideUp(e);
            },
        });
        document.querySelector("div[data-repeater-list='kt_ecommerce_add_product_options']").firstElementChild.remove();

        $("#kt_ecommerce_add_product_options_size").repeater({
            initEmpty: false,
            defaultValues: {
                "text-input": "foo"
            },
            show: function() {
                $(this).slideDown();
            },
            hide: function(e) {
                $(this).slideUp(e);
            },
        });
        document.querySelector("div[data-repeater-list='kt_ecommerce_add_product_options_size']").firstElementChild
            .remove();

        const t = document.querySelector('#kt_ecommerce_add_product_tags');
        t &&
            new Tagify(t, {
                whitelist: [
                    "new",
                    "trending",
                    "sale",
                    "discounted",
                    "selling fast",
                    "last 10",
                ],
                dropdown: {
                    maxItems: 20,
                    classname: "tagify__inline__suggestions",
                    enabled: 0,
                    closeOnSelect: !1,
                },
            });

        tinymce.init({
            selector: '#product_info',
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
            selector: '#product_description',
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
            selector: '#additional_information',
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
