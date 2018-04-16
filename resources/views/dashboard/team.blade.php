@extends('dashboard.app-boilerplate')

@section('dashboard.sidebar')
	@include('dashboard.app-sidebar')
@endsection

@section('content')
<div class="card mb-4">
    <h1 class="h2 mb-0 font-weight-bold card-body text-center">Team</h1>
</div>

<team-component></team-component>

<mediamodal-component></mediamodal-component>

@endsection