@php
    $title = trim((string)($items['title'] ?? ''));
    $description = trim((string)($items['description'] ?? ''));
    $questions = collect($items['faq_group'] ?? [])
        ->filter(fn ($item) => is_array($item))
        ->map(fn ($item) => [
            'question' => trim((string)($item['question'] ?? '')),
            'answer' => trim((string)($item['answer'] ?? '')),
            'plainAnswer' => trim((string) preg_replace('/\s+/u', ' ', html_entity_decode(strip_tags($item['answer'] ?? ''), ENT_QUOTES | ENT_HTML5, 'UTF-8'))),
        ])
        ->filter(fn ($item) => $item['question'] !== '' && $item['answer'] !== '' && $item['plainAnswer'] !== '');

    $structuredData = [
        '@context' => 'https://schema.org',
        '@type' => 'FAQPage',
        'mainEntity' => $questions->map(fn ($item) => [
            '@type' => 'Question',
            'name' => $item['question'],
            'acceptedAnswer' => [
                '@type' => 'Answer',
                'text' => $item['plainAnswer'],
            ],
        ])->values()->all(),
    ];
@endphp

@if($title !== '' || $description !== '' || $questions->isNotEmpty())
    @if($title !== '')
        <div class="text-lg font-medium my-4">{{$title}}</div>
    @endif
    {!! $description !!}
    @if($questions->isNotEmpty())
        <div class="faq my-6">
            @foreach($questions as $item)
                <details class="faq-item">
                    <summary>{{$item['question']}}</summary>
                    <article>{!!$item['answer']!!}</article>
                </details>
            @endforeach
        </div>
        <script type="application/ld+json">{!!json_encode($structuredData, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES | JSON_HEX_TAG | JSON_HEX_AMP | JSON_HEX_APOS | JSON_HEX_QUOT)!!}</script>
    @endif
@endif
