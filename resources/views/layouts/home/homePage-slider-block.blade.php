@if(count($activeSliders) > 0)
    <div class="index-slider glide">
        <div class="glide__track" data-glide-el="track">
            <div class="glide__slides">
                @foreach($activeSliders as $slide)
                    <div class="slider-top__item">
                        <div class="slider-top__title">{{ $slide->title }}</div>
                        <p>{{ $slide->description }}</p>
                        @if($slide->link)
                            <a href="{{ $slide->link }}" class="btn btn-primary">Подробнее</a>
                        @endif
                    </div>
                @endforeach
            </div>

        </div>
        @if(count($activeSliders) > 1)
            <div class="glide__bullets" data-glide-el="controls[nav]">
                @for($i = 0; $i < count($activeSliders); $i++)
                    <button class="glide__bullet" data-glide-dir="={{ $i }}"></button>
                @endfor
            </div>
        @endif
    </div>
@endif
