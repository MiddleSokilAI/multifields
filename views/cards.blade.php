@if(!empty($items['cards_group'] ?? []))
    <div class="section">
        <div class="content-wrapper">
            @if(!empty($items['title']))
                <div class="h2 mb-6.5">{{$items['title']}}</div>
            @endif
            <div class="layout gap-x-8 gap-y-9">
                @foreach($items['cards_group'] as $card)
                    @php
                        $title = trim((string)($card['title'] ?? ''));
                        $link = trim((string)($card['link'] ?? ''));
                        $image = trim((string)($card['image'] ?? ''));
                    @endphp
                    <div class="card">
                        @if($link !== '')
                            <a href="{{$link}}" class="card-link" aria-label="{{$title}}"></a>
                        @endif
                        @if($image !== '')
                            <figure><img src="{{asset($image)}}" alt="{{$card['alt'] ?? $title ?? ''}}"></figure>
                        @endif
                        @if($title !== '')
                            <div class="card-title with-hover text-lg">{{$title}}</div>
                        @endif
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endif
