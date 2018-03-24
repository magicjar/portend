@extends('layouts.dashboard-app')

@section('dashboard.sidebar')
	@include('layouts.dashboard-sidebar')
@endsection

@section('content')
<div id="category" data-type="portfolio" class="card mb-4">
    <h1 class="h2 mb-0 font-weight-bold card-body text-center">Portfolio Category</h1>
</div>

<category-component></category-component>
@endsection