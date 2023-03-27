--@extends('dashboard.parent')

@section('title', 'Products')

@section('styles')
@endsection

@section('content')
    <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
        <!--begin::Post-->
        <div class="post d-flex flex-column-fluid" id="kt_post">
            <!--begin::Container-->
            <div id="kt_content_container" class="container-xxl" style="max-width: 2000px">
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
                                    placeholder="Search Products by name" />
                                @if (request()->search)
                                    <a href="{{ route('products.index') }}" class="btn btn-primary">Clear</a>
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
                                <a href="{{ route('products.create') }}" class="btn btn-primary">
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
                                    <!--end::Svg Icon-->Add Product
                                </a>
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
                        </div>
                        <!--end::Card toolbar-->
                    </div>
                    <!--end::Card header-->
                    <!--begin::Card body-->
                    <div class="card-body py-4">
                        <!--begin::Table-->
                        <table class="table align-middle table-row-dashed fs-6 gy-5" id="kt_table_users">
                            <!--begin::Table head-->
                            <thead>
                                <!--begin::Table row-->
                                <tr class="text-start text-muted fw-bolder fs-7 text-uppercase gs-0">
                                    <th class="min-w-125px">#</th>
                                    <th class="min-w-125px">Product</th>
                                    <th class="min-w-125px">Price</th>
                                    <th class="min-w-125px">Active</th>
                                    <th class="min-w-125px">In Stock</th>
                                    <th class="min-w-125px">Slider</th>
                                    <th class="min-w-125px">Created At</th>
                                    <th class="min-w-125px">Updated At</th>
                                    <th class="text-end min-w-100px">Actions</th>
                                </tr>
                                <!--end::Table row-->
                            </thead>
                            <!--end::Table head-->
                            <!--begin::Table body-->
                            <tbody class="text-gray-600 fw-bold">
                                @foreach ($products as $product)
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
                                                <a href="{{ route('products.edit', $product) }}">
                                                    <div class="symbol-label">
                                                        {!! $product->image_tag !!}
                                                    </div>
                                                </a>
                                            </div>
                                            <!--end::Avatar-->
                                            <!--begin::User details-->
                                            <div class="d-flex flex-column">
                                                <a href="{{ route('products.edit', $product) }}"
                                                    class="text-gray-800 text-hover-primary mb-1">{{ $product->name }}</a>
                                                <span>{{ $product->email }}</span>
                                            </div>
                                            <!--begin::User details-->
                                        </td>
                                        <!--end::User=-->
                                        <!--begin::Role=-->
                                        <td>
                                            @if ($product->discount_price == null)
                                                ${{ $product->price }}
                                            @else
                                                @if ($product->offer_date == null)
                                                    <del>${{ $product->price }}</del>
                                                    -
                                                    ${{ $product->discount_price }}
                                                @elseif (strtotime($product->offer_date) >= strtotime(date('Y-m-d')))
                                                    <del>${{ $product->price }}</del>
                                                    -
                                                    ${{ $product->discount_price }}
                                                @else
                                                    ${{ $product->price }}
                                                @endif
                                            @endif
                                        </td>
                                        <!--end::Role=-->
                                        <!--begin::Last login=-->
                                        <td>
                                            <input class="form-check-input mt-2"
                                                onclick="toggleSettings('{{ $product->slug }}', 'is_active', this)"
                                                style="width: 30px !important; height: 30px !important" type="checkbox"
                                                value="1" @checked($product->is_active) />
                                        </td>
                                        <td>
                                            <input class="form-check-input mt-2"
                                                onclick="toggleSettings('{{ $product->slug }}', 'in_stock', this)"
                                                style="width: 30px !important; height: 30px !important" type="checkbox"
                                                value="1" @checked($product->in_stock) />
                                        </td>
                                        <td>
                                            <input class="form-check-input mt-2"
                                                onclick="toggleSettings('{{ $product->slug }}', 'is_slider', this)"
                                                style="width: 30px !important; height: 30px !important" type="checkbox"
                                                value="1" @checked($product->is_slider) />
                                        </td>

                                        <td>{{ $product->created_at->format('Y-m-d h:i a') }}</td>

                                        <td>{{ $product->updated_at->format('Y-m-d h:i a') }}</td>

                                        <td class="text-end">
                                            <a href="{{ route('products.edit', $product->slug) }}"
                                                class="btn btn-icon btn-primary"><i class="fas fa-edit fs-4"></i></a>
                                            <a href="#" class="btn btn-icon btn-warning"><i
                                                    class="fas fa-eye fs-4"></i></a>
                                            <button type="button" onclick="delItem('{{ $product->slug }}',this)"
                                                class="btn btn-icon btn-danger"><i class="fas fa-trash fs-4"></i></button>

                                        </td>
                                        <!--end::Action=-->
                                    </tr>
                                    <!--end::Table row-->
                                @endforeach
                            </tbody>
                            <!--end::Table body-->
                        </table>
                        <div class="d-flex flex-stack flex-wrap pt-10">
                            {{ $products->links() }}
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
    <script>
        function delItem(id, ref) {
            let url = `/dashboard/products/${id}`
            deleteItem(url, ref);
        }

        function toggleSettings(slug, type, ref) {
            let isChecked = ref.checked;
            let url = `/dashboard/products/${slug}/settings/toggle`;
            axios.put(url, {
                type: type,
                checked: isChecked
            }).then((response) => {
                Toast.fire({
                    icon: "success",
                    title: response.data.message,
                });
            }).catch((error) => {
                Toast.fire({
                    icon: "error",
                    title: error.response.data.message,
                });
            })
        }
    </script>
@endsection
