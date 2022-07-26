@extends('layout')
@section('content')

    @include('shared.errors')
    @include('articles.form', ['article' => false])

@endsection
