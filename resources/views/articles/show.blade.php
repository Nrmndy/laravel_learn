@extends('layout')
@section('content')

    <div class="blog-post border border-1 rounded-2 bg-light px-2 mb-3">
        <h2 class="blog-post-title">{{ $article->title }}</h2>
        <p class="blog-post-meta">
            {{ $article->created_at->toFormattedDateString() }}
            <span>
                <a href="/articles/{{$article->slug}}/edit/">(Изменить)</a>
            </span>
        </p>
        <p>{{ $article->body }}</p>
    </div>

    @if($errors->all())
        <div class="alert alert-danger" role="alert">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="w-25 mb-2 p-3 border border-1 rounded-2 bg-light">
        <span class="h3">Feedback</span>
        <form method="post" action="/feedback">
            @csrf
            <div class="mb-3">
                <label for="inputFeedbackEmail" class="form-label">Ваш Email</label>
                <input type="text" class="form-control" id="inputFeedbackEmail" name="email">
            </div>
            <div class="mb-3">
                <label for="inputFeedbackMessage" class="form-label">Что хотите сообщить?</label>
                <input type="text" class="form-control" id="inputArticleDesc" name="message">
            </div>
            <input type="hidden" name="slug" value="{{ $slug }}">
            <button type="submit" class="btn btn-primary">Отправить</button>
        </form>
    </div>

    <a href="/">Назад</a>

@endsection
