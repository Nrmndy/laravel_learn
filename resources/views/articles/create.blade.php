@extends('layout')
@section('content')

    @if($errors->all())
    <div class="alert alert-danger" role="alert">
        <ul>
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <form method="post" action="/articles">
        @csrf
        <div class="mb-3">
            <label for="inputArticleTitle" class="form-label">Название статьи</label>
            <input type="text" class="form-control" id="inputArticleTitle" name="title">
        </div>
        <div class="mb-3">
            <label for="inputArticleDesc" class="form-label">Краткое описание</label>
            <input type="text" class="form-control" id="inputArticleDesc" name="desc">
        </div>
        <div class="mb-3">
            <label for="inputArticleBody" class="form-label">Текст статьи</label>
            <input type="text" class="form-control" id="inputArticleBody" name="body">
        </div>
        <div class="mb-3 form-check">
            <input type="checkbox" class="form-check-input" id="ifPublishedCheckbox" name="published">
            <label class="form-check-label" for="ifPublishedCheckbox">Сразу опубликовать</label>
        </div>
        <button type="submit" class="btn btn-primary">Создать статью</button>
    </form>

@endsection
