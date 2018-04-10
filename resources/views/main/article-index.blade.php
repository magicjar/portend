@extends('main.app')

@section('main.content')
<section id="article" class="p-5">
    <h2>Articles</h2>
    <div class="row">
        @foreach($articles as $article)
        <div class="col-sm-6">
            <div class="card my-3">
                <img class="card-img-top" src="{{ $article->thumb->thumbnail }}" alt="{{ $article->title }}">
                <div class="card-body">
                    <h2 class="card-title h4"><a href="{{ route('article.show', $article->id) }}" title="{{ $article->title }}">{{ str_limit($article->title, 60) }}</a></h5>
                    <p class="card-text">{{ str_limit($article->content, 220) }}</p>
                    <p class="card-text"><small class="text-muted">{{Carbon\Carbon::parse($article->created_at)->toFormattedDateString()}}</small></p>
                </div>
            </div>
        </div>
        @endforeach
    </div>

    {{ $articles->links() }}

</section>
@endsection