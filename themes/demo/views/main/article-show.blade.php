@extends('main.app')

@section('main.content')
<section id="article" class="p-5">
    <h1>{{ $article->title }}</h1>
    <p>{!! $article->content !!}</p>
</section>
@endsection