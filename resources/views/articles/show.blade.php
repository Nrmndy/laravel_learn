@extends('layout')
@section('content')

    <div class="col-md-8 blog-post border border-1 rounded-2 bg-light px-2 mb-3">
        <h2 class="blog-post-title">{{ $article->title }}</h2>

        @include('articles.tags', ['tags' => $article->tags])

        <p class="blog-post-meta">
            {{ $article->created_at->toFormattedDateString() }}
            <span>
                <a href="/articles/{{$article->slug}}/edit/">(Изменить)</a>
            </span>
        </p>
        <p>{{ $article->body }}</p>
    </div>

    @include('layout.sidebar')
    @include('shared.errors')
    @include('shared.feedback')

    <a href="/">Назад</a>

@endsection
