<div class="pollink">
    <div class="blocktitle">Полезные ссылки</div>
    <div class="pollink__wrap">
        @foreach($usefulLinks as $link)
        <a href="{{ $link->link }}" rel="noopener noreferrer" target="_blank">{{ $link->title }}</a>
        @endforeach
    </div>
</div>
