<li class="mt-2 list-item">
    <span>┣{{ $seporator .= '━' }}</span>
        @if(count($child_category->categories) > 0)
            <input type="checkbox">
        @endif
        <span style="cursor: pointer" data-id="{{ $child_category->id }}">
            {{ $child_category->name }}
        </span>
        <form action="{{ route('admin.deleteReportCategory', $child_category->id) }}"
              method="post" onsubmit="return confirm('Удалить категорию?')" class="d-inline mx-3">
            @csrf
            @method('DELETE')
            <button type="submit" class="m-0 p-0 border-0 bg-transparent">
                <i class="far fa-trash-alt text-danger"></i>
            </button>
        </form>
        <ul class="d-none list-unstyled sub-list">
        @if ($child_category->categories)
            @foreach ($child_category->categories as $childCategory)
                @include('layouts.admin.report.report-subcategories-list', ['child_category' => $childCategory])
            @endforeach
        @endif
        </ul>
</li>


