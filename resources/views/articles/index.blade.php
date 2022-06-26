@extends('layout')
@section('content')

    <div class="row">
        <div class="col-md-8 blog-main">

            @foreach($articles as $article)
                @if($article->published)
                <div class="blog-post border border-1 rounded-2 bg-light px-2 mb-3">
                    <h2 class="blog-post-title">{{ $article->title }}</h2>
                    <p class="blog-post-meta">{{ $article->created_at->toFormattedDateString() }} </p>
                    <p>
                        {{ $article->desc }}
                    </p>
                    <p><a href="/articles/{{ $article->slug }}">Читать статью</a> </p>
                </div>
                @endif
            @endforeach

        </div>
    </div>
@endsection
