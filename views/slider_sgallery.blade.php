@php
    $title = trim((string)($items['title'] ?? ''));
    $headingClass = strtolower(trim((string)($items['title_tag'] ?? 'h2')));
    $headingClass = in_array($headingClass, ['h1', 'h2', 'h3', 'h4', 'h5', 'h6'], true) ? $headingClass : 'h2';
    $slides = sGallery::collections()->mediaType('image')->get();
@endphp

@if($slides?->count() ?? 0)
    <div class="gallery my-10">
        @if($title !== '')
            <div class="{{$headingClass}} mb-2 empty:hidden">{{$title}}</div>
        @endif
        <figure><img src="{{sGallery::file($slides->first()->path)}}" alt="{{$slides->first()->alt}}"></figure>
        <div sl-slider breakpoint-type="container" breakpoint-list="0:3;480:4;630:5;780:6" gap="8px" auto="" loop>
            @foreach($slides as $slide)
                <div title="{{$slide->title}}" class="gallery-thumb{{$loop->first ? ' __current' : ''}}"><img src="{{sGallery::file($slide->path)}}" alt="{{$slide->alt}}"></div>
            @endforeach
        </div>
    </div>
@endif
