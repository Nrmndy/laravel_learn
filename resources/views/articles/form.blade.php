@if($article)
    <form method="post" action="/articles/{{ $article->slug }}">
    @method('PATCH')
    <input type="hidden" name="slug_old" value="{{ $article->slug }}">
@else
    <form method="post" action="/articles">
@endif

    @csrf
    <div class="mb-3">
        <label for="inputArticleTitle" class="form-label">Название статьи</label>
        <input
            type="text"
            class="form-control"
            id="inputArticleTitle"
            name="title"
            @if($article)
                value="{{ $article->title }}"
            @endif
       >
    </div>
    <div class="mb-3">
        <label for="inputArticleDesc" class="form-label">Краткое описание</label>
        <input type="text"
               class="form-control"
               id="inputArticleDesc"
               name="desc"
               @if($article)
                   value="{{ $article->desc }}"
               @endif
        >
    </div>
    <div class="mb-3">
        <label for="inputArticleBody" class="form-label">Текст статьи</label>
        <input type="text"
               class="form-control"
               id="inputArticleBody"
               name="body"
               @if($article)
                   value="{{ $article->body }}"
               @endif
        >
    </div>
    <div class="mb-3 form-check">
        <input
            type="checkbox"
            class="form-check-input"
            id="ifPublishedCheckbox"
            name="published"
            @if($article && $article->published === 1)
                checked
            @endif
        >
        <label class="form-check-label" for="ifPublishedCheckbox">Опубликовать</label>
    </div>
    <button type="submit" class="btn btn-primary">Создать статью</button>
</form>
