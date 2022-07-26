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
        <button type="submit" class="btn btn-primary">Отправить</button>
    </form>
</div>
