<div class="curs">
    <div class="blocktitle">официальный курс валют нбу</div>
    <div class="curs__wrap">
        @foreach($currencyRates as $currencyRate)
            <div class="curs__item">
                <div class="curs__data">{{ $currencyRate['date']}}</div>
                <div class="curs__val">
                    <b>USD</b>
                    {{ $currencyRate['usdRate']}}
                </div>
                <div class="curs__val">
                    <b>RUB</b>
                    {{ $currencyRate['rubRate']}}
                </div>
                <div class="curs__val">
                    <b>EUR</b>
                    {{ $currencyRate['eurRate']}}
                </div>
            </div>
        @endforeach
    </div>
    <a href="{{ route('currency.getAll') }}" class="white-btn">Архив курса</a>
</div>
