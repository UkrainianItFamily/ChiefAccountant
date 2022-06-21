@component('mail::message')
    Пользователь: <b>{{ $userName }}</b>, c ID:  <b>{{ $userId }}</b> запросил подписку.<br><br>
    Описание: {{ $description }}
@endcomponent
