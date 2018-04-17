@extends('dashboard.app-boilerplate')

@section('dashboard.sidebar')
    @include('dashboard.app-sidebar')
@endsection

@section('content')
<div class="card mb-4">
    <h1 class="h2 mb-0 font-weight-bold card-body text-center">Dashboard</h1>
</div>
<div class="card">
    <div class="card-body">
        @if (session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
        @endif

        You are logged in!
    </div>
</div>
@endsection