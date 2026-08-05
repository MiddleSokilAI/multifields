@if(class_exists(\Seiger\sArticles\Models\sArticle::class))
    @php
        $count = max(1, (int)($items['count'] ?? 6));
        $title = trim((string)($items['title'] ?? '')) ?: '';
        $link = trim((string)($items['link'] ?? ''));
        $linkText = trim((string)($items['link_text'] ?? '')) ?: __('multiFields::global.last_sarticles_more');
        $articles = \Seiger\sArticles\Models\sArticle::query()
            ->active()
            ->with('categories')
            ->orderByDesc('s_articles.published_at')
            ->limit($count)
            ->get();
    @endphp

    @if(!empty($articles) && $articles->isNotEmpty())
        <div class="section pt-17.5" style="--section-bg:#e5edfb">
            <div class="content-wrapper">
                @if(!empty($title) || $link !== '')
                    <div class="flex items-baseline justify-between gap-5">
                        @if(!empty($title))
                            <div class="h2 mb-7">{{$title}}</div>
                        @endif
                        @if($link !== '')
                            <a href="{{$link}}" class="link more rarr">{{$linkText}}</a>
                        @endif
                    </div>
                @endif
                <div class="layout gap-x-8 gap-y-9">
                    @foreach($articles as $article)
                        @php
                            $title = trim((string)($article->pagetitle));
                            $publishedAt = $article->published_at ? \Carbon\Carbon::parse($article->published_at)->locale(app()->getLocale()) : null;
                            $category = $article->categories->first();
                            $categoryTitle = $category
                                ? trim((string) ($category->{app()->getLocale()} ?? '')) ?: trim((string) $category->base)
                                : '';
                        @endphp
                        <div class="card news">
                            <a href="{{$article->link}}" class="card-link" title="{{$title}}"></a>
                            <figure>
                                <img src="{{$article->coverSrc}}" alt="{{$title}}">
                                @if($categoryTitle !== '')
                                    <figcaption>{{$categoryTitle}}</figcaption>
                                @endif
                            </figure>
                            @if($publishedAt)
                                <time datetime="{{$publishedAt->toDateString()}}">{{$publishedAt->translatedFormat('j F')}}</time>
                            @endif
                            <div class="card-title with-hover text-lg line-clamp-4">{{$title}}</div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    @endif
@endif
