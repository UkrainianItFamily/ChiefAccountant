<div class="newsblock">
    <div class="blocktitle">Новое в законодательстве</div>
    <div class="newsblock__wrap">
        @foreach($news as $newsItem)
            <div class="newsitem">
                <div class="newsitem__data">{{ $newsItem->date }}</div>
                <a href="{{ route('news.show', $newsItem->slug) }}">{{ $newsItem->title }}</a>
            </div>
        @endforeach
    </div>
    <a href="{{ route('news.getAllPage') }}" class="white-btn">Больше новостей</a>
</div>
