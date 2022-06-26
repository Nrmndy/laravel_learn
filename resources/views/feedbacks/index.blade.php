@extends('layout')
@section('content')

    <div class="row">
        <div class="col-md-8 blog-main">

            @foreach($feedbacks as $feedback)
                <div class="blog-post border border-1 rounded-2 bg-light px-2 mb-3">
                    <p class="blog-post-meta"><b>{{ $feedback->email }}</b>  {{ $feedback->created_at->toFormattedDateString() }} написал:</p>
                    <p>{{ $feedback->message }}</p>
                </div>
            @endforeach

        </div>
    </div>
@endsection
