<div class="morenews">
    <div class="blocktitle">Опубликовано на сайте</div>
    <div class="morenews__wrap">
        @foreach($publications as $data => $publication)
        <div class="newsitem">
            <div class="newsitem__data">{{ $data }}</div>
            @foreach($publication as $detailPublication)
                <a href="{{ $detailPublication->link }}">{{ $detailPublication->description }}</a>
            @endforeach
        </div>
        @endforeach
    </div>
    <a href="{{ route('published.getAllUser') }}" class="white-btn">Больше публикаций</a>
</div>
