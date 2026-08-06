@php
    $content = trim((string)($items['content'] ?? ''));
@endphp

@if($content !== '')
    {!! $content !!}
@endif
