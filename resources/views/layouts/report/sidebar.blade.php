<div class="otchet-d__left">
    <div class="otchet__tree2">
        <ul id="categoriesList">
            @foreach ($categories ?? $report['categories'] as $category)
                <li>
                    <div class="tree__item">
                        <div class="tree__item__wrap tree__for firstLevel" id="category" data-for="0" data-index="2"
                             data-slug="{{ $category->slug }}">
                            <i class="far fa-plus-square"></i>
                            <i class="far fa-minus-square"></i><span class="testTarfet {{ $category->slug }}">{{ $category->name }}</span>
                        </div>
                        <ul id="subCategoryList-{{$category->id}}"></ul>
                    </div>
                </li>
            @endforeach
        </ul>
    </div>
</div>
