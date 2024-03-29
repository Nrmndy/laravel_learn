<div class="container">
    <header class="blog-header py-3">
        <div class="row flex-nowrap justify-content-between align-items-center">
            <div class="col-4 pt-1">
                <a class="text-muted" href="/telescope">Telescope</a>
            </div>
            <div class="col-4 text-center">
                <h1><a class="blog-header-logo text-dark text-decoration-none fw-light" href="/">Хранилище статей</a></h1>
            </div>
            <div class="col-4 d-flex justify-content-end align-items-center">
                <a class="text-muted" href="/">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="mx-3"><circle cx="10.5" cy="10.5" r="7.5"></circle><line x1="21" y1="21" x2="15.8" y2="15.8"></line></svg>
                </a>
                @if(! \Illuminate\Support\Facades\Auth::check())
                    <a class="btn btn-sm btn-outline-secondary" href="/login">Login</a>
                    <a class="btn btn-sm btn-outline-secondary m-2" href="/register">Register</a>
                @else
                    <a class="btn btn-sm btn-outline-secondary" href="/dashboard">Your Dashboard</a>
                @endif
            </div>
        </div>
    </header>

    <div class="nav-scroller py-1 mb-2">
        <nav class="nav d-flex justify-content-between">
            <a class="p-2 text-muted" href="/">Главная</a>
            <a class="p-2 text-muted" href="/about">О нас</a>
            <a class="p-2 text-muted" href="/contacts">Контакты</a>
            <a class="p-2 text-muted" href="/articles/create">Создать статью</a>
            <a class="p-2 text-muted" href="/admin/feedback">Админ. раздел</a>
        </nav>
    </div>
</div>
<hr>
