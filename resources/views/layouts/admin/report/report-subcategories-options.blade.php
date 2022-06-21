<option value="{{ $child_category->id }}">{{$seporator .= '-'}} {{ $child_category->name }}</option>
@if ($child_category->categories)
        @foreach ($child_category->categories as $childCategory)
            @include('layouts.admin.report.report-subcategories-options', ['child_category' => $childCategory])
        @endforeach
@endif
