@php
    $slides = sGallery::collections()->mediaType('image')->get();
@endphp
@if($slides?->count() ?? 0)
    <div class="uslider" id="hero" data--oninit="" data-auto="5000" data-animation-time="500" data-fade data--onchange data-freeze>
        @foreach($slides as $item)
            <div class="hero-slide">
                <img src="{{ sGallery::file($item->path) }}" alt="{{ $item->alt }}" fetchpriority="high" width="1120" height="560">
                <div class="slide-info">
                    <div class="content-wrapper my-auto">
                        <div class="slide-text">
                            <div class="title">{{ $item->title }}</div>
                            <p>{{ $item->description }}</p>
                            @if(trim($item->link))
                                <a href="{!! $item->link !!}" class="btn white arrow">
                                    @if(trim($item->link_text)) {{ $item->link_text }} @else @lang('Дізнатись більше') @endif
                                </a>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endif
