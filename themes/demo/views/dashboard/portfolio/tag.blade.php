@extends('dashboard.app-boilerplate')

@section('dashboard.sidebar')
	@include('dashboard.app-sidebar')
@endsection

@section('content')
<div id="tag" data-type="portfolio" class="card mb-4">
    <h1 class="h2 mb-0 font-weight-bold card-body text-center">Portfolio Tag</h1>
</div>

<tag-component></tag-component>
@endsection