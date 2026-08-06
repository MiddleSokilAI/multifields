@if(!empty($items['logos_group'] ?? []))
    <div class="section">
        <div class="content-wrapper">
            @if(!empty($items['title']))
                <div class="h2 text-center mb-6">{{$items['title']}}</div>
            @endif
            <div class="flex flex-wrap sm:flex-nowrap justify-between @container mb-2">
                @foreach($items['logos_group'] as $logo)
                    @php
                        $image = trim((string)($logo['image'] ?? ''));
                        $alt = trim((string)($logo['alt'] ?? ''));
                        $link = trim((string)($logo['link'] ?? ''));
                    @endphp
                    @continue($image === '')

                    @if($link !== '')
                        <a href="{{$link}}" title="{{$alt}}" aria-label="{{$alt}}" class="w-1/2 @xl:w-1/4 max-w-[200px]">
                            <img src="{{asset($image)}}" alt="{{$alt}}" width="200" height="96">
                        </a>
                    @else
                        <img src="{{asset($image)}}" alt="{{$alt}}" width="200" height="96" class="w-1/2 @xl:w-1/4 max-w-[200px]">
                    @endif
                @endforeach
            </div>
        </div>
    </div>
@endif
