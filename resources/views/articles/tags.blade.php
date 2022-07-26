@php
    $tags = $tags ?? collect();
@endphp

@if($tags->isNotEmpty())
    <div class="mb-2">
        @foreach($tags as $tag)
            <a href="/articles/tags/{{ $tag->getRouteKey() }}" class="badge bg-dark fw-light text-decoration-none">{{ $tag->name }}</a>
        @endforeach
    </div>
@endif
