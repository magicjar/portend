@extends('dashboard.app-boilerplate')

@section('dashboard.sidebar')
	@include('dashboard.app-sidebar')
@endsection

@section('content')
<div id="tag" data-type="article" class="card mb-4">
    <h1 class="h2 mb-0 font-weight-bold card-body text-center">Article Tag</h1>
</div>

<tag-component></tag-component>
@endsection