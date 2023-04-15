<option value="-1">{{ __('products.select_sub_category') }}</option>
@foreach ($subs as $sub)
    <option value="{{ $sub->id }}">{{ $sub->name_en }} - {{ $sub->name_ar }}</option>
@endforeach
