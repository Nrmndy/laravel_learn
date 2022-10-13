<div class="blog-post border border-1 rounded-2 bg-light px-2 mb-2">
    <h2 class="blog-post-title">{{ $article->title }}</h2>
    <p class="blog-post-meta">{{ $article->created_at->toFormattedDateString() }} </p>

    @include('articles.tags', ['tags' => $article->tags])

    <p>
        {{ $article->desc }}
    </p>
    <p><a href="/articles/{{ $article->slug }}">Читать статью</a> </p>
</div>
