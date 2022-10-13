@extends('layout')
@section('content')

    <div class="col-md-8 blog-main">
        @foreach($articles as $article)
            @if($article->published)
                @include('articles.item')
            @endif
        @endforeach
    </div>

    @include('layout.sidebar')

@endsection
